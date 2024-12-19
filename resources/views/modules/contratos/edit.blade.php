@extends('layouts/main')

@section('contenido')
    <header class="p-2">
        <h3>Modificar Contrato</h3>
    </header>
    <main class="p-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                Formulario
            </div>
            <div class="card-body">
                <h5 class="card-title">Modifica los datos del Contrato</h5>
                <p class="card-text">Recuerda revisar antes de actualizar</p>
                <form action="{{ route('contratos.update', $contrato->idContratos) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="col-md-3 position-relative">
                        <label for="tipo_solicitud" class="form-label">Tipo de Solicitud</label>
                        <option class="form-select" id="tipo_solicitud" name="tipo_solicitud" required>

                            {{ $tipo->Tipo_Solicitud }}
                        </option>


                    </div>
                    @if ($solicitud->Tipo_Solicitud_idTipo_Solicitud == 1)
                        {{-- Empleado Fijo --}}
                        <div id="empleadoFijoFields" style="display:block;">
                            <div class="col-md-4 position-relative">
                                <label for="personas_id" class="form-label">Personas</label>
                                <select class="form-select" id="personas_id" name="personas_id">
                                    <option selected disabled value="">Elegir</option>
                                    @foreach ($personas as $persona)
                                        <option value="{{ $persona->idPersonas }}"
                                            {{ old('personas_id', $solicitud->personas_id) == $persona->idPersonas ? 'selected' : '' }}>
                                            {{ $persona->Nombres }} {{ $persona->Apellidos }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    Por favor selecciona una persona.
                                </div>
                            </div>

                            <div class="col-md-3 position-relative">
                                <label for="cargos_id" class="form-label">Cargos</label>
                                <select class="form-select" id="cargos_id" name="cargos_id">
                                    <option selected disabled value="">Elegir</option>
                                    @foreach ($cargos as $cargo)
                                        <option value="{{ $cargo->idCargos }}"
                                            {{ old('cargos_id', $solicitud->cargos_id) == $cargo->idCargos ? 'selected' : '' }}>
                                            {{ $cargo->Nombre_Cargo }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    Por favor selecciona un cargo.
                                </div>
                            </div>

                            <div class="col-md-3 position-relative">
                                <label for="turnos_id" class="form-label">Turnos</label>
                                <select class="form-select" id="turnos_id" name="turnos_id">
                                    <option selected disabled value="">Elegir</option>
                                    @foreach ($turnos as $turno)
                                        <option value="{{ $turno->idTurnos }}"
                                            {{ old('turnos_id', $solicitud->turnos_id) == $turno->idTurnos ? 'selected' : '' }}>
                                            {{ $turno->Nombre_Turno }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    Por favor selecciona un turno.
                                </div>
                            </div>
                        </div>
                    @elseif($solicitud->Tipo_Solicitud_idTipo_Solicitud == 2)
                        {{-- Empleados a Destajo --}}
                        <div id="empleadoDestajoFields" style="display:block;">
                            <div class="col-md-4 position-relative">
                                <label for="servicio_id" class="form-label">Servicio</label>
                                <select class="form-select" id="servicio_ps" name="servicio_ps">
                                    <option selected disabled value="">Elegir</option>
                                    @foreach ($servicios as $servicio)
                                        <option value="{{ $servicio->idServicio }}"
                                            {{ old('servicio_ps', $servicio_ps ? $servicio_ps->idServicio : '') == $servicio->idServicio ? 'selected' : '' }}>
                                            {{ $servicio->Nombre_Servicio }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    Por favor selecciona un servicio.
                                </div>
                            </div>

                            <div class="col-md-4 position-relative">
                                <label for="personas_id" class="form-label">Personas</label>
                                <select class="form-select" id="personas_ps" name="personas_ps">
                                    <option selected disabled value="">Elegir</option>
                                    @foreach ($personas as $persona)
                                        <option value="{{ $persona->idPersonas }}"
                                            {{ old('personas_id', $persona_ps ? $persona_ps->idPersonas : '') == $persona->idPersonas ? 'selected' : '' }}>
                                            {{ $persona->Nombres }} {{ $persona->Apellidos }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    Por favor selecciona una persona.
                                </div>
                            </div>

                            <div class="col-md-6 position-relative">
                                <label for="costo_servicio" class="form-label">Remuneración</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="text" id="remuneracion_ps" name="remuneracion_ps" class="form-control"
                                        value="{{ old('costo_servicio', $ps ? $ps->Costo_Servicio : '') }}">
                                    <span class="input-group-text">,00</span>
                                </div>
                                <div class="invalid-tooltip">
                                    Por favor proporciona un monto válido.
                                </div>
                            </div>
                        </div>
                    @elseif($solicitud->Tipo_Solicitud_idTipo_Solicitud == 3)
                        {{-- Empresa --}}
                        <div id="empresaFields" style="display:block;">
                            <div class="col-md-4 position-relative">
                                <label for="empresa_id" class="form-label">Empresa</label>
                                <select class="form-select" id="empresa_id" name="empresa_id">
                                    <option selected disabled value="">Elegir</option>
                                    @foreach ($empresas as $empresa)
                                        <option value="{{ $empresa->idEmpresas }}"
                                            {{ old('empresa_id', $solicitud->empresa_id) == $empresa->idEmpresas ? 'selected' : '' }}>
                                            {{ $empresa->Nombre_Empresa }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    Por favor selecciona una empresa.
                                </div>
                            </div>

                            <div class="col-md-6 position-relative">
                                <label for="remuneracion_empresa" class="form-label">Remuneración</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="text" id="remuneracion_es" name="remuneracion_es" class="form-control"
                                        value="{{ old('remuneracion_empresa', $solicitud->remuneracion_empresa) }}">
                                    <span class="input-group-text">,00</span>
                                </div>
                                <div class="invalid-tooltip">
                                    Por favor proporciona una remuneración válida.
                                </div>
                            </div>
                        </div>
                    @endif
                    <label for="fecha_inicio">
                        Fecha_Inicio
                    </label>
                    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio"
                        value="{{ old('fecha_inicio', $contrato->Fecha_Inicio) }}">

                    <label for="">
                        Fecha_final
                    </label>
                    <input type="date" class="form-control" name="fecha_final" id="fecha_final"
                        value="{{ old('fecha_final', $contrato->Fecha_Fin) }}">

                    <input type="checkbox" name="acepto_terminos" id="acepto_terminos" required>
                    <label for="acepto_terminos">He leído y acepto los <a href="terminos_y_condiciones.html"
                            target="_blank">Términos y Condiciones</a></label>
                    @error('terms')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    <div class=" col-12 py-4">
                        <button class="btn btn-outline-warning" type="submit">Actualizar Contrato</button>
                        <a class="btn btn-outline-info" href="{{ route('solicitudes.index') }}">Volver a la lista</a>
                    </div>

                </form>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('tipo_solicitud').addEventListener('change', function() {
                let tipo_solicitud = this.value;
                document.getElementById('empleadoFijoFields').style.display = tipo_solicitud == 1 ?
                    'block' : 'none';
                document.getElementById('empleadoDestajoFields').style.display = tipo_solicitud == 2 ?
                    'block' : 'none';
                document.getElementById('empresaFields').style.display = tipo_solicitud == 3 ? 'block' :
                    'none';
            });

            // For the initial load
            document.getElementById('tipo_solicitud').dispatchEvent(new Event('change'));
        });
    </script>
@endpush