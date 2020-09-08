@extends('layouts.master')

@section('content')
<h1 class="cover-heading">{{__('messages.welcome')}}</h1>
<p class="lead">{{__('messages.welcome_description')}}</p>
<p class="lead">
  <a href="#" class="btn btn-lg btn-secondary">{{__('messages.news')}}</a>
</p>
@endsection