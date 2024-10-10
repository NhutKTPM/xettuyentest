<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- DataTables -->
<link rel="stylesheet" href="/admin/admin_24/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/admin/admin_24/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/admin/admin_24/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<script src="/admin/admin_24/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/admin/admin_24/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/admin/admin_24/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/admin/admin_24/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/admin/admin_24/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/admin/admin_24/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/admin/admin_24/plugins/jszip/jszip.min.js"></script>
<script src="/admin/admin_24/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/admin/admin_24/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/admin/admin_24/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/admin/admin_24/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/admin/admin_24/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });


</script>

    @include('user_24.admin24.include.header')
    <link rel="stylesheet" href="/admin/admin_24/plugins/summernote/summernote.min.css">
    <style>


        /* div.dataTables_scrollHead table.dataTable{
            margin-bottom: -11px !important;
        } */

        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }

        .info{
            margin-bottom: 10px
        }
        .dangky{
            padding-top: 8px; 
            border-top: 1px solid rgba(0, 0, 0, .125)
        }


    </style>

</head>

<body class="sidebar-mini sidebar-collapse">
    <div class="wrapper">
        <!-- Preloader -->
        <!-- @include('user_24.admin24.include.preloader')  -->
        <!-- /.preloader -->

        <!-- Navbar -->
        @include('user_24.admin24.include.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        @include('user_24.admin24.include.sidebar')
        <!-- /.sidebar -->
        {{-- @yield('sidebar1') --}}

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">                    
                    <div class="row" >
                        
                        <div class="col-12 col-sm-12 col-md-6 col-xl-4">
                            <div class="card" style="min-height: 600px;">
                                <!-- <div class="row"> -->

                                    <!-- <div class="col-12"> -->
                                        <div class="card-body">
                                            Đợt tuyển sinh

                                        </div> 
                                        
                            </div>
                   
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-xl-8">
                            <div class="card" style="min-height: 600px;">
                                
                                <div class="card-body">
                                    <table id="bang_ds_dottuyensinh">

                                    </table>
                                    
                                </div>
                                
                                
                            </div>
                        </div>

                    </div>

                     


                </div>
            </section>
            @include('user_24.modalevent')
        </div>
        {{-- @include('user_24.admin_24.footer') --}}
        @include('user_24.admin24.include.footer')
    </div>




</body>
<script src="/admin/admin24/js/congmotcua/dottuyensinh.js"></script>
</html>

<script>
    // var id = $('#dkg_chonloaigiay').val();
    // alert(id)




</script>