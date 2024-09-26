<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>CTUT | Đăng ký giấy</title>
  @include('user_24.head')

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">


@include('user_24.navbar')
  <div class="content-wrapper" style="margin-left:0px;background-color:#f4f6f9 ">
    <div class="content-header" style="padding: 10px 0.5rem">
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            

            
            <div class="col-12 col-sm-12 col-md-6 col-xl-4">
                            <div class="card" style="min-height: 600px;">
                                <!-- <div class="row"> -->

                                    <!-- <div class="col-12"> -->
                                        <div class="card-body">

                                            
                                                <div class="row form-group" style="margin-bottom: 3px">
                                                    <label for="" class="col-sm-4 col-form-label" style="padding-bottom: 0px">Loại giấy:</label>
                                                    <div class="col-sm-8">
                                                        <select id = "id_loaigiay" name = "" style="width:100%">  
                                                            <option value = "0">Chọn Loại giấy</option>
                                                            <option value = "1">Giấy xác nhận nghĩa vụ quân sự</option>
                                                            <option value = "2">Giấy xác nhận vay vốn sinh viên</option>
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
                                                        <button type="button" id = "luudangkygiaysv" onclick="luudangkygiaysv()" class="btn btn-block btn-primary btn-xs"><i class="fa-solid fa-pen-to-square"></i>
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
                                                                <p class="info" id="id_taikhoan">{{$id_taikhoan}}</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Họ tên:</strong> </p>
                                                            </div>

                                                            <div class ="col-8">
                                                                <p class="info">{{$hoten}}</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Giới tính:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info">Nam</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Ngày sinh:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info">{{$ngaysinh}}</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                            <p class="info"><strong>Nơi sinh:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info">Ninh Kiều,Cần Thơ</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Lớp học:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info">KTPM2211</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Khóa học:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info">2022</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Cơ sở:</strong> </p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info">Đại học Kỹ thuật-Công nghệ Cần Thơ</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Loại hình:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info">Chính quy</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Ngành:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info">Kỹ thuật phần mềm</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>CCCD:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info">68732648732648</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Ngày cấp:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info">22/4/2021</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>nơi cấp:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info">Cục cảnh sát</p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Địa chỉ:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info">quận Ninh Kiều, Cần Thơ </p>
                                                            </div>
                                                        </div>
                                                        <div class ="row">
                                                            <div class ="col-4">
                                                                <p class="info"><strong>Email:</strong></p>
                                                            </div>

                                                            <div class ="col-8"> 
                                                                <p class="info">nguyenvana@student.edu.vn</p>
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
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Loại giấy</th>
                                                <th>Tiến Độ</th>
                                                <th>Ngày Đăng Ký</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ds_tiendo as $tiendo)
                                                <tr>
                                                    <td>{{$tiendo->id_loaigiay}}</td>
                                                    <td>{{$tiendo->tenloaigiay}}</td>
                                                    <td>{{$tiendo->tiendo}}</td>
                                                    <td>{{$tiendo->ngaydangky}}</td>
                                                </tr>
                                            @endforeach
                                            <!-- <tr>
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
                                            </tr> -->
                                            <!-- Thêm các hàng khác tại đây -->
                                        </tbody>
                                        
                                    </table>
                                </div>
                                
                                
                            </div>
                        </div>
            </div>

           
        
      </div>
    </section>
  </div>
  @include('user_24.navbarfooter')
  @include('user_24.modalevent')
  @include('user_24.info_popup')
</div>














<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
@include('user_24.footer')


<script src="/template/admin/plugins/select2/js/select2.full.min.js"></script>
<script src="/swiper/swiper.js"></script>
<script src="/user_24/js/thongtincanhan.js"></script>
</body>
</html>


<script>
    function luudangkygiaysv(){
        $.ajax({
            type: "post",
            url: "/dangkygiaysv/luudangkygiaysv",
            data: {
                id_taikhoan: document.getElementById('id_taikhoan').textContent,
                id_loaigiay: document.getElementById('id_loaigiay').value,
                tiendo: 0
            }
        });
    }
</script>























































