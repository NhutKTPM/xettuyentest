$(document).on('keydown click', function(event) {
    // ESC
    if (event.type === 'keydown' && event.key === "Escape") {
        $('#modal_event').hide('fast');
    }

    // Kiểm tra sự kiện click ở ngoài img hoặc mark
    if (event.type === 'click' && !$(event.target).closest('#img_bhyt_load, .fa-circle-xmark').length) {
        $('#modal_event').hide('fast');
    }
});

//click vào xmark
$('.rounded-circle').on('click', function() {
    $('#modal_event').hide('fast');
});

$('#major_bhyt').select2()
loadmajor()
function loadmajor(){
    $.ajax({
        type: "get",
        url: "loadmajor/",
        // load data huyện 
        success: function (res) {
            $('#major_bhyt').select2({data: res.major})

        }
    });

    // $('#modal_event').show();

}


function search_bhyt() {
    var major = $('#major_bhyt').val();
    var cccd = $('#cccd_bhyt').val();
    var mssv = $('#mssv_bhyt').val();
    var bhyt = $('#sothe_bhyt').val();
    major == 0 ? major = 0 :  major = $('#major_bhyt').val();
    cccd == 0 ? cccd = 0 :  cccd = $('#cccd_bhyt').val();
    mssv == 0 ? mssv = 0 :  mssv = $('#mssv_bhyt').val();
    bhyt = (bhyt === undefined || bhyt === '') ? 0 : bhyt;
    table_thongtinsv_bhyt(major,cccd,mssv,bhyt).ajax.url("loadthongtin_bhyt/"+major+"/"+cccd+"/"+mssv+"/"+bhyt).load();

}
table_thongtinsv_bhyt(0,0,0,0).ajax.url("loadthongtin_bhyt/0/0/0/0").load();

