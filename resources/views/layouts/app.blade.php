<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Apoyo TIS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
html {
    position: relative;
    min-height: 100%;
    
}
body {
    margin: 0 0 50px; /* bottom = footer height */
    /* font-family: 'Merriweather', serif; */
}
#bottom-footer {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 50px;
    width: 100%;
}

    </style>
</head>

<body styles="padding-top: 60px; ">
    <div id="app">
       <div   style=" background: linear-gradient(to bottom,#c97885 0%, #61bbda 100%); ">
        <div class="row ">
           

        
            <div class="col-md-2">
                <img src="{{asset('storage/nav/umss.png')}}" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-8 mt-3" style="   background: -webkit-linear-gradient(rgb(102, 8, 44) 0%, rgb(18, 80, 131) 100%); font-family: 'Merriweather', serif; font-size: 40px; font-weight: 800; line-height: 72px; margin: 0 0 24px; text-align: center;  -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;">
                <p >TALLER DE INGENIERIA DE SOFTWARE</p>
            </div>
            <div class="col-md-2 ">
                <img src="{{asset('storage/nav/sistemas2.png')}}" class="img-fluid float-right" alt="Responsive image">
            </div>
        </div>


       </div>
        <nav class="navbar navbar-expand-md navbar navbar-light" style="background-color: #e3f2fd;font-size: 1.3em !important; font-family: 'Merriweather', serif;" >
            
            <div class="container">
                @can('user.home')
                <a class="navbar-brand" style="font-size: 1.3em !important;" href="{{ url('/') }}">
                  
                    <!-- {{ config('app.name', 'Laravel') }}-->
                {{ __('Inicio') }}
            </a>  
                @endcan
             
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                   <!-- <li class="nav-item">
                         {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Empresas') }}</a> --}}
                    </li>  -->
                    @can('empresa')
                    @if (Auth::user()->enterprise_id==null)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('empresa.create') }}">{{ __('Postularse') }}</a>
                   </li> 
                    @endif
                    
                    @endcan  
                   
                   
                    @can('anuncio.create')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('anuncio.create') }}">{{ __('Publicar') }}</a>
                   </li>
                   @endcan 

                   @can('proyecto.index')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('proyecto.index') }}">{{ __('Proyectos') }}</a>
                    </li>
                   @endcan
                    
                    @can('empresas.registradas')
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('empresa.index') }}">{{ __('Empresas Registradas') }}</a>
                        </li>
                    @endcan
                    
                        @can('trabajos')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.enterpriseproject.index') }}">{{ __('Trabajos') }}</a>
                        </li>
                        @endcan
                    
                        @auth
                            @if (Auth::user()->enterprise_id)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.enterpriseproject.show',Auth::user()->enterprise_id) }}">{{ __('Trabajo') }}</a>
                                </li>
                            @endif
                        @endauth
                    

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif
                                @can('user.notify')
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                </li>
                            @endif
                                @endcan
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-lfabelledby="navbarDropdown">
                                    @can('admin.home')
                                    <a class="dropdown-item" href="{{ route('admin.home') }}">
                                   
                                        {{ __('Administración') }}
                                    </a>
                                    @endcan
                                    @can('user.password.edit')
                                    <a class="dropdown-item" href="{{ route('user.password.edit',Auth::user()->id) }}">
                                   
                                        {{ __('Cambiar Contraseña') }}
                                    </a>
                                    @endcan
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                  
                                  
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
     
        </main>

  
        <div id="bottom-footer">

            <footer class="text-center text-white   footer-font-style  footer-position" style="background-color: #0a4275;">
             
              <div class="text-center p-3" style="background-color: #47a3c2">
                © 2022 Empresa:
                <a class="text-white" href="mailto:servisoft47@gmail.com">Servisoft S.R.L.</a>
                <p>Facultad de Ciencias y Tecnología (UMSS).</p>
                <p>Cochabamba - Bolivia</p>
              </div>
        
            </footer>
           
          </div>
    </div>
 

 
</body>

</html>