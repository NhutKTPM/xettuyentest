<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('user_24.admin24.include.header')
    <link rel="stylesheet" href="/admin/admin_24/plugins/summernote/summernote.min.css">
    <style>


        /* div.dataTables_scrollHead table.dataTable{
            margin-bottom: -11px !important;
        } */
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

                                            
                                            <div class="style_all_button">
                                                <div class="row">
                                                    <div class="col-4">

                                                    </div>
                                                    <div class="col-4">
                                                        
                                                    </div>
                                                    <div class="col-4">
                                                        <button type="button" id="laydulieutheodot" onclick="" class="btn btn-block btn-primary btn-xs"><i class="fa-solid fa-pen-to-square"></i>
                                                        &nbsp;&nbsp;Đăng ký</button>
                                                    </div>
                                                       
                                                    
                                            

                                                     <div class="container">
                                                        <h5 class = "" >Thông tin sinh viên</h5>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p><strong>MSSV:</strong> </p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p>KTPM2211013872364783</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p><strong>Họ tên:</strong> </p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p>Đình sang</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p><strong>Giới tính:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p>Nam</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p><strong>Ngày sinh:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p>28/11/2004</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                            <p><strong>Nơi sinh:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p>Ninh Kiều,Cần Thơ</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p><strong>Lớp học:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p>KTPM2211</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p><strong>Khóa học:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p>2022</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p><strong>Cơ sở:</strong> </p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p>Đại học Kỹ thuật-Công nghệ Cần Thơ</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p><strong>Loại hình đào tạo:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p>Chính quy</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p><strong>Nghành:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p>Kỹ thuật phần mềm</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p><strong>CCCD:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p>68732648732648</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p><strong>Địa chỉ:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p>quận Ninh Kiều, Cần Thơ </p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p><strong>Email:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p>nguyenvana@student.edu.vn</p>
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
                                                    </div>


                                                </div>
                                             </div>


                                  

                                        </div> 
                                        
                                    </div>

                                </div>

                            </div>


                         

                                                
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-xl-8">
                            <div class="card" style="min-height: 600px;">
                                <!-- Code bảng giấy xác nhận đã đăng ký -->
                                <div class="card-header">
                                    Header
                                </div>
                            
                                <div class="card-body">
                                    Body
                                </div>
                                <div class="card-footer">
                                    Footer
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