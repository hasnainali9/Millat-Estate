<div class="products__filter mb-30">
    <div class="products__filter__group">
        <div class="products__filter__header">
            <h5 class="text-center text-capitalize">project filter</h5>
        </div>
        {!! Form::open(['route' => 'property.search', 'method' => 'POST']) !!}
        @csrf
        <div class="products__filter__body">
            <div class="form-group">
                <select class="form-control" name="category_id" required>
                    <option selected>Type Property</option>
                    @foreach ($sharedCategories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::select('type', ['rent' => 'Rent', 'buy' => 'Buy'], 'buy', ['class' => ' form-control', 'placeholder' => 'Bedrooms']) !!}
            </div>
            <div class="form-group">
                {!! Form::select('bedrooms', [1, 2, 3, 4, 5, 6, 7, 8, 9], '', ['class' => 'form-control', 'placeholder' => 'Bedrooms']) !!}
            </div>
            <div class="form-group">
                {!! Form::select('bathrooms', [1, 2, 3, 4, 5], '', ['class' => 'form-control', 'placeholder' => 'Bathrooms']) !!}
            </div>
            <div class="form-group">
                <select class="form-control" name="city_id" required>
                    <option selected>Locations</option>
                    @foreach ($sharedCities as $city)
                        <option value="{{ $city->id }}">
                            {{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="products__filter__footer">
            <div class="form-group mb-0">
                <button class="btn btn-primary text-capitalize btn-block"><i class="fa fa-search ml-1"></i> search project </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<!-- END FORM FILTER -->
<div class="sticky-top">
    <!-- PROFILE AGENT -->
    <div class="profile__agent mb-30">
        <div class="profile__agent__group">
            <div class="profile__agent__header">
                <div class="profile__agent__header-avatar">
                    <ul class="list-unstyled mb-0">
                        <li>
                            <h5 class="text-capitalize"><i class=" fa fa-building mr-1"></i>Al Harmain</h5>
                        </li>
                        <li><a href="tel:(051)8990519"><i class="fa fa-phone-square mr-1"></i>(051) 8990 519</a></li>
                        <li><a href="mailto:info@alharamaingroup.pk"><i class="fa fa-envelope mr-1"></i>info@alharamaingroup.pk</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="profile__agent__body">
                {{ Form::open(['route' => 'contact.store', 'method' => 'POST']) }}
                    @csrf
                    <div class="form-group">
                        {{ Form::text('name', '', ['class' => 'form-control', 'required', 'placeholder' => 'Your Name']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::email('email', '', ['class' => 'form-control', 'required', 'placeholder' => 'Your Email']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::number('phone', '', ['class' => 'form-control', 'required', 'placeholder' => 'Your Phone']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::textarea('message', '', ['class' => 'form-control', 'rows' => 9, 'placeholder' => 'Your Message']) }}
                    </div>
                    <div class="profile__agent__footer">
                        <div class="form-group">
                            {{ Form::submit('Submit', ['class' => 'btn btn-primary text-capitalize btn-block']) }}
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- END PROFILE AGENT -->
</div>
