<div class="card shadow-sm overflow-hidden">
    <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">
        <img
            src="{{ @asset('assets/img/' . ($property->image ?? 'placeholder.webp')) }}" alt="{{ $property->image }}"
            class="card-img rounded-0">
    </a>

    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">
                {{ $property->title }}
            </a>
        </h5>
        <p class="card-text">{{ $property->surface }}m² - {{ $property->city }} ({{ $property->postal_code }})</p>
        <div class="text-primary fw-bold">
            {{ number_format($property->price, thousands_separator: ' ') }}XOF
        </div>
    </div>
</div>
