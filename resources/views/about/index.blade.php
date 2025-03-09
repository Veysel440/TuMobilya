<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Hakkımızda | TuMobilya</title>
</head>

<body>

@include('partials.navbar')


<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h2 style="color: white;">{{ $menus[1]->page_title }}</h2>
                    <p class="mb-4">{{ $menus[1]->page_description }}</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="images/couch.png" class="img-fluid" alt="Couch Image">
                </div>
            </div>
        </div>
    </div>
</div>



<div class="why-choose-section">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title">Neden Bizi Seçmelisiniz?</h2>
                <p>Bizi seçtiğinizde, modern ve estetik tasarımlarımızla yaşam alanlarınızı dönüştürmek için kaliteli mobilyalar sunuyoruz. Müşteri memnuniyetine verdiğimiz önem ve uygun fiyatlarla, hayalinizdeki iç mekânı oluşturmanıza yardımcı oluyoruz. Profesyonel ekibimiz, ihtiyaçlarınıza uygun çözümler sunmak için her zaman yanınızdadır.</p>

                <div class="row my-5">
                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="images/truck.svg" alt="Fast & Free Shipping" class="img-fluid">
                            </div>
                            <h3>Hızlı ve Ücretsiz Kargo</h3>
                            <p>Hızlı ve ücretsiz kargo hizmetimizle, satın aldığınız ürünleri en kısa sürede kapınıza getiriyoruz. Müşteri memnuniyetini ön planda tutarak, alışveriş deneyiminizi kolay ve keyifli hale getiriyoruz!</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="images/bag.svg" alt="Easy to Shop" class="img-fluid">
                            </div>
                            <h3>Alışveriş Kolaylığı</h3>
                            <p>Alışveriş kolaylığı ile istediğiniz ürünlere hızlıca ulaşın ve zahmetsizce siparişinizi tamamlayın. Kullanıcı dostu web sitemiz, size pratik ve keyifli bir alışveriş deneyimi sunar!</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="images/support.svg" alt="24/7 Support" class="img-fluid">
                            </div>
                            <h3>7/24 Destek</h3>
                            <p>7/24 destek hizmetimizle, ihtiyaç duyduğunuz her an yanınızdayız. Sorularınıza hızlı cevaplar alarak, alışveriş deneyiminizi daha da kolaylaştırıyoruz!</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="images/return.svg" alt="Hassle Free Returns" class="img-fluid">
                            </div>
                            <h3>Sorunsuz İade</h3>
                            <p>Sorunsuz iade politikamızla, satın aldığınız ürünlerden memnun kalmadığınızda endişe etmeden geri gönderebilirsiniz. Müşteri memnuniyetini önceliğimiz olarak görüyoruz!</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-5">
                <div class="img-wrap">
                    <img src="images/why-choose-us-img.jpg" alt="Why Choose Us" class="img-fluid">
                </div>
            </div>

        </div>
    </div>
</div>




@include('partials.footer')

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/tiny-slider.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
