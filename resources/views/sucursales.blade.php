<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clínicas - IFTS 12</title>

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
		            <h3 class="masthead-brand">Clínicas - IFTS 12</h3>
		            <nav class="nav nav-masthead justify-content-center">
		                {{-- <a class="nav-link active" href="#">Home</a> --}}
		                <a class="nav-link" href="{{ route('sucursales') }}">Sucursales</a>
		                <a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a>
		                <a class="nav-link" href="{{ route('contactenos') }}">Contactenos</a>
		            </nav>
		        </div>
		    </header>		
		</div>
	</div>

    <header style="display: none;">
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<a class="navbar-brand" href="#">Carousel</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			  	<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
					  	<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
					  	<a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item">
					  	<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
					</li>
				</ul>
				<form class="form-inline mt-2 mt-md-0">
					<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</nav>
	</header>

	<main role="main" class="main">

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
			  	<div class="carousel-item active">
			    	<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
			    	<div class="container">
			      		<div class="carousel-caption text-left">
			        		<h1>Example headline.</h1>
			        		<p>
			        			Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
			        		</p>
			        		<p>
			        			<a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a>
			        		</p>
			      		</div>
			    	</div>
			  	</div>
			  	<div class="carousel-item">
				    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
				    <div class="container">
				      	<div class="carousel-caption">
				        	<h1>Another example headline.</h1>
				        	<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				        	<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
				      	</div>
				    </div>
			  	</div>
			  	<div class="carousel-item">
				    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
				    <div class="container">
				      	<div class="carousel-caption text-right">
				        	<h1>One more for good measure.</h1>
				        	<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				        	<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
				      	</div>
				    </div>
			  	</div>
			</div>
			<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
			  	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			  	<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
		  		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		  		<span class="sr-only">Next</span>
			</a>
		</div>

	  	<!-- Marketing messaging and featurettes
	  	================================================== -->
	  	<!-- Wrap the rest of the page in another container to center all the content. -->

	  	<div class="container marketing">

		    <!-- Three columns of text below the carousel -->
		    <div class="row">
		      	<div class="col-lg-4">
		        	<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
		        	<h2>Heading</h2>
		        	<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
		        	<p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
		      	</div><!-- /.col-lg-4 -->
		      	<div class="col-lg-4">
		        	<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
			        <h2>Heading</h2>
			        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
			        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
		      	</div><!-- /.col-lg-4 -->
		      	<div class="col-lg-4">
			        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
			        <h2>Heading</h2>
			        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
		      	</div><!-- /.col-lg-4 -->
		    </div><!-- /.row -->

		    <!-- START THE FEATURETTES -->

		    <hr class="featurette-divider">

		    <div class="row featurette">
		      	<div class="col-md-7">
		        	<h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
		        	<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
		      	</div>
		      	<div class="col-md-5">
			        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
			  	</div>
		    </div>

		    <hr class="featurette-divider">

		    <div class="row featurette">
		      	<div class="col-md-7 order-md-2">
		        	<h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
		        	<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
		      	</div>
		      	<div class="col-md-5 order-md-1">
		        	<svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
		      	</div>
		    </div>

		    <hr class="featurette-divider">

		    <div class="row featurette">
		      	<div class="col-md-7">
		        	<h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
		        	<p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
		      	</div>
		      	<div class="col-md-5">
		        	<svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
		      	</div>
			</div>

		    <hr class="featurette-divider">

		    <!-- /END THE FEATURETTES -->

	  	</div><!-- /.container -->

	  	<!-- FOOTER -->
	  	<footer class="container">
	    	<p class="float-right"><a href="#">Back to top</a></p>
	    	<p>Todos los de rechos resevados <a href="#">IFTS 12</a>, by <a href="#">@mdo</a>.</p>
	  	</footer>

	</main>
	
	<script src="{{ asset('js/front/jquery-3.5.1.slim.min.js') }}" ></script>
  	<script>
  		// window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')
  	</script>
  	<script src="{{ asset('js/front/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
