<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Index(){
        if (Auth::check()) {
            return redirect()->route('user.dashboard');
        } else {
            return view('logindanregis.loginuser');
        }
    }

    public function Dashboard(){
        return view('user.dashboard');
    }

    public function Login(Request $request){
        // dd($request->all());
        $check = $request->all();
        if (Auth::attempt(['nama'=> $check['nama'], 'password'=>$check['password']])) {
            return redirect()->route('user.dashboard');
        } else {
            return back();
        }
    }

    public function Register(){
        return view('logindanregis.regisuser');
    }

    public function registercreate(Request $request){
        // dd($request->all());
        User::insert([
            'nama' => $request -> nama,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'noTelp' => $request->noTelp,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('formlogin_user');
    }



    public function logout(){
        Auth::logout();
        return redirect()->route("formlogin_user");
    }

    
}
