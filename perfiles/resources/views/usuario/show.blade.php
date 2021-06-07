<x-plantilla>
    <x-slot name="titulo">Gestion</x-slot>
    <x-slot name="cabecera">Detalles Usuario ({{ $usuario->id }})</x-slot>
    <div class="card m-auto" style="width: 34rem;">
        <div class="card-body">
            <h4 class="card-title"><b>Nombre: </b> {{ $usuario->nomusu }}</h4>
            <h6 class="card-subtitle mb-2 text-muted"><b>E-Mail: </b> {{ $usuario->mail }}</h6>
            <h6 class="card-subtitle mb-2 text-muted"><b>Localidad: </b> {{ $usuario->localidad }}</h6>
            <a href="{{ route('perfiles.show', $usuario->perfiles->id) }}"
                class="card-link">{{ $usuario->perfiles->nombre }}</a>

            <div class="mt-2">
                <button class="ml-3 btn btn-primary" onclick="window.history.back();"><i class="fas fa-backward"></i>
                    Volver</button>
            </div>
        </div>
    </div>
</x-plantilla>
