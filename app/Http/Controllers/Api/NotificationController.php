<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MainResource;
use App\Http\Resources\NotificationResource;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationController extends Controller
{
    //

    public function getNotifications(){
        $user = User::find(auth()->user()->id);
        return new MainResource(new NotificationResource($user),Response::HTTP_OK,'تم جلب الاشعارات بنجاح');
    }

    public function readAll(){
        $user = User::find(auth()->user()->id);
        $user->unreadNotifications->markAsRead();
        return response()->json([
            'status' => true,
            'message' => 'All notifications read'
        ]);
    }
}
