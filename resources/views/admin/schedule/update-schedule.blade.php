@extends('layouts.main')

@section('content')
     
<form method="POST" action="{{ route('update-schedule', $schedule->id) }}">
   @method('patch')
  @csrf    
  <table class="table" >
    <tbody>
      <tr>
        <td><small>Time</small><input type="number" class="form-control input-lg " name="time" value="{{$schedule->time}}"></td>
        <td><small>Room</small>
          <select name="room" class="form-control input-lg " >
            <option value="{{$schedule->room}}">{{$schedule->room}}</option>
            @foreach($rooms as $room )
            <option value="{{ $room->number }}">{{ $room->number }}</option>
            @endforeach
          </select>
        </td>
        <td><small>Subject</small>
          <select name="subject" class="form-control input-lg " >
            <option value="{{$schedule->subject}}">{{$schedule->subject}}</option>
            @foreach($subjects as $subject )
            <option value="{{ $subject->name }}">{{ $subject->name }}</option>
            @endforeach
          </select>
        </td>
        <td><small>Teacher</small>
          <select name="teacher" class="form-control input-lg " >
            <option value="{{$schedule->teacher}}">{{$schedule->teacher}}</option>
            @foreach($teachers as $teacher )
            <option value="{{ $teacher->name }}">{{ $teacher->name }}</option>
            @endforeach
          </select>
        </td>
        <td><small>Group</small>
          <select name="group" class="form-control input-lg " >
            <option value="{{$schedule->group}}">{{$schedule->group}}</option>
            @foreach($groups as $group )
            <option value="{{ $group->number }}">{{ $group->number }}</option>
            @endforeach
          </select>
        </td>
        
        <td class="pl-0">               
        <div class="form-group row mb-0 mt-4 mr-3 d-flex " style="text-align: right">
          <div class="col-md-8 offset-md-4 mr-4">
            <button type="submit" class="btn btn-primary px-4">
              {{ __('Next') }}
            </button>
          </div>
        </div>
        </td>
      </tr>
      </tbody>
  </table>
</form>
@endsection