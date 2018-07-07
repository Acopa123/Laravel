@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Productos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Inventario</li>
      </ol>
    </section>

    <section class="content container-fluid">
      @if ($message = Session::get('success'))
        <div class="box box-success box-solid">
          <div class="box-header">
            <h3 class="box-title"><i class="icon fa fa-check"></i> {{ $message }}</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
        </div>
      @endif

      <div class="box">
        <div class="box-header">
          @can ('inventary.create')
            <a href="{{url('admin/crear-producto')}}" class="btn btn-default" ><i class="fa fa-plus"></i> Registrar Productos</a>
          @endcan
        </div>

        <div class="box-body">
          <table id="Jtabla" class="table table-bordered table-hover dataTable">
            <thead>
              <tr>
                <th>Tipo Producto</th>
                <th>N° de Producto</th>
                <th>Descripción del Producto</th>
                <th>Fecha de Entrada</th>
                <th>Stock</th>
                <th>Precio Lista</th>
                <th>Costo</th>
                <th>Acciones</th>
             </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr>
                  <td>{{ $product->category->type }}</td>
                  <td>{{ $product->initials }}-{{ $product->id }}</td>
                  <td>{{ str_limit($product->description, 50) }}</td>
                  <td>{{ $product->checkin }}</td>
                  <td>
                    <span <?php echo (int)$product->stock <= 20 ? "class='badge bg-red'" : "class='badge bg-green'"; ?>>
                      {{$product->stock}}
                    </span>
                    {{$product->unit}}
                  </td>
                  <td>${{ $product->priceList }} {{ $product->coin->type }}</td>
                  <td>${{ $product->cost }} {{ $product->coin->type }}</td>
                  <td class="row-copasat">
                    @can ('inventary.show')
                      <a class="btn btn-primary" href="{{url('/admin/ver-producto',$product->id)}}" alt="Ver mas.."><i class="fa fa-eye"></i></a>
                    @endcan
                    @can ('inventary.edit')
                      <a class="btn bg-navy" href="{{url('/admin/edita-producto',$product->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                    @endcan
                    @can ('inventary.destroy')
                      <a type="submit" class="btn btn-danger" onclick="destroy('{{route('producto.destroy', $product->id)}}');"><i class="fa fa-trash-o"></i></a>
                    @endcan
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Tipo Producto</th>
                <th>N° de Producto</th>
                <th>Descripción del Producto</th>
                <th>Fecha de Entrada</th>
                <th>Stock</th>
                <th>Precio Lista</th>
                <th>Costo</th>
                <th>Acciones</th>
             </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </section>
    <script type="text/javascript">
      function destroy(url){
        event.preventDefault();
        swal({
          title: '¿Desea eliminar este producto?',
          text: "¡No podra revertir esto!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3c8dbc',
          cancelButtonColor: '#dd4b39',
          confirmButtonText: 'Sí, eliminarlo!',
          cancelButtonText: 'No, cancelar!'
        }).then((res) => {
          if (res.value) {
            $.ajax({
              url: url,
              method: "POST",
              data: {
                  _token: "{{csrf_token()}}",
                  _method: "DELETE"
              },
              success: function(data){
                swal(
                  '¡Eliminado!',
                  'El registro ha sido eliminado.',
                  'success'
                ).then(()=>{
                  location.reload();
                })
              }
            })
          }else if (res.dismiss === "cancel") {
            swal(
              '¡Cancelado!',
              'La accion fue cancelada.',
              'error'
            )
          }
        })
      }
    </script>

@endsection
