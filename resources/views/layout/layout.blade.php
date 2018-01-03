<html>
<head>
	<title>Sistop Web</title>
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/app.min.1.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/toastr.css">
    <link href="/css/material-design-iconic-font.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="/images/icon.jpg">

	<!-- JS -->
	<script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/functions.js"></script>
	<script type="text/javascript" src="/js/toastr.js"></script>
    <script type="text/javascript">
        $(document).ready(function($) {
            window.optica_id = <?php echo session('optica_id') ?>;   
        });
    </script>
</head>
<body>
    <?php $optica_id = session('optica_id'); ?>
	<header id="header" class="bgm-bluegray">
        <ul class="header-inner">
            <!-- <li id="menu-trigger" data-trigger="#sidebar">
                <div class="line-wrap">
                    <div class="line top"></div>
                    <div class="line center"></div>
                    <div class="line bottom"></div>
                </div>
            </li> -->
            <li class="logo">
                <a href="{{ $url }}">{{ $title }}</a>
            </li>
            <li class="logo" style=" position: absolute; left: 45%; text-align: center; margin:0 auto;">
            	<a href="{{ $url }}">Sistop Web</a>
            </li>
            <li class="logo pull-right">
                <a href="/logout"><i class="fa fa-sign-out" style="color:white; font-size: 20px;"></i> Cerrar sesión</a>
            </li>
            @if( isset( $filtro ) )
                <li id="menu-filtro" class="pull-right pointer" data-trigger="#filtro">
                    <div class="toggle-switch" style="color:white; font-size: 26px;">
                        <input id="tw-switch" type="checkbox" hidden="hidden">
                        <i class="zmdi zmdi-filter-list zmdi-hc-fw" title="Filtros"></i>  
                    </div>
                </li>
            @endif
            @if( Auth::user()->perfil() == 'Administrador' )
                <li id="menu-filtro" class="pull-right pointer">
                    <div style="color:white; font-size: 26px;">
                        <input id="tw-switch" type="checkbox" hidden="hidden">
                        <i class="zmdi zmdi-settings zmdi-hc-fw" title="Administración" onclick="window.location.href='/{{ $optica_id }}/administracion'"></i>  
                    </div>
                </li>
            @endif
        </ul>
    </header>

    <!--<section id="main">
        <aside id="sidebar">
            <div class="sidebar-inner c-overflow">
                <ul class="main-menu">
                    <li><a href="/riesgocia"><i class="fa fa-building-o"></i> Riesgocia</a></li>                    
                    <li><a href="/coberturacia"><i class="fa fa-briefcase"></i> Coberturacia</a></li>                    
                    <li><a href="/usuario"><i class="fa fa-user"></i> Usuarios</a></li>               
                </ul>
            </div>
        </aside>
    </section> -->
	
	<section id="content">

		@yield('content')	
        @yield('modals')    
        @yield('js')

	</section>

</body>
</html>