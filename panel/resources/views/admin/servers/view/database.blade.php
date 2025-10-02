@extends('layouts.admin')

@section('title')
    @lang('admin/server.server_management') — {{ $server->name }}: @lang('admin/server.databases_title')
@endsection

@section('content-header')
    <h1>{{ $server->name }}<small>@lang('admin/server.databases_description')</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">@lang('admin/server.breadcrumb_admin')</a></li>
        <li><a href="{{ route('admin.servers') }}">@lang('admin/server.breadcrumb_servers')</a></li>
        <li><a href="{{ route('admin.servers.view', $server->id) }}">{{ $server->name }}</a></li>
        <li class="active">@lang('admin/server.databases_title')</li>
    </ol>
@endsection

@section('content')
@include('admin.servers.partials.navigation')
<div class="row">
    <div class="col-sm-7">
        <div class="alert alert-info">
            {!! __('admin/server.database_passwords_note', ['uuid' => $server->uuidShort]) !!}
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin/server.active_databases')</h3>
            </div>
            <div class="box-body table-responsible no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>@lang('admin/server.database_name')</th>
                        <th>@lang('admin/server.database_username')</th>
                        <th>@lang('admin/server.connections_from')</th>
                        <th>@lang('admin/server.database_host')</th>
                        <th>@lang('admin/server.max_connections')</th>
                        <th></th>
                    </tr>
                    @foreach($server->databases as $database)
                        <tr>
                            <td>{{ $database->database }}</td>
                            <td>{{ $database->username }}</td>
                            <td>{{ $database->remote }}</td>
                            <td><code>{{ $database->host->host }}:{{ $database->host->port }}</code></td>
                            @if($database->max_connections != null)
                                <td>{{ $database->max_connections }}</td>
                            @else
                                <td>@lang('admin/server.unlimited')</td>
                            @endif
                            <td class="text-center">
                                <button data-action="reset-password" data-id="{{ $database->id }}" class="btn btn-xs btn-primary"><i class="fa fa-refresh"></i></button>
                                <button data-action="remove" data-id="{{ $database->id }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('admin/server.create_new_database')</h3>
            </div>
            <form action="{{ route('admin.servers.view.database', $server->id) }}" method="POST">
                <div class="box-body">
                    <div class="form-group">
                        <label for="pDatabaseHostId" class="control-label">@lang('admin/server.database_host_label')</label>
                        <select id="pDatabaseHostId" name="database_host_id" class="form-control">
                            @foreach($hosts as $host)
                                <option value="{{ $host->id }}">{{ $host->name }}</option>
                            @endforeach
                        </select>
                        <p class="text-muted small">@lang('admin/server.database_host_select_help')</p>
                    </div>
                    <div class="form-group">
                        <label for="pDatabaseName" class="control-label">@lang('admin/server.database_label')</label>
                        <div class="input-group">
                            <span class="input-group-addon">s{{ $server->id }}_</span>
                            <input id="pDatabaseName" type="text" name="database" class="form-control" placeholder="database" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pRemote" class="control-label">@lang('admin/server.connections_label')</label>
                        <input id="pRemote" type="text" name="remote" class="form-control" value="%" />
                        <p class="text-muted small">@lang('admin/server.connections_help')</p>
                    </div>
                    <div class="form-group">
                        <label for="pmax_connections" class="control-label">@lang('admin/server.concurrent_connections_label')</label>
                        <input id="pmax_connections" type="text" name="max_connections" class="form-control"/>
                        <p class="text-muted small">@lang('admin/server.concurrent_connections_help')</p>
                    </div>
                </div>
                <div class="box-footer">
                    {!! csrf_field() !!}
                    <p class="text-muted small no-margin">@lang('admin/server.database_password_note')</p>
                    <input type="submit" class="btn btn-sm btn-success pull-right" value="@lang('admin/server.create_database_button')" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @parent
    <script>
    $('#pDatabaseHost').select2();
    $('[data-action="remove"]').click(function (event) {
        event.preventDefault();
        var self = $(this);
        swal({
            title: '',
            type: 'warning',
            text: '@lang('admin/server.delete_database_confirm')',
            showCancelButton: true,
            confirmButtonText: '@lang('admin/server.delete_database_button')',
            confirmButtonColor: '#d9534f',
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }, function () {
            $.ajax({
                method: 'DELETE',
                url: '/admin/servers/view/{{ $server->id }}/database/' + self.data('id') + '/delete',
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
            }).done(function () {
                self.parent().parent().slideUp();
                swal.close();
            }).fail(function (jqXHR) {
                console.error(jqXHR);
                swal({
                    type: 'error',
                    title: '@lang('admin/node.whoops')',
                    text: (typeof jqXHR.responseJSON.error !== 'undefined') ? jqXHR.responseJSON.error : '@lang('admin/server.password_reset_error')'
                });
            });
        });
    });
    $('[data-action="reset-password"]').click(function (e) {
        e.preventDefault();
        var block = $(this);
        $(this).addClass('disabled').find('i').addClass('fa-spin');
        $.ajax({
            type: 'PATCH',
            url: '/admin/servers/view/{{ $server->id }}/database',
            headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
            data: { database: $(this).data('id') },
        }).done(function (data) {
            swal({
                type: 'success',
                title: '',
                text: '@lang('admin/server.password_reset_success')',
            });
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR);
            var error = '@lang('admin/server.password_reset_error')';
            if (typeof jqXHR.responseJSON !== 'undefined' && typeof jqXHR.responseJSON.error !== 'undefined') {
                error = jqXHR.responseJSON.error;
            }
            swal({
                type: 'error',
                title: '@lang('admin/node.whoops')',
                text: error
            });
        }).always(function () {
            block.removeClass('disabled').find('i').removeClass('fa-spin');
        });
    });
    </script>
@endsection