@if (session('okMassage'))
    <p class="alert alert-success">{{ session('okMassage') }}</p>
@endif
@if (session('errorMassage'))
    <p class="alert alert-danger">{{ session('errorMassage') }}</p>
@endif

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}