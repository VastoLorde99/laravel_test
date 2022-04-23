<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function store(Request $req)
    {
        $user = new User;
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->role = 'user';
        $user->password = $req->input('password');
        
        if ($user->save()) {
            session(['user' => $user]);
            // session(['name' => $user->name, 'email' => $user->email, 'role' => $user->role]);
            return response()->json(array('msg' => 'Вы успешно зарегистрированы'), 200);
        } 
        else {
            return response()->json(array('msg' => 'Ошибка при регистрации'), 200);
        }
    }

    public function login(Request $req)
    {
        $user = User::select('id', 'name', 'email', 'role')->whereRaw('email = ? and password = ?', [$req->input('email'), $req->input('password')])->get();
        session(['user' => $user[0]]);
        return response()->json($user[0], 200);
    }

    public function logout()
    {
        session()->flush();
        // session()->forget('user');
        return redirect('/');
    }
}
