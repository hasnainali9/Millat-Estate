@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>
            swal(@json($error))
        </script>
    @endforeach
@endif

@if (session('error'))
    <script>
        swal(@json(session('error')))
    </script>
@endif

@if (session('success'))
    <script>
        swal(@json(session('success')))
    </script>
@endif

@if (session('status'))
    <script>
        swal(@json(session('status')))
    </script>
@endif
