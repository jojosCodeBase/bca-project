@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@elseif(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div id="alertMessage" class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
