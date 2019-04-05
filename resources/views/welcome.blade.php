@extends('layouts.app')

@section('header')
  @include('layouts.header')
@stop

@section('content')
  <div class="valign-wrapper">
    <div class="row flex-center position-ref">
      <div class="col s12 center-align">
          <h1>{{ config('app.name') }}</h1>
          <p>Fresh Laravel for Various System Development</p>
          <p>With Materialize CSS inside</p>
          <br>
          <div class="links">
            <a href="{{ route('register') }}">Register</a>
            <a href="{{ route('login') }}">Login</a>
            <a href="">Features</a>
            <a href="">Documentation</a>
          </div>
      </div>
    </div>
  </div>
@endsection

@section('footer')
  @include('layouts.footer')
@stop
