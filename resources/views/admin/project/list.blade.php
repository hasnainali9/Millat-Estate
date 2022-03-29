@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="clearfix">
                    <h4 class="header-title my-3 float-left">Projects List</h4>
                    <a href="{{ route('admin.property.project.create') }}" class="btn btn-icon btn-sm waves-effect waves-light btn-success float-right"> <i class="fa fa-plus"></i> </a>
                </div>
                <div class="card-box">
                    <div class="table-responsive">
                        <table class="table table-stripped table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Price From</th>
                                    <th>Price To</th>
                                    <th>Is Active</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($projects) > 0)
                                    @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->city_id }}</td>
                                        <td>{{ $project->state_id }}</td>
                                        <td>{{ $project->price_from }}</td>
                                        <td>{{ $project->price_to }}</td>
                                        <td>{{ $project->is_active }}</td>
                                        <td class="text-right">
                                            {{ Form::open(['route' => ['admin.property.project.destroy', $project->slug], 'method' => 'POST', 'class' => 'btn-group']) }}
                                                {{ Form::hidden('_method', 'Delete') }}
                                                <a href="{{ route('admin.property.project.show', $project->slug) }}" class="btn btn-icon btn-sm waves-effect waves-light btn-success"> <i class="fa fa-eye"></i> </a>
                                                <a href="{{ route('admin.property.project.edit', $project->slug) }}" class="btn btn-icon btn-sm waves-effect waves-light btn-primary"> <i class="fa fa-wrench"></i></a>

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
