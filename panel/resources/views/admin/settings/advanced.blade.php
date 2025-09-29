@extends('layouts.admin')
@include('partials/admin.settings.nav', ['activeTab' => 'advanced'])

@section('title')
    @lang('admin/settings.advanced_settings')
@endsection

@section('content-header')
    <h1>@lang('admin/settings.advanced_settings')<small>@lang('admin/settings.advanced_description')</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">@lang('admin/settings.breadcrumb_admin')</a></li>
        <li class="active">@lang('admin/settings.breadcrumb_settings')</li>
    </ol>
@endsection

@section('content')
    @yield('settings::nav')
    <div class="row">
        <div class="col-xs-12">
            <form action="" method="POST">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('admin/settings.recaptcha')</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="control-label">@lang('admin/settings.status')</label>
                                <div>
                                    <select class="form-control" name="recaptcha:enabled">
                                        <option value="true">@lang('admin/settings.enabled')</option>
                                        <option value="false" @if(old('recaptcha:enabled', config('recaptcha.enabled')) == '0') selected @endif>@lang('admin/settings.disabled')</option>
                                    </select>
                                    <p class="text-muted small">@lang('admin/settings.recaptcha_help')</p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">@lang('admin/settings.site_key')</label>
                                <div>
                                    <input type="text" required class="form-control" name="recaptcha:website_key" value="{{ old('recaptcha:website_key', config('recaptcha.website_key')) }}">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">@lang('admin/settings.secret_key')</label>
                                <div>
                                    <input type="text" required class="form-control" name="recaptcha:secret_key" value="{{ old('recaptcha:secret_key', config('recaptcha.secret_key')) }}">
                                    <p class="text-muted small">@lang('admin/settings.secret_key_help')</p>
                                </div>
                            </div>
                        </div>
                        @if($showRecaptchaWarning)
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="alert alert-warning no-margin">
                                        {!! __('admin/settings.recaptcha_warning') !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('admin/settings.http_connections')</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label">@lang('admin/settings.connection_timeout')</label>
                                <div>
                                    <input type="number" required class="form-control" name="pterodactyl:guzzle:connect_timeout" value="{{ old('pterodactyl:guzzle:connect_timeout', config('pterodactyl.guzzle.connect_timeout')) }}">
                                    <p class="text-muted small">@lang('admin/settings.connection_timeout_help')</p>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">@lang('admin/settings.request_timeout')</label>
                                <div>
                                    <input type="number" required class="form-control" name="pterodactyl:guzzle:timeout" value="{{ old('pterodactyl:guzzle:timeout', config('pterodactyl.guzzle.timeout')) }}">
                                    <p class="text-muted small">@lang('admin/settings.request_timeout_help')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('admin/settings.auto_allocation')</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="control-label">@lang('admin/settings.status')</label>
                                <div>
                                    <select class="form-control" name="pterodactyl:client_features:allocations:enabled">
                                        <option value="false">@lang('admin/settings.disabled')</option>
                                        <option value="true" @if(old('pterodactyl:client_features:allocations:enabled', config('pterodactyl.client_features.allocations.enabled'))) selected @endif>@lang('admin/settings.enabled')</option>
                                    </select>
                                    <p class="text-muted small">@lang('admin/settings.auto_allocation_help')</p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">@lang('admin/settings.starting_port')</label>
                                <div>
                                    <input type="number" class="form-control" name="pterodactyl:client_features:allocations:range_start" value="{{ old('pterodactyl:client_features:allocations:range_start', config('pterodactyl.client_features.allocations.range_start')) }}">
                                    <p class="text-muted small">@lang('admin/settings.starting_port_help')</p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">@lang('admin/settings.ending_port')</label>
                                <div>
                                    <input type="number" class="form-control" name="pterodactyl:client_features:allocations:range_end" value="{{ old('pterodactyl:client_features:allocations:range_end', config('pterodactyl.client_features.allocations.range_end')) }}">
                                    <p class="text-muted small">@lang('admin/settings.ending_port_help')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-footer">
                        {{ csrf_field() }}
                        <button type="submit" name="_method" value="PATCH" class="btn btn-sm btn-primary pull-right">@lang('admin/settings.save')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
