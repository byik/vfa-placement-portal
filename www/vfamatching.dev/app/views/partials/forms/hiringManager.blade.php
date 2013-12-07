<?php $validationErrors = Session::has('validation_errors') ? Session::get('validation_errors') : null; ?>
{{-- If $fellow exists, PUT to /fellows/{id} to update, otherwise POST to /fellows to store new  --}}
@if(isset($fellow))
    TODO: Implement form for existing fellow. (Tip: Use Form::model)
@else
{{-- Fellow was not passed in, so send an empty form that stores new fellow --}}
{{ Form::open(array('url' => 'fellows', 'method' => 'post', 'files' => true)) }}
        <fieldset>
            {{-- Get the user stuff out of the way up front --}}
            <div class="form-group @if($validationErrors){{ $validationErrors->has('firstName') ? "has-error" : ""}}@endif">
                {{ Form::label('firstName', 'First Name') }}
                {{ Form::text('firstName', Input::old('firstName') ? Input::old('firstName') : Auth::user()->firstName, array('class'=>'form-control')) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('lastName') ? "has-error" : ""}}@endif">
                {{ Form::label('lastName', 'Last Name') }}
                {{ Form::text('lastName', Input::old('lastName') ? Input::old('lastName') : Auth::user()->lastName, array('class'=>'form-control')) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('email') ? "has-error" : ""}}@endif">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', Input::old('email') ? Input::old('email') : Auth::user()->email, array('class'=>'form-control')) }}
            </div>
            {{-- Now for the hiring manager profile stuff --}}
            <div class="form-group @if($validationErrors){{ $validationErrors->has('phoneNumber') ? "has-error" : ""}}@endif">
                {{ Form::label('phoneNumber', 'What the best number to reach you at?') }}
                {{ Form::text('phoneNumber', Input::old('phoneNumber'), array('class'=>'form-control', 'placeholder' => '(646) 736-6460')) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Save Profile', array('class'=>'btn btn-primary')) }}
            </div>
        </fieldset>
    {{ Form::close() }}
@endif

<script src="{{ URL::to('js/pretty-file-upload.js') }}"></script>