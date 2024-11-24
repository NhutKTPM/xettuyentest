<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('user_24.admin24.include.header')
    <style>
        .card-footer{
            background-color: #fff;
        }
        th, td {
            white-space: nowrap;
        }
        td{
            font-weight: normal
        }
        .text-center{
            text-align: center;
        }
        .border-right{
            border-right:1px solid rgba(0, 0, 0, 0.15)
        }
        table.dataTable > tbody > tr > th, table.dataTable > tbody > tr > td {
            padding: 0px 4px;
        }
        table.dataTable > thead > tr > th, table.dataTable > thead > tr > td{
            padding: 0px 4px;
        }
        table.dataTable>thead>tr>th:not(.sorting_disabled), table.dataTable>thead>tr>td:not(.sorting_disabled){
            padding:0px 4px;
        }
        div.dataTables_wrapper {
            margin: 0 auto;
        }
    </style>
</head>
<body class="sidebar-mini sidebar-collapse">
    <div class="wrapper">
        @include('user_24.admin24.include.navbar')
        @include('user_24.admin24.include.sidebar')
        <div class="content-wrapper" style="min-height: 1302.12px;">
             @include('user_24.admin24.include.contentheader') {{--cai nay la cai trang chur// --}}
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="height: 605px">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-3 col-12" style="margin-bottom: 5px">
                                            <div class="form-group row" >
                                                <label for="" class="col-sm-2 col-md-3 col-form-label" style="padding-bottom: 0px">Khóa:</label>
                                                <div class="col-sm-10 col-md-9">
                                                    <select class="form-control " id="thongkehs_khoas"  style="width:100%;" >
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12" style="margin-bottom: 5px">
                                            <div class="form-group row" >
                                                <label for="" class="col-sm-2 col-md-3 col-form-label" style="padding-bottom: 0px">Khoa:</label>
                                                <div class="col-sm-10 col-md-9">
                                                    <select class="form-control" id="thongkehs_khoa"  style="width:100%;" >
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12" style="margin-bottom: 5px">
                                            <div class="form-group row" >
                                                <label for="" class="col-sm-2 col-md-3 col-form-label" style="padding-bottom: 0px">Ngành:</label>
                                                <div class="col-sm-10 col-md-9">
                                                    <select class="form-control" id="thongkehs_nganh"  style="width:100%;" >
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12" style="margin-bottom: 5px">
                                            <div class="form-group row" >
                                                <label for="" class="col-sm-2 col-md-3 col-form-label" style="padding-bottom: 0px">Lớp:</label>
                                                <div class="col-sm-10 col-md-9">
                                                    <select class="form-control" id="thongkehs_lop"  style="width:100%;" >
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12" style="margin-bottom: 5px">
                                            <div class="form-group row " >
                                                <label for="" class="col-sm-2 col-md-3 col-form-label" style="padding-bottom: 0px">Trạng thái:</label>
                                                <div class="col-sm-10 col-md-9 " >
                                                    <select class="form-control " id="thongkehs_trangthai"  style="width:100%;" >
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-12" style="margin-bottom: 5px">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="style_all_button">
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <button type="button" id="timkiem_tkhs" onclick="timkiem_tkhs()" class="btn btn-block btn-primary btn-xs"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;&nbsp;Tìm kiếm</button>
                                                            </div>
                                                            
                                                            <div class="col-2">
                                                                <button type="button" id="xuatexceltkhs" onclick="" class="btn btn-block btn-primary btn-xs"><i class="fa-regular fa-file-excel"></i>&nbsp;&nbsp;Excel</button>
                                                            </div>
                                                            <div class="col-2">
                                                                <button type="button" id="thongkehs" onclick="" class="btn btn-block btn-secondary btn-xs"><i class="fa-solid fa-chart-simple"></i>&nbsp;&nbsp;Thống kê</button>
                                                            </div>
                                                            <div class="col-2">
                                                                <button type="button" id="resettkhs" style="background-color: #fff; color:#007bff;" onclick="" class="btn btn-block btn-primary btn-xs"><i class="fa-solid fa-arrows-rotate"></i>&nbsp;&nbsp;Reset</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">   
                                    <div class="row">
                                        <div class="col-12" id="thongkehs_danhsach_empty">
                                            <table id = "thongkehs_danhsach" class="table table-bordered table-striped table-hover">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
            </section>
        </div>
        @include('user_24.admin24.include.footer')
    </div>
    @include('user_24.modalevent')
</body>
</html>
<script src="/admin/admin24/js/quanlynhaphoc/thongkehososinhvien.js"></script>