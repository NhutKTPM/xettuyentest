$('#major_bhyt_thongke').select2()
loadmajor()
function loadmajor(){
    $.ajax({
        type: "get",
        url: "loadmajor/",
        // load data huyện 
        success: function (res) {
            $('#major_bhyt_thongke').select2({data: res.major})

        }
    });
}
bhyt_thongke(0).ajax.url("loadthongtin_bhyt_thongke/0").load();
// bhyt_thongke(0, 0, 0);


function search_bhyt_thongke() {
    var major = $('#major_bhyt_thongke').val();
    bhyt_thongke(major).ajax.url("loadthongtin_bhyt_thongke/"+major).load();

}
function bhyt_thongke(major) {
    if ($.fn.DataTable.isDataTable("#table_thongtinsv_bhyt_thongke")) {
        // Xóa DataTable hiện tại và cấu trúc lại bảng
        $("#table_thongtinsv_bhyt_thongke").DataTable().destroy();
        $("#table_thongtinsv_bhyt_thongke").empty();
    }

    var bhyt_thongke = $("#table_thongtinsv_bhyt_thongke").DataTable({
        ajax: {
            url: "loadthongtin_bhyt_thongke/" + major,
            dataSrc: 'data' 
        },
        columns: [
            { 
                title: "Số thứ tự", 
                data: "thutu", 
                className: 'text-center'
             },
            { 
                title: "Mã chuyên ngành", 
                data: "major", 
                className: 'text-center'
             },
            { 
                title: "Tên chuyên ngành", 
                data: "tenchuyennganh", 
                className: 'text-center' 
            },         
            
            { 
                title: "Có BHYT", 
                data: "Có BHYT", 
                className: 'text-center'
             },
            { 
                title: "Chưa có BHYT", 
                data: "Chưa có BHYT", 
                className: 'text-center'
             },
             { 
                title: "Tổng số ", 
                data: "Tổng số thẻ BHYT", 
                className: 'text-center'
             }
        ],
        scrollY: 430,
        language: {
            emptyTable: "Không tìm thấy dữ liệu",
            info: "_START_ / _END_ trên _TOTAL_",
            paginate: {
                first: "Trang đầu",
                last: "Trang cuối",
                next: "Trang sau",
                previous: "Trang trước"
            },
            search: "Tìm kiếm:",
            loadingRecords: "Đang tải dữ liệu...",
            lengthMenu: "Hiển thị _MENU_ bản ghi",
            infoEmpty: "Không có dữ liệu"
        },
        retrieve: true,
        paging: true,
        lengthChange: false,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: false,
        select: true
    });
    
    return bhyt_thongke;
}

$("#excel_hsnh_thongtinsinhvien_bhyt_thongke").on('click', function () {
    var major = $('#major_bhyt_thongke').val();

    // major = (major === undefined || major === '') ? 0 : major;
    // window.location.href = "/admin24/hosonhaphoc/excel_hsnh_thongtinsinhvien_bhyt_thongke/" + major ;

    if (major !== null && major !== '') {
        window.location.href = "/admin24/hosonhaphoc/excel_hsnh_thongtinsinhvien_bhyt_thongke/" + major;
    } else {
        window.location.href = "/admin24/hosonhaphoc/excel_hsnh_thongtinsinhvien_bhyt_thongke1/" + major;
    }
    
            
        

    
});




