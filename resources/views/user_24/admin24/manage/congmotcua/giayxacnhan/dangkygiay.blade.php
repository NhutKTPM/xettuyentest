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
                  
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-xl-4">
                            <div class="card" style="min-height: 600px;">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="card-body">
                                            <div class="form-group row" style="margin-bottom: 3px">
                                                <label for="" class="col-sm-4 col-form-label" style="padding-bottom: 0px">Loại giấy:</label>
                                                <div class="col-sm-8">
                                                    <select id = "dkg_chonloaigiay" name = "" style="width:100%">  
                                                        <option value = "0">Chọn Loại giấy</option>
                                                        <option value = "1">Giấy xác nhận nghĩa vụ quân sự</option>
                                                        <option value = "2">Giấy xác nhận vay vốn sinh viên</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-12">
                                            <div class="style_all_button">
                                                <div class="row">
                                                    <div class="col-4">

                                                    </div>
                                                    <div class="col-4">
                                                        
                                                    </div>
                                                    <div class="col-4">
                                                        <button type="button" id="laydulieutheodot" onclick="" class="btn btn-block btn-info btn-xs"><i class="fa fa-registered" aria-hidden="true"></i>
                                                        &nbsp;&nbsp;Đăng ký</button>
                                                    </div>
                                                                                                            
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                 















                                    <div class="col-12">
                                        <!-- Code Thông tin -->
                                        

                                    </div>
                                </div>

                            </div>


                         

                                                
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-xl-8">
                            <div class="card" style="min-height: 600px;">
                                <!-- Code bảng giấy xác nhận đã đăng ký -->
                                <div class="card-header">
                                    <button onclick="loaddangkygiay()" class="btn btn-primary">Làm Mới</button>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Mã Đăng Ký</th>
                                                <th>Tiến Độ</th>
                                                <th>Ngày Đăng Ký</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>12345</td>
                                                <td>Đang xử lý</td>
                                                <td>2024-09-01</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>67890</td>
                                                <td>Hoàn thành</td>
                                                <td>2024-08-31</td>
                                            </tr>
                                            <!-- Thêm các hàng khác tại đây -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Mã Đăng Ký</th>
                                                <th>Tiến Độ</th>
                                                <th>Ngày Đăng Ký</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                
                                <div class="card-footer">
                                    assss
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
<script src="/admin/admin24/js/quanlylephi/thulephi.js"></script>

<!-- summernote -->
{{-- <script src="/admin/admin_24/plugins/summernote/summernote.min.js"></script> --}}

</html>

<script>
    // var id = $('#dkg_chonloaigiay').val();
    // alert(id)

    $('#dkg_chonloaigiay').select2();


    $('#dkg_chonloaigiay').on('change',function(){
        var id = $('#dkg_chonloaigiay').val();
        alert(id)
    })



</script>