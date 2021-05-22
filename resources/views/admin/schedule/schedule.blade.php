@extends('layouts.main')
@section('content')
    
<h1 class="text-center text-primary">Schedule</h1>

<form action="{{route('add-schedule')}}" method="GET">
  @csrf
  <div class=" my-3 mx-auto">
    <button type="submit"  class="btn btn-primary">Add schedule</button>
  </div>
</form>

    
        <table class="table" id="datatable">
          <thead class="table-dark">
            <tr>
              <th scope="col">Time</th>
              <th scope="col">Room</th>
              <th scope="col">Subject</th>
              <th scope="col">Teacher</th>
              <th scope="col">Group</th>
              <th  class="m-auto text-center"></th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
              <form action="{{route('search')}}" method="Post">
                @csrf
                <td>
                  <select name="time" class="filter-select ">
                    <option  disabled selected value>select time</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td>
                  <select name="room" class="filter-select">
                  <option  disabled selected value>select room</option>
                  @foreach ($rooms as $room)
                      <option value="{{$room->number}}">{{$room->number}}</option>
                  @endforeach
                </select>
              </td>
              <td>
                <select name="subject" class="filter-select">
                  <option disabled selected value>select subject</option>
                  @foreach ($subjects as $subject)
                      <option value="{{$subject->name}}">{{$subject->name}}</option>
                  @endforeach
                </select>
              </td>
              <td>
                <select name="teacher" class="filter-select">
                  <option disabled selected value>select teacher</option>
                  @foreach ($teachers as $teacher)
                      <option value="{{$teacher->name}}">{{$teacher->name}}</option>
                  @endforeach
                </select>
              </td>
              <td>
                <select name="group" class="filter-select">
                  <option disabled selected value>select group</option>
                  @foreach ($groups as $group)
                  <option value="{{$group->number}}">{{$group->number}}</option>
                  @endforeach
                </select>
              </td >
                <td class="text-center">
                  <button type="submit" class="btn btn-primary ">Search</button>
                  <button class="btn btn-warning "><a href="/schedule">All</a></button>

                </form>
                {{-- <form action="{{url('/schedule')}}"  method="GET">
                  <button type="submit" class="btn btn-warning ">All</button>
                </form> --}}
              </td>
              
            </tr>
            
            @foreach ($schedules as $schedule)
                
            <tr>
              <td>{{$schedule->time}}</td>
              <td>{{$schedule->room}}</td>
              <td>{{$schedule->subject}}</td>
              <td>{{$schedule->teacher}}</td>
              <td>{{$schedule->group}}</td>
              <td class=" m-auto text-center">
                <div class="btn-group" role="group" aria-label="Basic example"> 
                  <form action="{{route('schedule-destroy',$schedule->id)}}" method="POST">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button type="SUBMIT" onclick="return confirm('You want to turn off this schedule, Are you sure')" class="btn btn-danger">Delete</button>
                  </form>
                  <form action="{{ url('edit-schedule/'.$schedule->id) }}" method="GET">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>

                </div>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        
@endsection
