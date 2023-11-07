<div class="col-md-3 mb-4">
    <div class="card h-100 d-flex flex-column">
        <img class="card-img-top" src="{{ asset('storage/' . $photo ) }}" alt="{{ $name }}">
        <div class="card-body flex-grow-1">
            <h5 class="card-title">{{ html_entity_decode($name) }}</h5>
            <p class="card-text mb-3" style="font-size: 0.6em;">{{ html_entity_decode($description) }}</p>
        </div>
        <div class="card-footer bg-white mt-auto">
            <p class="price mb-1">Price: ${{ $price }}</p>
            <div class="card-text mb-3 d-flex justify-content-start">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $rating)
                        <span class="material-icons-sharp text-dark">star</span>
                    @else
                        <span class="material-icons-sharp text-muted">
                                star_border
                            </span>
                    @endif
                @endfor
                <p><em>({{$ratingCount}})</em></p>
            </div>
            <div class="d-flex justify-content-start">
                <a href="{{ route('product.index', ['product_id' => $id, 'searching_category' => Str::afterLast(request()->url(), '/'), 'page' => $page ]) }}" class="btn btn-dark mb-2 me-2">More Info</a>
                @auth
                    <form action="/cart/add/{{$id}}" method="POST" class="d-inline-block mb-2">
                        @csrf
                        <button type="submit" class="btn btn-dark d-flex align-items-center">
                            <span class="material-icons-sharp text-white me-2">shopping_cart</span>
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</div>