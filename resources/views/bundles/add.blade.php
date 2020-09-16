@extends('layouts.app')

@section('content')
<link href="{{ asset('css/upload.css') }}" rel="stylesheet">
<link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">

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
                <span class="bs-stepper-label">Bundle Information</span>
              </button>
            </div>
            <div class="bs-stepper-line"></div>
            <div class="step" data-target="#test-l-2">
              <button type="button" class="step-trigger" role="tab" id="stepper1trigger2" aria-controls="test-l-2">
                <span class="bs-stepper-circle">2</span>
                <span class="bs-stepper-label">Image</span>
              </button>
            </div>
            <div class="bs-stepper-line"></div>
            <div class="step" data-target="#test-l-3">
              <button type="button" class="step-trigger" role="tab" id="stepper1trigger3" aria-controls="test-l-3">
                <span class="bs-stepper-circle">3</span>
                <span class="bs-stepper-label">Select</span>
              </button>
            </div>
            <div class="bs-stepper-line"></div>
            <div class="step" data-target="#test-l-4">
              <button type="button" class="step-trigger" role="tab" id="stepper1trigger3" aria-controls="test-l-4">
                <span class="bs-stepper-circle">4</span>
                <span class="bs-stepper-label">Validate</span>
              </button>
            </div>
        </div>
        <div class="bs-stepper-content">
            <!-- your steps content here -->
            <form action="{{ route('bundle.save') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
                <div class="form-group">
                  <label for="inputTitle">Title</label>
                  <input name="title" type="title" class="form-control" id="title" value="{{ old('title') }}" placeholder="Enter audio title">
                </div>
                <div class="form-group">
                  <label for="inputDescription">Description</label>
                  <input name="description" type="description" class="form-control" id="inputDescription" value="{{ old('description') }}" placeholder="Enter audio description">
                </div>
                <div class="form-group">
                  <label for="inputPrice">Price</label>
                  <input name="price" type="number" class="form-control" id="inputPrice" value="{{ old('price') }}" placeholder="Enter price in USD">
                </div>
                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
              </div>
              <div id="test-l-2" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper1trigger2">
                <div class="form-group">
                    <label for="inputType">Cover Image</label>
                    <input type="file" name="image" class="form-control" accept="image/x-png,image/gif,image/jpeg" />
                </div>
                <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
              </div>
              <div id="test-l-3" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper1trigger3">
                <div class="form-group">
                    <label for="inputType">Select Audios</label>
                    <select id="audios" class="selectpicker form-control" name="audios[]" multiple data-live-search="true" multiple title="Choose any of the following...">
                        @foreach($audios as $audio)
                          <option value="{{ $audio->getId() }}">{{ $audio->getTitle() }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
              </div>
              <div id="test-l-4" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper1trigger3">
                <button type="button" class="btn btn-primary mt-5" onclick="stepper.previous()">Previous</button>
                <button type="submit" class="btn btn-primary mt-5">Submit</button>
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