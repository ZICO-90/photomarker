<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
   public function ShowLoginForm()
   {
    
       return view('admin.login.show-login-form');
   }

   public function login(Request $re)
   {

    $rules = [
                    
        'email' => 'required|email',
        'password' => 'required|min:6',
        
    ];

    $message =[
        'required.email' => 'البريد الالكتروني مطلوب',
        'required.password' => 'كلمة المرور مطلوبة',
        'password.min' => 'كلمة المرور يجب ان لا تقل علي 6 احرف ,'

    ];

    $data =  $this->validate($re ,$rules , $message );

    $remember_me = $re->has('remember') ? true : false;

    

    if( Auth::guard('admin')->attempt(['email' => $data['email'] , 'password' => $data['password'] ], $remember_me  ) )
    {
        return redirect()->intended(route('admin.index'));
    }

    return redirect()->back()->with(['status' => 'كلمة المرور او البريد الالكتروني غير صحيحه']) ;
    
       
   }

   public function logout(){
       Auth::guard('admin')->logout();
       return redirect()->route('admin.login') ;
   }
}
