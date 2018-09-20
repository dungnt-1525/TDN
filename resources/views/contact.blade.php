@extends('frontend/layouts/master')
@section('title', 'Login')
@section('menu', 'Login')
@section('content')
@include('frontend/shared/breadcrumbs')

<!--contact-start-->
<div class="contact">
    <div class="container">
        <div class="contact-top heading">
            <h2>{{ __('CONTACT') }}</h2>
        </div>
            <div class="contact-text">
            <div class="col-md-3 contact-left">
                <div class="address">
                    <h5>{{ __('Address') }}</h5>
                    <p>{{ __('The company name,') }} 
                    <span>{{ __('Lorem ipsum dolor,') }}</span>
                    {{ __('Glasglow Dr 40 Fe 72') }}.</p>
                </div>
                <div class="address">
                    <h5>{{ __('Address1') }}</h5>
                    <p>{{ __('Tel:') }} 1115550001, 
                    <span>{{ __('Fax:') }} 190-4509-494</span>
                    {{ __('Email:') }} <a href="mailto:example@email.com">contact@example.com</a></p>
                </div>
            </div>
            <div class="col-md-9 contact-right">
                <form>
                    <input type="text" placeholder="{{ __('Name') }}">
                    <input type="text" placeholder="{{ __('Phone') }}">
                    <input type="text"  placeholder="{{ __('Email') }}">
                    <textarea placeholder="Message" required=""></textarea>
                    <div class="submit-btn">
                        <input type="submit" value="{{ __('SUBMIT') }}">
                    </div>
                </form>
            </div>  
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--contact-end-->
<!--map-start-->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5847320377293!2d105.8533039501389!3d21.009276985940264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abf5a83b2a55%3A0x91888587bb7639ce!2zNDM0IFRy4bqnbiBLaMOhdCBDaMOibiwgUGjhu5EgSHXhur8sIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1528025165823" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<!--map-end-->

@endsection
