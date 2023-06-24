<div class="card h-100">
    <!-- Product image-->
    <img class="card-img-top" src="{{ asset('uploads/').$image }}" alt="..." />
    <!-- Product details-->
    <div class="card-body p-4">
        <div class="text-center">
            <!-- Product name-->
            <h5 class="fw-bolder">{{ $imageName }}</h5>
            <p>{{ $imageDetails }}</p>
            <a class="btn btn-sm btn-outline-info" download="" href="{{ asset('uploads/').$image }}">Download</a>
        </div>
    </div>
    <!-- Product actions-->
    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
        @if ($status == 'approved')
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('user.Images.Sale',[$imageData->id])}}">Send sell request</a></div>
        @else
            <div class="text-center"><a class="btn btn-outline-dark mt-auto disabled" href="#">
            @if ($status == 'declined')
                Declined
            @else
            @if ($status == 'selling')
                Selling
            @else
                @if ($status == 'buy_out')
                    Buy out
                @else
                    Pending
                @endif
            @endif
            @endif
            </a></div>
        @endif
        
    </div>
</div>