@extends('layouts.main')

@section('content')
<h1 class="text-center text-primary">Xonalar</h1>   
     
<form action="{{route('add-room')}}" method="GET">
  @csrf
  <div class=" my-3 mx-auto">
    <button type="submit"  class="btn btn-primary">Xona qo'shish</button>
  </div>
</form>
    <div >
        <table class="table">
          <thead class="table-dark">
            <tr class="text-center">
              <th scope="col">Xona raqami</th>
              
              <th  class="m-auto text-center">Amallar</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach ($rooms as $room)
            <tr class="text-center">
              <td>{{$room->number}}</td>
              
              <td class=" m-auto text-center">
                <div class="btn-group" role="group" aria-label="Basic example"> 
                  <form action="{{route('room-destroy',$room->id)}}" method="POST">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button type="SUBMIT" onclick="return confirm('Siz rostdan ham ushbu xonani o\'chirmoqchimisz')" class="btn btn-danger mr-4">O'chirish</button>
                  </form>
                  <form action="{{ url('edit-room/'.$room->id) }}" method="GET">
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