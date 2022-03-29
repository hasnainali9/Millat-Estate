@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="clearfix">
                    <h4 class="header-title my-3 float-left">Properties List</h4>
                    <a href="{{ route('admin.properties.create') }}" class="btn btn-icon btn-sm waves-effect waves-light btn-success float-right"> <i class="fa fa-plus"></i> </a>
                </div>
                <div class="card-box">
                    <div class="table-responsive">
                        <table class="table table-stripped table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Price</th>
                                    <th>Is Active</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($properties) > 0)
                                    @foreach ($properties as $property)
                                    <tr>
                                        <td>{{ $property->title }}</td>
                                        <td>{{ $property->city_id }}</td>
                                        <td>{{ $property->state_id }}</td>
                                        <td>{{ $property->price }}</td>
                                        <td>{{ $property->is_active }}</td>
                                        <td class="text-right">
                                            {{ Form::open(['route' => ['admin.properties.destroy', $property->slug], 'method' => 'POST', 'class' => 'btn-group']) }}
                                                {{ Form::hidden('_method', 'Delete') }}
                                                <a href="{{ route('admin.properties.show', $property->slug) }}" class="btn btn-icon btn-sm waves-effect waves-light btn-success"> <i class="fa fa-eye"></i> </a>
                                                <a href="{{ route('admin.properties.edit', $property->slug) }}" class="btn btn-icon btn-sm waves-effect waves-light btn-primary"> <i class="fa fa-wrench"></i></a>

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
