<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signupsave(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'email' => 'required|email|unique:users',
        //    'city' => 'required',
        //    'address' =>'required',
           'phone' => 'required|max:11|min:11',
           'password' => 'required|min:6', 
           'password_confirmation' => 'required|min:6', 
        ]);
        $data = $request->all();
        $check = $this->create($data);
        return redirect('home.homePage');
    }
    public function create(array $data)
    {
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            // 'city'=>$data['city'],
            // 'address'=>$data['address'],
            'phone'=>$data['phone'],
            'password'=>$data['password'],
            'password_confirmation-'=>Hash::make($data['password_confirmation'])
        ]);
    }
}
