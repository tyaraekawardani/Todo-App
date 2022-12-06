<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register (Request $request){
        $validdateData =$request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' =>  'required',
        ]);
        $validdateData['password'] = bcrypt($validdateData['password']);
        
        User::create($validdateData);
        //
        return redirect('/')->with('successRegister', 'Berhasil menambahkan akun, 
        silahkan login!');
    }
}