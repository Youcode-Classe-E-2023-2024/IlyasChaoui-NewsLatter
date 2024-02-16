<?php

use App\Models\User;

if(!function_exists('getRole')) {
    function getRole($userId) {
        $user = User::find($userId);

        if($user->hasRole('admin')) return "admin";
        elseif($user->hasRole('editor')) return "editor";
        else return "viewer";
    }
}
