<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Room;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Group;
use App\Models\User;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user())
        {
            $rooms = Room::all();
            $subjects = Subject::all();
            $teachers = Teacher::all();
            $groups = Group::all();
            $schedules = Schedule::all();
            return view('admin.schedule.schedule', compact('schedules','rooms','subjects','teachers','groups'));
        }else{

            return redirect()->route('out-schedule');

            // $schedules = Schedule::all();
            // $rooms = Room::all();
            // $subjects = Subject::all();
            // $teachers = Teacher::all();
            // $groups = Group::all();
            // return view('schedule-out',compact('schedules','subjects','rooms','subjects','teachers','groups'));
        }
    }
    public function outSchedule()
    {
        $schedules = Schedule::all();
            $rooms = Room::all();
            $subjects = Subject::all();
            $teachers = Teacher::all();
            $groups = Group::all();
            return view('schedule-out',compact('schedules','subjects','rooms','subjects','teachers','groups'));
    }
    public function outSearch(Request $request)
    {
        // dd($request);
        $rooms = Room::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $groups = Group::all();

        $query  = Schedule::query();


        if(isset($request->day) && !empty($request->day))
        {
            $query = $query->where('day', 'like', '%' . $request->day . '%' );  
        } 
        if(isset($request->time) && !empty($request->time))
        {
            $query = $query->where('time', 'like', '%' . $request->time . '%' );  
        } 
        if(isset($request->room) && !empty($request->room))
        {
            $query = $query->where('room', 'like', '%' . $request->room . '%' );  
        } 
        if(isset($request->subject) && !empty($request->subject))
        {
            $query = $query->where('subject', 'like', '%' . $request->subject . '%' );  
        } 
        if(isset($request->teacher) && !empty($request->teacher))
        {
            $query = $query->where('teacher', 'like', '%' . $request->teacher . '%' );  
        } 
        if(isset($request->group) && !empty($request->group))
        {
            $query = $query->where('group', 'like', '%' . $request->group . '%' );  
        } 
        $schedules = $query->get();

        return view('schedule-out',compact('schedules','subjects','rooms','subjects','teachers','groups'));
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addschedule()
    {
        $schedules = Schedule::all();
        $rooms = Room::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $groups = Group::all();
        return view('admin.schedule.add-schedule',compact('subjects','rooms','subjects','teachers','groups'));
    }
    public function create(Request $request)
    {
        // dd($request);
        Schedule::create([
            'day'=>$request->day,
            'time'=>$request->time,
            'room'=>$request->room,
            'subject'=>$request->subject,
            'teacher'=>$request->teacher,
            'group'=>$request->group
        ]);
        return redirect()->route('schedule');
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
        $rooms = Room::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $groups = Group::all();
        $schedule = Schedule::find( $id);
        return view('admin.schedule.update-schedule', compact('schedule','subjects','rooms','subjects','teachers','groups'));
  
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
        $data = $request->all();
        $schedule = Schedule::find($id);
        $schedule ->update($data);
        return redirect()->route('schedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Schedule::find($id)->delete();
        return redirect()->route('schedule');
    }
    public function search(Request $request)
    {
        // dd($request);
        $rooms = Room::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $groups = Group::all();

        $query  = Schedule::query();


        if(isset($request->day) && !empty($request->day))
        {
            $query = $query->where('day', 'like', '%' . $request->day . '%' );  
        } 
        if(isset($request->time) && !empty($request->time))
        {
            $query = $query->where('time', 'like', '%' . $request->time . '%' );  
        } 
        if(isset($request->room) && !empty($request->room))
        {
            $query = $query->where('room', 'like', '%' . $request->room . '%' );  
        } 
        if(isset($request->subject) && !empty($request->subject))
        {
            $query = $query->where('subject', 'like', '%' . $request->subject . '%' );  
        } 
        if(isset($request->teacher) && !empty($request->teacher))
        {
            $query = $query->where('teacher', 'like', '%' . $request->teacher . '%' );  
        } 
        if(isset($request->group) && !empty($request->group))
        {
            $query = $query->where('group', 'like', '%' . $request->group . '%' );  
        } 

        
            $schedules = $query->get();
        
        // dd($schedules); 
        return view('admin.schedule.schedule', compact('schedules','rooms','subjects','teachers','groups'));
    }
}
