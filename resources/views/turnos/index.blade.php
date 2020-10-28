@extends('panel.plantilla')

@section('cuerpo_panel')   
    
    <nav class="d-flex justify-content-between align-items-center">
        <h2>Turnos</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
            <a class="nav-link btn btn-primary" href="{{ route('turnos.create') }}" tabindex="-1" aria-disabled="true">Sacar un nuevo turno</a>
            </li>
        </ul>
    </nav>

    <section>
        
    </section>
    <div class="container">
        <h1>Listado de los turnos de la semana</h1>
  
        <form >
  
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Name" required="">
            </div>
  
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>
   
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="Email" required="">
            </div>
   
            <div class="form-group">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
  
        </form>
    </div>
  
    <script type="text/javascript">
       
     //    $.ajaxSetup({
     //        headers: {
     //            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     //        }
     //    });
       
     //    $(".btn-submit").click(function(e){
      
     //        e.preventDefault();
       
     //        var name = $("input[name=name]").val();
     //        var password = $("input[name=password]").val();
     //        var email = $("input[name=email]").val();
       
     //        $.ajax({
     //           type:'POST',
     //           url:"{{ route('ajaxRequest.post') }}",
     //           data:{name:name, password:password, email:email},
     //           success:function(data)
     //           {
     //              alert(data.success);
     //           }
     //        });
      
    	// });
    </script>
   
 @endsection