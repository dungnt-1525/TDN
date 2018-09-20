<h1>{{ __('Wellcome') }} !</h1>

<p>{{ __('Please click on the following link to reset your account password') }}</p>
<a href="{{ config('setting.domainURL') }}/reset/{{ $user->email }}/{{ $code }}">
    {{ __('Click here') }}
</a>
