@extends('layouts.main')

@section('content')
       
<form method="POST" action="{{ route('update-teacher',$teacher->id) }}">
  @method('patch')
  @csrf
  <table class="table" >
    <tbody>
      <tr>
        <td><small>Ismi</small><input class="form-control input-lg " name="name" value="{{$teacher->name}}"></td>
        <td><small>Familiyasi</small><input class="form-control input-lg" name="surname" value="{{$teacher->surname }}"></td>
        <td><small>Fani</small>
          <select name="subject" class="form-control input-lg " >
            <option value="{{ $teacher->subject }}">{{ $teacher->subject }}</option>
            @foreach($subjects as $subject )
            <option value="{{ $subject->name }}">{{ $subject->name }}</option>
            @endforeach
          </select></td>

        <td class="pl-0">               
        <div class="form-group row mb-0 mt-4 mr-3 d-flex " style="text-align: right">
          <div class="col-md-8 offset-md-4 mr-4">
            <button type="submit" class="btn btn-primary px-4">
              {{ __('Tahrirlash') }}
            </button>
          </div>
        </div>
        </td>
      </tr>
      </tbody>
  </table>
</form>
@endsection