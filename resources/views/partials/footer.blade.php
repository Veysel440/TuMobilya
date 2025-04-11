<footer class="footer-section">
    <div class="container relative">
        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <p style="font-size: 24px; font-weight: bold;">{{ $settings?->general_title }}</p>
                <p>{{ $settings?->general_description }}</p>

                <ul class="list-unstyled custom-social d-flex">
                    <li>
                        <a href="{{ $settings?->youtube }}" target="_blank" rel="noopener noreferrer">
                            <span class="fa fa-brands fa-youtube"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $settings?->twitter }}" target="_blank" rel="noopener noreferrer">
                            <span class="fa fa-brands fa-twitter"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $settings?->facebook }}" target="_blank" rel="noopener noreferrer">
                            <span class="fa fa-brands fa-facebook-f"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ $settings?->instagram }}" target="_blank" rel="noopener noreferrer">
                            <span class="fa fa-brands fa-instagram"></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4">
                <h3 class="footer-heading">Bize Ulaşın</h3>
                <ul class="list-unstyled footer-links">
                    <li><a href="tel:{{ $settings?->phone }}">{{ $settings?->phone }}</a></li>
                    <li><a href="mailto:{{ $settings?->email }}">{{ $settings?->email }}</a></li>
                    <li>{{ $settings?->address }}</li>
                </ul>
            </div>

            <div class="col-lg-4">
                <div class="sofa-img">
                    @if(!empty($settings->general_photo) && file_exists(storage_path('app/public/general_photos/' . $settings->general_photo)))
                        <img src="{{ asset('storage/general_photos/'.$settings->general_photo) }}" alt="General Photo" class="img-fluid">
                    @else
                        <p>Fotoğraf mevcut değil.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
