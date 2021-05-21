@extends('layouts.main')

@section('content')
     
<form method="POST" action="{{ route('add-subject-post') }}">
  @csrf
  <table class="table" >
    <tbody>
      <tr>
        <td><small>Name</small><input type="text" class="form-control input-lg " name="name"></td>
        
        
        <td class="pl-0">               
        <div class="form-group row mb-0 mt-4 mr-3 d-flex " style="text-align: right">
          <div class="col-md-8 offset-md-4 mr-4">
            <button type="submit" class="btn btn-primary px-4">
              {{ __('Next') }}
            </button>
          </div>
        </div>
        </td>
      </tr>
      </tbody>
  </table>
</form>
@endsection