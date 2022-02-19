<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class ManagementsConstroller extends Controller
{
    public function index()
    {
        $admins =  Admin::get();
        return view('admin.managements.index',compact('admins'));

    }


    public function create()
    {
        return view('admin.managements.create');
    }


    public function store(Request $re)
    {

        $message = [
                    'required' => 'هذا الحقل مطلوب',
                    'name.min' => 'يجب ان لا يقل عن ثلاث احر',
                    'name.max' => 'يجب ان لا يزيد عن 150 حرف',
                    'console.min' => 'يجب ان لا يقل عن ثلاث احر',
                    'console.max' => 'يجب ان لا يزيد عن 100 حرف',
                  ];

        $data = $this->validate($re,[
                                     'name' => 'required|min:3|max:150',
                                     'console' => 'required|min:3|max:100',
                                     'email' => 'required|email|unique:admins',
                                     'password' => ['required', 'confirmed', Rules\Password::defaults()] ,
                                 ] , $message);

        try
        {
            Admin::create([
                         'name' => $data['name'],
                         'email' => $data['email'],
                         'password' =>  Hash::make( $data['password'] ) ,
                         'console' => $data['console'],
                        ]);

            return redirect()->route('admin.managements.index')->with(['success' => "تم الاضافة بنجاح"]);

        }
        catch(\Exception $ex)
        {
              return redirect()->route('admin.managements.index')->with(['error' => "يوجد مشكلة برجاء اعادة المحاوله في وقت لاحق"]);
        }


    } # -- end store

    public function edit($id)
    {
           $admin =  Admin::findorFail($id);
           return view('admin.managements.edit' ,compact('admin'));
    } #-- end edit


    public function update(Request $re , $id)
    {
    
        $message = [
            'required' => 'هذا الحقل مطلوب',
            'name.min' => 'يجب ان لا يقل عن ثلاث احر',
            'name.max' => 'يجب ان لا يزيد عن 150 حرف',
            'email.unique' => 'البريد الالكتروني موجود بالفعل',
            'console.min' => 'يجب ان لا يقل عن ثلاث احر',
            'console.max' => 'يجب ان لا يزيد عن 100 حرف',
            'new_password_confirmation.same' => 'كلمة المرور غير متطابقة',
          ];

        $data = $this->validate($re,[
                                     'name' => 'required|min:3|max:150',
                                     'console' => 'required|min:3|max:100',
                                     'email' => 'required|email|unique:admins,email,'.$id,
                                     'password_old' => ['nullable',  Rules\Password::defaults() ,] ,
                                     'password' => ['nullable',   Rules\Password::defaults() ,] ,
                                     'password_confirmation' => ['nullable', 'same:password',  Rules\Password::defaults() ,] ,
                                 ] , $message);


    $admin_update =  Admin::findorFail($id);

    if($data['password_old'] != null)
    {
              $re->validate([
                  'password' => ['required',   Rules\Password::defaults() ,] ,
                  'password_confirmation' => ['required', 'same:password',  Rules\Password::defaults() ,] ,
              ],$message);
    
    
             if(password_verify($data['password_old']  , $admin_update->password))
              {
                  $data['password'] = Hash::make($data['password']);
              }
              else
              {
                  $errors = new \Illuminate\Support\MessageBag();
                  $errors->add('password_old', 'كلمة المرور غير صحيحة');
                  return back()->withErrors( $errors );
              }
    
    }

    
       if($data['password_old'] != null)
       {
           unset($data['password_confirmation'] , $data['password_old'] );
       }else{
           unset($data['password_confirmation'] , $data['password_old']  , $data['password']); 
       }

       $admin_update->update($data);


       return redirect()->route('admin.managements.index')->with(['success' => "تم الاضافة بنجاح"]);


    } #-- end update

    public function delete($id)
    {
        $admin = Admin::findorFail($id);
        $admin->delete();
        return redirect()->route('admin.managements.index')->with(['success' => "تم الحف بنجاح"]);

    }#-- end delete

} #-- end class controller
