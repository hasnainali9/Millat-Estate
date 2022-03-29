@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="clearfix">
                    <h4 class="header-title my-3 float-left">States List</h4>
                    <a href="{{ route('admin.locations.state.create') }}" class="btn btn-icon btn-sm waves-effect waves-light btn-success float-right"> <i class="fa fa-plus"></i> </a>
                </div>
                <div class="card-box">
                    <div class="table-responsive">
                        <table class="table table-stripped table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($states) > 0)
                                    @foreach ($states as $state)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($state->image) }}" alt="{{ $state->name }}" class="rounded-circle" width="50" height="50">
                                        </td>
                                        <td>{{ $state->name }}</td>
                                        <td>{{ $state->is_active }}</td>
                                        <td class="text-right">
                                            {{ Form::open(['route' => ['admin.locations.state.destroy', $state->slug], 'method' => 'POST', 'class' => 'btn-group']) }}
                                                {{ Form::hidden('_method', 'Delete') }}
                                                <a href="{{ route('admin.locations.state.show', $state->slug) }}" class="btn btn-icon btn-sm waves-effect waves-light btn-success"> <i class="fa fa-eye"></i> </a>
                                                <a href="{{ route('admin.locations.state.edit', $state->slug) }}" class="btn btn-icon btn-sm waves-effect waves-light btn-primary"> <i class="fa fa-wrench"></i></a>

                                                <button type="submit" class="btn btn-icon btn-sm waves-effect waves-light btn-danger"><i class="fas fa-times"></i></button>
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
