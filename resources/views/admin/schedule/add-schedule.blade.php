@extends('layouts.main')

@section('content')
     
<form method="POST" action="{{ route('add-schedule-post') }}">
  @csrf
  <table class="table" >
    <tbody>
      <tr>
        <td><small>Time</small><input type="text" class="form-control input-lg " name="time"></td>
        <td><small>Room</small>
          <select name="room" class="form-control input-lg " >
            <option disabled selected value>select Room</option>
            @foreach($rooms as $room )
            <option value="{{ $room->number }}">{{ $room->number }}</option>
            @endforeach
          </select>
        </td>
        <td><small>Subject</small>
          <select name="subject" class="form-control input-lg " >
            <option disabled selected value>select subject</option>
            @foreach($subjects as $subject )
            <option value="{{ $subject->name }}">{{ $subject->name }}</option>
            @endforeach
          </select>
        </td>
        <td><small>Teacher</small>
          <select name="teacher" class="form-control input-lg " >
            <option disabled selected value>select teacher</option>
            @foreach($teachers as $teacher )
            <option value="{{ $teacher->name }}">{{ $teacher->name }}</option>
            @endforeach
          </select>
        </td>
        <td><small>Group</small>
          <select name="group" class="form-control input-lg " >
            <option disabled selected value>select group</option>
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