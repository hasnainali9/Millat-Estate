@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h2>{{ $contact->name }}</h2>
                    <p><strong>Email : </strong>{{ $contact->email }}</p>
                    <p><strong>Phone : </strong>{{ $contact->phone }}</p>
                    <h4>Message</h4>
                    <p>{{ $contact->message }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
