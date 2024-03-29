<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>3B - Comércio e Importação</title>

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">

    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fontawesome-5.13.0/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
    <link rel="icon" type="imagem/png" href="{{ asset('img/logo.png') }}" />

</head>

<body>

    @include('includes/menu-main')

    <div class="main" id="contato">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="/" title="Voltar ao início do site">Início</a></li>
                    <li>Contato</li>
                </ol>
            </div>
        </section>

        <div class="container-fluid contact-container">
            <div class="row">
                <div class="col-md-6 info-d">
                    <h3 class="text-center">Informações</h3>
                    <div class="info-contact">
                        <p>Você pode nos encontrar na Rua Manoel Martins, 11 - Centro de Campo Grande - MS</p>
                    </div>
                </div>
                <div class="col-md-6 social-d">
                    <h3 class="text-center">Nossas redes sociais</h3>
                    <div class="social-contact">
                        <a href="https://www.instagram.com/3bimportacao/" class="btn-social instagram"><i class="fab fa-instagram"></i><span>Instagram</span></a>
                        <a href="https://www.facebook.com/3bimportacao" class="btn-social facebook"><i class="fab fa-facebook"></i><span>Facebook</span></a>
                        <a href="#" class="btn-social whatsapp"><i class="fab fa-whatsapp"></i><span>WhatsApp</span></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 local-d">
                    <h3 class="text-center">Localização</h3>
                    <div> 
                        <iframe style="border:0; width: 100%; height: 350px;"
                            src="https://maps.google.com/maps?q=Campo%20Grande%20-%20MS%20Rua%20treze%20de%20maio%2C%201191&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" allowfullscreen></iframe> 

                    </div>
                </div>
            </div>
        </div>


    </div>

    @include('includes/footer')


    <div id="preloader"><img src="{{ asset('img/logo.png') }}" alt="Logo 3B"></div>
    <a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="{{ asset('plugins/jquery.easing/jquery.easing.min.js') }}"></script>

</body>

</html>