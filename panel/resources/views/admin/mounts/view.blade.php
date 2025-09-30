
@extends('layouts.admin')

@section('title')
    @lang('admin/mounts.view_mount', ['id' => $mount->id])
@endsection

@section('content-header')
    <h1>{{ $mount->name }}<small>{{ str_limit($mount->description, 75) }}</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">@lang('admin/mounts.breadcrumb_admin')</a></li>
        <li><a href="{{ route('admin.mounts') }}">@lang('admin/mounts.breadcrumb_mounts')</a></li>
        <li class="active">{{ $mount->name }}</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin/mounts.mount_details')</h3>
                </div>

                <form action="{{ route('admin.mounts.view', $mount->id) }}" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="PUniqueID" class="form-label">@lang('admin/mounts.unique_id')</label>
                            <input type="text" id="PUniqueID" class="form-control" value="{{ $mount->uuid }}" disabled />
                        </div>

                        <div class="form-group">
                            <label for="pName" class="form-label">@lang('admin/mounts.name')</label>
                            <input type="text" id="pName" name="name" class="form-control" value="{{ $mount->name }}" />
                        </div>

                        <div class="form-group">
                            <label for="pDescription" class="form-label">@lang('admin/mounts.description')</label>
                            <textarea id="pDescription" name="description" class="form-control" rows="4">{{ $mount->description }}</textarea>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="pSource" class="form-label">@lang('admin/mounts.source')</label>
                                <input type="text" id="pSource" name="source" class="form-control" value="{{ $mount->source }}" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="pTarget" class="form-label">@lang('admin/mounts.target')</label>
                                <input type="text" id="pTarget" name="target" class="form-control" value="{{ $mount->target }}" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label">@lang('admin/mounts.read_only')</label>

                                <div>
                                    <div class="radio radio-success radio-inline">
                                        <input type="radio" id="pReadOnlyFalse" name="read_only" value="0" @if(!$mount->read_only) checked @endif>
                                        <label for="pReadOnlyFalse">@lang('admin/mounts.false')</label>
                                    </div>

                                    <div class="radio radio-warning radio-inline">
                                        <input type="radio" id="pReadOnly" name="read_only" value="1" @if($mount->read_only) checked @endif>
                                        <label for="pReadOnly">@lang('admin/mounts.true')</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-label">@lang('admin/mounts.user_mountable')</label>

                                <div>
                                    <div class="radio radio-success radio-inline">
                                        <input type="radio" id="pUserMountableFalse" name="user_mountable" value="0" @if(!$mount->user_mountable) checked @endif>
                                        <label for="pUserMountableFalse">@lang('admin/mounts.false')</label>
                                    </div>

                                    <div class="radio radio-warning radio-inline">
                                        <input type="radio" id="pUserMountable" name="user_mountable" value="1" @if($mount->user_mountable) checked @endif>
                                        <label for="pUserMountable">@lang('admin/mounts.true')</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        {!! csrf_field() !!}
                        {!! method_field('PATCH') !!}

                        <button name="action" value="edit" class="btn btn-sm btn-primary pull-right">@lang('admin/mounts.save')</button>
                        <button name="action" value="delete" class="btn btn-sm btn-danger pull-left muted muted-hover"><i class="fa fa-trash-o"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin/mounts.eggs')</h3>

                    <div class="box-tools">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addEggsModal">@lang('admin/mounts.add_eggs')</button>
                    </div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>@lang('admin/mounts.id')</th>
                            <th>@lang('admin/mounts.name')</th>
                            <th></th>
                        </tr>

                        @foreach ($mount->eggs as $egg)
                            <tr>
                                <td class="col-sm-2 middle"><code>{{ $egg->id }}</code></td>
                                <td class="middle"><a href="{{ route('admin.nests.egg.view', $egg->id) }}">{{ $egg->name }}</a></td>
                                <td class="col-sm-1 middle">
                                    <button data-action="detach-egg" data-id="{{ $egg->id }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin/mounts.nodes')</h3>

                    <div class="box-tools">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addNodesModal">@lang('admin/mounts.add_nodes')</button>
                    </div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>@lang('admin/mounts.id')</th>
                            <th>@lang('admin/mounts.name')</th>
                            <th>@lang('admin/mounts.fqdn')</th>
                            <th></th>
                        </tr>

                        @foreach ($mount->nodes as $node)
                            <tr>
                                <td class="col-sm-2 middle"><code>{{ $node->id }}</code></td>
                                <td class="middle"><a href="{{ route('admin.nodes.view', $node->id) }}">{{ $node->name }}</a></td>
                                <td class="middle"><code>{{ $node->fqdn }}</code></td>
                                <td class="col-sm-1 middle">
                                    <button data-action="detach-node" data-id="{{ $node->id }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addEggsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.mounts.eggs', $mount->id) }}" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: #FFFFFF">&times;</span>
                        </button>

                        <h4 class="modal-title">@lang('admin/mounts.add_eggs')</h4>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="pEggs">@lang('admin/mounts.eggs')</label>
                                <select id="pEggs" name="eggs[]" class="form-control" multiple>
                                    @foreach ($nests as $nest)
                                        <optgroup label="{{ $nest->name }}">
                                            @foreach ($nest->eggs as $egg)

                                                @if (! in_array($egg->id, $mount->eggs->pluck('id')->toArray()))
                                                    <option value="{{ $egg->id }}">{{ $egg->name }}</option>
                                                @endif

                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        {!! csrf_field() !!}

                        <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">@lang('admin/mounts.cancel')</button>
                        <button type="submit" class="btn btn-primary btn-sm">@lang('admin/mounts.add')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addNodesModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.mounts.nodes', $mount->id) }}" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: #FFFFFF">&times;</span>
                        </button>

                        <h4 class="modal-title">@lang('admin/mounts.add_nodes')</h4>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="pNodes">@lang('admin/mounts.nodes')</label>
                                <select id="pNodes" name="nodes[]" class="form-control" multiple>
                                    @foreach ($locations as $location)
                                        <optgroup label="{{ $location->long }} ({{ $location->short }})">
                                            @foreach ($location->nodes as $node)

                                                @if (! in_array($node->id, $mount->nodes->pluck('id')->toArray()))
                                                    <option value="{{ $node->id }}">{{ $node->name }}</option>
                                                @endif

                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        {!! csrf_field() !!}

                        <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">@lang('admin/mounts.cancel')</button>
                        <button type="submit" class="btn btn-primary btn-sm">@lang('admin/mounts.add')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    @parent

    <script>
        $(document).ready(function() {
            $('#pEggs').select2({
                placeholder: '@lang('admin/mounts.select_eggs')',
            });

            $('#pNodes').select2({
                placeholder: '@lang('admin/mounts.select_nodes')',
            });

            $('button[data-action="detach-egg"]').click(function (event) {
                event.preventDefault();

                const element = $(this);
                const eggId = $(this).data('id');

                $.ajax({
                    method: 'DELETE',
                    url: '/admin/mounts/' + {{ $mount->id }} + '/eggs/' + eggId,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                }).done(function () {
                    element.parent().parent().addClass('warning').delay(100).fadeOut();
                    swal({ type: 'success', title: '@lang('admin/mounts.egg_detached')' });
                }).fail(function (jqXHR) {
                    console.error(jqXHR);
                    swal({
                        title: '@lang('admin/mounts.whoops')',
                        text: jqXHR.responseJSON.error,
                        type: 'error'
                    });
                });
            });

            $('button[data-action="detach-node"]').click(function (event) {
                event.preventDefault();

                const element = $(this);
                const nodeId = $(this).data('id');

                $.ajax({
                    method: 'DELETE',
                    url: '/admin/mounts/' + {{ $mount->id }} + '/nodes/' + nodeId,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                }).done(function () {
                    element.parent().parent().addClass('warning').delay(100).fadeOut();
                    swal({ type: 'success', title: '@lang('admin/mounts.node_detached')' });
                }).fail(function (jqXHR) {
                    console.error(jqXHR);
                    swal({
                        title: '@lang('admin/mounts.whoops')',
                        text: jqXHR.responseJSON.error,
                        type: 'error'
                    });
                });
            });
        });
    </script>
@endsection
