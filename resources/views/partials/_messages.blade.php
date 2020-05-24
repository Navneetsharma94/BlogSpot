@if (Session::has('success'))
    <div class="alert alert-primary" role="alert">
        <strong>Success:</strong> {{ Session::get('success')}}
    </div>
@endif