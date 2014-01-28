{{-- Requires $label --}}
{{-- Optional $currentJobTypes --}}
<label>{{ $label }}</label>
@foreach(JobType::all() as $jobType)
	@if(isset($currentJobTypes) && in_array($jobType, $currentJobTypes))
    	@include('partials.components.checkbox', array('label' => $jobType, 'checked' => true))
    @else
		@include('partials.components.checkbox', array('label' => $jobType))
    @endif
@endforeach