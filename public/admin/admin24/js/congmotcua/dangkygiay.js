$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#dkg_chonloaigiay').select2();

    loadthongtin();

 



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
            $('#dangkygiay_noicapcccd').text(res[0].noicapcccd);
            

            dangkygiay_noisinh
            // alert()

        }
    })
}







$('#dkg_chonloaigiay').on('change',function(){
    var id = $('#dkg_chonloaigiay').val();
    alert(id)
})
