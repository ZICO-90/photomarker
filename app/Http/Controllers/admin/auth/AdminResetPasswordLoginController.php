<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
class AdminResetPasswordLoginController extends Controller
{
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    protected function guard()
    {
            return Auth::guard('admin');
    }

    protected function broker() : \Illuminate\Contracts\Auth\PasswordBroker
    {
    return Password::broker('admins');
    }

    public function showResetForm(Request $request ,$token = null)
    {
        
        return view('admin.passwords.reset-password')->with(
            ['token' => $token, 'email' => $request->email]) ;
       
    }


    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
     
        $status = $this->broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($admin)  use ($request) {
                $admin->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();
          
     
                event(new PasswordReset($admin));
            }
        );
     
       
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('admin.login')->with(['status', 'تم تحديث كلمة المرور بنجاح'])
                    : redirect()->back()->with(['error' => 'يجد مشكله برجاء اعاده المحاوله']);
    }

}
