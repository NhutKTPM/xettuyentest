$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    bang_ds_dottuyensinh();
    $('#trangthai_load').prop('checked','true')

});



function bang_ds_dottuyensinh(){
    var ds_dottuyensinh = $("#bang_ds_dottuyensinh").DataTable({
        ajax: {
            type: "get",
            url: "/admin24/bang_ds_dottuyensinh",
        },
        columns: [
            { title: "STT", data: "stt" },
            { title: "Mã đợt", data: "madot" },
            { title: "Tên đợt", data: "tendot" },
            { title: "Trạng thái", data: "trangthai", 
                render: function (data, type, row){
                    var cbtrangthai = ''
                    if (data == 1){
                        cbtrangthai = '<input type="checkbox" checked="" onclick="return false;" style="height:18px;background-color:inhert">';
                    } else{
                        cbtrangthai = '<input type="checkbox" onclick="return false;" style="height:18px;background-color:inhert">';
                    }
                    return cbtrangthai
                }
            },
            { title: "Khóa đợt", data: "khoadot",
                render: function (data, type, row){
                    var cbtrangthai = ''
                    if (data == 1){
                        cbtrangthai = '<input type="checkbox" checked="" onclick="return false;" style="height:18px;background-color:inhert">';
                    } else{
                        cbtrangthai = '<input type="checkbox" onclick="return false;" style="height:18px;background-color:inhert">';
                    }
                    return cbtrangthai
                }
             },
            {
                title: "Chức năng",
                data: 'id',
                render: function (data, type, row) {
                    var icon_sua = '<i id="" class="fa-regular fa-pen-to-square" onclick = "edit_load_dottuyensinh('+row.id+')" >&nbsp&nbsp</i>';

                    var icon_xoa = '<i style ="color: red;" id="" class="fa-regular fa-solid fa-user-xmark" onclick = "del_dottuyensinh('+row.id+')">&nbsp&nbsp</i>';

                    // var icon_sua = '<i id="btt_chucnang_edit" class="fa-regular fa-pen-to-square" onclick = "edit_accounts(' + row.sua.id_nguoidung + ',' + row.sua.id_chucnang + ',' + row.sua.active + ')">&nbsp&nbsp</i>';
                    // var icon_phanquyen = '<i style ="color: blue;" id="btt_chucnang_role" class="fa-solid fa-gears" onclick = "loadUser_Menus_Roles(' + row.phanquyen.id_nguoidung + ',' + row.phanquyen.id_chucnang + ',' + row.phanquyen.active + ')">&nbsp&nbsp</i>';
                    // if (row.status == 1) {
                    //     var icon_xoa = '<i style ="color: red;" id="btt_chucnang_dlt" class="fa-regular fa-solid fa-user-xmark" onclick = "delete_accounts(' + row.xoa.id_nguoidung + ',' + row.xoa.id_chucnang + ',' + row.xoa.active + ','+row.status+')">&nbsp&nbsp</i>';
                    // } else {
                    //     var icon_xoa = '<i style ="color: #007bff;" id="btt_chucnang_dlt" class="fa-solid fa-user-check" onclick = "delete_accounts(' + row.xoa.id_nguoidung + ',' + row.xoa.id_chucnang + ',' + row.xoa.active + ','+row.status+')">&nbsp&nbsp</i>';
                    // }
                    return html = icon_sua + icon_xoa
                },
            },

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
    return ds_dottuyensinh;
}


function them_dottuyensinh(){
        // $("#modal_event").show();
        // $("#dkg_dangky").prop("disabled", true)

        let trangthaichecked = 0;
        if ($("#trangthai").is(":checked")) {  
            trangthaichecked = 1
        }

        $.ajax({
            type: 'post',
            url: '/admin24/them_dottuyensinh',
            data: {
                madot: $("#madot").val(),
                tendot: $("#tendot").val(),
                trangthai: trangthaichecked,
                khoadot: 0,
            },
            success: function (res) {
                if(res == 1){
                    toastr.success('Đã thêm thành công! abc'); //Xu ly ngoai le
                    bang_ds_dottuyensinh().ajax.url('/admin24/bang_ds_dottuyensinh').load()
                }else{
                    toastr.error("Thêm thất bại");
                    if(res == 0){
                        toastr.error('Hệ thống bị lỗi, vui lòng ngưng sử dụng');
                    }else{
                        toastr.warning(res);
                    }
                }
                // $("#dkg_dangky").prop("disabled", false)
                // $("#modal_event").hide();
            }
        });
        document.getElementById('madot').value = "";
        document.getElementById('tendot').value = "";
        document.getElementById('trangthai').value = "";
        document.getElementById('khoadot').value = "";
}

function edit_load_dottuyensinh(id){
    alert(id)
    $('#update_dottuyensinh').attr('data-id',id)
    // alert(id)
    // $.ajax({
    //     type: 'post',
    //     url: '/admin24/edit_dottuyensinh',
    //     data: {
    //         id: id,
    //     },
    //     success: function (res) {
    //         alert(res)
    //         // if(res == 1){
    //         //     toastr.success('Đã thêm thành công! abc'); //Xu ly ngoai le
    //         //     bang_ds_dottuyensinh().ajax.url('/admin24/bang_ds_dottuyensinh').load()
    //         // }else{
    //         //     toastr.error("Thêm thất bại");
    //         //     if(res == 0){
    //         //         toastr.error('Hệ thống bị lỗi, vui lòng ngưng sử dụng');
    //         //     }else{
    //         //         toastr.warning(res);
    //         //     }
    //         // }
    //         // $("#dkg_dangky").prop("disabled", false)
    //         // $("#modal_event").hide();
    //     }
    // });

    // $("#modal_sua_dts").show();
}

function close_modal_sua_dts(){
    $("#modal_sua_dts").hide();
}



$('#update_dottuyensinh').on('click',function(){
    var trangthai = $('#trangthai_1').prop('checked') == true ? trangthai = 1 : trangthai = 0;
    var id = $('#update_dottuyensinh').attr('data-id')
    alert(id)
    alert(trangthai)
    $.ajax({
        type: 'post',
        url: '/admin24/update_dottuyensinh',
        data: {
            id: id,
            trangthai : trangthai
        },
        success: function (res) {
            thongbao(res)

        }
    })
    
})

function refresh_modal_sua_dts(){

}

function delete_dts(){
    let choice = confirm("Xóa đợt tuyển sinh! Đồng ý???");
}
