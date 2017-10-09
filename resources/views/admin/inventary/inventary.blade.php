<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Rayos X y Servicios Induxtriales</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/datatable/dataTables.bootstrap.css') }}">
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
          {{-- <li ><a href="{{ url('/admin/client') }}"><i class="fa fa-users"></i>Proveedores</a></li> --}}
          <li ><a href="{{ url('/admin/client') }}"><i class="fa fa-users"></i>Clientes</a></li>
          <li ><a href="{{ url('/admin/employee') }}"><i class="fa fa-user"></i>Empleados</a></li>
          <li class="li-menu-nav">INVENTARIO</li>
          <li class="active"><a href="{{url('admin/inventaryMenu')}}"><i class="fa fa-pencil-square"></i>Inventario <small class="bg-indicator">Inventario</small></a></li>
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
                <li class="ol-active"><i class="fa fa-pencil-square"></i>Inventario</li>
            </ol>
          </div>
        </div>
        <div class="table-container">
          <div class="container-search">
            <a href="{{url('admin/add-product')}}" class="btn-green" ><i class="fa fa-pencil"></i> Registrar Productos</a>
            <a href="{{url('admin/add-entrada')}}" class="btn-green" ><i class="fa fa-sign-in"></i> Entradas</a>
            <a href="{{url('admin/inventary-out')}}" class="btn-green" ><i class="fa fa-sign-out"></i> Salidas</a>
          </div>
          @if ($message = Session::get('success'))
            <div class="message-danger">
              <p>{{ $message }}</p>
            </div>
          @endif
          <div class="">
            <table id="Jtabla">
              <thead>
                <tr class="theader">
                  <th>Acciones</th>
                  <th>N° de Factura</th>
                  <th>N° de Producto</th>
                  <th>Proveedores</th>
                  <th>Descripción</th>
                  <th>Fecha de Entrada</th>
                  {{-- <th>Cantidad de Entrada</th>
                  <th>Unidad de Medida</th>
                  <th>Costo</th>
                  <th>Precio de Venta 1</th>
                  <th>Precio de Venta 2</th>
                  <th>Precio de Venta 3</th>
                  <th>Precio de Venta 4</th> --}}
               </tr>
              </thead>
              <tbody class="tbodymain">
                @foreach ($products as $product)
                  <tr class="tbody">
                    <td class="action">
                      <a class="btn-info" href="#" alt="Ver mas.."><i class="fa fa-eye fa-lg"></i></a>
                      <a class="btn-green" href="{{url('/admin/edit-product')}}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                      <a class="btn-dangerInventary" href="#" alt="Eliminar"><i class="fa fa-trash-o fa-lg"></i></a>
                    </td>
                    <td>{{ $product->nInvoice }}</td>
                    <td>{{ $product->nProducts }}</td>
                    <td>{{ $product->provider }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->checkin }}</td>
                    {{-- <td>50</td>
                    <td>metros</td>
                    <td>$500.00</td>
                    <td>$500.00</td>
                    <td>$500.00</td>
                    <td>$500.00</td>
                    <td>$500.00</td> --}}
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
    <footer id="footer">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
    <script src="{{ url('js/datatable/jQuery-2.1.3.min.js') }}"></script>
    <script src="{{ url('js/datatable/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/datatable/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        $('#Jtabla').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": true
        });
      });
    </script>
  </body>
</html>
