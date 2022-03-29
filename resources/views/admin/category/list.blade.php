@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="clearfix">
                    <h4 class="header-title my-3 float-left">Categories List</h4>
                    <a href="{{ route('admin.property.category.create') }}" class="btn btn-icon btn-sm waves-effect waves-light btn-success float-right"> <i class="fa fa-plus"></i> </a>
                </div>
                <div class="card-box">
                    <div class="table-responsive">
                        <table class="table table-stripped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->type }}</td>
                                        <td>{{ $category->is_active }}</td>
                                        <td class="text-right">
                                            {{ Form::open(['route' => ['admin.property.category.destroy', $category->slug], 'method' => 'POST', 'class' => 'btn-group']) }}
                                                {{ Form::hidden('_method', 'Delete') }}
                                                <a href="{{ route('admin.property.category.show', $category->slug) }}" class="btn btn-icon btn-sm waves-effect waves-light btn-success"> <i class="fa fa-eye"></i> </a>
                                                <a href="{{ route('admin.property.category.edit', $category->slug) }}" class="btn btn-icon btn-sm waves-effect waves-light btn-primary"> <i class="fa fa-wrench"></i></a>

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
