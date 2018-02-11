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
          <li class="active"><a href="{{ url('/admin/employee') }}"><i class="fa fa-address-book-o"></i>Empleados <small class="bg-indicator">Editar</small></a></li>
          <li class="li-menu-nav">INVENTARIO</li>
          <li >
            <a id="inventary"><i class="fa fa-pencil-square"></i>Inventario <i class="fa fa-chevron-down"></i></a>
            <ul class="submenu-list" id="submenu-list">
              <li><a href="{{url('admin/catalogo')}}"><i class="fa fa-list"></i>Catálogo</a></li>
              <li><a href="{{url('admin/inventary')}}"><i class="fa fa-list"></i>Productos </a></li>
              <li><a href="{{url('admin/checkin')}}"><i class="fa fa-list"></i>Entradas de Productos</a></li>
              <li><a href="{{url('admin/inventary-out')}}"><i class="fa fa-list"></i>Salidas de Productos</a></li>
              <li><a href="{{url('admin/clasificationProduct')}}"><i class="fa fa-list"></i>Tipos de Productos</a></li>
            </ul>
          </li>
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
              <li class="ol-active"><i class="fa fa-pencil-square-o"></i>Editar Empleados</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          @if (count($errors) > 0)
            <ul class="message-errors">
              <strong>Corrija los Siguientes datos!</strong>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          @endif
          <h2><i class="fa fa-edit"></i> Editar Empleado</h2>
          {!! Form::model($employee, ['method' => 'PATCH','route' => ['employee.update', $employee->id], 'class' => 'container-add-clients']) !!}
            {{ csrf_field() }}
            <div class="date-client">
              <label for="name">Nombre Completo:</label>
              <input type="text" name="name" value='{{ $employee->name }}'>
              <label for="telephone">Teléfono:</label>
              <input type="tel" name="phone" value='{{ $employee->phone }}'>
            </div>
            <div class="date-client">
              <label for="user">Usuario:</label>
              <input type="text" name="user" value='{{ $employee->user }}'>
              <label for="password">Contraseña:</label>
              <input type="password" name="password" value='{{ $employee->password }}'>
            </div>
            <div class="button-client">
              <button type="submit" href="#" class="btn-save"><i class="fa fa-save fa-lg"></i> Guardar</button>
              <a href="{{ url('/admin/employee') }}"  class="btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i> Cancelar</a>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </main>
    <footer id="footer-form">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script src="{{ url('js/datatable/jQuery-2.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/inventary.js') }}"></script>
  </body>
</html>
