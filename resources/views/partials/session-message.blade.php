@if (session('message'))
    <div class="container mt-4 w-50 m-auto">

        <div class="alert alert-success">
           <strong> {{ session('message') }}</strong>
        </div>
    </div>
@endif
