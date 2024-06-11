<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dona Helena - {{ $data->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }} ">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,800" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="{{ asset('css/donahele.css') }} ">

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="antialiased">
    <div class="preloader">
        <div class="sk-spinner sk-spinner-rotating-plane"></div>
    </div>
    <!-- navegação -->
    <nav class="navbar navbar-default navbar-fixed-top templatemo-nav" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">
                    <img src="img/logo-nav-r.png" alt="Dona Helena Empregos">
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right text-uppercase">
                    <li><a href="#home">{{ $data->nav->home }}</a></li>
                    <li><a href="#sobre">{{ $data->nav->about }}</a></li>
                    <li><a href="#contratar">{{ $data->nav->hire }}</a></li>
                    <li><a href="#vagas">{{ $data->nav->jobs }}</a></li>
                    <li><a href="#contato">{{ $data->nav->contact }}</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- fim navegação -->
    <!-- home -->
    <section id="home">
        <div class="over"></div>
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="langs">
                        <a href="/en">ENGLISH</a>
                        |
                        <a href="/es">ESPAÑOL</a>
                    </div>
                    <div class="col-md-10 wow fadeIn" data-wow-delay="0.3s">
                        <h1 class="text-upper">{{ $data->h1 }}</h1>
                        <p class="tm-white">{{ $data->description }}</p>
                        <img src="img/home-img.png" class="img-responsive" alt="home img">
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- fim home -->
    <!-- sobre -->
    <section id="sobre">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
                    <h2 class="text-uppercase">{{ $data->about_h2 }}</h2>
                    @foreach ($data->abouts as $about)
                        <p>{{ $about }}</p>
                    @endforeach
                </div>
                <div class="col-md-6 wow fadeInRight" data-wow-delay="0.6s">
                    <img src="img/fachada.jpg" class="img-responsive" alt="feature img">
                </div>
            </div>
        </div>
    </section>
    <!-- fim sobre -->
    <!-- feature1 -->
    <section id="sobre1">
        <div class="container">
            <div class="row">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.6s">
                    <img src="img/recepcao.jpg" class="img-responsive" alt="feature img">
                </div>
                <div class="col-md-8 wow fadeInUp" data-wow-delay="0.6s">
                    <h2 class="text-uppercase">{{ $data->excelence_h2 }}</h2>
                    <p>{{ $data->excelence }}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- feature1 -->
    <!-- contratar -->
    <section id="contratar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
                    <h2 class="text-uppercase">{{ $data->hire_h2 }}</h2>
                    @foreach ($data->hires as $hire)
                        <p>{{ $hire }}</p>
                    @endforeach
                    <img src="img/sala.jpg" class="hidden-xs" alt="">
                </div>
                <div class="col-md-6 formulario wow fadeInRight" data-wow-delay="0.6s">
                    <div class="contact-form">
                        @livewire('landing.hire-form', ['data' => $data, 'cargos' => $cargos])
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fim contratar -->
    <!-- vagas -->
    <section id="vagas">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeInDown">
                    <h2 class="text-uppercase">{{ $data->jobs_h2 }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 wow fadeInDown" data-wow-delay="0.6s">
                    @foreach ($cargos->where('vagas', '>', 0) as $vaga)
                        <div class="col-sm-6">
                            <p>
                                <i class="fa fa-angle-right"></i>
                                {{ $vaga->nome }}
                                <small>({{ $vaga->vagas }})</small>
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-5 wow fadeInDown" data-wow-delay="0.6s">
                    <p>{{ $data->jobs_message }} <a
                            href="tel:{{ $data->phone_link }}"><strong>{{ $data->phone }}</strong></a>.</p>
                    <button type="button" class="btn btn-primary text-uppercase" data-toggle="modal"
                        data-target="#curriculoModal">{{ $data->jobs_cta }}</button>
                </div>
            </div>
        </div>
    </section>
    <!-- fim vagas -->
    <!-- contato -->
    <section id="contato">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <h2 class="text-uppercase">{{ $data->contact_h2 }}</h2>
                        <p>{{ $data->contact_description }} <a
                                href="#vagas"><strong>{{ $data->jobs_h2 }}</strong></a> {{ $data->contact_above }}.
                        </p>
                        <address>
                            <p><a href="https://goo.gl/maps/Vtzce9oAJex" target="_blank"><i
                                        class="fa fa-map-marker"></i></a> {{ $data->address }}</p>
                            <p><i class="fa fa-location-arrow"></i> {{ $data->reference }}</p>
                            <p><a href="https://api.whatsapp.com/send?phone=5541991918597"><i
                                        class="fa fa-whatsapp"></i></a> {{ $data->phone }}</p>
                        </address>
                    </div>
                    <div class="col-md-6 formulario wow fadeInUp" data-wow-delay="0.6s">
                        <div class="contact-form">
                            <form action="contato" method="post">
                                <input type="hidden" id="lang" name="lang" value="pt">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="nome" name="nome"
                                        placeholder="{{ $data->form->name }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control tel" id="telefone" name="telefone"
                                        placeholder="{{ $data->form->phone }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="{{ $data->form->phone }}">
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="assunto" name="assunto"
                                        placeholder="{{ $data->form->subject }}">
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" placeholder="{{ $data->form->message }}" id="mensagem" name="mensagem"
                                        rows="4"></textarea>
                                </div>
                                <div class="col-md-8">
                                    <input type="submit" class="form-control text-uppercase"
                                        value="{{ $data->form->btn_submit }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fim contato -->
    <!-- rodapé -->
    <footer>
        <div class="container">
            <div class="row">
                <p class="copy">Copyright © {{ date('Y') }} Dona Helena Empregos</p>
            </div>
        </div>
    </footer>
    <!-- fim rodapé -->
    <!-- modal currúculo -->
    <div class="modal fade" id="curriculoModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content formulario">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase">{{ $data->jobs_cta }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('landing.curriculum-form', ['data' => $data, 'cargos' => $cargos])
                </div>
            </div>
        </div>
        <!-- fim do modal currículo -->
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <script src="{{ asset('js/jquery.singlePageNav.min.js') }}"></script>
        <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="{{ asset('js/jquery.easy-overlay.js') }}"></script>
</body>

</html>
