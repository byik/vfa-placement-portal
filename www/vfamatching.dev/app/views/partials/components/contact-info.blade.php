{{-- Requires $name, $email, $phone--}}
<dl>
    <h3>{{ $name }}</h3>
    <dt>Email</dt>
    <dd><a href="mailto:{{ $email }}">{{ $email }}</a></dd>
    <dt>Phone</dt>
    <dd><a href="tel:{{ $phoneNumber }}">{{ Parser::integerToPhoneNumber($phoneNumber) }}</a></dd>
</dl>