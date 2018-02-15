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
      @include('../layouts/nav')
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
          <li ><a href="{{ url('/admin/employee') }}"><i class="fa fa-address-book-o"></i>Empleados</a></li>
          <li class="li-menu-nav">INVENTARIO</li>
          <li >
            <a id="inventary"><i class="fa fa-pencil-square"></i>Inventario <i class="fa fa-chevron-down"></i></a>
              <ul class="submenu-list" id="submenu-list">
                <li><a href="{{url('admin/inventary')}}"><i class="fa fa-list-ol "></i>Productos </a></li>
                <li><a href="{{url('admin/checkin')}}"> <i class="fa fa-sign-in fa-lg"></i> Entradas de Productos</a></li>
                <li><a href="{{url('admin/inventary-out')}}"> <i class="fa fa-sign-out"></i> Salidas de Productos</a></li>
                <li><a href="{{url('admin/clasificationProduct')}}"> <i class="fa fa-list-alt "></i> Tipos de Productos</a></li>
              </ul>
          </li>
          <li class="li-menu-nav">COTIZACION</li>
          <li class="active"><a href="{{url('/admin/quotation')}}"><i class="fa fa-book"></i>Cotización <small class="bg-indicator">Editar</small></a></li>
        </ul>
      </aside>
      <div class="container" id="container">
        <div class="location">
          <h1 class="title">Administrador</h1>
          <div class="breadcrumb">
            <ol>
              Se encuentra en
              <li><i class="fa fa-home"></i>Inicio</li>
              <li class="small-active"><i class="fa fa-edit"></i>Editar Cotización</li>
            </ol>
          </div>
        </div>
        <div class="for-container">
          <h2><i class="fa fa-edit"></i> Editar Cotización</h2>
          <form class="container-add-clients">
            <div class="date-clients">
              <label for="folio">Folio:</label>
              <input type="text" name="folio" value=""  >
              <label for="date">Fecha:</label>
              <input type="text" name="date" value=""  >
              <label for="number-client">Número de Cliente:</label>
              <input type="text" name="number-client" value=""  >
              <label for="name-company">Nombre de la empresa:</label>
              <input type="text" name="name-company" value=""  >
            </div>
            <div class="date-clients">
              <label for="name">RFC:</label>
              <input type="text" name="rfc" value="" >
              <label for="telephone">Telefono:</label>
              <input type="text" name="telephone" value=""  >
              <label for="adress">Dirección:</label>
              <textarea type="text" rows="6" name="adress" ></textarea>
            </div>
            <div class="date-clients">
              <label for="nc">Nombre Completo:</label>
              <input type="text" name="nc" value="" >
              <label for="puesto">Puesto:</label>
              <input type="text" name="puesto" value="" >
              <label for="correo">E-mail:</label>
              <input type="text" name="correo" value=""  >
              <label for="number-licitacion">Número de Licitación:</label>
              <input type="text" name="numer-licitacion" value="" >
            </div>
            <div class="observation-clients">
              <label for="observation">Observaciones:</label>
              <textarea type="text" rows="6" name="observation"  ></textarea>
            </div>
            <div class="button-client">
              <a href="#" class="searchProduct"><i class="fa fa-search fa-1x"></i>  Buscar Productos</a>
            </div>
            <div class="table">
              <table id="Jtabla">
                <thead>
                  <tr class="theader">
                    <th>Acciones</th>
                    <th>N° de Producto</th>
                    <th>Unidad de Medida</th>
                    <th>Precio de Venta 1</th>
                    <th>Precio de Venta 2</th>
                    <th>Precio de Venta 3</th>
                    <th>Precio de Venta 4</th>
                 </tr>
                </thead>
                <tbody class="tbodymain">
                  <tr class="tbody">
                    <td class="action">
                      <a href="#" alt="Eliminar"><i class="fa fa-trash-o fa-lg"></i></a>
                    </td>
                    <td>00078</td>
                    <td>metros</td>
                    <td>Encargado de sistemas</td>
                    <td>delli.patricio.mayo@gmail.com</td>
                    <td>Encargado de sistemas</td>
                    <td>delli.patricio.mayo@gmail.com</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="button-client">
              <a href="#" class="btn-success"><i class="fa fa-save"></i> Guardar</a>
              <a href="{{ url('/admin/client') }}"  class="btn-danger"><i class="fa fa-times-rectangle-o"></i> Cancelar</a>
              <a href="#" class="pdf"><i class="fa fa-file-o"></i>  Imprimir PDF</a>
            </div>
          </form>
          <div class="button-pdf">

          </div>
        </div>
      </div>
    </main>
    <footer id="footerQuotation">
      <h3>© 2017 Todos Los Derechos Reservados</h3>
    </footer>
    <script src="{{ url('js/datatable/jQuery-2.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/menu-vertical.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/inventary.js') }}"></script>
  </body>
</html>
