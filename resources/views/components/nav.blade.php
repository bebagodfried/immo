


<div class="d-flex">
    <ul class="nav align-items-center">
    @guest
        <li class="nav-item">
            <a href="{{ route('property.index') }}"
               class="nav-link @if(Route::is('property.index')) active @endif">Biens</a>
        </li>

        <li class="nav-item">
            <button type="button"
                    class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse rounded"
                    data-bs-toggle="collapse"
                    data-bs-target="#immoSearch">
                <i class="bi bi-search"></i>
            </button>
        </li>
    @endguest

    @auth
        <li class="nav-item">
            <a href="{{ route('admin.biens.index') }}"
               class="nav-link @if(Route::is('admin.biens.index')) active @endif">Géré les biens</a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.option.index') }}"
               class="nav-link @if(Route::is('admin.option.index')) active @endif">Géré les options</a>
        </li>

        <li class="nav-item">
            <form action="{{route('logout')}}" method="post">
                @csrf
                @method('delete')
                <button class="rounded btn btn-danger">
                    <span hidden>Se déconnecter</span>
                    <i class="bi bi-door-open"></i>
                </button>
            </form>
        </li>
    </ul>
    @endauth
</div>
