{{-- Requries $label --}}
<div class="checkbox">
    <label>
    	<input type="checkbox" name="jobType[]" value="{{ $label }}" {{ isset($checked) ? "checked" : "" }}/>
    	{{ $label }}
    </label>
</div>