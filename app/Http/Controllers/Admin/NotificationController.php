<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notifications = Notification::all();

        return view('layouts.admin.noti.list', ['notifications' => $notifications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $notification = Notification::find($id);
        $notifications->delete();

        return redirect()->route('admin_noti_list');
    }

    public function saveNoti($head, $body, $tail)
    {
        $notification = new Notification();
        $notification->head = $head;
        $notification->body = $body;
        $notification->tail = $tail;

        $notification->save();
    }

    public function setAsRead($id)
    {
        $notification = Notification::find($id);
        $notification->is_read = 1;
        $notification->save();

        return redirect()->back();
    }

    public function setAllAsRead()
    {
        $unreadNotifications = Notification::all()->where('is_read', '0');
        foreach($unreadNotifications as $item)
        {
            $item->is_read = 1;
            $item->save();
        }

        return redirect()->back();
    }
}
