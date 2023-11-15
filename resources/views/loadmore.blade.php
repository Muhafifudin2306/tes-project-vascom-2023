@foreach ($products as $item)
    <div class="col-6 col-lg-3">
        <div class="parfume-card px-4 py-3 mx-1 rounded-1">
            <div class="image-card">
                <img src="{{ asset('assets/image/' . $item->product_image) }}" class="w-100 pb-2 object-fit-contain h-100"
                    alt="">
            </div>
            <div class="desc-card">
                <h5 class="font-two pb-1 pt-4">{{ $item->product_name }}</h5>
                <h6 class="font-one blue-text">IDR
                    {{ number_format($item->product_price, 0, ',', '.') }}</h6>
            </div>
        </div>
    </div>
@endforeach
