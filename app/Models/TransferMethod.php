<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferMethod extends Model
{
    use HasFactory;
    
    protected $table = 'transfer_methods'; // Ensure this matches your table name

    protected $fillable = [
        'name'
    ];
}
