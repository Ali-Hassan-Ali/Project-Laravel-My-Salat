@if ($errors->any())
    <div class="alert alert-dark test-danger">
        @foreach ($errors->all() as $error)
            <p class="test-danger">{{ $error }}</p>
        @endforeach
    </div>
@endif