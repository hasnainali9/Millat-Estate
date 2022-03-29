@extends('frontend.layouts.app')

@section('page_title', 'Contact Us')

@section('content')
    <!-- Form contact -->
    <section class="wrap__contact-form">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h5>contact us</h5>
                    {{ Form::open(['route' => 'contact.store', 'method' => 'POST']) }}
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-name">
                                {{ Form::label('name', 'Your Name') }}
                                {{ Form::text('name', '', ['class' => 'form-control', 'required']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-name">
                                {{ Form::label('email', 'Your Email') }}
                                {{ Form::email('email', '', ['class' => 'form-control', 'required']) }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-name">
                                {{ Form::label('phone', 'Your Phone') }}
                                {{ Form::number('phone', '', ['class' => 'form-control', 'required']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('message', 'Your Message') }}
                                {{ Form::textarea('message', '', ['class' => 'form-control', 'rows' => 9]) }}
                            </div>
                            <div class="form-group float-right mb-0">
                                {{ Form::submit('Submit', ['class' => 'btn btn-primary btn-contact']) }}
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>

                <div class="col-md-4">
                    <div class="wrap__contact-open-hours">
                        <h5 class="text-capitalize">open hours</h5>
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center justify-content-between"><span>Monday - Friday</span>
                                <span>09 AM - 19 PM</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between"><span>Saturday</span> <span>09
                                    AM - 14 PM</span></li>
                            <li class="d-flex align-items-center justify-content-between"><span>Sunday</span>
                                <span>Closed</span>
                            </li>
                        </ul>
                    </div>
                    <h5>Info location</h5>
                    <div class="wrap__contact-form-office">
                        <ul class="list-unstyled">
                            <li>
                                <span>
                                    <i class="fa fa-home"></i>
                                </span>
                                PO Box 16122 Collins Street West Victoria
                                8007 Australia
                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-phone"></i>
                                    <a href="tel:923111269908">(+92) 311 1269 908</a>
                                </span>
                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-phone"></i>
                                    <a href="tel:0518990519">(051) 8990 519</a>
                                </span>
                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-envelope"></i>
                                    <a href="mailto:info@alharamaingroup.pk">info@alharamaingroup.pk</a>
                                </span>

                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-globe"></i>
                                    <a href="https://www.alharamaingroup.pk/"> alharamaingroup.pk</a>
                                </span>
                            </li>
                        </ul>

                        <div class="social__media">
                            <h5>find us</h5>
                            <ul class="list-inline">

                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-social rounded text-white facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-social rounded text-white twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-social rounded text-white whatsapp">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-social rounded text-white telegram">
                                        <i class="fa fa-telegram"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-social rounded text-white linkedin">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Form contact  -->
@endsection
