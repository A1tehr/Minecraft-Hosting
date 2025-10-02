@extends('layouts.admin')

@section('title')
    {{ $node->name }}: @lang('admin/node.nav_configuration')
@endsection

@section('content-header')
    <h1>{{ $node->name }}<small>@lang('admin/node.daemon_configuration_file')</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">@lang('admin/node.breadcrumb_admin')</a></li>
        <li><a href="{{ route('admin.nodes') }}">@lang('admin/node.breadcrumb_nodes')</a></li>
        <li><a href="{{ route('admin.nodes.view', $node->id) }}">{{ $node->name }}</a></li>
        <li class="active">@lang('admin/node.nav_configuration')</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="nav-tabs-custom nav-tabs-floating">
            <ul class="nav nav-tabs">
                <li><a href="{{ route('admin.nodes.view', $node->id) }}">@lang('admin/node.nav_about')</a></li>
                <li><a href="{{ route('admin.nodes.view.settings', $node->id) }}">@lang('admin/node.nav_settings')</a></li>
                <li class="active"><a href="{{ route('admin.nodes.view.configuration', $node->id) }}">@lang('admin/node.nav_configuration')</a></li>
                <li><a href="{{ route('admin.nodes.view.allocation', $node->id) }}">@lang('admin/node.nav_allocation')</a></li>
                <li><a href="{{ route('admin.nodes.view.servers', $node->id) }}">@lang('admin/node.nav_servers')</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin/node.configuration_file')</h3>
            </div>
            <div class="box-body">
                <pre class="no-margin">{{ $node->getYamlConfiguration() }}</pre>
            </div>
            <div class="box-footer">
                <p class="no-margin">@lang('admin/node.config_file_location')</p>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin/node.auto_deploy')</h3>
            </div>
            <div class="box-body">
                <p class="text-muted small">
                    @lang('admin/node.auto_deploy_help')
                </p>
            </div>
            <div class="box-footer">
                <button type="button" id="configTokenBtn" class="btn btn-sm btn-default" style="width:100%;">@lang('admin/node.generate_token')</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @parent
    <script>
    $('#configTokenBtn').on('click', function (event) {
        $.ajax({
            method: 'POST',
            url: '{{ route('admin.nodes.view.configuration.token', $node->id) }}',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        }).done(function (data) {
            swal({
                type: 'success',
                title: '@lang('admin/node.token_created')',
                text: '<p>@lang('admin/node.auto_configure_command')<br /><small><pre>cd /etc/pterodactyl && sudo wings configure --panel-url {{ config('app.url') }} --token ' + data.token + ' --node ' + data.node + '{{ config('app.debug') ? ' --allow-insecure' : '' }}</pre></small></p>',
                html: true
            })
        }).fail(function () {
            swal({
                title: '@lang('admin/node.error')',
                text: '@lang('admin/node.error_creating_token')',
                type: 'error'
            });
        });
    });
    </script>
@endsection