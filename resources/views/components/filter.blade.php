@if($filter)
<div class="bg-light rounded text-dark p-1">
    <span class="fw-bold p-2">
        Filtre <i class="bi bi-filter"></i>
    </span>
    @foreach($filter as $k => $v)
        <span class="px-2 bg-white rounded">
            {{ ucfirst($k) . ' : ' . $v }}
        </span>&nbsp;
    @endforeach
</div>
@endif
