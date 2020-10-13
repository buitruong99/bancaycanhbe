<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use Psy\Util\Str;
class AdminController extends Controller
{
    public function loginAdmin(){

//        if (auth()->check()){
//            return redirect()->to('home');
//        }
//        dd(bcrypt('truong99'));
        return view('login');
    }
    public function postloginAdmin(Request $request){
//        $remember = $request->has('remember-me')? true : false;
//        ,$remember
    if(auth()->attempt([
    'email'=> $request->email, 'password'=>$request->password
    ])){
        return redirect()->to('admin/sanpham');
        }else{
        return redirect()->to('login');
    }
    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->route('admin/sanpham');
        }
    }
}
