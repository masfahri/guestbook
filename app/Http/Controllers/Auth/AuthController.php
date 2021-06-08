<?php

namespace App\Http\Controllers\Auth;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\LoginRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('Auth.login');
    }

    public function _login(LoginRequest $request)
    {
        $validator = Validator::make($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        Auth::attempt($request->except('_token'));
        if (Auth::check()) {
            return redirect()->route('home');
        }else{
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }

    public function showFormRegister()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('Auth.register');
    }

    public function _register(RegisterRequest $request)
    {
        $validator = Validator::make($request->all());
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $user = new User;
        try {
            DB::beginTransaction();
            $user->name = ucwords(strtolower($request->name));
            $user->email = strtolower($request->email);
            $user->password = Hash::make($request->password);
            $user->email_verified_at = \Carbon\Carbon::now();
            $user->assignRole('admin');
            $simpan = $user->save();
            DB::commit();
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } catch (\Throwable $th) {
            DB::rollback();
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
}
