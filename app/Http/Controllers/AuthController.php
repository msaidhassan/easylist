<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Password;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\User;

class AuthController extends Controller {

    /**
     * Display login of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function login(){
        $title = "Login";
        $description = "Some description for the page";
        return view('auth.login',compact('title','description'));
    }

    /**
     * Display register of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function register(){
        $title = "Register";
        $description = "Some description for the page";
        return view('auth.register',compact('title','description'));
    }

    /**
     * Display forget password of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function forgetPassword(){
        $title = "Forget Password";
        $description = "Some description for the page";
        return view('auth.forget_password',compact('title','description'));
    }

    /**
     * make the user able to register
     *
     * @return
     */
    public function signup(Request $request){
        $validators=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);
        if($validators->fails()){
            return redirect()->route('register')->withErrors($validators)->withInput();
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            auth()->login($user);
            return redirect()->intended(route('dashboard.home','ar'))->with('message','Registration was successfull !');
        }
    }

    /**
     * make the user able to login
     *
     * @return
     */
    public function authenticate(Request $request){
        $validators=Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($validators->fails()){
            return redirect()->route('login')->withErrors($validators)->withInput();
        }else{
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect()->intended(route('dashboard.home','ar'))->with('message','اهلا بعودتك');
            }else{
                return redirect()->route('login')->withErrors(['email' => 'خطأ في بيانات الدخول']);

               // return redirect()->route('login')->with('message','خطأ في بيانات الدخول');
            }
        }
    }

    /**
     * make the user able to logout
     *
     * @return
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('message','تم تسجيل الدخول بنجاح');
    }

    public function sendResetLinkEmail(Request $request)
{
    // Validate the email input
    $request->validate(['email' => 'required|email']);

    // Check if the user exists
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        // Return an error response if the email is not found
        return back()->withErrors(['email' => 'هذا البريد ليس مسجل لدينا']);
    }

    // Send the password reset link
    $status = Password::sendResetLink(
        $request->only('email')
    );

    if ($status === Password::RESET_LINK_SENT) {
        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'تم ارسال رابط تغيير كلمة المرور إلى بريدك الإلكتروني');
    } else {
        // Redirect back with an error message
        return back()->withErrors(['email' => __($status)]);
    }
}
    public function showResetForm(Request $request, $token)
{
    return view('auth.reset-password', ['token' => $token, 'email' => $request->email]);
}

public function resetPassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
}
}
