@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="css/login.css" type="text/css">
<link rel="stylesheet" href="css/base.css" type="text/css">


<head>
    <div class="container"> 
         <h1>
             Ingreso
         </h1>
            
    </div> 
</head>

<body>
    <center>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
            <div class="contenedor">
                             
                             {{-- Contenedor para ingresar el email --}}
                             
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Correo electronico </label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            
                            {{-- Contenedor para ingresar la contraseña  --}}
                            
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            
                             {{-- Rediobutton y mensaje para recordar email y contraseña  --}}
                             
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Recordarme
                                        </label>
                                    </div>
                                </div>
                            </div>

                            
                            {{-- Boton de login y boton de "olvido la contraseña"  --}}
                             
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Ingresar
                                    </button>
                                    <br>
                                    
                                </div>
                            </div>
            </div>

                            
        </form>
    </center>
        

</body>

@endsection
