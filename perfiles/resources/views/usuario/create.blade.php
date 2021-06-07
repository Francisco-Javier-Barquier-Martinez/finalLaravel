<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Nuevo Usuario</x-slot>
    <x-errores />
    <form name="sd" method="POST" action="{{ route('usuarios.store') }}" class=" p-4 bg-dark text-light">
        @csrf
        <div class="row">
            <div class="col-6">
                <x-form-input class="form-control" name="nomusu" label="Usuario" />
                <x-form-input class="form-control" name="mail" label="E-Mail" type="mail" />
            </div>
            <div class="col6">
                <x-form-input class="form-control" name="localidad" label="Localidad" />
                <x-form-select class="form-control" name="perfiles_id" :options="$perfil"
                    label="Elegir perfil del nuevo usuario" />
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Enviar</button>

            <button type="reset" class=" ml-3 btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
            <button class="ml-3 btn btn-primary" onclick="window.history.back();"><i
                    class="fas fa-backward"></i>Volver</button>
        </div>
    </form>
</x-plantilla>
