@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Catálogo
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Registrar Productos en Catálogo</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-plus"></i> Registrar Producto en Catálogo</h3>
        </div>
        <form role="form" method="POST" action="{{route('catalogo.store')}}">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="col-md-4 pull-right">
              <div class="form-group">
                <input type="text" name="sku" value="" class="form-control" placeholder="SKU" id="sku" readonly>
              </div>
            </div>
            <br><br><br>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                <label for="category">Tipo de Producto:</label>
                <select class="form-control" name="category" onchange="typeProduct(this);">
                  <option value="">Seleccione Tipo Producto</option>
                  @foreach ($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->type}}</option>
                  @endforeach
                </select>
                {!! $errors->first('category','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('letter') ? 'has-error' : '' }}">
                <label for="initials" >Iniciales</label>
                <input class="form-control" type="text" id="letter" name="letter" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('proveedor') ? 'has-error' : '' }}">
                <label for="proveedor">Proveedor:</label>
                <select class="form-control" name="proveedor">
                  <option value="">Seleccione Proveedor</option>
                  @foreach ($proveedores as $proveedor)
                    <option value="{{$proveedor->id}}">{{$proveedor->nombre_empresa}}</option>
                  @endforeach
                </select>
                {!! $errors->first('proveedor','<span class="help-block">:message</span>')!!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('unidad') ? 'has-error' : '' }}">
                <div class="row">
                  <div class="col-xs-6">
                    <label for="unidad">Unidad de Medida:</label>
                    <select class="form-control" onchange="getUnidad(this);">
                      <option value="">Seleccione Unidad de Medida</option>
                      @foreach ($units as $unit)
                        <option value="{{$unit->type}}">{{$unit->type}}</option>
                      @endforeach
                    </select>
                    {!! $errors->first('unidad','<span class="help-block">:message</span>')!!}
                  </div>
                  <div class="col-xs-6" style="margin-top: 25px;">
                    <input type="text" class="form-control" name="unidad" id="unidad" value="{{ old('unidad') }}" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Descripción:</label>
                <textarea type="text" rows="6" name="description" id="description" class="form-control" placeholder="Descripción">{{ old('description') }}</textarea>
                {!! $errors->first('description','<span class="help-block">:message</span>')!!}
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save fa-lg"></i> Guardar</button>
            <a href="{{ url('admin/catalogo') }}" class="btn btn-default pull-left"><i class="fa fa-reply fa-lg"></i> Regresar</a>
          </div>
        </form>
      </div>
    </section>
    <script type="text/javascript">
      function typeProduct(val){
        var categories = <?php echo$categories;?>;
        var newVal = {};

        categories.map((item)=>{
          newVal[item.id] = item
        })

        var category = newVal[val.value]
        document.getElementById('letter').value = category.letters;
        var hoy = moment().format('X')
        $('#sku').val(category.letters+'-'+hoy)
      }
    </script>
    <script type="text/javascript">
      function getUnidad(val) {
        var value = val.value
        if (value === 'Otros') {
          $('#unidad').val('')
          $('#unidad').removeAttr('readonly');
        }else {
          $('#unidad').val(value)
          $('#unidad').attr('readonly', 'readonly');
        }
      }
    </script>

@endsection
