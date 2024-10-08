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
                                            <div class="form-group row" style="margin-bottom: 3px">
                                                <label for="" class="col-sm-4 col-form-label" style="padding-bottom: 0px">Loại giấy:</label>
                                                <div class="col-sm-8">
                                                    <select id = "dkg_chonloaigiay" name = "" style="width:100%">  
                                                        <!-- <option value = "0">Chọn Loại giấy</option>
                                                        <option value = "1">Giấy xác nhận nghĩa vụ quân sự</option>
                                                        <option value = "2">Giấy xác nhận vay vốn sinh viên</option> -->
                                                    </select>
                                                </div>
                                            </div>

                                            
                                            <!-- <div class="style_all_button"> -->
                                            <div class="row">
                                                <div class="col-4">

                                                </div>
                                                <div class="col-4">
                                                    
                                                </div>
                                                <div class="col-4">
                                                    <button id = "dkg_dangky"  onclick = 'dkg_dangky()' type="button"  onclick="" class="btn btn-block btn-primary btn-xs"><i class="fa-solid fa-pen-to-square"></i>
                                                    &nbsp;&nbsp;Đăng ký</button>
                                                </div>
                                                <hr>
                                            </div>
                                            <!-- </div> -->
                                            <hr style="margin-top:0;">
                                                       
                                                    
                                                    
                                            

                                            <!-- <div class="container"> -->
                                                        
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>MSSV:</strong> </p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info" id = "dangkygiay_mssv"></p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Họ tên:</strong> </p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info" id = "dangkygiay_hoten"></p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info" ><strong>Giới tính:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info" id = "dangkygiay_gioitinh"></p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Ngày sinh:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info" id = "dangkygiay_ngaysinh"></p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                            <p class="info" ><strong>Nơi sinh:</strong></p>
                                                            </div>
                                                            
                                                            <div class ="col-8"> 
                                                                <p class="info" id = "dangkygiay_noisinh"></p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Lớp học:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info" id = "dangkygiay_lop"></p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Khóa học:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info" id = "dangkygiay_khoa"></p>
                                                            </div>
                                                        </div>
                                                       
                                                
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Ngành:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info" id="dangkygiay_nganh"></p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>CCCD:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info" id="dangkygiay_cccd"></p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Ngày cấp:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info" id="dangkygiay_ngaycapcccd"></p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Nơi cấp:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info" id="dangkygiay_noicapcccd" ></p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Địa chỉ:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info"  id="dangkygiay_diachi"></p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Email:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info" id="dangkygiay_email"></p>
                                                            </div>
                                                        </div>
                                                       



                                            <!-- <div class="row" >
                                                
                                                <div class="col-4">
                                                    <p><strong>MSSV:</strong> </p>
                                                    <p><strong>Họ tên:</strong> </p>
                                                    <p><strong>Giới tính:</strong></p>
                                                    <p><strong>Ngày sinh:</strong></p>
                                                    <p><strong>Nơi sinh:</strong></p>
                                                    <p><strong>Lớp học:</strong></p>
                                                    <p><strong>Khóa học:</strong></p>
                                                    <p><strong> Cơ sở:</strong></p>
                                                    <p><strong>Loại hình đào tạo:</strong></p>
                                                    <p><strong>Ngành:</strong></p>
                                                    <p><strong>CCCD:</strong></p>
                                                    <p><strong>Địa chỉ:</strong></p>
                                                    <p><strong>Email:</strong></p>
                                                </div>
                                                <div class="col-8">
                                                    <p>KTPM2211013</p>
                                                    <p>Đình sang</p>
                                                    <p>nam</p>
                                                    <p>28/11/2004</p>
                                                    <p>Tỉnh Đồng Tháp</p>
                                                    <p>KTPM2211</p>
                                                    <p>2022</p>
                                                    <p>Đại học Kỹ thuật-Công nghệ Cần Thơ</p>
                                                    <p>Chính quy</p>
                                                    <p>Kỹ thuật phần mềm</p>
                                                    <p>6879324923948</p>
                                                    <p>quận Ninh Kiều, Cần Thơ </p>
                                                    <p>nguyenvana@student.edu.vn</p>


                                                </div>
                                
            
                                            </div> -->
                                            <!-- </div> -->

                                        </div> 
                                        
                            </div>
                   
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-xl-8">
                            <div class="card" style="min-height: 600px;">
                                <!-- Code bảng giấy xác nhận đã đăng ký -->
                                
                                <div class="card-body">
                                    <table id="dangkygiay_load_danhsachloaigiay" class="table table-bordered table-striped">
                                        <!-- <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Loại giấy</th>
                                                <th>Tiến Độ</th>
                                                <th>Ngày Đăng Ký</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Giấy xác nhận nghĩa vụ quân sự</td>
                                                <td>Đang xử lý</td>
                                                <td>2024-09-01</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Giấy xác nhận vay vốn sinh viên</td>
                                                <td>Hoàn thành</td>
                                                <td>2024-08-31</td>
                                            </tr>
                                          
                                        </tbody>
                                        
                                    </table> -->
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
<script src="/admin/admin24/js/congmotcua/dangkygiay.js"></script>
</html>

<script>
    // var id = $('#dkg_chonloaigiay').val();
    // alert(id)




</script>