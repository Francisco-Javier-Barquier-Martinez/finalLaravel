<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Edición de Perfil</x-slot>
    <x-errores />
    <form name="sd" method="POST" action="{{ route('perfiles.update', $perfile) }}"
        class=" p-4 bg-secondary text-light">
        @csrf
        @method("PUT")
        @bind($perfile)
        <x-form-input class="form-control" name="nombre" label="Nombre del Perfil" />
        <x-form-textarea class="form-control" label="Descripcion del Perfil" cols="50" rows="10" name="descripcion" />
        <div class="mt-3">
            <button type="submit" class="btn btn-info"><i class="fas fa-edit"></i> Actualizar</button>

            <button type="reset" class=" ml-3 btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
            <button class="ml-3 btn btn-primary" onclick="window.history.back();"><i class="fas fa-backward"></i>
                Volver</button>
        </div>
    </form>
</x-plantilla>