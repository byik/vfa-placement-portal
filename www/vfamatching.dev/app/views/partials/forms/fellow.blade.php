<?php $validationErrors = Session::has('validation_errors') ? Session::get('validation_errors') : null; ?>
{{-- If $fellow exists, PUT to /fellows/{id} to update, otherwise POST to /fellows to store new  --}}
@if(isset($fellow))
    {{ Form::model($fellow, array('url' => 'fellows/' . $fellow->id, 'method' => 'PUT', 'files' => true)) }}
        <fieldset>
            {{-- Get the user stuff out of the way up front --}}
            <div class="form-group @if($validationErrors){{ $validationErrors->has('firstName') ? "has-error" : ""}}@endif">
                {{ Form::label('firstName', 'First Name') }}
                {{ Form::text('firstName', Input::old('firstName') ? Input::old('firstName') : Auth::user()->firstName, array('class'=>'form-control required', 'character-limit-max' => '100')) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('lastName') ? "has-error" : ""}}@endif">
                {{ Form::label('lastName', 'Last Name') }}
                {{ Form::text('lastName', Input::old('lastName') ? Input::old('lastName') : Auth::user()->lastName, array('class'=>'form-control')) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('email') ? "has-error" : ""}}@endif">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', Input::old('email') ? Input::old('email') : Auth::user()->email, array('class'=>'form-control')) }}
            </div>
            {{-- Now for the fellow profile stuff --}}
            <div class="form-group @if($validationErrors){{ $validationErrors->has('phoneNumber') ? "has-error" : ""}}@endif">
                {{ Form::label('phoneNumber', 'What the best number to reach you at?') }}
                {{ Form::text('phoneNumber', Input::old('phoneNumber'), array('class'=>'form-control', 'placeholder' => '(646) 736-6460')) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('bio') ? "has-error" : ""}}@endif">
                {{ Form::label('bio', 'Introduce yourself') }}
                {{ Form::textarea('bio', Input::old('bio'), array('class'=>'form-control character-limit', 'character-limit-max'=>1400)) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('school') ? "has-error" : ""}}@endif">
                {{ Form::label('school', 'What college or university did you graduate from?') }}
                {{ Form::text('school', Input::old('school'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('major') ? "has-error" : ""}}@endif">
                {{ Form::label('major', 'What did you study?') }}
                {{ Form::text('major', Input::old('major'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('degree') ? "has-error" : ""}}@endif">                        
                {{ Form::label('degree', 'What degree did you earn?') }}
                {{ Form::select('degree', array_combine(Fellow::degrees(),Fellow::degrees()), Input::old('degree'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('graduationYear') ? "has-error" : ""}}@endif">
                {{ Form::label('graduationYear', 'What year did you graduate?') }}
                {{ Form::text('graduationYear', Input::old('graduationYear'), array('class'=>'form-control', 'placeholder' => (new DateTime)->format("Y"))) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('hometown') ? "has-error" : ""}}@endif">
                {{ Form::label('hometown', 'Where is your hometown?') }}
                {{ Form::text('hometown', Input::old('hometown'), array('class'=>'form-control')) }}
            </div>
            <?php  
                $fellow->skills = $fellow->printSkills();
            ?>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('skills') ? "has-error" : ""}}@endif">
                {{ Form::label('skills', 'List your skills, seperated commas') }}
                {{ Form::text('skills', Input::old('skills'), array('class'=>'form-control')) }}
                <small><span class="">Example:<em> Excel, Graphic Design, Social Media Marketing</em></span></small>
            </div>
            
            {{ Form::label('displayPicture', 'Select a display picture to upload') }}
            <p>
                <span class="btn btn-link btn-file">
                    <span class="btn-file-label">Browser for image...</span>{{ Form::file('displayPicture', array('accept'=>'image/*')) }}
                </span>
            </p>

            {{ Form::label('resume', 'Select a resume to upload') }}
            <p>
                <span class="btn btn-link btn-file">
                    <span class="btn-file-label">Browser for pdf...</span>{{ Form::file('resume', array('accept'=>'.pdf')) }}
                </span>
            </p>
            
            <div class="form-group">
                {{ Form::submit('Save Profile', array('class'=>'btn btn-primary')) }}
            </div>
        </fieldset>
    {{ Form::close() }}
@else
{{-- Fellow was not passed in, so send an empty form that stores new fellow --}}
{{ Form::open(array('url' => 'fellows', 'method' => 'POST', 'files' => true)) }}
        <fieldset>
            {{-- Get the user stuff out of the way up front --}}
            <div class="form-group @if($validationErrors){{ $validationErrors->has('firstName') ? "has-error" : ""}}@endif">
                {{ Form::label('firstName', 'First Name') }}
                {{ Form::text('firstName', Input::old('firstName') ? Input::old('firstName') : Auth::user()->firstName, array('class'=>'form-control required', 'character-limit-max' => '100')) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('lastName') ? "has-error" : ""}}@endif">
                {{ Form::label('lastName', 'Last Name') }}
                {{ Form::text('lastName', Input::old('lastName') ? Input::old('lastName') : Auth::user()->lastName, array('class'=>'form-control')) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('email') ? "has-error" : ""}}@endif">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', Input::old('email') ? Input::old('email') : Auth::user()->email, array('class'=>'form-control')) }}
            </div>
            {{-- Now for the fellow profile stuff --}}
            <div class="form-group @if($validationErrors){{ $validationErrors->has('phoneNumber') ? "has-error" : ""}}@endif">
                {{ Form::label('phoneNumber', 'What the best number to reach you at?') }}
                {{ Form::text('phoneNumber', Input::old('phoneNumber'), array('class'=>'form-control', 'placeholder' => '(646) 736-6460')) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('bio') ? "has-error" : ""}}@endif">
                {{ Form::label('bio', 'Tell us about yourself') }}
                {{ Form::textarea('bio', Input::old('bio'), array('class'=>'form-control character-limit', 'character-limit-max'=>1400)) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('school') ? "has-error" : ""}}@endif">
                {{ Form::label('school', 'What college or university did you graduate from?') }}
                {{ Form::text('school', Input::old('school'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('major') ? "has-error" : ""}}@endif">
                {{ Form::label('major', 'What did you study?') }}
                {{ Form::text('major', Input::old('major'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('degree') ? "has-error" : ""}}@endif">                        
                {{ Form::label('degree', 'What degree did you earn?') }}
                {{ Form::select('degree', array_combine(Fellow::degrees(),Fellow::degrees()), Input::old('degree'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('graduationYear') ? "has-error" : ""}}@endif">
                {{ Form::label('graduationYear', 'What year did you graduate?') }}
                {{ Form::text('graduationYear', Input::old('graduationYear'), array('class'=>'form-control', 'placeholder' => (new DateTime)->format("Y"))) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('hometown') ? "has-error" : ""}}@endif">
                {{ Form::label('hometown', 'Where is your hometown?') }}
                {{ Form::text('hometown', Input::old('hometown'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group @if($validationErrors){{ $validationErrors->has('skills') ? "has-error" : ""}}@endif">
                {{ Form::label('skills', 'List your skills, seperated commas') }}
                {{ Form::text('skills', Input::old('skills'), array('class'=>'form-control')) }}
                <small><span class="">Example:<em> Excel, Graphic Design, Social Media Marketing</em></span></small>
            </div>
            {{ Form::label('displayPicture', 'Select a display picture to upload') }}
            <p>
                <span class="btn btn-link btn-file">
                    <span class="btn-file-label">Browser for image...</span>{{ Form::file('displayPicture', array('accept'=>'image/*')) }}
                </span>
            </p>

            {{ Form::label('resume', 'Select a resume to upload') }}
            <p>
                <span class="btn btn-link btn-file">
                    <span class="btn-file-label">Browser for pdf...</span>{{ Form::file('resume', array('accept'=>'.pdf')) }}
                </span>
            </p>
            
            <div class="form-group">
                {{ Form::submit('Save Profile', array('class'=>'btn btn-primary')) }}
            </div>
        </fieldset>
    {{ Form::close() }}
@endif

<script src="{{ URL::to('js/pretty-file-upload.js') }}"></script>