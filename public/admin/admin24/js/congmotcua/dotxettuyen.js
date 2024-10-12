$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    bang_ds_dotxettuyen();


});



function bang_ds_dotxettuyen(){
    var ds_dotxettuyen = $("#bang_ds_dotxettuyen").DataTable({
        ajax: {
            type: "get",
            url: "/admin24/bang_ds_dotxettuyen",
        },
        columns: [
            { title: "STT", data: "stt" },
            { title: "Mã loại giấy", data: "maloaigiay" },
            { title: "Tên loại giấy", data: "tenloaigiay" },
            { title: "Id đơn vị", data: "iddonvi" },

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
                className: "text-left",
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


