<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Salida por Rango</title>
    <link rel="icon" type="image/png" href="/img/icono1.png"/>
    <style>
      @page {
        margin: 0cm 0cm;
      }
      body {
        margin-top:    235px;
        margin-bottom: 130px;
        margin-left:   1cm;
        margin-right:  1cm;
      }

      #fondo {
        position: fixed;
        bottom: 0px;
        left: 30px;
        right: 30px;
        top: 270px;
        width: 750px;
        height: 500px;
        z-index: -100;
      }

      #header {
        position: fixed;
        bottom: 0px;
        left: 30px;
        top: 30px;
        width: 750px;
        height: 130px;
        z-index: -100;
      }

      #footer {
        position: fixed;
        bottom: 30px;
        left: 30px;
        width: 750px;
        height: 130px;
        z-index: -100;
        right: 30px;
      }

      .bussines {
        position: fixed;
        bottom: 0px;
        left: 40px;
        top: 140px;
        width: 470px;
        height: auto;
        padding-bottom: 10px;
        z-index: -100;
      }

      .title-bussines {
        font-size: 12px;
        font-family: sans-serif;
        color: #456;
        margin: 0;
      }

      .table {
        position: fixed;
        width: 180px;
        right: 45px;
        top: 140px;
        z-index: -100;
      }

      .ul-table {
        list-style: none;
        color: #456;
        font-family: sans-serif;
        text-align: center;
        font-size: 10px;
      }

      .li-active {
        background: #cdcdcd;
      }

      .usuario {
        position: fixed;
        top: 173px;
        z-index: -100;
        width: 100%;
        text-align: center;
      }

      .usuario p{
        color: #456;
        font-family: sans-serif;
        font-size: 12px;
        margin: 0;
      }

      .usuario h2{
        color: #456;
        font-family: sans-serif;
        font-size: 12px;
        margin: 0;
      }

      .container-table{
        border-top: #456 solid 2px;
        border-bottom: #456 solid 2px;
        width: 730px;
        margin-top: 10px;
      }

      .default{
        color: #fff;
        font-family: sans-serif;
        font-weight: bold;
        background: #456;
        width: 100%;
        font-size: 12px;
      }

      .defaulttr{
        width: 405px !important;
      }

      .tbody{
        color: #456;
        font-family: sans-serif;
        font-size: 10px;
        text-align: center;
      }

      .tjustify{
        color: #456;
        font-family: sans-serif;
        font-size: 10px;
        text-align: justify;
      }

      .sub-condiciones{
        font-size: 12px;
        font-family: sans-serif !important;
        color: #456;
      }

      .firma{
        text-align: center;
        width: 100%;
      }

    </style>
  </head>
  <body>
    <div id="header">
      <img class=""src="img/ENCABEZADO.jpg" height="100%" width="100%">
    </div>
    <div id="fondo">
      <img src="img/LogoRXGris.jpg" height="100%" width="100%" />
    </div>
    <div id="footer">
      <img src="img/PIE_DE_PAGINA.jpg" height="100%" width="100%" />
    </div>

    <main>
      <div class="row">
        <div class="bussines">
          <h2 class="title-bussines">Rayos X y Servicios Industriales SA de CV</h2>
          <p class="title-bussines">Salida {{$rango}}</p>
        </div>
        <div class="table">
          <ul class="ul-table">
            <li class="li-active">Fecha</li>
            <li>{{$rango}}</li>
            <li class="li-active">Reportes</li>
            <li>Reporte por fechas</li>
          </ul>
        </div>
        <div class="usuario">
          {{-- <h2>Reportes de ingreso General:</h2> --}}
          {{-- <p>Tipo</p> --}}
          <h2>Reporte de Salida {{$rango}}</h2>
          {{-- <p>Categoria</p> --}}
        </div>
        <div class="container-table">
          <table>
            <thead class="default">
              <tr>
                <th>#</th>
                <th>PRODUCTO</th>
                <th>SKU</th>
                <th>DESCRIPCIÓN</th>
                <th>PROVEEDOR</th>
                <th>F.SALIDA</th>
                <th>C.SALIDA</th>
                <th>STOCK</th>
                <th>U.MEDIDA</th>
                <th>P.LISTA</th>
                <th>COSTO</th>
                <th>VENTA</th>
              </tr>
            </thead>
            <tbody class="tbody">
              @foreach ($salidas as $key => $salida)
                <tr style="background: rgba(52, 73, 94, .3)">
                  <td>{{$key + 1}}</td>
                  <td>{{$salida->categoria->tipo}}</td>
                  <td>{{$salida->catalogo->sku}}</td>
                  <td class="tjustify">
                    {{strtoupper($salida->catalogo->descripcion)}}
                  </td>
                  <td>{{$salida->proveedor->nombre_empresa}}</td>
                  <td>{{$salida->fecha_salida}}</td>
                  <td>{{$salida->cantidad_salida}}</td>
                  <td>{{$salida->producto->stock}}</td>
                  <td>{{$salida->catalogo->unidad_medida}}</td>
                  <td>${{$salida->producto->precio_lista}} {{$salida->moneda}}</td>
                  <td>${{$salida->producto->costo}} {{$salida->moneda}}</td>
                  <td>${{$salida->precio_venta}} {{$salida->moneda}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </main>
  </body>
</html>
