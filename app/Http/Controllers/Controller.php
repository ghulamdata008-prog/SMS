<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function read($id)
{
    $notification = auth()->user()
        ->notifications()
        ->findOrFail($id);

    $notification->markAsRead();

    return back();
}
}
