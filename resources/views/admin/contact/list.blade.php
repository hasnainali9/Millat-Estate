@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="clearfix">
                    <h4 class="header-title my-3 float-left">Contacts List</h4>
                </div>
                <div class="card-box">
                    <div class="table-responsive">
                        <table class="table table-stripped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($contacts) > 0)
                                    @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td class="text-right">
                                            {{ Form::open(['route' => ['admin.contact.destroy', $contact->id], 'method' => 'POST', 'class' => 'btn-group']) }}
                                                {{ Form::hidden('_method', 'Delete') }}
                                                <a href="{{ route('admin.contact.show', $contact->id) }}" class="btn btn-icon btn-sm waves-effect waves-light btn-success"> <i class="fa fa-eye"></i> </a>

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
