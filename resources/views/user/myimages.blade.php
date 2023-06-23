@extends('layouts.master')
{{-- title --}}
@section('title', 'All-Images')
{{-- main content --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">{{ Auth::user()->user_name }} images</h2>
                <hr>
                <!-- Section-->
                <section class="py-5">
                    <div class="container px-4 px-lg-5 mt-5">
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            @foreach ($userImages as $image)
                                <div class="col mb-5">
                                    <x-card :imageData="$image" :image="'/'.$image->image" :imageName="$image->name" :imageDetails="$image->details" :status="$image->status"/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $userImages->links() }}
                </section>
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