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
                                    aaaaaaa
                                </div>
                            
                                <div class="card-body">
                                    aaaaa
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