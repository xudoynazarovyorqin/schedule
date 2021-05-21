@extends('layouts.main')

@section('content')
<h1 class="text-center text-primary">Groups</h1>   
<form action="{{route('add-group')}}" method="GET">
  @csrf
  <div class=" my-3 mx-auto">
    <button type="submit"  class="btn btn-primary">Add group</button>
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
            @foreach ($groups as $group)
            <tr>
              <td>{{$group->number}}</td>
              
              <td class=" m-auto text-center">
                <div class="btn-group" role="group" aria-label="Basic example"> 
                  <form action="{{route('group-destroy',$group->id)}}" method="POST">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button type="SUBMIT" onclick="return confirm('You want to turn off this group, Are you sure')" class="btn btn-danger">Delete</button>
                  </form>
                  <form action="{{ url('edit-group/'.$group->id) }}" method="GET">
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