<div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url({{ @asset('assets/img/' . ($property->image ?? 'placeholder.webp')) }})">
    <div class="overlay overlay-a"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="intro-body">
                            <p class="intro-title-top">{{ $property->city }}
                                <br> {{ $property->postal_code }}
                            </p>
                            <h1 class="intro-title mb-4 ">
                                <span class="color-b">{{ $property->surface }} </span> {{ $property->title }}
                                <br> {{ $property->address }}
                            </h1>
                            <p class="intro-subtitle intro-price">
                                <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}"><span class="price-a">Prix | XOF {{ $property->price }}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
