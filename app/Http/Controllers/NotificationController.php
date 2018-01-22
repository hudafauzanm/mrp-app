<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification as Notification;
use App\PersonnelArea;

class NotificationController extends Controller
{
    public function __construct()
    {
    	return $this->middleware('auth');
    }

    public function read()
    {
        $id = request('id');
    	$notif = Notification::find($id)->markAsRead();

    	return response()->json($id);
    }

    public function readAll()
    {
    	$user = auth()->user();
    	$user->unreadNotifications->markAsRead();

    	return response()->json(1);
    }

    public function delete($id)
    {

    }
}
