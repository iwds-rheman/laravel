<?php namespace App\Http\Controllers;  
  
use App\Models\AccountType;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Request;
Use Hash;
Use DB;
  
class CustomAuth extends Controller {  
  
    public function index() {
        if(Auth::check()){
            $user = Auth::User();
            $userInfo = DB::select('select a.FName,a.LName,b.AccountType from user_info as a,Account_type as b where a.AccountTypeID=b.UID and a.UID = '.$user->UID.' LIMIT 1');
            $data = array('user'=>$userInfo);
           // dd($data);
           return  view('home')->with('data', $data);
        }else{

            $credentials = array(
                'username' =>  Request::input('username'),
                'password' =>   Request::input('password'),
            );
            if(Auth::attempt($credentials)){
                return Redirect::to('/');
            }else{
                return view('welcome');
            }

        }

    }
    public function Logout (){
        Auth::logout();
        return Redirect::to('/');
    }

}  