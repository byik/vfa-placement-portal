{{-- If $fellow exists, PUT to /fellows/{id} to update, otherwise POST to /fellows to store new  --}}
@if(isset($fellow))
    {{ Form::model($relationship, array('route' => array('fellows.store'), 'id'=>'placement-status-'.$relationship->id,'class'=>'placement-status-form')) }}
        <fieldset>
            {{ Form::hidden('fellow_id') }}
            {{ Form::hidden('opportunity_id') }}
            <div class="form-group">
                {{ Form::label('status', 'Status:'); }}
                {{ Form::select('status', array_combine(PlacementStatus::statuses(), PlacementStatus::statuses()), null, array('class'=>'form-control placement-status-select')) }}
            </div>
            <div class="form-group">                        
                {{ Form::label('score', 'Score:'); }}
                <ul class="list-unstyled">
                    <li>5 = I would absolutely love to work here</li>
                    <li>3 = This would be a decent fit for me</li>
                    <li>1 = I would work here only as a last resort</li>
                </ul>
                {{ Form::select('score', array_combine(PlacementStatus::scores(),PlacementStatus::scores()), null, array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('message', 'Any comments?'); }}
                {{ Form::textarea('message', null, array('class'=>'form-control')) }}
            </div>
        </fieldset>
        {{-- TODO: add event date input conditional on  --}}
    {{ Form::close() }}
@else
{{-- Fellow was not passed in, so send an empty form that stores new fellow --}}
{{ Form::open(array('url' => 'fellows', 'method' => 'post')) }}
        <fieldset>
            {{-- Get the user stuff out of the way up front --}}
            <div class="form-group">
                {{ Form::label('firstName', 'First Name') }}
                {{ Form::text('firstName', Auth::user()->firstName, array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('lastName', 'Last Name') }}
                {{ Form::text('lastName', Auth::user()->lastName, array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', Auth::user()->email, array('class'=>'form-control')) }}
            </div>
            {{-- Now for the fellow profile stuff --}}
            {{ Form::hidden('user_id', Auth::user()->id) }}
            <div class="form-group">
                {{ Form::label('phoneNumber', 'What the best number for getting ahold of you?') }}
                {{ Form::text('phoneNumber', null, array('class'=>'form-control', 'placeholder' => '(646) 736-6460')) }}
            </div>
            <div class="form-group">
                {{ Form::label('bio', 'Tell us about yourself') }}
                {{ Form::textarea('bio', null, array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('school', 'What school did you graduate from?') }}
                {{ Form::text('school', null, array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('major', 'What did you study?') }}
                {{ Form::text('major', null, array('class'=>'form-control')) }}
            </div>
            <div class="form-group">                        
                {{ Form::label('degree', 'What degree did you earn?') }}
                {{ Form::select('degree', array_combine(Fellow::degrees(),Fellow::degrees()), null, array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('graduationYear', 'What year did you graduate?') }}
                {{ Form::text('graduationYear', null, array('class'=>'form-control', 'placeholder' => (new DateTime)->format("Y"))) }}
            </div>
            <div class="form-group">
                {{ Form::label('hometown', 'Where is your hometown?') }}
                {{ Form::text('hometown', null, array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Save Profile', array('class'=>'btn btn-primary')) }}
            </div>
        </fieldset>
        {{-- TODO: add event date input conditional on  --}}
    {{ Form::close() }}
@endif