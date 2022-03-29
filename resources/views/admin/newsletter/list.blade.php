@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="clearfix">
                    <h4 class="header-title my-3 float-left">Emails List</h4>
                    <a href="{{ route('admin.newsletter.create') }}" class="btn btn-icon btn-sm waves-effect waves-light btn-success float-right"> <i class="fa fa-plus"></i> </a>
                </div>
                <div class="card-box">
                    <div class="table-responsive">
                        <table class="table table-stripped table-hover">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($newsletters) > 0)
                                    @foreach ($newsletters as $newsletter)
                                    <tr>
                                        <td>{{ $newsletter->email }}</td>
                                        <td>{{ $newsletter->is_active }}</td>
                                        <td class="text-right">
                                            {{ Form::open(['route' => ['admin.newsletter.destroy', $newsletter->id], 'method' => 'POST']) }}
                                                {{ Form::hidden('_method', 'Delete') }}

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
