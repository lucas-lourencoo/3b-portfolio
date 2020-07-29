<header id="header" class="fixed-top">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-9 d-flex align-items-center justify-content-between">
                <h1 class="logo">
                    <a href="/">
                        <img src="{{ asset('img/logo.png') }}" alt="">
                    </a>
                </h1>

                <nav class="nav-menu nav-main d-none d-lg-block">
                    <ul>
                        @foreach ($groups as $group)
                        <li class="drop-down"><a href="/produtos">{{ mb_strtoupper($group->name) }}</a>
                            <ul>
                                @foreach ($categories as $category)
                                @if ($category->group_id === $group->id)
                                    <li><a href="/produtos/!category={{ mb_strtolower($category->name) }}">{{ ucfirst($category->name) }}</a></li>
                                @endif
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </nav>
                <nav class="nav-search d-none">
                    <ul>
                        <form action="/produtos">
                            <li class="active"><input type="text" name="q" id="search"
                                    placeholder="Buscar por produtos..." class="form-control"></li>
                            <li class="seach-options">
                                <a id="close"><i class="fas fa-times"></i></a>
                                <a id="go"><i class="fas fa-search"></i></a>
                            </li>
                        </form>
                    </ul>
                </nav>
                <!-- .nav-menu -->
                <div class="bar-options">
                    <a class="bar-opt-btn" id="search-open" href="#"><i class="fas fa-search"></i></a>
                    <a class="bar-opt-btn d-none d-md-inline-block" href="/contato">CONTATO</a>
                </div>

            </div>
        </div>

    </div>
</header>