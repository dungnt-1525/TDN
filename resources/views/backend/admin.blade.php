@extends('backend/layouts/master')
@section('title', 'admin')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ __('Dashboard') }}<small>{{ __('Control panel') }}</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>{{ __('Home') }}</a></li>
            <li class="active">{{ __('Dashboard') }}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Main row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    <strong>{{ __('Copyright') }} &copy; 2014-2016 <a href="#">{{ __('Almsaeed Studio') }}</a>.</strong>{{ __('All rights reserved.') }}
</footer>
<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

@endsection
