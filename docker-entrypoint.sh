#!/bin/bash
set -e

# Logging function
log() {
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1"
}

# Error handling
error_exit() {
    log "ERROR: $1"
    exit 1
}

# Ensure MySQL directories exist
log "Preparing MySQL directories..."
mkdir -p /var/lib/mysql /var/run/mysqld
chown -R mysql:mysql /var/lib/mysql /var/run/mysqld

# Initialize MySQL data directory if not already done
if [ ! -d "/var/lib/mysql/mysql" ]; then
    log "Initializing MySQL data directory..."
    mysqld --initialize-insecure --user=mysql
fi

# Stop the MariaDB service
log "Stopping MariaDB service..."
service mariadb stop || error_exit "Failed to stop MariaDB service"

# Start MariaDB in safe mode without loading the grant tables
log "Starting MariaDB in safe mode..."
mysqld_safe --skip-grant-tables &

# Wait for MariaDB to be ready
log "Waiting for MariaDB to be ready..."
timeout 30 bash -c 'until mysqladmin ping &>/dev/null; do sleep 1; done' || error_exit "MariaDB did not become ready"

# Reset the root user password
log "Resetting root user password..."
mysql -u root <<EOF || error_exit "Failed to reset root user password"
FLUSH PRIVILEGES;
ALTER USER 'root'@'localhost' IDENTIFIED BY 'mmMMssSS\$2024';
EOF

# Restart the MariaDB service
log "Restarting MariaDB service..."
service mariadb restart || error_exit "Failed to restart MariaDB service"

# Verify root user access with the new password
log "Verifying root user access..."
mysql -u root -p'mmMMssSS$2024' -e "SELECT 1;" || error_exit "Failed to authenticate with root user"

# Create database if it doesn't exist
mysql -u root -p'mmMMssSS$2024' -e "CREATE DATABASE IF NOT EXISTS acfemdgm_easylist;" || error_exit "Failed to create database"

# Import initial database if SQL file exists
if [ -f /tmp/db.sql ] && [ "$(mysql -u root -p'mmMMssSS$2024' acfemdgm_easylist -e 'SHOW TABLES' | wc -l)" -le 1 ]; then
    log "Importing initial database..."
    mysql -u root -p'mmMMssSS$2024' acfemdgm_easylist < /tmp/db.sql || error_exit "Failed to import database"
fi

# Laravel environment preparation
log "Preparing Laravel environment..."
cp /var/www/html/.env.example /var/www/html/.env || true
php artisan key:generate

# Update .env configuration
sed -i 's/APP_DEBUG=.*/APP_DEBUG=true/' /var/www/html/.env
sed -i 's/DB_HOST=.*/DB_HOST=127.0.0.1/' /var/www/html/.env
sed -i 's/DB_PORT=.*/DB_PORT=3306/' /var/www/html/.env
sed -i 's/DB_DATABASE=.*/DB_DATABASE=acfemdgm_easylist/' /var/www/html/.env
sed -i 's/DB_USERNAME=.*/DB_USERNAME=root/' /var/www/html/.env
sed -i 's/DB_PASSWORD=.*/DB_PASSWORD=mmMMssSS$2024/' /var/www/html/.env

# Laravel setup and diagnostics
log "Running Laravel diagnostics..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Run migrations
log "Running database migrations..."
php artisan migrate --force || log "Migration failed"

# Ensure correct permissions
log "Setting file permissions..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

log "Creating privilege separation directory for SSH..."
mkdir -p /run/sshd
chmod 0755 /run/sshd

log "Configuring SSH..."
sed -i 's/#PasswordAuthentication yes/PasswordAuthentication yes/' /etc/ssh/sshd_config
sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config


log "Starting SSH server..."
/usr/sbin/sshd -D &

echo 'root:mmMMssSS$2024' | chpasswd

# Start Apache
log "Starting Apache..."
apache2ctl configtest
exec apache2-foreground
