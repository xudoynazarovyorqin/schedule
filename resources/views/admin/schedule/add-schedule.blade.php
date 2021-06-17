@extends('layouts.main')

@section('content')
     
<form method="POST" action="{{ route('add-schedule-post') }}">
  @csrf
  <table class="table" >
    <tbody>
      <tr>
        <td><small>Kun</small>
          <input name="day" type="date" class="form-control input-lg filter-select ">
          </input>
        </td>
        <td><small>Para</small>
            <select name="time" class=" form-control input-lg filter-select ">
              <option  disabled selected value>vaqtni tanlang</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select></td>
        <td><small>Xona</small>
          <select name="room" class="form-control input-lg " >
            <option disabled selected value>xonani tanlang</option>
            @foreach($rooms as $room )
            <option value="{{ $room->number }}">{{ $room->number }}</option>
            @endforeach
          </select>
        </td>
        <td><small>Fan</small>
          <select name="subject" class="form-control input-lg " >
            <option disabled selected value>fanni tanlang</option>
            @foreach($subjects as $subject )
            <option value="{{ $subject->name }}">{{ $subject->name }}</option>
            @endforeach
          </select>
        </td>
        <td><small>O'qituvchi</small>
          <select name="teacher" class="form-control input-lg " >
            <option disabled selected value>o'qituvchi tanlang</option>
            @foreach($teachers as $teacher )
            <option value="{{ $teacher->name }}">{{ $teacher->name }}</option>
            @endforeach
          </select>
        </td>
        <td><small>Guruh</small>
          <select name="group" class="form-control input-lg " >
            <option disabled selected value>guruhni tanlang</option>
            @foreach($groups as $group )
            <option value="{{ $group->number }}">{{ $group->number }}</option>
            @endforeach
          </select>
        </td>
        
        <td class="pl-0">               
        <div class="form-group row mb-0 mt-4 mr-3 d-flex " style="text-align: right">
          <div class="col-md-8 offset-md-4 mr-4">
            <button type="submit" class="btn btn-primary px-4">
              {{ __("Qo'shish") }}
            </button>
          </div>
        </div>
        </td>
      </tr>
      </tbody>
  </table>
</form>
@endsection