@extends('layouts.general')

@section('content')
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">Usted está aquí:</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item">Dashboard</li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Lista de usuarios</li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item active">
                                    <a href="#">Editar usuario <i>  {{$user->name}} {{$user->apellido}}}</i> </a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if(Auth::user()->hasRole('admin'))
<div class="main-content">
    <div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="col-lg-12">
                <div class="card">
                    <div class="card-header btn_2">Editar usuario     <img class="rounded-circle mx-auto d-block" src="/avatars/{{$user->foto}}" alt="Card image cap" style="width: 100px; height: 100px;"> <i>  {{$user->name}} {{$user->apellido}}</i></div>
                    <div class="card-body card-block">
                        <form action="/usuarios/{{$user->id}}" method="POST" enctype="multipart/form-data" id="registro">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                Nombre
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                Apellido
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="apellido" name="apellido" value="{{$user->apellido}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                Foto
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="file" id="avatar" name="avatar" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                Email
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                Edad
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="edad" name="edad" value="{{$user->edad}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                Dirección
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="direccion" name="direccion" value="{{$user->direccion}}" class="form-control">
                                </div>
                            </div>                       
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-paper-plane"></i> Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
@else
    <div class="main-content">  
        <div class="container-fluid"> 
          <div class="row"> 
            <div class="col-12">  
                <div class="alert alert-danger" role="alert">
                  No tienes rol de administrador. <a href="/home" class="alert-link">click aquí para ir al inicio</a>. No puedes acceder a este sitio.
                </div>
            </div>
          </div>
        </div>
    </div>
@endif
@endsection
@section('validator')
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
    $( document ).ready( function () {
      $( "#registro" ).validate( {
        rules: {
          nombre: "required",
          apellido: "required",
          email:"required",
          password: {
            required: true,
            minlength: 8
          },
          edad: {
            required: true,
            number:true
          },

          direccion: "required"
        },
        messages: {
          nombre: "Por favor ingrese un nombre al ususario",
          apellido: "Por favor ingrese el apellido del usuario",
          email: "Introduzca una dirección de correo real",
          password: {
            required: "Por favor ingrese su password",
            minlength: "Al menos de 8 caracteres"
          },
          edad: {
            required:"Por favor ingrese la edad del usuario",
            number:"Ingrese una edad en numero"
          },
          direccion:"Ingrese su dirección"
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `invalid-feedback` class to the error element
          error.addClass( "invalid-feedback" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.next( "label" ) );
          } else {
            error.insertAfter( element );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
      } );

    } );
</script>
@endsection