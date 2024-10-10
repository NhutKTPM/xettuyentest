$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#dkg_chonloaigiay').select2();

    loadthongtin();

    dangkygiay_load_loaigiay();

    dangkygiay_load_danhsachloaigiay().ajax.url('/dangkygiay/dangkygiay_load_danhsachloaigiay').load()
    // bhyt_thongke(0).ajax.url("loadthongtin_bhyt_thongke/0").load();
});


function loadthongtin(){
    $.ajax({
        type: 'get',
        url: '/dangkygiay/loadthongtin',
        success: function (res) {
            $('#dangkygiay_hoten').text(res[0].hoten);
            res[0].gioitinh == 0 ? $('#dangkygiay_gioitinh').text("Nam") : $('#dangkygiay_gioitinh').text("Nữ") 
            $('#dangkygiay_noisinh').text(res[0].name_province);
            $('#dangkygiay_ngaysinh').text(res[0].ngaysinh);
            $('#dangkygiay_mssv').text(res[0].mssv);
            $('#dangkygiay_nganh').text(res[0].name_major);
            $('#dangkygiay_lop').text(res[0].lop);
            $('#dangkygiay_diachi').text(res[0].diachi);
            $('#dangkygiay_cccd').text(res[0].cccd);
            $('#dangkygiay_email').text(res[0].email);
            $('#dangkygiay_khoa').text(res[0].dottuyensinh);
            $('#dangkygiay_ngaycapcccd').text(res[0].ngaycapcccd);
            $('#dangkygiay_noicapcccd').text(res[0].noicap);
                        // alert()

        }
    })

}

function dangkygiay_load_loaigiay(){
    $.ajax({
        type: 'get',
        url: '/dangkygiay/dangkygiay_load_loaigiay',
        success: function (res) {
            $('#dkg_chonloaigiay').select2({
                data: res
            })

        }
    })
}


function dangkygiay_load_danhsachloaigiay(){
    var ds_canbo = $("#dangkygiay_load_danhsachloaigiay").DataTable({
        ajax: {
            type: "get",
            url: "/dangkygiay/dangkygiay_load_danhsachloaigiay",
        },
        columns: [
            // {
            //     title: "<input class='check_all_canbo_kiemtra' onclick=check_all_canbo_kiemtra() style = 'height:13px' type = 'checkbox'>",
            //     data: "id",
            //     className: "text-center",
            //     render: function(data,type,row){
            //         return "<input email ='"+row.email+"' class='check_canbo_kiemtra' style = 'height:13px' id_canbokiemtra = "+data+" type = 'checkbox'></input>"
            //     }
            // },
            { title: "STT", data: "stt" },
            { title: "Mã loại giấy", data: "maloaigiay" },
            { title: "Tên loại giấy", data: "tenloaigiay" },
            { title: "Id đơn vị", data: "tendonvi" },

            { 
                title: "Tiến độ", 
                data: "tiendoxyly",
                render: function(data, type, row) {
                    var tiendo = ''; 
                
                    if(data == 1) {
                        tiendo = '<small class="badge badge-warning"><i class="fa-solid fa-file-circle-check fa-fw"></i>&nbsp;&nbsp;Đang xử lý</small>';
                    } else {  
                        tiendo = '<small class="badge badge-primary"><i class="fa-solid fa-file-circle-check fa-fw"></i>&nbsp;&nbsp;Hoàn thành</small>';
                    } 
                    
                    return tiendo;
                }
                        
            },
            { title: "Ngày đăng ký", data: "create_at" },
    
    
          
        ],
        columnDefs: [
            {
                targets: 0,
                className: "text-center",

            },
            {
                targets: 1,
                className: "text-center",
            },
        ],
        scrollY: 400,
        language: {
            emptyTable: "Không có giấy xác nhận đã đăng ký",
            info: " _START_ / _END_ trên _TOTAL_ loại giấy",
            paginate: {
                first: "Trang đầu",
                last: "Trang cuối",
                next: "Trang sau",
                previous: "Trang trước",
            },
            search: "Tìm kiếm:",
            loadingRecords: "Đang tìm kiếm ... ",
            lengthMenu: "Hiện thị _MENU_",
            infoEmpty: "",
        },
        retrieve: true,
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: false,
        info: true,
        autoWidth: false,
        responsive: true,
        select: true,
    });
    return ds_canbo;
}

function dkg_dangky(){//Chi dang ky id > 0
    let id = $('#dkg_chonloaigiay').val();
    if(id > 0){
        $("#modal_event").show();
        $("#dkg_dangky").prop("disabled", true)
        $.ajax({
            type: 'post',
            url: '/dangkygiay/dkg_dangky',
            data: {
                id: id,
            },
            success: function (res) {
                if(res == 1){
                    toastr.success('Đã đăng ký thành công!'); //Xu ly ngoai le
                    dangkygiay_load_danhsachloaigiay().ajax.url('/dangkygiay/dangkygiay_load_danhsachloaigiay').load()
                }else{
                    if(res == 0){
                        toastr.error('Hệ thống bị lỗi, vui lòng ngưng sử dụng');
                    }else{
                        toastr.warning(res.id);
                    }
                }
                $("#dkg_dangky").prop("disabled", false)
                $("#modal_event").hide();
            }
        })
    }else{
        toastr.warning('Vui long chonj loai giay!'); //Xu ly ngoai le
    }
}