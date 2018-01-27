@extends('layouts.supervisor')
@section('title','Main')

@section('home')
  class="active"
@endsection

@section('container')
  <div id="body">
    <div class="row">
      <div class="col-xs-12 col-md-4 col-md-offset-6">
        <form action="{{ URL::asset('supervisor/search') }}" class="search-form" method="POST">
          <div class="form-group has-feedback">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="number" class="form-control" name="user_id" id="search" placeholder="Identificación">
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
          </div>
        </form>
      </div>
    </div>
    @foreach ($users as $user)
    <div class="col-xs-12 col-md-8 col-md-offset-2">
      <button type="button" class="btn btn-success btn-block" onclick="location.href='{{ route('user', $user->id ) }}'">
        {{ $user->name }}
      </button>
    </div>  
    @endforeach
    {{ $users->links() }}
  </div>
@endsection