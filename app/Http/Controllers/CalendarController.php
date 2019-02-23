<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MaddHatter\Laravel\Fullcalendar\Facades\Calendar;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use App\Event;




class CalendarController extends Controller 
{

      public function index(Request $request)
          {
              $events = Event::all();  
           return view('fullcalendar', compact('events'));
          }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('calendrier');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $start = $request->input('start');
        $end = $request->input('end');
        $color = $request->input('color');
        $requestData = $request->all();
        Event::create($requestData)->save();
        $datetime = date("Y-m-d H:i:s");
        $diff = abs(strtotime($datetime) - strtotime($end));
        $min = floor($diff / (60*60*24));
        
        if($min==1){
            $jour ="Rest 1 Day for ".$title;
            
        }
        $events = Event::all();
      return view('fullcalendar', compact('events'))->with('success', $jour);
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

        return view('calendrier', compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     *
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {


        $event = Event::findOrFail($id);

        return view('fullcalendar', compact('event'));
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

        Session::flash('flash_message', 'Event updated!');

        return redirect('calendrier');
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
        Event::destroy($id);

        Session::flash('flash_message', 'Event deleted!');

        return redirect('calendrier');
    }
  
}
