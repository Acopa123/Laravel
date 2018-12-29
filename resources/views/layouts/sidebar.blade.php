
<?php
function current_page($url = '/'){
  return request()->path() == $url;
}
?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
        @if (Auth::user()->avatar == null)
          <img src="{{ url('img/LogoRX.png')}}"  alt="User Image">
        @else
          <img src="{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
        @endif
        </div>
        <div class="pull-left info">
          <a href="#"><i class="fa fa-circle text-success"></i> Online </a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree"><br>
        <li class="header">MENU DE NAVEGACION</li>
        <li <?php echo current_page('home') ? "class='active'" : "";?>>
          <a href="{{ url('/home') }}"><i class="fa fa-home"></i> <span>Inicio</span>
            <?php echo current_page('home') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
          </a>
        </li>
        @can ('clientes.index')
          <li <?php echo current_page('clientes') || current_page('crear-cliente') || isset($editarCliente) ? "class='active'" : "";?>>
            <a href="{{ url('/clientes') }}"><i class="fa fa-users"></i> <span>Clientes</span>
              <?php echo current_page('clientes') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
              <?php echo current_page('crear-cliente') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
              <?php echo isset($editarCliente) ? '<small class="label pull-right bg-green">editar</small>' : "";?>
            </a>
          </li>
        @endcan
        @can ('proveedores.index')
          <li <?php echo current_page('proveedores') || current_page('crear-proveedor') || isset($editarProveedor) ? "class='active'" : "";?>>
            <a href="{{ url('/proveedores') }}"><i class="fa fa-address-card-o"></i> <span>Proveedores</span>
              <?php echo current_page('proveedores') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
              <?php echo current_page('crear-proveedor') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
              <?php echo isset($editarProveedor)  ? '<small class="label pull-right bg-green">editar</small>' : "";?>
            </a>
          </li>
        @endcan
        @can ('roles.index')
          <li class="header">ROLES Y PERMISOS</li>
        @endcan
        @can ('roles.index')
          <li <?php echo current_page('admin/roles') || current_page('admin/create-rol') || strpos(request()->path(), 'edit-rol') ? "class='active'" : "";?>>
            <a href="{{ url('/admin/roles') }}"><i class="fa fa-list"></i> <span>Roles</span>
              <?php echo current_page('admin/roles') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
              <?php echo current_page('admin/create-rol') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
              <?php echo strpos(request()->path(), 'edit-rol') ? '<small class="label pull-right bg-green">editar</small>' : "";?>
            </a>
          </li>
        @endcan
        @can ('usuarios.index')
          <li <?php echo current_page('usuarios') || current_page('crear-usuario') || isset($editarUsuario) ? "class='active'" : "";?>>
            <a href="{{ url('/usuarios') }}"><i class="fa fa-address-book-o"></i> <span>Empleados</span>
              <?php echo current_page('usuarios') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
              <?php echo current_page('crear-usuario') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
              <?php echo isset($editarUsuario) ? '<small class="label pull-right bg-green">editar</small>' : "";?>
            </a></li>
        @endcan
        <li class="header">INVENTARIO Y COTIZACIONES</li>
        <li class="treeview <?php echo current_page('catalogos') || current_page('categorias') || current_page('crear-producto-catalogo') || isset($categoriasLetra) || current_page('entrada-productos') || current_page('crear-producto')
                                  || isset($productoEdit) || current_page('salida-producto') || current_page('crear-salida-producto') || isset($precios) || strpos(request()->path(), 'ver-salida')
                                  || strpos(request()->path(), 'show-product-output') ? "active" : "";?>">
          <a href="#"><i class="fa fa-pencil-square"></i> <span>Inventario</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            @can ('categorias.index')
              <li <?php echo current_page('categorias') ? "class='active'" : "";?>>
                <a href="{{url('/categorias')}}">
                  <i class="fa fa-circle-o <?php echo current_page('categorias') ? "text-aqua" : "";?>"></i>
                  <span>Categorias</span>
                  <span class="pull-right-container">
                    <?php echo current_page('categorias') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
                  </span>
                </a>
              </li>
            @endcan
            @can ('catalogos.index')
              <li <?php echo current_page('catalogos') || current_page('crear-producto-catalogo') || isset($categoriasLetra) ? "class='active'" : "";?>>
                <a href="{{url('/catalogos')}}">
                  <i class="fa fa-circle-o <?php echo current_page('catalogos') || current_page('crear-producto-catalogo') || isset($categoriasLetra) ? "text-aqua" : "";?>"></i>
                  <span>Catálogo</span>
                  <span class="pull-right-container">
                    <?php echo current_page('catalogos') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
                    <?php echo current_page('crear-producto-catalogo') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
                    <?php echo isset($categoriasLetra) ? '<small class="label pull-right bg-green">editar</small>' : "";?>
                  </span>
                </a>
              </li>
            @endcan
            @can ('productos.index')
              <li <?php echo current_page('entrada-productos') || current_page('crear-producto') || isset($productoEdit) ? "class='active'" : "";?>>
                <a href="{{url('/entrada-productos')}}">
                  <i class="fa fa-circle-o <?php echo current_page('entrada-productos') || current_page('crear-producto') || isset($productoEdit) ? "text-aqua" : "";?>"></i>
                  <span>Productos</span>
                  <span class="pull-right-container">
                    <?php echo current_page('productos') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
                    <?php echo current_page('crear-producto') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
                    <?php echo isset($productoEdit) ? '<small class="label pull-right bg-green">editar</small>' : "";?>
                  </span>
                </a>
              </li>
            @endcan
            @can ('salidas.index')
              <li <?php echo current_page('salida-producto') || current_page('crear-salida-producto') || isset($precios)                             || strpos(request()->path(), 'ver-salida') ? "class='active'" : "";?>>
                <a href="{{url('/salida-producto')}}">
                  <i class="fa fa-circle-o <?php echo current_page('salida-producto') || current_page('crear-salida-producto') || isset($precios) || strpos(request()->path(), 'ver-salida') ? "text-aqua" : "";?>"></i>
                  <span>Salidas de Productos</span>
                  <span class="pull-right-container">
                    <?php echo current_page('salida-producto') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
                    <?php echo current_page('crear-salida-producto') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
                    <?php echo isset($precios) ? '<small class="label pull-right bg-green">editar</small>' : "";?>
                    <?php echo strpos(request()->path(), 'ver-salida') ? '<small class="label pull-right bg-green">ver</small>' : "";?>
                  </span>
                </a>
              </li>
            @endcan
          </ul>
        </li>
        @can ('cotizaciones.index')
          <li <?php echo current_page('cotizacion') || current_page('crear-cotizacion') || isset($editar_cotizacion) || isset($ver_cotizacion) || isset($cotizaciones_pdf) ? "class='active'" : "";?>>
            <a href="{{url('/cotizacion')}}"><i class="fa fa-book"></i> <span>Cotización</span>
              <?php echo current_page('cotizacion') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
              <?php echo current_page('crear-cotizacion') ? '<small class="label pull-right bg-green">nuevo</small>' : "";?>
              <?php echo isset($editar_cotizacion) ? '<small class="label pull-right bg-green">editar</small>' : "";?>
              <?php echo isset($ver_cotizacion) ? '<small class="label pull-right bg-green">ver</small>' : "";?>
              <?php echo isset($cotizaciones_pdf) ? '<small class="label pull-right bg-green">busqueda</small>' : "";?>
            </a>
          </li>
        @endcan
        @can ('facturas.index')
          <li class="header">REPORTES</li>
        @endcan
        @can ('facturas.index')
          <li <?php echo current_page('facturas-ingresos') || current_page('buscar-facturas-fecha') ? "class='active'" : "";?>>
            <a href="/facturas-ingresos"><i class="fa fa-clipboard"></i> <span>Reportes de ingreso</span>
              <?php echo current_page('facturas-ingresos') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
              <?php echo current_page('buscar-facturas-fecha') ? '<small class="label pull-right bg-green">buscar</small>' : "";?>
            </a>
          </li>
        @endcan
        @can ('correos.index')
          <li <?php echo current_page('correos') ? "class='active'" : "";?>>
            <a href="/correos"><i class="fa fa-envelope-o"></i> <span>Correos</span>
              <?php echo current_page('correos') ? '<small class="label pull-right bg-green">activo</small>' : "";?>
            </a>
          </li>
        @endcan
      </ul>
    </section>
  </aside>
