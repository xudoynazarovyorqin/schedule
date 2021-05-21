@extends('layouts.main')
@section('content')
<h1 class="text-center text-primary">Teachers</h1>   
<form action="{{route('add-teacher')}}" method="GET">
  @csrf
  <div class=" my-3 mx-auto">
    <button type="submit"  class="btn btn-primary">Add teacher</button>
  </div>
</form>
    <div >
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Surname</th>
              <th scope="col">Subject</th>
              <th  class="m-auto text-center"></th>
              
            </tr>
          </thead>
          <tbody>
            @foreach ($teachers as $teacher)
            <tr>
              <td>{{$teacher->name}}</td>
              <td>{{$teacher->surname}}</td>
              <td>{{$teacher->subject}}</td>
              <td class=" m-auto text-center">
                <div class="btn-group" role="group" aria-label="Basic example"> 
                  <form action="{{route('teacher-destroy',$teacher->id)}}" method="POST">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button type="SUBMIT" onclick="return confirm('You want to turn off this teacher, Are you sure')" class="btn btn-danger">Delete</button>
                  </form>
                  <form action="{{ url('edit-teacher/'.$teacher->id) }}" method="GET">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>

                </div>
              </td>
            </tr>
            @endforeach
            
            </tbody>
          </table>
        </div>
@endsection