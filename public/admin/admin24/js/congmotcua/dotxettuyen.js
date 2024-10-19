$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    bang_ds_dotxettuyen();
    // them_dotxettuyen();

});



function bang_ds_dotxettuyen(){
    var ds_dotxettuyen = $("#bang_ds_dotxettuyen").DataTable({
        ajax: {
            type: "get",
            url: "/admin24/bang_ds_dotxettuyen",
        },
        columns: [
            // { title: "STT", data: "stt" },
            { title: "STT", data: "id" },
            { title: "Đợt tuyển sinh", data: "tendot" },
            { title: "ID đxt", data: "iddotxt" },
            { title: "Tên đợt", data: "tendotxettuyen" },
            { title: "ID QT", data: "id_quytrinhcongbo" },
            { title: "Ghi chú", data: "ghichu_quytrinh" },
            { title: "Khóa đợt", data: "khoadot" },
            // { title: "Ngày đăng ký", data: "create_at" },
            // { title: "Trạng thái ", data: "iddonvi" },

            // { 
            //     title: "Trạng thái", 
            //     data: "tiendoxyly",
            //     render: function(data, type, row) {
            //         var tiendo = ''; 
                
            //         if(data == 1) {
            //             tiendo = '<small class="badge badge-warning"><i class="fa-solid fa-file-circle-check fa-fw"></i>&nbsp;&nbsp;Đang xử lý</small>';
            //         } else {  
            //             tiendo = '<small class="badge badge-primary"><i class="fa-solid fa-file-circle-check fa-fw"></i>&nbsp;&nbsp;Hoàn thành</small>';
            //         } 
                    
            //         return tiendo;
            //     }
                        
            // },
            
    
    
          
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
    return ds_dotxettuyen;
}




function them_dotxettuyen(){
    // $("#modal_event").show();
    // $("#dkg_dangky").prop("disabled", true)
    
    $.ajax({
        type: 'post',
        url: '/admin24/them_dotxettuyen',
        data: {
            iddotts: $("#iddotts").val(),
            iddotxt: $("#iddotxt").val(),
            tendotxettuyen: $("#tendotxettuyen").val(),
            id_quytrinhcongbo: $("#id_quytrinhcongbo").val(),
            ghichu_quytrinh: $("#ghichu_quytrinh").val(),
            khoadot: $("#khoadot").val(),
        },
        success: function (res) {
            if(res == 1){
                toastr.success('Đã thêm thành công! abc'); //Xu ly ngoai le
                bang_ds_dotxettuyen().ajax.url('/admin24/bang_ds_dotxettuyen').load()
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
    })

}
