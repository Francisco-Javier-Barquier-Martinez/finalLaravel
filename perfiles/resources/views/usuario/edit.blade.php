<x-plantilla>
    <x-slot name="titulo">Creacion</x-slot>
    <x-slot name="cabecera">Editar Usuario</x-slot>
    <x-errores />
    <form name="sd" method="POST" action="{{ route('usuarios.update', $usuario) }}" class="p-4 bg-dark text-light">
        @csrf
        @method("PUT")
        @bind($usuario)
        <div class="row">
            <diV class="col-6">
                <x-form-input class="form-control" name="nomusu" label="Nombre" />
                <x-form-input class="form-control" name="localidad" label="Localidad" />
            </diV>

            <div class="col-6">
                <x-form-input class="form-control" name="mail" label="E-mail" type="mail" />
                <x-form-select class="form-control" name="perfil_id" :options="$perfil" label="Perfil" />
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-info"><i class="fas fa-edit"></i> Actualizar</button>

            <button type="reset" class="ml-3 btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
            <button class="ml-3 btn btn-primary" onclick="window.history.back();"><i class="fas fa-backward"></i>
                Volver</button>
        </div>
    </form>
</x-plantilla>
