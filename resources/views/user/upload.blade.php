@extends('layouts.master')
{{-- title --}}
@section('title', 'Upload-image')
{{-- main content --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4 mb-4">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Upload your image here</h2>
                        @include('error.error')
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Inter photo name">
                            {{-- show error --}}
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <label class="mt-2" for="details">Details</label>
                            <input class="form-control" type="text" name="details" placeholder="Inter detials">
                            {{-- show error --}}
                            @error('details')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <label class="mt-2" for="image">Select your image</label>
                            <input class="form-control" type="file" name="image">
                            {{-- show error --}}
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input class="btn btn-success mt-2" type="submit" name="submit" value="upload">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- js --}}
@push('js')
    {{-- <script>
        alert('hello')
    </script> --}}
@endpush