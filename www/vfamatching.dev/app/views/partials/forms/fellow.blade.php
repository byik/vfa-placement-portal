{{-- If $fellow exists, PUT to /fellows/{id} to update, otherwise POST to /fellows to store new  --}}
@if(isset($fellow))
    TODO: Implement form for existing fellow. (Tip: Use Form::model)
@else
{{-- Fellow was not passed in, so send an empty form that stores new fellow --}}
{{ Form::open(array('url' => 'fellows', 'method' => 'post')) }}
        <fieldset>
            {{-- Get the user stuff out of the way up front --}}
            <div class="form-group">
                {{ Form::label('firstName', 'First Name') }}
                {{ Form::text('firstName', Input::old('firstName') ? Input::old('firstName') : Auth::user()->firstName, array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('lastName', 'Last Name') }}
                {{ Form::text('lastName', Input::old('lastName') ? Input::old('lastName') : Auth::user()->lastName, array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', Input::old('email') ? Input::old('email') : Auth::user()->email, array('class'=>'form-control')) }}
            </div>
            {{-- Now for the fellow profile stuff --}}
            <div class="form-group">
                {{ Form::label('phoneNumber', 'What the best number for getting ahold of you?') }}
                {{ Form::text('phoneNumber', Input::old('phoneNumber'), array('class'=>'form-control', 'placeholder' => '(646) 736-6460')) }}
            </div>
            <div class="form-group">
                {{ Form::label('bio', 'Tell us about yourself') }}
                {{ Form::textarea('bio', Input::old('bio'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('school', 'What school did you graduate from?') }}
                {{ Form::text('school', Input::old('school'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('major', 'What did you study?') }}
                {{ Form::text('major', Input::old('major'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group">                        
                {{ Form::label('degree', 'What degree did you earn?') }}
                {{ Form::select('degree', array_combine(Fellow::degrees(),Fellow::degrees()), Input::old('degree'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('graduationYear', 'What year did you graduate?') }}
                {{ Form::text('graduationYear', Input::old('graduationYear'), array('class'=>'form-control', 'placeholder' => (new DateTime)->format("Y"))) }}
            </div>
            <div class="form-group">
                {{ Form::label('hometown', 'Where is your hometown?') }}
                {{ Form::text('hometown', Input::old('hometown'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Save Profile', array('class'=>'btn btn-primary')) }}
            </div>
        </fieldset>
    {{ Form::close() }}
@endif