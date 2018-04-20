
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js')}}"></script>
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{ url('js/datatable/jquery.dataTables.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ url('js/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ url('js/datatable/dataTables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('/dist/js/demo.js')}}"></script>
<script type="text/javascript">
  $(function () {
    $('#Jtabla').dataTable({
      "bPaginate": true,
      "bLengthChange": true,
      "bFilter": true,
      "bSort": true,
      "bInfo": true,
      "bAutoWidth": true,
      "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todo"]]
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2()
    $('#datepicker').datepicker({
      pickTime: false,
      autoclose: true,
      language: 'es',
      format: 'dd/mm/yyyy'
    });
  });
</script>
