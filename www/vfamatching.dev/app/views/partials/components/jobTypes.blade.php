<label>What type of Opportunity is this? (select all that apply)</label>
@foreach(JobType::all() as $jobType)
    @include('partials.components.checkbox', array('label' => $jobType))
@endforeach