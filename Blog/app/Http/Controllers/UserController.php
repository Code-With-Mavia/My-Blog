<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class UserController
{
    public function getUser()
    {
        return "Welcome to my first website";
    }

    public function getUserInfo()
    {
        $result = DB::table('users') -> get();
        // return view('users',['users'=>$result]);
        return $result;
    }
   
}
?>