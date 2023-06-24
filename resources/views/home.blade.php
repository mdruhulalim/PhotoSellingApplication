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
                @foreach ($randomImages as $randomImage)
                    <div class="col mb-5">
                        <x-card :imageData="$randomImage" :image="'/'.$randomImage->image" :imageName="$randomImage->name" :imageDetails="$randomImage->details" :status="$randomImage->status"/>
                    </div>
                @endforeach
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