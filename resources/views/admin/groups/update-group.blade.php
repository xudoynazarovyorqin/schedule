@extends('layouts.main')

@section('content')
    
       
<form method="POST" action="{{ route('update-group',$group->id) }}">
  @method('patch')
  @csrf
  <table class="table" >
    <tbody>
      <tr>
        <td><small>Guruh raqami</small><input type="number" class="form-control input-lg " name="number" value="{{$group->number}}"></td>
       

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