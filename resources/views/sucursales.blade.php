<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DecandiaSoft</title>

    <!-- Bootstrap core CSS -->
	<link href="{{ asset('css/front/bootstrap.min.css') }}" rel="stylesheet" >

	<!-- Custom styles for this template -->
    <link href="{{ asset('css/front/carousel.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/front/cover.css') }}">

	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
			  font-size: 3.5rem;
			}
		}

		@media (min-width: 48em){
			.masthead-brand {
			    float: left;
			}
		}

		@media (min-width: 48em){
			.nav-masthead {
			    float: right;
			}	
		}

		.inner	{
			color: #fff;
		    text-shadow: 0 0.05rem 0.1rem rgba(0, 0, 0, .5);
		    box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5)
		}
		.masthead-brand {
			margin-bottom: 0;
		}

		.nav-masthead .nav-link {
		    padding: .25rem 0;
		    font-weight: 700;
		    color: rgba(255, 255, 255, .5);
		    background-color: transparent;
		    border-bottom: .25rem solid transparent;
		}

		.main {
			width: 100%;
		}
	</style>
    
</head>
<body>

	<div style="position: absolute; top: 0; left: 0; width: 100%; z-index: 10">
		<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" style="    max-width: 42em;
	    position: relative;">
					
		    <header class="masthead mb-auto">
                <div class="inner">
                    <a href="{{ route('home') }}">
                        <h3 class="masthead-brand">Curar S.A</h3>
                    </a>
                    <nav class="nav nav-masthead justify-content-center">
                        {{-- <a class="nav-link active" href="#">Home</a> --}}
                        <a class="nav-link" href="{{ route('sucursales') }}">Sucursales</a>
                        <a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a>
                    </nav>
                </div>
            </header>
		</div>
	</div>

	<main role="main" class="main">

		<div  class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
			  	<div class="carousel-item active">
			    	<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#BDBDBD"/></svg>
			    	<div class="container">
			      		<div class="carousel-caption text-left">
			        		<h1>Nuestros pacientes dan cuenta de nuestro trabajo.</h1>
			        		<p>
			        			Agradecemos al personal médico que brinda una excelente atención y 
			        			siempre con la mejor predisposición, para con nuestros pacientes haciendo de nuestro clínica un lugar agradable y confiable para su atención.
			        		</p>
			        		<p>
			        			<a class="btn btn-lg " href="#" role="button">Conózcalos</a>
			        		</p>
			      		</div>
			    	</div>
			  	</div>
			</div>
		</div>

	  	<!-- Marketing messaging and featurettes
	  	================================================== -->
	  	<!-- Wrap the rest of the page in another container to center all the content. -->

	  	<div class="container marketing">

		    <!-- Three columns of text below the carousel -->
		    <div class="row">
		      	<div class="col-lg-4">
		      		<img src="images/persona_1.png" class="bd-placeholder-img rounded-circle" width="140" height="140">
		        	<h2>Mario Gonzales</h2>
		        	<p>
		        		Quiero expresar mi agradecimiento hacia los profesionales del Centro de Salud, tanto a médicos como a enfermeras y personal administrativo, por su buen trato, profesionalidad y total disposición con mi madre.
		        	</p>
		      	</div>
		      	<div class="col-lg-4">
		        	<img src="images/persona_3.png" class="bd-placeholder-img rounded-circle" width="140" height="140">
			        <h2>Renata Biglieri</h2>
			        <p>
			        	Quiero agradecer la labor y el buen hacer de todo el personal de la planta de Cirugía General en el Hospital, que han contribuido a la recuperación de mi estado de salud durante mi estadía. 
			        	Gracias.
		        	</p>
		      	</div>
		      	<div class="col-lg-4">
			        <img src="images/persona_2.png" class="bd-placeholder-img rounded-circle" width="140" height="140">
			        <h2>Roberto Solari</h2>
			        <p>
						Clinica de excelencia, con profesionales ampliamente calificados.
						Salas de atención también en buen estado de conservación. Realmente un placer haber conocido a estos especialistas, que hace de su vocación una profesión de excelencia y calidez humana.
			        </p>
			        {{-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> --}}
		      	</div><!-- /.col-lg-4 -->
		    </div><!-- /.row -->

		    <!-- START THE FEATURETTES -->

		    <hr class="featurette-divider">


	  	</div><!-- /.container -->

	  	<!-- FOOTER -->
	  	<footer class="container">
	    	<p class="float-right"> </p>
	    	<p>Todos los derechos reservados <a href="#">DecandiaSoft</a>, by <a href="#">IFTS@Grupo5</a>.</p>
	  	</footer>

	</main>
	
	
  	<script>
  		// window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')
  	</script>
  	<script src="{{ asset('js/front/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
