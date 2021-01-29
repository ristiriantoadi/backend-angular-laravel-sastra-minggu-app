<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function index(Request $request){
        $user = Auth::user();
        return response()->json([
            'notifications'=>$user->unreadNotifications
         ]);
    }

    public function readNotifications(Request $request){
        $user = Auth::user();
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
    }
}
