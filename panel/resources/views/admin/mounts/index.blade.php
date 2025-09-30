
@extends('layouts.admin')

@section('title')
    @lang('admin/mounts.mounts')
@endsection

@section('content-header')
    <h1>@lang('admin/mounts.mounts')<small>@lang('admin/mounts.mounts_description')</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">@lang('admin/mounts.breadcrumb_admin')</a></li>
        <li class="active">@lang('admin/mounts.breadcrumb_mounts')</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin/mounts.mount_list')</h3>

                    <div class="box-tools">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#newMountModal">@lang('admin/mounts.create_new')</button>
                    </div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>@lang('admin/mounts.id')</th>
                                <th>@lang('admin/mounts.name')</th>
                                <th>@lang('admin/mounts.source')</th>
                                <th>@lang('admin/mounts.target')</th>
                                <th class="text-center">@lang('admin/mounts.eggs')</th>
                                <th class="text-center">@lang('admin/mounts.nodes')</th>
                                <th class="text-center">@lang('admin/mounts.servers')</th>
                            </tr>

                            @foreach ($mounts as $mount)
                                <tr>
                                    <td><code>{{ $mount->id }}</code></td>
                                    <td><a href="{{ route('admin.mounts.view', $mount->id) }}">{{ $mount->name }}</a></td>
                                    <td><code>{{ $mount->source }}</code></td>
                                    <td><code>{{ $mount->target }}</code></td>
                                    <td class="text-center">{{ $mount->eggs_count }}</td>
                                    <td class="text-center">{{ $mount->nodes_count }}</td>
                                    <td class="text-center">{{ $mount->servers_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="newMountModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.mounts') }}" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: #FFFFFF">&times;</span>
                        </button>

                        <h4 class="modal-title">@lang('admin/mounts.create_mount')</h4>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="pName" class="form-label">@lang('admin/mounts.name')</label>
                                <input type="text" id="pName" name="name" class="form-control" />
                                <p class="text-muted small">@lang('admin/mounts.name_help')</p>
                            </div>

                            <div class="col-md-12">
                                <label for="pDescription" class="form-label">@lang('admin/mounts.description')</label>
                                <textarea id="pDescription" name="description" class="form-control" rows="4"></textarea>
                                <p class="text-muted small">@lang('admin/mounts.description_help')</p>
                            </div>

                            <div class="col-md-6">
                                <label for="pSource" class="form-label">@lang('admin/mounts.source')</label>
                                <input type="text" id="pSource" name="source" class="form-control" />
                                <p class="text-muted small">@lang('admin/mounts.source_help')</p>
                            </div>

                            <div class="col-md-6">
                                <label for="pTarget" class="form-label">@lang('admin/mounts.target')</label>
                                <input type="text" id="pTarget" name="target" class="form-control" />
                                <p class="text-muted small">@lang('admin/mounts.target_help')</p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">@lang('admin/mounts.read_only')</label>

                                <div>
                                    <div class="radio radio-success radio-inline">
                                        <input type="radio" id="pReadOnlyFalse" name="read_only" value="0" checked>
                                        <label for="pReadOnlyFalse">@lang('admin/mounts.false')</label>
                                    </div>

                                    <div class="radio radio-warning radio-inline">
                                        <input type="radio" id="pReadOnly" name="read_only" value="1">
                                        <label for="pReadOnly">@lang('admin/mounts.true')</label>
                                    </div>
                                </div>

                                <p class="text-muted small">@lang('admin/mounts.read_only_help')</p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">@lang('admin/mounts.user_mountable')</label>

                                <div>
                                    <div class="radio radio-success radio-inline">
                                        <input type="radio" id="pUserMountableFalse" name="user_mountable" value="0" checked>
                                        <label for="pUserMountableFalse">@lang('admin/mounts.false')</label>
                                    </div>

                                    <div class="radio radio-warning radio-inline">
                                        <input type="radio" id="pUserMountable" name="user_mountable" value="1">
                                        <label for="pUserMountable">@lang('admin/mounts.true')</label>
                                    </div>
                                </div>

                                <p class="text-muted small">@lang('admin/mounts.user_mountable_help')</p>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        {!! csrf_field() !!}
                        <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">@lang('admin/mounts.cancel')</button>
                        <button type="submit" class="btn btn-success btn-sm">@lang('admin/mounts.create')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
