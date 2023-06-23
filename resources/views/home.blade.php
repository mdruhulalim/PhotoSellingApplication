@extends('layouts.master')
{{-- title --}}
@section('title', 'home')
{{-- slider --}}
@section('slider')
@include('partials.header')
@endsection
{{-- main content --}}
@section('content')
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                    <x-card imageData="No action" image="/image.png" imageName="football" imageDetails="lorem" status="hi"/>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- js --}}
@push('js')
    {{-- <script>
        alert('hello')
    </script> --}}
@endpush