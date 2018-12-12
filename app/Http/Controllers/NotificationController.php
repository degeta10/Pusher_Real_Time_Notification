<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Notifications\NotifyUser;

class NotificationController extends Controller
{
    public function index()
    {
        // $user = auth()->user()->get();
        $users = User::where('id','!=',auth()->user()->id)->get();
        $message = auth()->user()->name. " sent you a message";
        foreach ($users as $user) {
            $user->notify(new NotifyUser($message));
        }
        // User::find(auth()->user()->id)->notify(new NotifyUser($message));
        return view('home');
    }
}
