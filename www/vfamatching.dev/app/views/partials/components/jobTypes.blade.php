{{-- Requires $label --}}
<label>{{ $label }}</label>
@foreach(JobType::all() as $jobType)
    @include('partials.components.checkbox', array('label' => $jobType))
@endforeach