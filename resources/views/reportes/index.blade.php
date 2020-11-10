@extends('panel.plantilla')

@section('cuerpo_panel')   
    
    <nav class="d-flex justify-content-between align-items-center">
        <h2>Reportes</h2>
        
    </nav>

    <section>
    	<div style="width: 400px;">
    		<canvas id="myChart" width="400px" height="400px"></canvas>
    	</div>
    	<h6>Cantidad de turnos por especialidad en el año 2020</h6>
    
    </section>
    <?php
    	
    	$turnos 				= json_encode( $turnos );
    	
    ?>
	<script type="text/javascript">

		$turnosReservados   = '<?php echo $turnos; ?>';
		$turno 			    = JSON.parse($turnosReservados);



		$turnosPorEspecialidaNombre = [];
		$turnosPorEspecialida = [];

		for (var $i=0; $i<$turno.length; $i++) 
		{
			$turnosPorEspecialidaNombre.push($turno[$i].especialidad_nombre);
			$turnosPorEspecialida.push($turno[$i].cantidad);
		}

		ctx = document.getElementById('myChart');
		 myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: $turnosPorEspecialidaNombre,
		        datasets: [{
		            label: '# cantiadad de turnos',
		            data: $turnosPorEspecialida,
		            backgroundColor: [
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)',
		                'rgba(255, 159, 64, 0.2)'
		            ],
		            borderColor: [
		                'rgba(255, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero: true
		                }
		            }]
		        }
		    }
		});
	</script>
   
 @endsection