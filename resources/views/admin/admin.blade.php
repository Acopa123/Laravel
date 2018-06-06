@extends('layouts.app')

@section('content')
    <section class="content-header">
      <h1>
        Usuario:
        <small>{{Auth::user()->name}}</small>
        <small>({{Auth::user()->user}})</small>
      </h1>
      {{-- <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Usuario:</span>
            <span class="info-box-number">{{Auth::user()->name}} ({{Auth::user()->user}})</span>
            <span>{{Auth::user()->email}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div> --}}
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Inicio</li>
      </ol>
    </section>

    <section class="content container-fluid">
      {{-- <div class="col-md-12">
        <div class="callout callout-info">
          <h1>RX EL EQUIPO QUE SE MUEVE A DONDE TU LO NECESITES!</h1>
        </div>
      </div> --}}

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$users}}</h3>

            <p>Registros de usuarios</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ url('/admin/usuario') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{$quotations}}</h3>

            <p>Cotizaciones del dia</p>
          </div>
          <div class="icon">
            <i class="fa fa-list"></i>
          </div>
          <a href="{{ url('/admin/cotizacion') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$customers}}</h3>

            <p>Registros de clientes</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-people-outline"></i>
          </div>
          <a href="{{ url('/admin/clientes') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{$providers}}</h3>

            <p>Registros de proveedores</p>
          </div>
          <div class="icon">
            <i class="fa fa-address-card-o"></i>
          </div>
          <a href="{{ url('/admin/proveedores') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Misión</h3>
          </div>
          <div class="box-body">
            Generar servicios, transformar y comercializar  en forma eficiente el Servicio de Inspección No Destructiva,
            así como nuestros productos a la Industria Nacional, fomentando la diversificación productiva que propicie
            un valor agregado a cada uno de nuestros Clientes, siendo promotores de la tecnología de punta y apuntalando
            la economía tanto del Estado como del País.
          </div>
        </div>

        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Visión</h3>
          </div>
          <div class="box-body">
            Posicionar a Rayos X y Servicios Industriales S.A. de C.V. como empresa líder en la aplicación de
            Ensayos No Destructivos y soluciones vía el suministro a las instalaciones petroleras y de la
            iniciativa privada en la República Mexicana, proporcionando el servicio requerido, dentro de las
            normas de calidad y seguridad que  satisfagan a todos nuestros Clientes.
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header ui-sortable-handle">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Lista por hacer</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">«</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">»</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list ui-sortable">

                <li style="" class="">
                  <!-- drag handle -->
                  <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <input type="checkbox" value="">
                  <!-- todo text -->
                  <span class="text">Design a nice theme</span>
                  <!-- Emphasis label -->
                  <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Nuevo</button>
            </div>
          </div>
        {{-- <img src="{{ url('img/MV1.jpg')}}" width="100%"> --}}
      </div>
    </section>

@endsection
