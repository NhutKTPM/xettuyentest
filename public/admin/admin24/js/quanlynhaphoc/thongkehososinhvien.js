$('#thongkehs_khoas').select2()
$('#thongkehs_khoa').select2()
$('#thongkehs_nganh').select2()
$('#thongkehs_lop').select2()
$('#thongkehs_trangthai').select2()

$.ajax({
    type: "get",
    url: "thongkehs_khoa",
    success: function (res) {
        $('#thongkehs_khoa').select2(
            {
                data: res
            }
        )
    }
});
$.ajax({
    type: "get",
    url: "thongkehs_khoas",
    success: function (res) {
        $('#thongkehs_khoas').select2(
            {
                data: res
            }
        )
    }
});

$.ajax({
    type: "get",
    url: "thongkehs_nganh",
    success: function (res) {
        $('#thongkehs_nganh').select2(
            {
                data: res
            }
        )
    }
});

$.ajax({
    type: "get",
    url: "thongkehs_trangthai",
    success: function (res) {
        $('#thongkehs_trangthai').select2(
            {
                data: res
            }
        )
    }
});

$.ajax({
    type: "get",
    url: "thongkehs_lop",
    success: function (res) {
        $('#thongkehs_lop').select2(
            {
                data: res
            }
        )
    }
});


// var thongkehs_danhsach = $("#thongkehs_danhsach").DataTable({
//     processing: true,
//     deferRender: true,
//     ajax: {
//         type: 'get',
//         url: 'thongkehs_danhsach/'+$('#thongkehs_lop').val(),
//         // dataSrc: 'data'
//     },
//     columns: [


//         { title: "STT", data: 'stt' },
//         { title: "Họ tên", data: 'hoten' },
//         { title: "MSSV", data: 'mssv' },
//         { title: "CCCD", data: 'cccd' },
//         {
//             title: "Giấy khai sinh",
//             data: 'giay_khai_sinh',
//             render: function (data) {
//                 return '<input type="checkbox" ' + (data == 1 ? 'checked' : '') + ' style="height:14px">';
//             }
//         },
//         {
//             title: "GCN tốt nghiệp THPT tạm thời",
//             data: 'gcn_tot_nghiep',
//             render: function (data) {
//                 return '<input type="checkbox" ' + (data == 1 ? 'checked' : '') + ' style="height:14px">';
//             }
//         },
//         {
//             title: "Bằng tốt nghiệp THPT",
//             data: 'bang_tot_nghiep',
//             render: function (data) {
//                 return '<input type="checkbox" ' + (data == 1 ? 'checked' : '') + ' style="height:14px">';
//             }
//         },
//         {
//             title: "Học bạ THPT",
//             data: 'hoc_ba',
//             render: function (data) {
//                 return '<input type="checkbox" ' + (data == 1 ? 'checked' : '') + ' style="height:14px">';
//             }
//         },
//         {
//             title: "SYLL",
//             data: 'syll',
//             render: function (data) {
//                 return '<input type="checkbox" ' + (data == 1 ? 'checked' : '') + ' style="height:14px">';
//             }
//         },
//         {
//             title: "Giấy đăng kí NVQS",
//             data: 'nvqs',

//             render: function (data) {
//                 return '<input type="checkbox" ' + (data == 1 ? 'checked' : '') + ' style="height:14px">';
//             }
//         },
//     ],
//     columnDefs: [
//         { 
//             targets: [0,4,5,6,7,8,9], // Căn giữa cột thứ 0 và 1
//             className: 'dt-center', // Thêm class dt-center
//             // visible: false
//         }
//     ],



//     scrollY: 390,
//     language: {
//         emptyTable: "Không tìm thấy hồ sơ",
//         info: " _START_ / _END_ trên _TOTAL_ ho so",
//         paginate: {
//             first: "Trang đầu",
//             last: "Trang cuối",
//             next: "Trang sau",
//             previous: "Trang trước",
//         },
//         search: "Tìm kiếm:",
//         loadingRecords: " ... ",
//         lengthMenu: " _MENU_ Hồ sơ",
//         infoEmpty: "",
//     },
//     retrieve: true,
//     paging: true,
//     lengthChange: true,
//     searching: true,
//     ordering: false,
//     info: false,
//     autoWidth: true,
//     responsive: true,
//     select: true,
// });

function load_table_tkhs(data){
    return new Promise (function(resolve, reject){
        var table =  $('#thongkehs_danhsach').DataTable({
            processing: true,
            data: data.data, // Dữ liệu sinh viên
            columns: data.columns, // Cột được lấy từ phản hồi
            language: {
                emptyTable: "Không tìm thấy sinh viên",
                info: "_TOTAL_ sinh viên",
                paginate: {
                    first: "Trang đầu",
                    last: "Trang cuối",
                    next: "Trang sau",
                    previous: "Trang trước"
                },
                search: "Tìm kiếm:",
                loadingRecords: "Đang tìm kiếm ... ",
                lengthMenu: "Hiện thị _MENU_ SV",
                infoEmpty: "",
            },
            retrieve: true,
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
            responsive: false,

        });
        if ($.fn.dataTable.isDataTable('#thongkehs_danhsach')) {
            table.clear();
            table.rows.add(data.data); // Add new data
            table.draw(); // Redraw the table
        }
        resolve(table);
    })
}
function timkiem_data_tkhs(){
    return new Promise (function(resolve, reject){
        var idkhoas = $('#thongkehs_khoas').val();
        var idkhoa = $('#thongkehs_khoa').val();
        var idnganh = $('#thongkehs_nganh').val();
        var idlop = $('#thongkehs_lop').val();    
        alert(idkhoas)
        $.ajax({
            type: 'get',
            url: 'thongkehs_danhsach/'+ idkhoas + "/" + idkhoa + "/" + idnganh + "/" + idlop, // URL để lấy dữ liệu
             
            dataType: 'json',
            success: function (res) {
                resolve(res)

            }
        })
    })
}
async function timkiem_tkhs(){
    var data = await timkiem_data_tkhs();
    await load_table_tkhs(data)
}





// function ham1() {
//     return new Promise (function(resolve, reject){
//         setTimeout(() => {
//             console.log('1111111111')
//             resolve(1)
//         }, 3000);
//         // resolve(1)
//     })
// }

// function ham2() {
//     return new Promise (function(resolve, reject){
//         setTimeout(() => {
//             console.log('22222222222222')
//             resolve(1)
//         }, 5000);
      
//     })
// }
// async function timkiem_tkhs(){
//     await ham2();
//     await ham1();
  
//     // var data = await timkiem_data_tkhs();
//     // await load_table_tkhs(data)
// }s