<?php
namespace App\repositories;

use App\interfaces\AuthInterface;
use App\Models\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthInterface{
    public function addAuth($auth)
    {
     
          $data = new Auth();
         
          $data->name=$auth->name;
          $data->email=$auth->email;
          $data->password=bcrypt($auth->password);
          $data->phone=$auth->phone;
          if(!$auth->role){
            $data->role='user';
          }else{
            $data->role=$auth->role;
          }
          $data->save();
          return response()->json(['data'=>$data]);
    }
    public function loginAuth($auth)
    {
        $data = Auth::where(['email'=>$auth->email])->where(['role'=>'user'])->first();
      if(!$data || !Hash::check($auth->password, $data->password)){
        return response()->json(['error'=>'Email or Password not match']);
      }
      else{
        return response(["message"=>"Login Successfully Done!","data"=>$data]);
      }
    }
    public function loginAdminAuth($auth)
    {
        $data = Auth::where(['email'=>$auth->email])->where(['role'=>'admin'])->first();
      if(!$data || !Hash::check($auth->password, $data->password)){
        return response()->json(['error'=>'Email or Password not match']);
      }
      else{
        return response(["message"=>"Login Successfully Done!","data"=>$data]);
      }
    }
}