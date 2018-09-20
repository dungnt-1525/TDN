<h1>{{ __('Hello') }} {{ $user->first_name }} {{ $user->last_name }}!!!</h1>

<p>{{ __('Your order has been successfully created.') }}</p>
    {{ __('Click on the link ') }}<a href="{{ config('setting.domainURL') }}/orderDetail/{{ $order->id }}">{{ __('here') }}</a> {{ __(' to see more!') }}
</a>
