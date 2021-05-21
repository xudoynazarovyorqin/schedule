@extends('layouts.main')

@section('content')
<h1 class="text-center text-primary">Subjects</h1>   
    
<form action="{{route('add-subject')}}" method="GET">
  @csrf
  <div class=" my-3 mx-auto">
    <button type="submit"  class="btn btn-primary">Add subject</button>
  </div>
</form>
    <div >
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th scope="col">Name</th>
              
              <th  class="m-auto text-center"></th>
              
            </tr>
          </thead>
          <tbody>
            @foreach ($subjects as $subject)
            <tr>
              <td>{{$subject->name}}</td>
              
              <td class=" m-auto text-center">
                <div class="btn-group" role="group" aria-label="Basic example"> 
                  <form action="{{route('subject-destroy',$subject->id)}}" method="POST">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button type="SUBMIT" onclick="return confirm('You want to turn off this subject, Are you sure')" class="btn btn-danger">Delete</button>
                  </form>
                  <form action="{{ url('edit-subject/'.$subject->id) }}" method="GET">
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