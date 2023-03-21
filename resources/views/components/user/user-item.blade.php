@if ($userItem)
    <div class="container-ms card d-flex flex-wrap flex-column mt-3 mb-3">
        <lavel for="Usuario"> Usuario: </lavel>
        <hr>
        <div class="d-flex">
            <div class="col col-3">
                <lavel for="nombre"> {{ $userItem->name }} </lavel>
            </div>
            <div class="col col-3">
                <lavel for="correo"> {{ $userItem->email }} </lavel>
            </div>
            <div class="col col-3">
                <lavel for="credenciales"> {{ $userItem->credentials }} </lavel>
            </div>
        </div>
    </div>
    @role('admin')
    @if (!$users)
        <a class="btn btn-primary" href="{{ route('user.show.allUsers') }}">Usuarios</a>
    @endif
@endrole()
@endif
