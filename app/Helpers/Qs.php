<?php

namespace App\Helpers;

use App\Models\Designation;
use App\Models\ChMessage;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Hashids\Hashids;
use Illuminate\Support\Facades\Auth;

class Qs
{
    public static function designationIDStudent()
    {
        $id = Designation::where('name', 'Student')->get('id');
        return $id;
    }

    public static function isPrimaryRole($role)
    {
        $notAllowed = ['Student', 'Admin', 'SuperAdmin', 'Teacher'];
        if (in_array($role, $notAllowed)) {
            return 1;
        }
        return 0;
    }


    public static function messages()
    {
        $id = Auth::user()->id;
        $cnt =  ChMessage::where('to_id', $id)->where('seen', 0)->count();
        return $cnt;
    }


    public static function myavatar()
    {
        $user = Auth::user();
        $path = $user->getFirstMediaUrl('profile_picture');
        return $path;
    }
    public static function avatarid($id)
    {
        $user = User::with('media')->where('id', $id)->first();
        $path = $user->getFirstMediaUrl('profile_picture');
        return $path;
    }

    public static function getmaindisk()
    {
        return 'store';
    }
}
