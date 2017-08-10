<script src="{{ asset('assets/js') }}/jquery.js"></script>
<script src="{{ asset('datatables') }}/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('datatables/extension') }}/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('datatables/extension') }}/js/buttons.flash.min.js"></script>
<script src="{{ asset('jszip') }}/jszip.min.js"></script>
<script src="{{ asset('pdfmake') }}/pdfmake.min.js"></script>
<script src="{{ asset('pdfmake') }}/vfs_fonts.js"></script>
<script src="{{ asset('datatables/extension') }}/js/buttons.html5.min.js"></script>
<script src="{{ asset('datatables/extension') }}/js/buttons.print.min.js"></script>
<script src="{{ asset('datatables/extension') }}/js/buttons.colVis.min.js"></script>
<script src="{{ asset('datatables/extension') }}/js/dataTables.select.min.js"></script>
<script src="{{ asset('assets/js') }}/jquery-ui.min.js"></script>
<script src="{{ url('assets/js') }}/bootstrap.min.js"></script>
<script src="{{ url('assets/js') }}/select2.full.min.js"></script>
<script src="{{ url('assets/js') }}/main.js"></script>

<script>
    window._token = '{{ csrf_token() }}';
</script>

@yield('javascript')