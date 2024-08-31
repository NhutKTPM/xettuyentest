{{-- @extends('admin.main') --}}

<asides style="background-color: rgb(10 85 140);" class="main-sidebar sidebar-dark-primary elevation-0">
    <!-- Brand Logo -->
    <a href="" style="border-bottom: 3px solid #4577a3;padding: 0.653rem 0.5rem;" class="brand-link">

        <img src="\img\CTUT_logo.jpg" alt="logo CTUT" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">CTUT|Quản lý hồ sơ</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- Sidebar Menu -->
    <nav class="mt-2">

        <div class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false" style = "color: white" id = "sidebar">
            {{-- --}}
            {!! htmlspecialchars_decode($menu) !!}
        </div>
    </nav>
    </div>
</asides>

<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<script>

</script>
