<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Productsbasket;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
       if($id == null){
            return Notification::orderBy('id','asc')->get();
        }else{
            return $this->show($id); 
        }
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

    public function menssageList($id){
        
        $list = DB::table('Notifications')
            ->join('users', 'users.id', '=', 'notifications.to')
            ->join('users as f', 'f.id', '=', 'notifications.from')
            ->join('statusdonations', 'statusdonations.id', '=', 'notifications.status')
            ->where('notifications.id','=', $id)
            ->select('notifications.id','notifications.subject','notifications.description', 'f.name as from', 'users.name as to', 'statusdonations.status', 'notifications.datesend')
            ->orderBy('notifications.datesend')
            ->get();

        return $list; 

    }

    public function showMenssagesReceived($id=null){

        $userId =  Auth::user()->id;

        $received = DB::table('Notifications')
            ->join('users', 'users.id', '=', 'notifications.to')
            ->join('users as f', 'f.id', '=', 'notifications.from')
            ->join('statusdonations', 'statusdonations.id', '=', 'notifications.status')
            ->where('notifications.to','=', $userId)
            ->where('notifications.status', '=', '3') //unreaded
            ->select('notifications.id','notifications.subject','notifications.description', 'f.name as from', 'users.name as to', 'statusdonations.status', 'notifications.datesend')
            ->orderBy('notifications.datesend')
            ->get();

        return $received;
    }

     public function showMenssagesReceivedReaded($id=null){

        $userId =  Auth::user()->id;

        $received = DB::table('Notifications')
            ->join('users', 'users.id', '=', 'notifications.to')
            ->join('users as f', 'f.id', '=', 'notifications.from')
            ->join('statusdonations', 'statusdonations.id', '=', 'notifications.status')
            ->where('notifications.to','=', $userId)
            ->where('notifications.status', '=', '1') //readed
            ->select('notifications.id','notifications.subject','notifications.description', 'f.name as from', 'users.name as to', 'statusdonations.status', 'notifications.datesend')
            ->orderBy('notifications.datesend')
            ->get();

        return $received;
    }

    public function showMenssagesSent($id=null){
            
            $userId =  Auth::user()->id;

            $sentm = DB::table('Notifications')
            ->join('users as t', 't.id', '=', 'notifications.to')
            ->join('statusdonations', 'statusdonations.id', '=', 'notifications.status')
            ->where('notifications.from','=', $userId)
            ->select('notifications.id','notifications.subject','notifications.description', 'notifications.from', 't.name as to', 'statusdonations.status', 'notifications.datesend')
            ->orderBy('notifications.datesend', 'notifications.status')
            ->get();

        return $sentm;
    }

    public function countMessagesUnreaded(){

        $userId =  Auth::user()->id;

        $numberUnreaded = DB::table('Notifications')
            ->join('users', 'users.id', '=', 'notifications.to')
            ->join('users as f', 'f.id', '=', 'notifications.from')
            ->join('statusdonations', 'statusdonations.id', '=', 'notifications.status')
            ->where('notifications.to','=', $userId)
            ->where('notifications.status', '=', '3')
            ->count(); //unreaded

        return $numberUnreaded;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $userId =  Auth::user()->id;

        $notification = new Notification;
        $notification->subject = $request->input('subject');
        $notification->description = $request->input('description');
        $notification->from = $userId;
        $notification->to = $request->input('to');
        $notification->datesend =  date('Y-m-d H:i:s');
        $notification->status = '3';
        $notification->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $Notification
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Notification::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notification  $Notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $Notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $Notification
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $notification = Notification::find($id);
        $notification->status = "1";
        $notification->save();
        //return 'Notification record updated' .$Notification->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $Notification
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Notification = Notification::find($id)->delete();
        
    }
}
