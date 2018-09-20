<h1>{{ __('Wellcome') }} {{ $user->first_name }} {{ $user->last_name }}!!!</h1>

<p>{{ __('Please click on the following link to activate and login to your account.') }}</p>
<a href="{{ config('setting.domainURL') }}/activate/{{ $user->email }}/{{ $code }}">
    {{ __('Active and Login now') }}
</a>
