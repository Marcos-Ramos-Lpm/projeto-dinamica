<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-text mx-3">
        </div>
    </a>

    <hr class="sidebar-divider">
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('clientes') }}">
            <i class="fas fa-users"></i>
            <span>Clientes</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('categoria') }}">
            <i class="fas fa-cubes"></i>
            <span>Categoria de produtos</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('produtos') }}">
            <i class="fas fa-cube"></i>
            <span>Produtos</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('vendas') }}">
            <i class="fas fa-cart-plus"></i>
            <span>Vendas</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
