{{-- Requires $passwordResetKey, $user_id, $passwordResetHash --}}
{{ Form::open(array('url' => 'users/password-reset', 'method' => 'POST', 'files' => true)) }}
    <fieldset>
        {{ Form::hidden('passwordResetKey', $passwordResetKey) }}
        {{ Form::hidden('passwordResetHash', $passwordResetHash) }}
        {{ Form::hidden('user_id', $user_id) }}

        <!-- password field -->
        <div class="form-group">
            {{ Form::label('password', 'Password') }}<br/>
            {{ Form::password('password', array('class'=>'form-control required', 'character-limit-min' => 6)) }}
            <span><small>6 characters minimum</small></span>
        </div>

        <!-- confirm password field -->
        <div class="form-group">
            {{ Form::label('confirmPassword', 'Confirm Password') }}<br/>
            {{ Form::password('confirmPassword', array('class'=>'form-control required', 'character-limit-min' => 6)) }}
        </div>
        
        <div class="form-group">
            {{ Form::submit('Save', array('class'=>'btn btn-primary')) }}
        </div>
    </fieldset>
{{ Form::close() }}