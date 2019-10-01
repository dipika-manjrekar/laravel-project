<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use Crypt;
use View;
use App\mainModel;
use Carbon\Carbon;
use Session;
use Helper;
use Charts;

class LoginController extends Controller
{
    public function login(Request $request) {
        $username = $request['email'];
        $pass = $request['password'];
       
        $app_key = config('app.app_key');
			$password = Helper::cryptoJsAesDecrypt($app_key, $pass);
            $decryptedpassword = Crypt::encrypt($password);
          //  print_r($password);
         //   DB::enableQuerylog();
            $user = DB::table('mst_users')->where(['flag'=>'Show'])
			->where(function($query) use ($username,$password){
				return $query
                ->where('username', '=', $username)
                ->where('password', '=', $password);
            })->get()->first();
         //   $aa = DB::getQuerylog();
           // print_r($aa); exit;
   
            if($user)
			{
                $user_id = $user->id;
                $username = $user->username;
							
				$request->session()->put('user_id',$user_id);               
                $request->session()->put('username',$username);
                //echo $user_id;
                if($user_id ==1){
                    return redirect()->route('administratorDashboard');
                }
            }
            else
			{
				$errors = "Invalid Credentials..!!";
				return redirect('/')->withErrors($errors); 
			}
    }

    
}
