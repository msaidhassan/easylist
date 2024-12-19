<!doctype html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - EasyList</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/logo/icon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        body {
            font-family: "Noto Kufi Arabic", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
            direction: rtl;
            background-color: #f8f9fa;
        }
        .color{
            background-color: #1183c9;
            color: white;
        }
        .login {
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            direction: rtl;
        }
        /* Placeholder style */
        .right input::placeholder {
            font-weight: 400;
        }

        /* Focus style */
        .right input:focus {
            outline: none; /* Remove default outline */
            border-bottom: 1px solid #2da9f7; /* Change border color on focus */
        }

        .submit {
            border: none;
            padding: 11px 40px;
            border-radius: 8px;
            margin-top: 20px;
            background: #2da9f7;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s; /* Smooth transition for hover */
        }

        /* Button hover effect */
        .submit:hover {
            background: #1a8cd8; /* Darker shade on hover */
        }

        /* Logo styling */
        .right .logo-icon {
            position: absolute;
            top: 50px;
            right: 50px;
            width: 50px;
        }
        .login-container {
            width: 400px;
            height: 520px;
            margin: 20px auto 20px;
            padding: 24px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .login-logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 160px;
        }

        .login-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
        }
        .remeber{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        .remeber input[type=checkbox]{
            width: 26px;
            height: 25px;
        }
        .check{
            display: flex;
            align-items: center;
        }
        .check p{
            margin-right: 10px;
            margin-bottom: 0;
        }
        .bottom{
            display: flex;
            justify-content: space-between;
            margin: 20px 0px;
        }
        .postition{
            position: relative;
        }
        .postition label{
            position: absolute;
            top: 2px;
            right: 1px;
            font-size: 14px;
            color: #666;
        }
        .form-control {
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0;
            padding-right: 0;
            padding-left: 0;
            font-size: 16px;
            color: #333;
        }
        .form-control:focus {
            border-bottom: 1px solid #2da9f7;
            box-shadow: none;
        }
        .btn-color {
            background-color: #1183c9;
            color: white;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn-color:hover {
            background-color: #0d6ca3;
            color: white;
        }
        .alert {
            direction: rtl; /* Ensure RTL direction for alert messages */
            text-align: right; /* Align text to the right */
        }
        @media (max-width:991px){
            .login-container{
                width: 77%;
            }
        }
        @media (max-width:770px){
             .login-container{
                width: 85%;
             }
        }
        @media (max-width:600px) {
            .login{
                justify-content: start;
                align-items: start;
            }
            .bottom{
                flex-direction: column;
            }
            .bottom a{
                margin:25px 0px;
            }
            .login-container{
                padding: 20px;
                margin-top: 10vh;
                width: 80%;
            }
            .separate{
                height: 20px;
            }
            .postition label{
                top: 2px;
                right: 5px;
            }
            .bottom a{
                width: 50%;
                margin: auto;
            }
            @media (max-width:500px){
                .login-container{
                    width: 99%;
                }
            }
            @media (max-width:365px) {
                .bottom a{
                    width: 90%;
                }
            }
        }

    </style>
</head>
<body>
    <section class="login">
    <div class="container">
        <div class="login-container" >
            <!-- Logo -->
            <img src="{{ asset('assets/img/logo/icon.png') }}" alt="Logo" class="login-logo">

            <h2 class="login-title">تسجيل الدخول</h2>


            <!-- Login Form -->
            <form action="{{ route('authenticate') }}" method="POST">
            @csrf
                <!-- Email Input -->
                <div class="form-group mt-3 mb-3 postition" >
                    <input type="email" class="form-control" id="email" name="email" placeholder=" البريد الإلكتروني " required>
                </div>

                <!-- Password Input -->
                <div class="form-group mt-3 mb-3 postition">
                    <input type="password" class="form-control" id="password" name="password" placeholder=" كلمة السر " required>
                </div>

                <!-- Login Button -->
                <div class="remeber">
                    <div class="check">
                        <input type="checkbox"  name="remeber" value="تذكرني">
                        <p>تذكرني</p>
                    </div>
                    <button type="submit" class="btn btn-color">دخول</button>
                </div>
            </form>
            <div style="position:relative;height:30px;">
                <a href="{{route('forget_password')}}" style="position:absolute;top: 1px;right: -1px;;">هل نسيت كلمة المرور؟</a>
            </div>
           <div class="bottom">
                <a href="https://acfe-s.com/easylist/" class="btn btn-color p-2" target="_blank">ما هو EasyList؟ </a>
                <div class="separate"></div>
                <a href="https://acfe-s.com/join/" class="btn btn-color p-2" target="_blank"> التسجيل كمستقل؟ </a>
           </div>
        </div>
    </div>
    </section>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        // Check for success message in session
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                confirmButtonText: 'حسنًا',
                confirmButtonColor: '#1183c9',
                customClass: {
                    confirmButton: 'btn btn-color'
                }
            });
        @endif

        @if ($errors->any())
            // Combine all error messages into a single string
            let errorMessages = '';
            @foreach ($errors->all() as $error)
                errorMessages += '{{ $error }}\n';
            @endforeach

            // Display error messages as a popup
            Swal.fire({
                icon: 'error',
                title: 'خطأ',
                text: errorMessages,
                confirmButtonText: 'حسنًا',
                confirmButtonColor: '#d33',
                customClass: {
                    confirmButton: 'btn btn-danger'
                },
                timer: 3000, // Auto-close after 3 seconds
                timerProgressBar: true, // Show progress bar
                showConfirmButton: false // Hide the confirm button
            });
        @endif
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZvpUoO/+PpR2jLJ9e36s1L9UGbJ9cvi4IH6lF10YV9hjq7j7yq7H+J/PVZxB07Tz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js" integrity="sha384-jR2dpD/VcOSKyT6dDcxzCqauZnTL6bFzNxkYc1kTwj/8B3s8qGb2ne3MGxYxLlZ7" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgPSUGm7pV2lZtLeY4wrAqB/2l0O6q5aA3L/RjcmNEZgJ/nICp2" crossorigin="anonymous"></script>
</body>
</html>
