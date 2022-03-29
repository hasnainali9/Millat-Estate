<nav class="navbar navbar-expand bg-light w-100 text-center d-block d-sm-block d-md-none" style="position: fixed; left: 0; bottom: 0; z-index: 10000">
    <div class="">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item mx-auto"><a class="nav-link" href="{{ route('home') }}">
                <i class="fa fa-home"></i> <br>
                Home
             </a></li>
            <li class="nav-item mx-auto"><a class="nav-link" href="{{ route('property', 'buy') }}">
                <i class="fa fa-key"></i> <br>
                Buy
             </a></li>
            <li class="nav-item mx-auto"><a class="nav-link" href="{{ route('property', 'rent') }}">
                <i class="fa fa-home"></i> <br>
                Rent
             </a></li>
            <li class="nav-item mx-auto"><a class="nav-link" href="{{ route('invest') }}">
                <i class="fa fa-building"></i> <br>
                Invest
             </a></li>
            <li class="nav-item mx-auto"><a class="nav-link" href="{{ route('contact') }}">
                <i class="fa fa-phone"></i> <br>
                Contact
             </a></li>
        </ul>
    </div>
</nav>
