@if ($users)
    <div class="container-fluid d-flex flex-wrap flex-column">
        <div class="d-flex">
            <div class="col col-3">
                <lavel for="nombre"><strong>Nombre:</strong></lavel>
            </div>
            <div class="col col-3">
                <lavel for="correo"><strong>Correo:</strong></lavel>
            </div>
            <div class="col col-3">
                <lavel for="credenciales"><strong>Documento:</strong></lavel>
            </div>
        </div>
        @foreach ($users as $userItem)
            <x-user.user-item :userItem=$userItem :users=$users></x-user.user-item>
        @endforeach
    </div>
@endif
