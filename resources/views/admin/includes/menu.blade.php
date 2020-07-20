<nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars fa-lg"></i></a>
        </li>
        <li class="nav-item">
            <a href="/admin" class="nav-link">Painel de Administrativo</a>
        </li>
    </ul>

</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/admin" class="brand-link">
        <img src="/img/logo.png" alt="Logo 3B">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-5">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/admin" class="nav-link" id="admin-home">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>{{ Auth::user()->name }}<i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('index') }}" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>Sair</p>
                            </a>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header text-center">GERENCIAMENTO</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link" id="group">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>Grupos<i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.grupo.gerenciar') }}" class="nav-link" id="group-manage">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Adicionar</p>
                            </a>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link" id="category">
                        <i class="nav-icon fas fa-paperclip"></i>
                        <p>Categorias<i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.categoria.gerenciar') }}" class="nav-link" id="category-manage">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Adicionar</p>
                            </a>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link" id="brand">
                        <i class="nav-icon fas fa-copyright"></i>
                        <p>Marcas<i class="right fas fa-angle-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.marca.gerenciar') }}" class="nav-link" id="brand-manage">
                                <i class="nav-icon fas fa-plus"></i>
                                <p>Adicionar</p>
                            </a>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.produto.gerenciar') }}" class="nav-link" id="product">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>Produtos<i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.regional.gerenciar') }}" class="nav-link" id="regional">
                        <i class="nav-icon fas fa-arrows-alt"></i>
                        <p>Regional<i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.vendedor.gerenciar') }}" class="nav-link" id="seller">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Vendedores<i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <!--
                <li class="nav-header">AVISOS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-times-circle text-danger"></i>
                        <p class="text">Contas em atraso</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-exclamation-circle text-warning"></i>
                        <p>Contas pendentes</p>
                    </a>
                </li>-->
            </ul>
        </nav>
    </div>
</aside>