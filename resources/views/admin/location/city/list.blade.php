@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="clearfix">
                    <h4 class="header-title my-3 float-left">Cities List</h4>
                    <a href="{{ route('admin.locations.city.create') }}" class="btn btn-icon btn-sm waves-effect waves-light btn-success float-right"> <i class="fa fa-plus"></i> </a>
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
                                @if (count($cities) > 0)
                                    @foreach ($cities as $city)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($city->image) }}" alt="{{ $city->name }}" class="rounded-circle" width="50" height="50">
                                        </td>
                                        <td>{{ $city->name }}</td>
                                        <td>{{ $city->is_active }}</td>
                                        <td class="text-right">
                                            {{ Form::open(['route' => ['admin.locations.city.destroy', $city->slug], 'method' => 'POST', 'class' => 'btn-group']) }}
                                                {{ Form::hidden('_method', 'Delete') }}
                                                <a href="{{ route('admin.locations.city.show', $city->slug) }}" class="btn btn-icon btn-sm waves-effect waves-light btn-success"> <i class="fa fa-eye"></i> </a>
                                                <a href="{{ route('admin.locations.city.edit', $city->slug) }}" class="btn btn-icon btn-sm waves-effect waves-light btn-primary"> <i class="fa fa-wrench"></i></a>

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
