loadmajor()
loaigiay()
$('#major').select2()
$('#loaigiay').select2()

table_thongke_xuatfile(major,nam).ajax.url("thongke_xuatfile/0/0").load();


function search() {
    var major = $('#major').val();
    var nam = $('#nam').val();
    major == 0 ? major = 0 :  major = $('#major').val();
    nam == 0 ? nam = 0 :  nam = $('#nam').val();
    table_thongke_xuatfile(major).ajax.url("thongke_xuatfile/"+major+"/"+nam).load();
}



function table_thongke_xuatfile(major,nam){
    if ($.fn.DataTable.isDataTable("#table_thongke_xuatfile")) {
        $("#table_thongke_xuatfile").DataTable().clear().destroy();
    }
    var table_thongtinsv =  $("#table_thongke_xuatfile").DataTable({
        // processing: true,
        // serverSide: true,
        // deferRender: true,
        ajax: "thongke_xuatfile/"+major+"/"+nam ,
        columns: [
            // {
            //     title: '<input type ="checkbox" id ="hsnh_checkall"  onclick = "hsnh_checkall()" style = "height:19px">',
            //     className: 'text-center',
            //     data: "id_major",
            //     render: function(data,type,row){
            //         return '<input type ="checkbox" class = "hsnh_checkbox" id_major = '+row.id_major+' style = "height:19px">';
            //     }
            // },
            {
                name: "stt",
                className: 'text-center',
                title: "STT",
                data: "stt",
            },
            {
                name: "id_major",
                className: 'text-center',
                title: "Mã ngành",
                data: "id_major",
            },
            {
                name: "major",
                className: 'text-center',
                title: "Ngành",
                data: "name_major",
            },
            // {
            //     name: "year",
            //     className: 'text-center',
            //     title: "Năm",
            //     data: "year",
            // },

            {
                name: "nvqs",
                className: 'text-center',
                title: "NVQS",
                data: "nvqs",
            },
            {
                name: "vv",
                className: 'text-center',
                title: "Vay vốn",
                data: "vayvon",
            }

        ],
        // columnDefs: [
        //     {
        //         targets: [0, 1, 2,3,4,5,6,7,8,9,10,11,12],
        //         orderable: false
        //         // className: "text-center"
        //     },
        // ],
        scrollY: 430,
        language: {
            emptyTable: "Không tìm thấy",
            info: " _START_ / _END_ trên _TOTAL_",
            paginate: {
                first: "Trang đầu",last: "Trang cuối",
                next: "Trang sau",
                previous: "Trang trước",
            },
            search: "Tìm kiếm:",
            loadingRecords: " ... ",
            lengthMenu: "Hiện thị _MENU_",
            infoEmpty: "",
        },
        retrieve: true,
        paging: false,
        lengthChange: false,
        searching: true,
        ordering: false,
        info: true,
        autoWidth: false,
        responsive: true,
        select: true,


    });
    $('#table_thongke_xuatfile tbody').on('click', 'tr', function () {
        var $checkbox = $(this).find('.hsnh_checkbox');
        if ($checkbox.length) {
            // Chuyển đổi trạng thái của checkbox
            $checkbox.prop('checked', !$checkbox.prop('checked'));
        }
    });
    return table_thongtinsv;
}


$("#excel_hsnh_thongke_xuatfile").on('click',function(){

    var major = $('#major').val();
    major == 0 ? major = 0 :  major = $('#major').val();
    var nam = $('#nam').val();
    nam == 0 ? nam = 0 :  nam = $('#nam').val();
    // var hsnh_checkbox = document.getElementsByClassName('hsnh_checkbox');
    // var id_major = []
    // for(let i = 0;i<hsnh_checkbox.length; i++){
    //     if($(hsnh_checkbox[i]).prop('checked') == true){
    //         id_major.push($(hsnh_checkbox[i]).attr('id_major'));
    //     }

    // }
    // if (id_major.length === 0) {
    //     // Hiển thị thông báo cảnh báo bằng toastr
    //     toastr.warning('Vui lòng chọn ít nhất một chuyên ngành để xuất file.');
    // } else {
        // Chuyển hướng nếu có ít nhất một checkbox được chọn
        window.location.href = "/admin24/hosonhaphoc/excel_hsnh_thongke_xuatfile/"+major +"/"+nam;
    //}
})



function hsnh_checkall(){
    // var hsnh_checkbox = document.getElementsByClassName('hsnh_checkbox');
    if($('#hsnh_checkall').prop('checked') == true){
        $('.hsnh_checkbox').prop('checked',true)
    }else{
        $('.hsnh_checkbox').prop('checked',false)
    }

}

function loadmajor(){
    $.ajax({
        type: "get",
        url: "loadmajor/",
        // load data huyện
        success: function (res) {
            $('#major').select2({data: res.major})

        }
    });
}
function loaigiay(){
    $.ajax({
        type: "get",
        url: "loaigiay/",
        success: function (res) {
            $('#loaigiay').select2({data: res.loaigiay})
        }
    });
}
