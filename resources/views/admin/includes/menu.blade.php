  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
      <div class="scrollbar-inner">
          <div class="sidenav-header  align-items-center">
              <a class="navbar-brand" href="javascript:void(0)">
                  <img src="{{ asset('img/logo.png') }}" class="navbar-brand-img" alt="...">
              </a>
          </div>
          <div class="navbar-inner">
              <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link active" href="examples/dashboard.html">
                              <i class="fas fa-home text-default"></i>
                              <span class="nav-link-text">Início</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin.group.adicionar') }}">
                              <i class="fas fa-book text-default"></i>
                              <span class="nav-link-text">Grupos</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin.category.adicionar') }}">
                              <i class="fas fa-list-alt text-default"></i>
                              <span class="nav-link-text">Categoria</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin.brand.adicionar') }}">
                              <i class="fas fa-copyright text-default"></i>
                              <span class="nav-link-text">Marca</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin.bull.adicionar') }}">
                              <i class="far fa-file-alt text-default"></i>
                              <span class="nav-link-text">Bulas</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin.product.adicionar') }}">
                              <i class="fas fa-syringe	"></i>
                              <span class="nav-link-text">Produtos</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin.salespeople.adicionar') }}">
                              <i class="fas fa-users text-default"></i>
                              <span class="nav-link-text">Vendedores</span>
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </nav>