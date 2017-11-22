<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rayos X y Servicios Induxtriales</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
  </head>
  <body>
    <header>
      <nav class="nav">
        <ul class="ul-nav">
          <li onclick="menuVertical()"><i  class="fa fa-bars" aria-hidden="true"></i></li>
          <li>RAYOS X Y SERVICIOS INDUSTRIALES S.A. DE C.V.</li>
          <div class="sesion">
            <ul>
              <li><img src="{{ url('img/image.png')}}" alt="" class="popout">
                <ul>
                  <div class="photo">
                    <img src="{{ url('img/image.png')}}" alt="">
                  </div>
                  <div class="name">
                    <h3>Nirandelli Patricio Mayo</h3>
                    <h3></h3>
                  </div>
                  <li></li>
                  <div class="footerSingout">
                    <a href="#" class="sign-out"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
                  </div>
                </ul>
              </li>
            </ul>
          </div>
        </ul>
      </nav>
    </header>
    <main class="wrapper">
      <aside class="menu" id="aside">
        <div class="logo">
          <a href="{{ url('/admin/admin-welcome') }}"><img class="img-menu" src="{{ url('img/LogoRX.png')}}" alt=""></a>
        </div>
        <ul class="ul-menu">
          <li class="li-menu-nav">MENU DE NAVEGACION</li>
          <li><a href="{{ url('/admin/admin-welcome') }}"><i class="fa fa-home"></i>Inicio</a></li>
          <li ><a href="{{ url('/admin/client') }}"><i class="fa fa-users"></i>Clientes</a></li>
          <li ><a href="{{ url('/admin/suppliers') }}"><i class="fa fa-address-card-o"></i>Proveedores</a></li>
          <li class="active"><a href="{{ url('/admin/employee') }}"><i class="fa fa-address-book-o"></i>Empleados <small class="bg-indicator">Registrar</small></a></li>
          <li class="li-menu-nav">INVENTARIO</li>
          <li><a href="{{url('admin/inventaryMenu')}}"><i class="fa fa-pencil-square"></i>Inventario</a></li>
          <li class="li-menu-nav">COTIZACION</li>
          <li><a href="{{url('admin/quotation')}}"><i class="fa fa-book"></i>Cotización</a></li>
        </ul>
      </aside>
      <div class="container" id="container">
        <div class="location">
          <h1 class="title">Administrador</h1>
          <div class="breadcrumb">
            <ol>
              Se encuentra en
              <li><i class="fa fa-home"></i>Inicio</li>
              <li class="ol-active"><i class="fa fa-user-plus"></i>Registar Empleados</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-user-plus"></i> Registrar Empleados</h2>
          <form class="container-add-clients" method="POST" action="/admin/employee">
            {{ csrf_field() }}
            <div class="date-client">
              <label for="name">Nombre Completo:</label>
              <input type="text" name="name" id="name"  placeholder="Nombre Completo" required>
              <label for="phone">Teléfono:</label>
              <input type="text" name="phone" id="phone" placeholder="Teléfono" required>
            </div>
            <div class="date-client">
              <label for="user">Usuario:</label>
              <input type="text" name="user" id="user" placeholder="Usuario" required>
              <label for="password">Contraseña:</label>
              <input type="password" name="password" id="password" placeholder="Contraseña" required>
            </div>
            <div class="button-client">
              <button type="submit" class="btn-save"><i class="fa fa-save fa-lg"></i> Guardar</button>
              <a href="{{ url('/admin/employee') }}" class="btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i> Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </main>
    <footer id="footer-form">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
  </body>
</html>
