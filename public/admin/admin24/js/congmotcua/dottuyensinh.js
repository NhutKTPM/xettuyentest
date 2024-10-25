$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    bang_ds_dottuyensinh();
    

});



function bang_ds_dottuyensinh(){
    var ds_dottuyensinh = $("#bang_ds_dottuyensinh").DataTable({
        ajax: {
            type: "get",
            url: "/admin24/bang_ds_dottuyensinh",
        },
        columns: [
            { title: "ID", data: "id" },
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
                    var icon_sua = '<i id="btt_chucnang_edit" class="fa-regular fa-pen-to-square" onclick = "edit_dottuyensinh()" >&nbsp&nbsp</i>';

                    var icon_xoa = '<i style ="color: red;" id="btt_chucnang_dlt" class="fa-regular fa-solid fa-user-xmark" onclick = "delete_dts()">&nbsp&nbsp</i>';

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

function edit_dottuyensinh(){
    $("#modal_sua_dts").show();
}

function close_modal_sua_dts(){
    $("#modal_sua_dts").hide();
}

function update_dts(){

}

function refresh_modal_sua_dts(){

}

function delete_dts(){
    let choice = confirm("Xóa đợt tuyển sinh! Đồng ý???");
}
