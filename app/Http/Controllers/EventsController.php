<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Input;
use Session;
use MaddHatter\Laravel\Fullcalendar\Facades\Calendar;
use Illuminate\Database\Eloquent\Model;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
         $end= $request['end'];
        $datetime = date("Y-m-d H:i:s");
        $diff = abs(strtotime($datetime) - strtotime($end));
        $min = floor($diff / (60*60*24));
        $jour='';
        if($min==1){
            $jour ="Rest 1 Day for ".$title;
            
        }
        $events = Event::all();  
        return view('fullcalendar', compact('events'))->with('success', $jour);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('fullcalendar');
    }

    /**fullcalendar
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $start=$request->start;
        $end=$request->end;
        if($end<$start){
        return redirect('events')->with('error', "The end date is greater than the start date please check your event !");
        }
        $requestData = $request->all();
        
        Event::create($requestData);
        
        $nom=$request->title;
        Session::flash('flash_message', 'Event added!');

        return redirect('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $events = Event::findOrFail($id);

        return view('fullcalendar', compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $events = Event::findOrFail($id);
        $events->save();
        return view('events', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function update($id, Request $request)
    {
        $requestData = $request->all();  


        $events = Event::findOrFail($id);
        $events->update($requestData);
        $events->save();
        Session::flash('flash_message', 'Event updated!');
        return redirect('events');
    }

     public function modifier($id, Request $request)
    {
        if (Input::has('Delete')) {
        $events=Event::findOrFail($id);
        Event::destroy($id);
        Session::flash('flash_message', 'Event deleted!');
        return redirect('events');
        }
        else
        $requestData = $request->all();
        $events = Event::findOrFail($id);
        $events->update($requestData);
        $events->save();
        $nom=$request->title;
        Session::flash('flash_message', 'Event updated!');
        return redirect('events');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    { 
        $events=Event::findOrFail($id);
        Event::destroy($id);
        Session::flash('flash_message', 'Event deleted!');

        return redirect('events');
    }
}