<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Carbon\carbon;
use App\Models\serie;

class AdminController extends Controller
{
    public function Login(){
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('logindanregis.loginadmin');
        }
    }

    public function Dashboard(){
        return view('admin.dashboard');
    }

    public function LoginProses(Request $request){
        // dd($request->all());
        $check = $request->all();
        if (Auth::guard('admin')->attempt(['username'=>$check['username'], 'password'=>$check['password']])) {
            session()->regenerate();
            return redirect()->route('admin.dashboard');
        } else {
            return back();
        }
    }

    public function Logout() {
        Auth::guard('admin')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route("formlogin_admin");
    }

    public function Table () {
        return view('admin.table.index');
    }
}
