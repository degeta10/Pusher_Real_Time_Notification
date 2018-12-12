<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Notification;
use Illuminate\Http\Request;
use App\Notifications\NotifyUser;

class NotificationController extends Controller
{
    public function index()
    {
        $users = User::where('id','!=',auth()->user()->id)->get();
        $message = auth()->user()->name. " sent you a message";
        foreach ($users as $user) {
            $user->notify(new NotifyUser($message));
        }
        return view('home');
    }

    public function get()
    {
        $notifications = Auth::user()->unreadNotifications;
        return $notifications;
    }

    public function read(Request $request)
    {
        Auth::user()->unreadNotifications()->find($request->id)->MarkAsRead();
        return "Success";
    }
}
