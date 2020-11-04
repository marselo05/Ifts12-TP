@extends('panel.plantilla')

@section('cuerpo_panel')   
    
    <nav class="d-flex justify-content-between align-items-center">
        <h2>Turnos</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
            <a class="nav-link btn btn-primary" href="{{ route('turnos.index') }}" tabindex="-1" aria-disabled="true">Volver</a>
            </li>
        </ul>
    </nav>

    <section>
        
        <?php 
            $pacientes              = json_encode($pacientes);
            $diasEspecialidades     = json_encode($diasEspecialidades);
            $turnosReservados       = json_encode($turnos);
            print_r('<pre>');
                print_r($diasEspecialidades);
            print_r('</pre>');
        ?>
        
        <div class="container">
            <h6>Paso 1 - vaerificar usuario</h6>
            {{-- CONSULTO POR EL PACIENTE --}}
            <form id="paciente-consultar_dni">
                <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert-dni-paciente">
                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <label>Ingrese el número de DNI del paciente: </label>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="number" name="buscar_paciente" id="buscar_paciente" class="form-control" placeholder="DNI" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="submit" name="consultar" value="Consultar" class="btn btn-primary">
                    </div>
                </div>    
            </form>

            <div>
                <span>Tipo de paciente: </span>
                <span id="paciente-particular"></span>
            </div>
            {{--  --}}
            <h6>Paso - </h6>
            <form >              
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Apellido:</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apelldio" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label>DNI:</label>
                        <input type="number" name="dni" id="dni" class="form-control" placeholder="D.N.I" required="">
                    </div>
                </div>
       
                <div class="form-group">
                    <button class="btn btn-success btn-submit">Submit</button>
                </div>
      
            </form>

            {{-- CONSULTO POR LA ESPECIALDAD --}}
            <h6>Paso 2 - Buscar especialidad</h6>
            <form id="form-espeacialidad">
                <label>Consultar Especialidad: </label>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <select class="custom-select" id="form-espeacialidad__consultar">
                            <option selected>Seleccionar especialidad</option>
                            @foreach ($especialidades as $especialidad)

                                <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>

                            @endforeach
                        </select>
                    </div>  
                    <div class="form-group col-md-4">
                        <input type="submit" name="consultar" value="Buscar" class="btn btn-primary">
                    </div>
                </div>
            </form>

            <h6>Calendario</h6>
            <div id="calendario" style="max-width: 1100px; margin: 0 auto;"></div>
            

        </div>

    </section>    
  
    <script type="text/javascript">
       
        $('#alert-dni-paciente').hide();

        const   $id = document.getElementById.bind(document);

        let $pacientes = '<?php echo $pacientes; ?>';
            $pacientes = JSON.parse($pacientes);

        $id('paciente-consultar_dni').addEventListener('submit', function(a) {
            a.preventDefault();

            // consulto si el campo esta vacio
            if ( $id('buscar_paciente').value == '' ) 
            {
                $('#alert-dni-paciente').show();
            }
            else
            {

                $id('nombre').value     = '';
                $id('apellido').value   = '';
                $id('dni').value        = '';

                $flag = 0;
                $pacientes.forEach( (paciente) => {

                    if ( $id('buscar_paciente').value == paciente.dni ) 
                    {
                        $flag = 1;
                        $id('nombre').value     = paciente.nombre;
                        $id('apellido').value   = paciente.apellido;
                        $id('dni').value        = paciente.dni;

                        // if ( paciente.nro_afiliado == '' || paciente.nro_afiliado == '0000')
                        //     $id('paciente-particular').innerHTML = "Es particular";
                    }

                });
                // valido tipo de usuario
                if ($flag == 0) 
                    $id('paciente-particular').innerHTML = "Paciente Particular";
                else
                    $id('paciente-particular').innerHTML = "Paciente Socio";
            }


        }, false);

        let $diasEspecialidades = '<?php echo $diasEspecialidades;?>';
            $diasEspecialidades = JSON.parse($diasEspecialidades);

            console.log($diasEspecialidades);


        let $turnosReservados = '<?php echo $turnosReservados; ?>';
            $turnosReservados = JSON.parse($turnosReservados);


            /***
            **** CONTRUYENDO OBJETO CALENDARIO ESPECIALISTA DIAS Y HORAS
            ***/
            // casteo las horas
                // parseInt( $diasEspecialidades[0].startTime.replace(':','') );
                // parseInt( $diasEspecialidades[0].endTime.replace(':','') );

                // $cantidadDeTurnos
                $turnoCalendario = [];
                // Estructura objeto
                // _pv = $diasEspecialidades[0].startTime.substr(2,3).replace(':','');
                // Lunes
                    _sw0        = 0;
                    if (typeof $diasEspecialidades[0] != 'undefined') 
                    {
                        _startTime0 = parseInt($diasEspecialidades[0].startTime.substr(0,2));
                        _endTime0   = parseInt($diasEspecialidades[0].startTime.substr(0,2));
                    }
                // Martes 
                    _sw1        = 0;
                    if (typeof $diasEspecialidades[1] != 'undefined') 
                    {
                        _startTime1 = parseInt($diasEspecialidades[1].startTime.substr(0,2));
                        _endTime1   = parseInt($diasEspecialidades[1].startTime.substr(0,2));
                    }
                // Miercoles
                    _sw2 = 0;
                    if (typeof $diasEspecialidades[2] != 'undefined') 
                    {
                        _startTime2 = parseInt($diasEspecialidades[2].startTime.substr(0,2));
                        _endTime2   = parseInt($diasEspecialidades[2].startTime.substr(0,2));    
                    }
                // Jueves
                    _sw3 = 0;
                    if (typeof $diasEspecialidades[3] != 'undefined') 
                    {
                        _startTime3 = parseInt($diasEspecialidades[3].startTime.substr(0,2));
                        _endTime3   = parseInt($diasEspecialidades[3].startTime.substr(0,2));                        
                    }
                // Viernes
                    _sw4 = 0;
                    if (typeof $diasEspecialidades[4] != 'undefined') 
                    {
                        _startTime4 = parseInt($diasEspecialidades[4].startTime.substr(0,2));
                        _endTime4   = parseInt($diasEspecialidades[4].startTime.substr(0,2));
                    }
                // Sabado
                    _sw5 = 0;
                    if (typeof $diasEspecialidades[5] != 'undefined') 
                    {
                        _startTime5 = parseInt($diasEspecialidades[5].startTime.substr(0,2));
                        _endTime5   = parseInt($diasEspecialidades[5].startTime.substr(0,2));
                    }
                // Domingo
                    _sw6 = 0;
                    if (typeof $diasEspecialidades[6] != 'undefined') 
                    {
                        _startTime6 = parseInt($diasEspecialidades[6].startTime.substr(0,2));
                        _endTime6   = parseInt($diasEspecialidades[6].startTime.substr(0,2));
                    }

                // Guardo la cantidad de turnos que hay por dia
                    $diasEstudios           = [];
                    $cantidasDeTurnosPorDia = []; 
                    for (var i=0; i<$diasEspecialidades.length; i++) 
                    {
                        // calculo las cantiadades de turnos
                            $cantidadDeTurnosDos = Math.round(( parseInt( $diasEspecialidades[i].endTime.replace(':','') ) - parseInt( $diasEspecialidades[i].startTime.replace(':','') ) ) / 50 );
                        
                        // Guardo los dias que contienen especialidad
                            $diasEstudios.push( $diasEspecialidades[i].daysOfWeek );

                        // Guardo Cantidad de turnos por dia
                            $cantidasDeTurnosPorDia.push( $cantidadDeTurnosDos );
                    }

                // Sete los turnos del especialista en el dia que corresponda
                    $semana = ["1","2","3","4","5","6","7"];
                    $horarioTurnos = [];
                    $sw = 0;
                    // dias de la semana
                    for (var $i=0; $i<$diasEstudios.length; $i++) 
                    {
                        console.log(
                            'A:.Dia de semana estudio: ' + $diasEstudios[$i] + 
                            ' Cantidad de turnos: '+ $cantidasDeTurnosPorDia[$i] 
                        );
                        // si la primera vuelta arranca con cero '00'
                        if ( $diasEspecialidades[$i].startTime.substr(2,3).replace(':','') == '00')
                        {
                            // Cantidad de vueltas para formar la hora
                            for (var $ii=0; $ii<$cantidasDeTurnosPorDia[$i]; $ii++) 
                            {
                                
                                if ( $sw == 0 ) 
                                {
                                    $startTime = parseInt($diasEspecialidades[$i].startTime.substr(0,2));
                                    // 
                                    $horarioTurnos.push({
                                        daysOfWeek: $diasEstudios[$i],
                                        startTime: $diasEspecialidades[$i].startTime,
                                        endTime: $startTime +':30',
                                        color: 'green',
                                        extendedProps: {
                                            estado: false
                                        }
                                    });
                                    //console.log('Sw=0: Start: ' + $startTime+':00 ' + 'End: '+ $startTime +':30' )

                                    $sw=1;
                                }
                                else 
                                {
                                    if ( $ii%2 == 0 ) 
                                    {
                                        $horarioTurnos.push({
                                            daysOfWeek: $diasEstudios[$i],
                                            startTime: $startTime +':00',
                                            endTime: $startTime +':30',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        });
                                    }
                                    else
                                    {
                                        $horarioTurnos.push({
                                            daysOfWeek: $diasEstudios[$i],
                                            startTime: $startTime+':30',
                                            endTime: ($startTime  = $startTime + 1) +':00',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        });
                                    }
                                }
                            }
                            // reseteo variables
                                $sw=0;
                                $startTime  = 0;
                        }
                        else
                        {
                            // Cantidad de vueltas para formar la hora
                            for (var $ii=0; $ii<$cantidasDeTurnosPorDia[$i]; $ii++) 
                            {     
                                if ( $sw == 0 ) 
                                {
                                    $startTime = parseInt($diasEspecialidades[$i].startTime.substr(0,2));
                                    
                                    $horarioTurnos.push({
                                        daysOfWeek: $diasEstudios[$i],
                                        startTime: $diasEspecialidades[$i].startTime,
                                        endTime: $startTime +':30',
                                        color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                    });

                                    $sw=1;
                                }
                                else 
                                {
                                    if ( $ii%2 == 0 ) 
                                    {
                                       $horarioTurnos.push({
                                            daysOfWeek: $diasEstudios[$i],
                                            startTime: $startTime +':00',
                                            endTime: $startTime +':30',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        });
                                    }
                                    else
                                    {
                                        $horarioTurnos.push({
                                            daysOfWeek: $diasEstudios[$i],
                                            startTime: $startTime+':30',
                                            endTime: ($startTime  = $startTime + 1) +':00',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        });
                                    }
                                }
                            }
                            // reseteo variables
                                $sw=0;
                                $startTime  = 0;
                        }
                    }  
                    


                //
                for (var i=0; i<$diasEspecialidades.length; i++) // 8
                {
                    $cantidadDeTurnos = parseInt( $diasEspecialidades[i].endTime.replace(':','') ) - parseInt( $diasEspecialidades[i].startTime.replace(':','') );
                    // cantidades
                        $cantidadDeTurnos = Math.round($cantidadDeTurnos / 50);
                    // console.log( $cantidadDeTurnos +' - '+ i )

                    for (var ii=0; ii<$cantidadDeTurnos; ii++) 
                    {
                        // si la primera vuelta arranca con cero '00'
                        if ( $diasEspecialidades[i].startTime.substr(2,3).replace(':','') == '00')
                        {
                            // Lunes
                            if ($diasEspecialidades[i].daysOfWeek == '0') 
                            {
                                if (_sw0 == 0) 
                                {
                                    $turnoCalendario.push({
                                        daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                        startTime: _startTime0 +':00',
                                        endTime: _startTime0 +':30',
                                        color: 'green',
                                        extendedProps: {
                                            estado: false
                                        }
                                    },);
                                    _sw0 = 1;
                                }
                                else
                                {
                                    if ( ii%2 == 0 ) 
                                    {
                                        _startTime0  = _startTime0 + 1;
                                        $turnoCalendario.push({
                                            daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                            startTime: _startTime0 +':00',
                                            endTime: _startTime0 +':30',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        },);
                                    }
                                    else
                                    {
                                        _endTime0    = _endTime0 + 1;
                                        $turnoCalendario.push({
                                            daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                            startTime: _startTime0 +':30',
                                            endTime: _endTime0 +':00',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        },);
                                    }
                                }
                            }
                            // Martes
                            if ($diasEspecialidades[i].daysOfWeek == '1') 
                            {
                                if (_sw1 == 0) 
                                {
                                    $turnoCalendario.push({
                                        daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                        startTime: _startTime1 +':00',
                                        endTime: _startTime1 +':30',
                                        color: 'green',
                                        extendedProps: {
                                            estado: false
                                        }
                                    },);
                                    _sw1 = 1;
                                }
                                else
                                {
                                    if ( ii%2 == 0 ) 
                                    {
                                        _startTime1  = _startTime1 + 1;
                                        $turnoCalendario.push({
                                            daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                            startTime: _startTime1 +':00',
                                            endTime: _startTime1 +':30',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        },);
                                    }
                                    else
                                    {
                                        _endTime1    = _endTime1 + 1;
                                        $turnoCalendario.push({
                                            daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                            startTime: _startTime1 +':30',
                                            endTime: _endTime1 +':00',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        },);
                                    }
                                }
                            }
                            // Miercoles
                            if ($diasEspecialidades[i].daysOfWeek == '2') 
                            {
                                if (_sw2 == 0) 
                                {
                                    $turnoCalendario.push({
                                        daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                        startTime: _startTime2 +':00',
                                        endTime: _startTime2 +':30',
                                        color: 'green',
                                        extendedProps: {
                                            estado: false
                                        }
                                    },);

                                    _sw2 = 1;
                                }
                                else
                                {
                                    
                                    if ( ii%2 == 0 ) 
                                    {
                                        
                                        _startTime2  = _startTime2 + 1;
                                        $turnoCalendario.push({
                                            daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                            startTime: _startTime2 +':00',
                                            endTime: _startTime2 +':30',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        },);
                                        
                                    }
                                    else
                                    {
                                        _endTime2    = _endTime2 + 1;
                                        $turnoCalendario.push({
                                            daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                            startTime: _startTime2 +':30',
                                            endTime: _endTime2 +':00',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        },);
                                    }
                                }
                            }
                            // Jueves
                            if ($diasEspecialidades[i].daysOfWeek == '3') 
                            {
                                if (_sw3 == 0) 
                                {
                                    $turnoCalendario.push({
                                        daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                        startTime: _startTime3 +':00',
                                        endTime: _startTime3 +':30',
                                        color: 'green',
                                        extendedProps: {
                                            estado: true
                                        }
                                    },);

                                    _sw3 = 1;
                                }
                                else
                                {
                                    if ( ii%2 == 0 ) 
                                    {
                                        _startTime3  = _startTime3 + 1;
                                        $turnoCalendario.push({
                                            daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                            startTime: _startTime3 +':00',
                                            endTime: _startTime3 +':30',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        },);   
                                    }
                                    else
                                    {
                                        _endTime3    = _endTime3 + 1;
                                        $turnoCalendario.push({
                                            daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                            startTime: _startTime3 +':30',
                                            endTime: _endTime3 +':00',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        },);
                                    }
                                }
                            }
                            // Viernes
                            if ($diasEspecialidades[i].daysOfWeek == '4') 
                            {

                                if (_sw4 == 0) 
                                {
                                    //console.log('SW4 par:. '+_startTime5 +' .Impar:. '+ _endTime5);
                                    $turnoCalendario.push({
                                        daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                        startTime: _startTime4 +':00',
                                        endTime: _startTime4 +':30',
                                        color: 'green',
                                        extendedProps: {
                                            estado: true
                                        }
                                    },);

                                    _sw4 = 1;
                                }
                                else
                                {
                                    if ( ii%2 == 0 ) 
                                    {
                                        _startTime4  = _startTime4 + 1;
                                        $turnoCalendario.push({
                                            daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                            startTime: _startTime4 +':00',
                                            endTime: _startTime4 +':30',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        },);
                                    }
                                    else
                                    {
                                        _endTime4    = _endTime4 + 1;
                                        $turnoCalendario.push({
                                            daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                            startTime: _startTime4 +':30',
                                            endTime: _endTime4 +':00',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        },);
                                    }
                                }
                            }
                            // Sabado
                            if ($diasEspecialidades[i].daysOfWeek == '5') 
                            {
                                if (_sw5 == 0) 
                                {
                                    $turnoCalendario.push({
                                        daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                        startTime: _startTime5 +':00',
                                        endTime: _startTime5 +':30',
                                        color: 'green',
                                        extendedProps: {
                                            estado: true
                                        }
                                    },);

                                    _sw5 = 1;
                                }
                                else
                                {
                                    if ( ii%2 == 0 ) 
                                    {
                                        _startTime5  = _startTime5 + 1;
                                        $turnoCalendario.push({
                                            daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                            startTime: _startTime5 +':00',
                                            endTime: _startTime5 +':30',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        },);   
                                    }
                                    else
                                    {
                                        _endTime5    = _endTime5 + 1;
                                        $turnoCalendario.push({
                                            daysOfWeek: $diasEspecialidades[i].daysOfWeek,
                                            startTime: _startTime5 +':30',
                                            endTime: _endTime5 +':00',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false
                                            }
                                        },);
                                    }
                                }
                            }
                            // Domingo
                            if ($diasEspecialidades[i].daysOfWeek == '6') 
                            {
                                if (typeof $diasEspecialidades[6] != 'undefined') 
                                {
                                    console.log('entro')
                                }    
                            }    
                        }
                        else
                        {
                            // console.log('comienza con 30');
                        }
                    }
                } // Fin Dias Especialidades


                function contruyeObjetoDiasEspecialidades (_i, _daysOfWeek, _start, _end) 
                {
                    console.log(' .Swf:. '+ _i);
                    if (_sw == 0) 
                    {
                        // console.log('par:. '+_start +' .Impar:. '+ _end);
                        $turnoCalendario.push({
                            daysOfWeek: _daysOfWeek,
                            start: '2010-01-01',
                            startTime: _start +':00',
                            endTime: _start +':30',
                            color: 'green',
                            extendedProps: {
                                estado: false
                            }
                        },);

                        _sw = 1;
                    }
                    else
                    {
                        console.log('parrr:. '+_start +' .Imparrr:. '+ _end);
                        if ( ii%2 == 0 ) 
                        {
                            _start  = _start + 1;
                            $turnoCalendario.push({
                                daysOfWeek: _daysOfWeek,
                                start: '2010-01-01',
                                startTime: _start +':00',
                                endTime: _start +':30',
                                color: 'green',
                                extendedProps: {
                                    estado: false
                                }
                            },);
                            console.log(_start)
                        }
                        else
                        {
                            _end    = _end + 1;
                            $turnoCalendario.push({
                                daysOfWeek: _daysOfWeek,
                                start: '2010-01-01',
                                startTime: _start +':30',
                                endTime: _end +':00',
                                color: 'green',
                                extendedProps: {
                                    estado: false
                                }
                            },);
                        }
                    }
                }
                /* SETEO EL OBJETO TURNOS CALENDARIO*/
                
                $turnoCalendarioDisponibles = [];
                for (var i = 0; i < $horarioTurnos.length; i++) 
                {
                    // 
                    for (var ii = 0; ii < $turnosReservados.length; ii++) 
                    {
                        // validamos el dia sea igual
                        if ($horarioTurnos[i].daysOfWeek == $turnosReservados[ii].daysOfWeek) 
                        {
                           // parseInt( $diasEspecialidades[i].endTime.replace(':','') )
                            // validamos que la de inicio y la hora fin sean las mismas
                            if ( 
                                parseInt( $horarioTurnos[i].startTime.replace(':','') ) == 
                                parseInt( $turnosReservados[ii].startTime.replace(':','') ) && 
                                parseInt( $horarioTurnos[i].endTime.replace(':','') ) == 
                                parseInt( $turnosReservados[ii].endTime.replace(':','') ) )
                            {
                                // console.log('tr:. '+$turnosReservados[ii])
                                $horarioTurnos[i].start                   = $turnosReservados[ii].start;
                                $horarioTurnos[i].extendedProps.estado    = true;
                                $horarioTurnos[i].color                   = 'blue';
                            }
                            else
                            {
                                // console.log('trN:. '+$turnosReservados[ii])
                            }
                        }
                    }
                }

                // console.log($turnoCalendario)

            // calculo

        /**
            **** CALENARIO *********
        ***/ 
        _dias_especialidades = [
            {
                daysOfWeek: [ '1' ],
                startTime: '10:45:00',
                endTime: '12:45:00',
                color: 'red'
            },
            {
                daysOfWeek: [ '2' ],
                startTime: '10:45:00',
                endTime: '12:45:00',
                color: 'red'
            },
            {
                daysOfWeek: [ '3' ],
                startTime: '10:45:00',
                endTime: '12:45:00',
                color: 'red'
            },
            {
                daysOfWeek: [ '4' ],
                startTime: '10:45:00',
                endTime: '12:45:00',
                color: 'red'
            },
            {
                daysOfWeek: [ '5' ],
                startTime: '10:45:00',
                endTime: '12:45:00',
                color: 'red'
            }
        ];

        document.addEventListener('DOMContentLoaded', function() 
        {
            var calendarEl = document.getElementById('calendario');
            var $fechaHoy = '<?php echo $fechaHoy;?>';
            // locale: 'es',

            var calendar = new FullCalendar.Calendar(calendarEl, 
            {
                locale: 'es',
                // initialDate: '2020-11-02',
                initialDate: $fechaHoy,
                initialView: 'timeGridWeek',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                businessHours: {
                    daysOfWeek: [ 0, 1, 2, 3, 4, 5, 6], // Monday - Thursday
                    startTime: '08:00', // a start time (10am in this example)
                    endTime: '20:00', // an end time (6pm in this example)
                },
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                selectable: true,
                selectMirror: true,
                nowIndicator: true,
                events: $horarioTurnos
                    // [
                    //     {
                    //       title: 'All Day Event',
                    //       start: '2020-09-01',
                    //     },
                    //     {
                    //       title: 'Long Event',
                    //       start: '2020-09-07',
                    //       end: '2020-09-10'
                    //     },
                    //     {
                    //       groupId: 999,
                    //       title: 'Repeating Event',
                    //       start: '2020-09-09T16:00:00'
                    //     },
                    //     {
                    //       groupId: 999,
                    //       title: 'Repeating Event',
                    //       start: '2020-09-16T16:00:00'
                    //     },
                    //     {
                    //       title: 'Conference',
                    //       start: '2020-09-11',
                    //       end: '2020-09-13'
                    //     },
                    //     {
                    //       title: 'Meeting',
                    //       start: '2020-09-12T10:30:00',
                    //       end: '2020-09-12T12:30:00'
                    //     },
                    //     {
                    //       title: 'Lunch',
                    //       start: '2020-09-12T12:00:00'
                    //     },
                    //     {
                    //       title: 'Meeting',
                    //       start: '2020-09-12T14:30:00'
                    //     },
                    //     {
                    //       title: 'Happy Hour',
                    //       start: '2020-09-12T17:30:00'
                    //     },
                    //     {
                    //       title: 'Dinner',
                    //       start: '2020-09-12T20:00:00'
                    //     },
                    //     {
                    //       title: 'Birthday Party',
                    //       start: '2020-09-13T07:00:00'
                    //     },
                    //     {
                    //       title: 'Click for Google',
                    //       url: 'http://google.com/',
                    //       start: '2020-09-28'
                    //     },
                    // ]
                ,
                eventClick: function(info) { 
                    v = info               
                    console.log('Event: ' + info.event)
                },
            });
            calendar.render();
        });
    </script>
   
 @endsection