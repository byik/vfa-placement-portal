<?php 
    $roles = User::roles();
    array_unshift($roles, '');
    $roles = array_combine($roles, $roles); 
?>
{{ Form::open(array('url' => 'users', 'method' => 'POST', 'files' => true)) }}
    <fieldset>
        {{-- Get the user stuff out of the way up front --}}
        <div class="form-group">
            {{ Form::label('firstName', 'First Name') }}
            {{ Form::text('firstName', Input::old('firstName') ? Input::old('firstName') : "", array('class'=>'form-control required', 'character-limit-max' => 100)) }}
        </div>
        <div class="form-group">
            {{ Form::label('lastName', 'Last Name') }}
            {{ Form::text('lastName', Input::old('lastName') ? Input::old('lastName') : "", array('class'=>'form-control required', 'character-limit-max' => 100)) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', Input::old('email') ? Input::old('email') : "", array('class'=>'form-control required requires-email')) }}
        </div>
        <div class="form-group">
            {{ Form::label('role', 'Role') }}
            {{ Form::select('role', $roles, "", array('class'=>'form-control role-select required')) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Save', array('class'=>'btn btn-primary')) }}
        </div>
    </fieldset>
{{ Form::close() }}

<script type="text/javascript">
$(document).ready(function() {  
	var companyPickerHtml = '{{ $companyPicker }}';
    //register dropdown toggle to make company picker appear when adding hiring managers
    $('.role-select').change(function(){
        //remove the old one, if exists
        $('#company-picker').remove();
        if($(this).val() == "Hiring Manager"){
        	$(this).parent().after(companyPickerHtml);
        }

	    $('.company-dropdown').change(function(){
	    	$('#new-company-name').remove();
	        if($(this).val() != "" && $(this).val() == 0){
	        	$(this).parent().parent().after('<div class="form-group" id="new-company-name"><label for="new-company">Company Name</label><input name="new-company" class="form-control required" type="text" value="" character-limit-max="280"></div>');
	        }
	    });
    });

});
</script>