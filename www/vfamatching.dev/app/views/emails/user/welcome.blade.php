<p>Hi there, {{ $firstName }}!</p>
<p>To get started on the VFA Placement Portal, please visit <a href="{{ URL::to('users/password-reset/' . $passwordResetHash) }}">{{ URL::to('users/password-reset/' . $passwordResetHash) }}</a> and create your password.</p>
<p>Best,<br/>
The VFA Robot</p>