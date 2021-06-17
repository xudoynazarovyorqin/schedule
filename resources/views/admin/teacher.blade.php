@extends('layouts.main')
@section('content')
<h1 class="text-center text-primary">O'qituvchilar</h1>   
<form action="{{route('add-teacher')}}" method="GET">
  @csrf
  <div class=" my-3 mx-auto">
    <button type="submit"  class="btn btn-primary">O'qituvchi qo'shish</button>
  </div>
</form>
    <div >
        <table class="table">
          <thead class="table-dark bordered">
            <tr>
              <th scope="col" class="text-center px-5">Ismi</th>
              <th scope="col" class="text-center px-5">Familiyasi</th>
              <th scope="col" class="text-center px-5">Fani</th>
              <th  class="m-auto text-center">Amallar</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach ($teachers as $teacher)
            <tr class="text-center">
              <td>{{$teacher->name}}</td>
              <td>{{$teacher->surname}}</td>
              <td>{{$teacher->subject}}</td>
              <td class=" m-auto text-center">
                <div class="btn-group" role="group" aria-label="Basic example"> 
                  <form action="{{route('teacher-destroy',$teacher->id)}}" method="POST">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button type="SUBMIT" onclick="return confirm('You want to turn off this teacher, Are you sure')" class="btn btn-danger mr-4">O'chirish</button>
                  </form>
                  <form action="{{ url('edit-teacher/'.$teacher->id) }}" method="GET">
                    <button type="submit" class="btn btn-primary ml-3">Tahrirlash</button>
                  </form>

                </div>
              </td>
            </tr>
            @endforeach
            
            </tbody>
          </table>
        </div>
@endsection