@extends('layouts.main')

@section('content')
<h1 class="text-center text-primary">Guruhlar</h1>   
<form action="{{route('add-group')}}" method="GET">
  @csrf
  <div class=" my-3 mx-auto">
    <button type="submit"  class="btn btn-primary">Guruh qo'shish</button>
  </div>
</form>
    <div >
        <table class="table">
          <thead class="table-dark">
            <tr class="text-center">
              <th scope="col">Guruh raqami</th>
              
              <th  class="m-auto text-center">Amallar </th>
              
            </tr>
          </thead>
          <tbody>
            @foreach ($groups as $group)
            <tr class="text-center">
              <td>{{$group->number}}</td>
              
              <td class=" m-auto text-center">
                <div class="btn-group" role="group" aria-label="Basic example"> 
                  <form action="{{route('group-destroy',$group->id)}}" method="POST">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button type="SUBMIT" onclick="return confirm('Siz haqiqatdan ham ushbu guruhni o\'chirmoqchimisiz')" class="btn btn-danger mr-4">O'chirish</button>
                  </form>
                  <form action="{{ url('edit-group/'.$group->id) }}" method="GET">
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