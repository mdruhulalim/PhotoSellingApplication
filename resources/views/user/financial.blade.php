@extends('layouts.master')
{{-- title --}}
@section('title', 'Financial')
{{-- main content --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center">{{ Auth::user()->user_name }} financial status</h2>
                <hr>
                <div>
                    <h2>My banace: {{ $myFinancial->blance }}$</h2>
                    <a class="btn btn-success mb-5 {{ $myFinancial->blance > 10? '':'disabled' }}" href="{{ route('user.financial.cashout') }}">withdraw</a>
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