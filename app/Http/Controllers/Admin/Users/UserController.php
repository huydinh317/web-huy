<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        $user = User::paginate(3);
        return view('/backend/users/listuser',['users'=>$user]);

    }
    public function create()
    {
        return view('/backend/users/adduser');

    }
    public function store()
    {
    }
    public function edit()
    {
        return view('/backend/users/edituser');

    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