function table_thongtinsv_bhyt(major,cccd,mssv,bhyt){
    if ($.fn.DataTable.isDataTable("#table_thongtinsv_bhyt")) {
        $("#table_thongtinsv_bhyt").DataTable().destroy();
        $("#table_thongtinsv_bhyt").empty();
    }
    var table_thongtinsv_bhyt =  $("#table_thongtinsv_bhyt").DataTable({
        ajax: "loadthongtin_bhyt/"+major+"/"+cccd+"/"+mssv+"/"+bhyt,
        columns: [
            {
                title: '<input type="checkbox" id="hsnh_checkall_bhyt" onclick="hsnh_checkall()" style="height:19px">',
                className: 'text-center',
                data: null,
                render: function(data, type, row) {
                    return '<input type="checkbox" class="hsnh_checkbox_bhyt" id_taikhoan=' + row.id_taikhoan + ' style="height:19px">';
                }
            },
            
            { 
                name: "mssv", 
                className: 'text-center', 
                title: "MSSV", 
                data: "mssv" 
            },
            { 
                name: "cccd", 
                className: 'text-center', 
                title: "CCCD/CMND",
                 data: "cccd" },
            { 
                name: "hoten",
                title: "Họ và tên", 
                data: "hoten" },
                { 
                    name: "tenchuyennganh ",
                    title: "Chuyên ngành", 
                    data: "tenchuyennganh" },
            { 
                name: "ngaysinh", className: 'text-center',
                title: "Ngày sinh", 
                data: "ngaysinh" },
            { 
                name: "gioitinh",
                title: "Giới tính", 
                className: 'text-center', 
                data: "gioitinh", 
                render: 
                function(data) { 
                    return data == 1 ? "Nữ" : "Nam"; 
                } 
            },
            { 
                name: "diachi", 
                className: 'text-center',
                title: "Địa chỉ", 
                data: "diachi" 
            },
            { 
                name: "bhyt", 
                className: 'text-center',
                title: "Số thẻ BHYT", 
                data: "bhyt",
                // render: function(data) {
                //     return data ? data : '';
                // }
            },
            { 
                name: "bhyt", 
                className: 'text-center',
                title: "", 
                data: "bhyt" ,
                render: function(data,type,row){
                    return '<i onclick = "open_img('+row.id_taikhoan+')" class="fa-solid fa-file-image"></i>'
                }
            },
            



        ],
        scrollY: 430,
        language: {
            emptyTable: "Không tìm thấy sinh viên",
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
        responsive: false,
        select: true,
    })
    return table_thongtinsv_bhyt;
}

function hsnh_checkall(){
    if($('#hsnh_checkall_bhyt').prop('checked') == true){
        $('.hsnh_checkbox_bhyt').prop('checked',true)
    }else{
        $('.hsnh_checkbox_bhyt').prop('checked',false)
    }

}

$('#table_thongtinsv_bhyt tbody').on('click', 'tr', function(e) {
    if (!$(e.target).is('.hsnh_checkbox_bhyt')) {
        var checkbox = $(this).find('input.hsnh_checkbox_bhyt');
        if (checkbox.prop('checked')) {
            checkbox.prop('checked', false);
            $(this).removeClass('selected'); 
        } else {
            checkbox.prop('checked', true);
            $(this).addClass('selected'); 
        }
    }
});

$("#excel_hsnh_thongtinsinhvien_bhyt").on('click', function () {
    var major = $('#major_bhyt').val();
    var cccd = $('#cccd_bhyt').val();
    var mssv = $('#mssv_bhyt').val();
    

    major = (major === undefined || major === '') ? 0 : major;
    cccd = (cccd === undefined || cccd === '') ? 0 : cccd;
    mssv = (mssv === undefined || mssv === '') ? 0 : mssv;
    console.log('1')
    var hsnh_checkbox = document.getElementsByClassName('hsnh_checkbox_bhyt');
    console.log(hsnh_checkbox)
    var id_sinhvien = []
    for(let i = 0;i<hsnh_checkbox.length; i++){
        if($(hsnh_checkbox[i]).prop('checked') == true){
            id_sinhvien.push($(hsnh_checkbox[i]).attr('id_taikhoan'));
        }

    }
    if (id_sinhvien.length==0){
        toastr.warning('Vui lòng chọn sinh viên')
        } else{
    window.location.href = "/admin24/hosonhaphoc/excel_hsnh_thongtinsinhvien_bhyt/" + major + "/" + cccd + "/" + mssv + "/" + id_sinhvien ;
    }

    
});


// //Mo input dang file
// $('#import_bhyt').on('click', function() {
//     $('#importForm').submit();
// });

// //Trong khi fileInput submit
// $('#importForm').on('submit',function(e){

//     e.preventDefault();
//     var filePath = $('#fileInput').val();
//     var allowedExtensions = /(\.xlsx|\.xls)$/i;
//     if(!allowedExtensions.exec(filePath)){
//         toastr.warning("File không đúng định dạng")
//     }else{
//         $.ajax({
//             url: "/admin24/hosonhaphoc/import_bhyt",
//             type:"POST",
//             data: new FormData(this),
//             contentType:false,
//             processData:false,
//             success:function(data){
//                 if(data == 1){
//                     toastr.success("asggagargi")
//                     table_thongtinsv_bhyt(0,0,0,0).ajax.url("loadthongtin_bhyt/0/0/0/0").load();
//                 }
//                 else{
//                     toastr.error("Hệ thống bị lỗi")
//                 }
               
//             }
//         });
//     }
// })

$('#import_bhyt').on('click', function() {
    $('#importForm').submit();
});

$('#importForm').on('submit', function(e) {
    e.preventDefault();
    var filePath = $('#fileInput').val();
    if(filePath==''){
        toastr.warning('Vui lòng chọn file')
    }else{
        var allowedExtensions = /(\.xlsx|\.xls)$/i;
        if (!allowedExtensions.exec(filePath)) {
            toastr.warning("File không đúng định dạng!");
        } else {
            $.ajax({
                url: "/admin24/hosonhaphoc/import_bhyt",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == 1) {
                        toastr.success("Tải lên thành công");
                        table_thongtinsv_bhyt(0, 0, 0, 0).ajax.url("loadthongtin_bhyt/0/0/0/0").load();
                    } else {
                        toastr.error("Hệ thống bị lỗi");
                    }
                },
                // error: function() {
                //     toastr.error("Có lỗi xảy ra trong quá trình import");
                // }
            });
        }
    }

       
});

//img
function open_img(id){
    // alert(id)
    $.ajax({
        url: "/admin24/hosonhaphoc/img_bhyt/"+id,
        type:"get",
        success:function(data){
        
$('#modal_event').show('slow');
            $('#img_bhyt_load').attr('src', data);
            // if(data == 1){
            //     toastr.success("asggagargi")
            //     table_thongtinsv_bhyt(0,0,0,0).ajax.url("loadthongtin_bhyt/0/0/0/0").load();
            // }else{
            //     toastr.error("He thong bi loi")
            // }
           
            // alert(data);
            // thongbao(data)
            // $('#namtotnghiep').val('');
           
        }
    });
}



document.getElementById('selectFileBtn').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});
  document.getElementById('cancelFileBtn').addEventListener('click', function() {
    var fileInput = document.getElementById('fileInput');
    var selectedFileName = document.getElementById('selectedFileName');
    
    fileInput.value = '';

    selectedFileName.innerHTML = '';
    
});
document.getElementById('fileInput').addEventListener('change', function() {
    var fileInput = document.getElementById('fileInput');
    var fileNameContainer = document.getElementById('selectedFileName');
    if (fileInput.files.length > 0) {
        fileNameContainer.innerHTML = '' + fileInput.files[0].name;
    } else {
        fileNameContainer.innerHTML = '';
    }
});


