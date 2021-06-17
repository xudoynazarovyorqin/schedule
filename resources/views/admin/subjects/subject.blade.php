@extends('layouts.main')

@section('content')
<h1 class="text-center text-primary">Fanlar</h1>   
    
<form action="{{route('add-subject')}}" method="GET">
  @csrf
  <div class=" my-3 mx-auto">
    <button type="submit"  class="btn btn-primary">Fan qo'shish</button>
  </div>
</form>
    <div >
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th scope="col" class="text-center px-5">Nomi</th>
              
              <th  class="m-auto text-center">Amallar</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach ($subjects as $subject)
            <tr>
              <td class="text-center">{{$subject->name}}</td>
              
              <td class=" m-auto text-center">
                <div class="btn-group" role="group" aria-label="Basic example"> 
                  <form action="{{route('subject-destroy',$subject->id)}}" method="POST">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button type="SUBMIT" onclick="return confirm('Siz rostdan ham ushbu fanni o\'chirmoqchimisz')" class="btn btn-danger mr-4">O'chirish</button>
                  </form>
                  <form action="{{ url('edit-subject/'.$subject->id) }}" method="GET">
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