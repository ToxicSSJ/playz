@extends('layouts.app')

@section('head')
<title>{{ __('audios.add_audio_title') }} - PlayZ</title>
<link href="{{ asset('css/upload.css') }}" rel="stylesheet">
<link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    @include('util.message')
    
    <div class="bs-stepper">
        @if($errors->any())
        <ul id="errors">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <div class="bs-stepper-header" role="tablist">
            <div class="step" data-target="#test-l-1">
              <button type="button" class="step-trigger" role="tab" id="stepper1trigger1" aria-controls="test-l-1">
                <span class="bs-stepper-circle">1</span>
                <span class="bs-stepper-label">{{ __('audios.information') }}</span>
              </button>
            </div>
            <div class="bs-stepper-line"></div>
            <div class="step" data-target="#test-l-2">
              <button type="button" class="step-trigger" role="tab" id="stepper1trigger2" aria-controls="test-l-2">
                <span class="bs-stepper-circle">2</span>
                <span class="bs-stepper-label">{{ __('audios.image') }}</span>
              </button>
            </div>
            <div class="bs-stepper-line"></div>
            <div class="step" data-target="#test-l-3">
              <button type="button" class="step-trigger" role="tab" id="stepper1trigger3" aria-controls="test-l-3">
                <span class="bs-stepper-circle">3</span>
                <span class="bs-stepper-label">{{ __('audios.upload') }}</span>
              </button>
            </div>
            <div class="bs-stepper-line"></div>
            <div class="step" data-target="#test-l-4">
              <button type="button" class="step-trigger" role="tab" id="stepper1trigger3" aria-controls="test-l-4">
                <span class="bs-stepper-circle">4</span>
                <span class="bs-stepper-label">{{ __('audios.validate') }}</span>
              </button>
            </div>
        </div>
        <div class="bs-stepper-content">
            <!-- your steps content here -->
            <form action="{{ route('save') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
                <div class="form-group">
                  <label for="inputTitle">{{ __('audios.title') }}</label>
                  <input name="title" type="title" class="form-control" id="title" value="{{ old('title') }}" placeholder="{{ __('audios.enter_audio_title') }}">
                </div>
                <div class="form-group">
                  <label for="inputDescription">{{ __('audios.description') }}</label>
                  <input name="description" type="description" class="form-control" id="inputDescription" value="{{ old('description') }}" placeholder="{{ __('audios.enter_audio_description') }}">
                </div>
                <div class="form-group">
                  <label for="inputPrice">{{ __('audios.price') }}</label>
                  <input name="price" type="number" class="form-control" id="inputPrice" value="{{ old('price') }}" placeholder="{{ __('audios.enter_price') }}">
                </div>
                <div class="form-group">
                  <label for="inputType">{{ __('audios.contributors') }}</label><br/>
                  <input data-role="tagsinput" class="form-control" name="contributors" type="contributors" class="form-control" id="inputContributors" value="{{ old('contributors') }}" placeholder="{{ __('audios.enter_contributors') }}">
                </div>
                <div class="form-group">
                    <label for="inputType">{{ __('audios.type') }}</label>
                    <select name="type" class="form-control" id="inputType">
                        <option>{{ __('audios.type_audio') }}</option>
                        <option>{{ __('audios.type_song') }}</option>
                        <option>{{ __('audios.type_midi') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputType">{{ __('audios.categories') }}</label>
                    <select id="categories" class="selectpicker form-control" name="categories" multiple data-live-search="true" multiple title="{{ __('audios.choose_any') }}">
                        <option>{{ __('audios.sound_effect') }}</option>
                        <option>{{ __('audios.pop') }}</option>
                        <option>{{ __('audios.rock') }}</option>
                        <option>{{ __('audios.urban') }}</option>
                        <option>{{ __('audios.synth') }}</option>
                        <option>{{ __('audios.piano') }}</option>
                        <option>{{ __('audios.electronic') }}</option>
                        <option>{{ __('audios.ambient') }}</option>
                        <option>{{ __('audios.other') }}</option>
                    </select>
                </div>
                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
              </div>
              <div id="test-l-2" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper1trigger2">
                <div class="form-group">
                    <label for="inputType">{{ __('audios.cover_image') }}</label>
                    <input type="file" name="image" class="form-control" accept="image/x-png,image/gif,image/jpeg" />
                </div>
                <button type="button" class="btn btn-primary" onclick="stepper.previous()">{{ __('audios.previous') }}</button>
                <button type="button" class="btn btn-primary" onclick="stepper.next()">{{ __('audios.next') }}</button>
              </div>
              <div id="test-l-3" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper1trigger3">
                <div class="form-group">
                    <label for="inputType">Upload Audio File</label>
                    <input type="file" name="audio" class="form-control" accept=".mp3, .mid" />
                </div>
                <button type="button" class="btn btn-primary" onclick="stepper.previous()">{{ __('audios.previous') }}</button>
                <button type="button" class="btn btn-primary" onclick="stepper.next()">{{ __('audios.next') }}</button>
              </div>
              <div id="test-l-4" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper1trigger3">
                <button type="button" class="btn btn-primary mt-5" onclick="stepper.previous()">{{ __('audios.previous') }}</button>
                <button type="submit" class="btn btn-primary mt-5">{{ __('audios.submit') }}</button>
              </div>
            </form>
            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger"></div>
            <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger"></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    window.stepper = new Stepper($('.bs-stepper')[0])
    $('#categories').selectpicker();
})
</script>
@endsection