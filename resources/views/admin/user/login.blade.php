@extends('admin.layouts.master')
@section('title', 'Admin login')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4 mb-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h2>Log in</h2>
                    {{-- show error massage --}}
                    @include('error.error')
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.login') }}" method="GET">
                        @csrf
                        <input class="form-control" type="text" name="uname" placeholder="Inter your user name" value="{{ old('uname') }}">
                        {{-- show error --}}
                        @error('uname')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input class="form-control mt-2" type="password" name="password" placeholder="Inter your password">
                        {{-- show error --}}
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input class="btn btn-success mt-2" type="submit" name="submit" value="Log in">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection