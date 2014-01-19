{{-- Requires $company --}}
@foreach($company->hiringManagers as $hiringManager)
    @include('partials.components.contact-info', array('name' => $hiringManager->user->firstName . ' ' . $hiringManager->user->lastName, 'email' => $hiringManager->user->email, 'phoneNumber' => $hiringManager->phoneNumber))
@endforeach