<div class="container">
    <div class="d-flex align-items-center justify-content-between mt-4">
        <h2 class="">Nos derniers biens</h2>

        <a href="{{ route('property.index') }}" class="link-primary">Tous nos biens&nbsp;<i class="bi bi-chevron-right"></i></a>
    </div>
    <div class="row">
        @forelse($properties as $property)
            <div class="col">
                @include('properties.card')
            </div>
        @empty
            {{ null }}
        @endforelse
    </div>
</div>
