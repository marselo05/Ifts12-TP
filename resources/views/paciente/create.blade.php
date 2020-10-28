@extends('panel.plantilla')

@section('cuerpo_panel')
    
	<?php
		$planes = json_encode($planes);
	?>

    <nav class="d-flex justify-content-between align-items-center">
        <h2>Pacientes</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
                <a class="nav-link btn btn-primary" href="{{ route('paciente.index') }}" tabindex="-1" aria-disabled="true">Volver</a>
            </li>
        </ul>
    </nav>
    
    <section>

        @if ( session('mensaje') )
            <div class="alert alert-success">{{ session('mensaje') }}</div>
        @endif

        <form method="POST" action="{{ route('paciente.store') }}" class="formulario">
            @csrf

            <!-- REQUERIMIENTO DEL FORMULARIO -->
            @error('nombre')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    El nombre es requerido
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror 
            
            @if ($errors->has('apellido'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  El Apellido es requerida
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif

            @if ($errors->has('dni'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  El número de documento es requerido
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif

            @if ($errors->has('email'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  El email es requerido
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif

            @if ($errors->has('telefono'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  El número de teléfono es requrido
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif

            @if ($errors->has('nro_afiliado'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  El número de afiliado es requrido
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif

            <!-- CARGA DEL NOMBRE/DESCRIPCIÓN/TELÉFONO -->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nombre">
                        <h6>Nombre</h6>
                    </label>
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="apellido">
                        <h6>Apellido</h6>
                    </label>
                    <input type="text" class="form-control" name="apellido" value="{{ old('apellido') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="dni">
                        <h6>DNI</h6>
                    </label>
                    <input type="number" class="form-control" name="dni" value="{{ old('dni') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="direccion">
                        <h6>Dirección</h6>
                    </label>
                    <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">
                        <h6>email</h6>
                    </label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="edad">
                        <h6>Edad</h6>
                    </label>
                    <input type="number" class="form-control" name="edad" value="{{ old('edad') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="telefono">
                        <h6>Teléfono</h6>
                    </label>
                    <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="codigo_postal">
                        <h6>Código postal</h6>
                    </label>
                    <input type="number" class="form-control" name="codigo_postal" value="{{ old('codigo_postal') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="fecha_nacimiento">
                        <h6>Fecha de nacimiento</h6>
                    </label>
                    <input type="date" class="form-control" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nro_afiliado">
                        <h6>Número de afiliado</h6>
                    </label>
                    <input type="number" class="form-control" name="nro_afiliado" value="{{ old('nro_afiliado') }}">
                </div>
            	<div class="form-group col-md-4">
                    <label for="obra_social">
                        <h6>Obra social</h6>
                    </label>
                    <select name="obra_social" class="form-control" id="obra_social">
                        <option value="">Seleccionar Obra social</option>
                        @foreach ( $obraSociales as $obraSocial )
                            <option value="{{ $obraSocial->id }}" >{{ $obraSocial->nombre }}</option>
                        @endforeach 
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="Plan">
                        <h6>Plan</h6>
                    </label>
                    <select name="plan" class="form-control" id="plan">
                        <option value="">Seleccionar Plan</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="observacion">
                        <h6>Observación</h6>
                    </label>
                    <textarea class="form-control" name="observacion" value="{{ old('observacion') }}"></textarea>
                </div>
            </div>

            <!-- ESTADO DEL REGISTRO -->
            <div class="form-group">
                <div class="form-row">
                    <div class="col-sm-12">
                        <h6>Estado de configuración de registro</h6>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" checked>
                            <label class="form-check-label" for="estado1">
                              Habilitar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" id="estado2" value="0">
                            <label class="form-check-label" for="estado2">
                              Deshabilitar
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PROCESAR CARGA -->
            <button type="submit" class="btn btn-primary">AGREGAR</button>
        </form>
    </section>    

    <script type="text/javascript">
    	
    	const $id = document.getElementById.bind(document);

    	$planes = '<?php echo $planes; ?>';
    	$planes = JSON.parse($planes);

    	$id('obra_social').addEventListener('change', function() {

			$id('plan').innerHTML = '';
    		$planes.forEach( (_planes) => {

				if (this.value == _planes.obra_social_id ) 
				{
					let _option 			= document.createElement('option');
						_option.value 		= _planes.id;
						_option.innerText 	= _planes.nombre;
					
					$id('plan').appendChild(_option);
				}

    		});

    	}, false);


    </script>
@endsection