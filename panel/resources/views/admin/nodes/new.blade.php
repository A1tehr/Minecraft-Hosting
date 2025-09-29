@extends('layouts.admin')

@section('title')
    @lang('admin/node.title')
@endsection

@section('content-header')
    <h1>@lang('admin/node.header')<small>@lang('admin/node.header_sub')</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">@lang('admin/node.breadcrumb_admin')</a></li>
        <li><a href="{{ route('admin.nodes') }}">@lang('admin/node.breadcrumb_nodes')</a></li>
        <li class="active">@lang('admin/node.breadcrumb_new')</li>
    </ol>
@endsection

@section('content')
<form action="{{ route('admin.nodes.new') }}" method="POST">
    <div class="row">
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin/node.basic_details')</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="pName" class="form-label">@lang('admin/node.name')</label>
                        <input type="text" name="name" id="pName" class="form-control" value="{{ old('name') }}"/>
                        <p class="text-muted small">@lang('admin/node.name_help')</p>
                    </div>
                    <div class="form-group">
                        <label for="pDescription" class="form-label">@lang('admin/node.description')</label>
                        <textarea name="description" id="pDescription" rows="4" class="form-control">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="pLocationId" class="form-label">@lang('admin/node.location')</label>
                        <select name="location_id" id="pLocationId">
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}" {{ $location->id != old('location_id') ?: 'selected' }}>{{ $location->short }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">@lang('admin/node.node_visibility')</label>
                        <div>
                            <div class="radio radio-success radio-inline">

                                <input type="radio" id="pPublicTrue" value="1" name="public" checked>
                                <label for="pPublicTrue"> @lang('admin/node.public') </label>
                            </div>
                            <div class="radio radio-danger radio-inline">
                                <input type="radio" id="pPublicFalse" value="0" name="public">
                                <label for="pPublicFalse"> @lang('admin/node.private') </label>
                            </div>
                        </div>
                        <p class="text-muted small">{!! __('admin/node.private_help') !!}</p>
                    </div>
                    <div class="form-group">
                        <label for="pFQDN" class="form-label">@lang('admin/node.fqdn')</label>
                        <input type="text" name="fqdn" id="pFQDN" class="form-control" value="{{ old('fqdn') }}"/>
                        <p class="text-muted small">{!! __('admin/node.fqdn_help') !!}</p>
                    </div>
                    <div class="form-group">
                        <label class="form-label">@lang('admin/node.ssl_connection')</label>
                        <div>
                            <div class="radio radio-success radio-inline">
                                <input type="radio" id="pSSLTrue" value="https" name="scheme" checked>
                                <label for="pSSLTrue"> @lang('admin/node.use_ssl')</label>
                            </div>
                            <div class="radio radio-danger radio-inline">
                                <input type="radio" id="pSSLFalse" value="http" name="scheme" @if(request()->isSecure()) disabled @endif>
                                <label for="pSSLFalse"> @lang('admin/node.use_http')</label>
                            </div>
                        </div>
                        @if(request()->isSecure())
                            <p class="text-danger small">{!! __('admin/node.ssl_warning') !!}</p>
                        @else
                            <p class="text-muted small">@lang('admin/node.ssl_recommendation')</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label">@lang('admin/node.behind_proxy')</label>
                        <div>
                            <div class="radio radio-success radio-inline">
                                <input type="radio" id="pProxyFalse" value="0" name="behind_proxy" checked>
                                <label for="pProxyFalse"> @lang('admin/node.not_behind_proxy') </label>
                            </div>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" id="pProxyTrue" value="1" name="behind_proxy">
                                <label for="pProxyTrue"> @lang('admin/node.behind_proxy') </label>
                            </div>
                        </div>
                        <p class="text-muted small">@lang('admin/node.proxy_help')</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin/node.configuration')</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="pDaemonBase" class="form-label">@lang('admin/node.daemon_base')</label>
                            <input type="text" name="daemonBase" id="pDaemonBase" class="form-control" value="/var/lib/pterodactyl/volumes" />
                            <p class="text-muted small">{!! __('admin/node.daemon_base_help') !!}</p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pMemory" class="form-label">@lang('admin/node.memory')</label>
                            <div class="input-group">
                                <input type="text" name="memory" data-multiplicator="true" class="form-control" id="pMemory" value="{{ old('memory') }}"/>
                                <span class="input-group-addon">MiB</span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pMemoryOverallocate" class="form-label">@lang('admin/node.memory_overallocate')</label>
                            <div class="input-group">
                                <input type="text" name="memory_overallocate" class="form-control" id="pMemoryOverallocate" value="{{ old('memory_overallocate') }}"/>
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p class="text-muted small">@lang('admin/node.memory_help')</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="pDisk" class="form-label">@lang('admin/node.disk')</label>
                            <div class="input-group">
                                <input type="text" name="disk" data-multiplicator="true" class="form-control" id="pDisk" value="{{ old('disk') }}"/>
                                <span class="input-group-addon">MiB</span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pDiskOverallocate" class="form-label">@lang('admin/node.disk_overallocate')</label>
                            <div class="input-group">
                                <input type="text" name="disk_overallocate" class="form-control" id="pDiskOverallocate" value="{{ old('disk_overallocate') }}"/>
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p class="text-muted small">@lang('admin/node.disk_help')</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="pDaemonListen" class="form-label">@lang('admin/node.daemon_port')</label>
                            <input type="text" name="daemonListen" class="form-control" id="pDaemonListen" value="8080" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pDaemonSFTP" class="form-label">@lang('admin/node.daemon_sftp_port')</label>
                            <input type="text" name="daemonSFTP" class="form-control" id="pDaemonSFTP" value="2022" />
                        </div>
                        <div class="col-md-12">
                            <p class="text-muted small">{!! __('admin/node.daemon_port_help') !!}</p>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-success pull-right">Create Node</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('footer-scripts')
    @parent
    <script>
        $('#pLocationId').select2();
    </script>
@endsection
