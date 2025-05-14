@extends('layout.base_page')

@section('content')
    <main>
        <section id="home-top" class="d-flex align-items-center justify-content-center">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-xl-6 col-lg-8">
                        <h1><span>Sistema Interno</span> <br> PRODAP</h1>

                    </div>
                </div><!--
                <div class="row mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
                    <div class="col-xl-2 col-md-4 col-6">
                        <div class="icon-box">
                            <i class="ri-video-line"></i>
                            <h3><a href="#">Vídeo Empresa</a></h3>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 col-6 ">
                        <div class="icon-box">
                            <i class="ri-whatsapp-fill"></i>
                            <h3><a href="#">Contato WhatsApp</a></h3>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>

        <section id="companies" class="container" data-aos="fade-up">
            <div class="row">
                <div class="section-title col-12">
                    <div class="row">
                        <div class="col-12"><h2>Sistemas</h2></div>
                        <div class="col-6"><p>Fique por dentro</p></div>
                        <div class="col-6 text-right"><a href="#"><b>VER MAIS</b> <i class="ri-add-box-fill"></i></a></div>
                    </div>
                </div>
            </div>

            <div class="systems-container" style="display: flex; overflow-x: auto; gap: 15px; padding: 10px 0;">
                @foreach($systems as $system)
                    <div style="min-width: 250px; border: 1px solid #ddd; border-radius: 8px; padding: 15px;">
                        <h5 style="margin-bottom: 15px;">{{ $system->name }}</h5>
                        <a href="{{ $system->url }}" target="_blank" style="display: inline-block; padding: 5px 15px; background: #f0f0f0; border-radius: 4px; text-decoration: none;">
                            Acessar
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="whatsapp-care">
            <div class="container" data-aos="zoom-in">
                <div class="text-center">
                    <h3>Atendimento 24h</h3>
                    <p> Clique abaixo para solicitar seu atendimento imediato.</p>
                    <a class="whatsapp-care-btn" href="https://wa.me/message/TIKYMHDTWGMFE1" target="_blank" type="button" class="btn btn-primary" data-toggle="modal">Solicitar</a>
                </div>
            </div>
        </section>
        <!-- PT-BR: Missões -->
        <section id="service" class="container mission p-3" data-aos="fade-up">
            <div class="row mt-5">
                <div class="section-title col-12">
                    <div class="row">
                        <div class="col-12"><h2>Serviços</h2></div>
                        <div class="col-6"><p>Saiba mais</p></div>
                        <div class="col-6 text-right"><a href="#"><b>VER MAIS</b> <i class="ri-add-box-fill"></i></a></div>
                    </div>
                </div>
            </div>

            <div class="row" id="mission_list">
                @if(1 < 2)
                    <div class="col-lg-6 col-md-6 d-flex align-items-stretch mb-3">
                        <div class="mission-card" data-aos="fade-up" data-aos-delay="100">
                            <div class="mission-img">
                                <img src="{{
                                    file_exists(public_path() . '/storage/image/mission/202407/ide.jpeg')
                                    ? '/storage/image/mission/202407/ide.jpeg'
                                    : '/storage/image/standardcover.png'
                                }}" class="img-fluid" alt="">
                            </div>

                            <div class="mission-info p-3">
                                <h4>Redes</h4>
                                <p>Intalação de infraestrutura ...</p>
                                <a href="#"><button type="button" class="btn btn-outline-info btn-sm">Conhecer mais</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex align-items-stretch mb-3">
                        <div class="mission-card" data-aos="fade-up" data-aos-delay="100">
                            <div class="mission-img">
                                <img src="{{
                                    file_exists(public_path() . '/storage/image/mission/202407/ide.jpeg')
                                    ? '/storage/image/mission/202407/ide.jpeg'
                                    : '/storage/image/standardcover.png'
                                }}" class="img-fluid" alt="">
                            </div>

                            <div class="mission-info p-3">
                                <h4>Suporte</h4>
                                <p>Intalação de SO ...</p>
                                <a href="#"><button type="button" class="btn btn-outline-info btn-sm">Conhecer mais</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex align-items-stretch mb-3">
                        <div class="mission-card" data-aos="fade-up" data-aos-delay="100">
                            <div class="mission-img">
                                <img src="{{
                                    file_exists(public_path() . '/storage/image/mission/202407/ide.jpeg')
                                    ? '/storage/image/mission/202407/ide.jpeg'
                                    : '/storage/image/standardcover.png'
                                }}" class="img-fluid" alt="">
                            </div>

                            <div class="mission-info p-3">
                                <h4>Apagar fogo</h4>
                                <p>Tua empresa está de pegando fogo...</p>
                                <a href="#"><button type="button" class="btn btn-outline-info btn-sm">Conhecer mais</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex align-items-stretch mb-3">
                        <div class="mission-card" data-aos="fade-up" data-aos-delay="100">
                            <div class="mission-img">
                                <img src="{{
                                    file_exists(public_path() . '/storage/image/mission/202407/ide.jpeg')
                                    ? '/storage/image/mission/202407/ide.jpeg'
                                    : '/storage/image/standardcover.png'
                                }}" class="img-fluid" alt="">
                            </div>

                            <div class="mission-info p-3">
                                <h4>Instalar word</h4>
                                <p>Pacote office en geral (original ou não a sua conta que etsá em risco)...</p>
                                <a href="#"><button type="button" class="btn btn-outline-info btn-sm">Conhecer mais</button></a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <section id="time" class="container team p-3" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
                <div class="section-title col-12">
                    <div class="row">
                        <div class="col-12"><h2>Time</h2></div>
                        <div class="col-6"><p>Faça parte</p></div>
                        <div class="col-6 text-right"><a href="#"><b>VER MAIS</b> <i class="ri-add-box-fill"></i></a></div>
                    </div>
                </div>
            </div>

            <div class="row" id="ministry_list">
                <div class="col-12 col-lg-3 col-md-6 mb-3 d-flex align-items-stretch">
                    <div class="ministry" data-aos="fade-up" data-aos-delay="100">
                        <div class="ministry-img">
                            <img src="{{
                                    file_exists(public_path() . '/storage/image/time/artur.png')
                                    ? '/storage/image/time/artur.png'
                                    : '/storage/image/standardcover.png'
                                }}" class="img-fluid" alt="">
                        </div>

                        <div class="ministry-info">
                            <h4>Artur CO</h4>
                            <a href="#"><button type="button" class="btn btn-outline-info btn-sm">Conhecer</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Contato</h2>
                    <p>CONTATE-NOS</p>
                </div>
                <div>
                    <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3610.576835866408!2d-51.051413200000006!3d0.0413662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8d61e0e107b6a6e3%3A0xa3bffd23b7f8d243!2sPRODAP!5e1!3m2!1spt-BR!2sbr!4v1745416159899!5m2!1spt-BR!2sbr" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="info row">
                            <div class="col-12 col-md-3 mt-lg-0">
                                <i class="fas fa-map-marker-alt"></i>
                                <h4>Endereço:</h4>
                                <p class="address_contact">R. São José, 1251 - Central<br>Macapá - AP, 68900-110</p>
                            </div>
                            <div class="col-12 col-md-3 mt-lg-0">
                                <i class="fas fa-envelope"></i>
                                <h4>E-mail:</h4>
                                <p class="email_contact">contato@corumba.digital</p>
                            </div>
                            <div class="col-12 col-md-3 mt-lg-0">
                                <i class="fa-brands fa-whatsapp"></i>
                                <h4>WhatsApp:</h4>
                                <p class="phone_contact">(96) 98126-1940</p>
                            </div>
                            <div class="col-12 col-md-3 mt-lg-0">
                                <i class="fa fa-file"></i>
                                <h4>Site:</h4>
                                <p><a href="https://prodap.ap.gov.br/" target="_blank">     Portal PRODAP</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection