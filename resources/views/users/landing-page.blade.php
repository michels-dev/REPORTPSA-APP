@extends('layouts.users')
{{-- Memanggil Yield --}}
@section('title', 'Landing Page')
@section('content')
    {{-- Fitur --}}
    {{-- Sidebar --}}
    @include('components.navbar')
    {{-- End Sidebar --}}
      <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url('{{ asset('landingpage/assets/img/slide/slide-1.jpg') }}');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <img class="animate__animated animate__fadeInDown" src="{{ asset('image/logopsa.png') }}" alt="" style="width: 40%">
                <p class="animate__animated animate__fadeInUp">PSA (Pengembangan Sistem Aplikasi) telah menjadi bagian
                    Divisi Sistem Informasi Manajemen <br> di BPK PENABUR Jakarta.
                    Berkolaborasilah bersama kami untuk menciptakan kerja sama
                    <br>yang baik dalam Pelayanan.</p>
                <a href="#portfolio" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url('{{ asset('landingpage/assets/img/slide/slide-2.jpg') }}');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <img class="animate__animated animate__fadeInDown" src="{{ asset('image/logopsa.png') }}" alt="" style="width: 40%">
                <p class="animate__animated animate__fadeInUp">PSA (Pengembangan Sistem Aplikasi) telah menjadi bagian
                    Divisi Sistem Informasi Manajemen <br> di BPK PENABUR Jakarta.
                    Berkolaborasilah bersama kami untuk menciptakan kerja sama
                    <br>yang baik dalam Pelayanan.</p>
                <a href="#portfolio" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url('{{ asset('landingpage/assets/img/slide/slide-3.jpg') }}');">
            <div class="carousel-container">
              <div class="carousel-content container">
                <img class="animate__animated animate__fadeInDown" src="{{ asset('image/logopsa.png') }}" alt="" style="width: 40%">
                <p class="animate__animated animate__fadeInUp">PSA (Pengembangan Sistem Aplikasi) telah menjadi bagian
                    Divisi Sistem Informasi Manajemen <br> di BPK PENABUR Jakarta.
                    Berkolaborasilah bersama kami untuk menciptakan kerja sama
                    <br>yang baik dalam Pelayanan.</p>
                <a href="#portfolio" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

    <main id="main">
    <!-- ======= Our Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="section-title">
            <h2>Portfolio PSA</h2>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">Keseluruhan</li>
                <li data-filter=".filter-app">Project</li>
                <li data-filter=".filter-card">Referensi</li>
                <li data-filter=".filter-web">Alat</li>
              </ul>
            </div>
          </div>

          <div class="row portfolio-container">

            <div class="col-lg-12 col-md-12 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="{{ asset('image/project.jpg') }}" class="img-fluid" alt="" style="width: 100%; max-height: 500px;">
                <div class="portfolio-info">
                  <h4>Project PSA</h4>
                  <div class="portfolio-links">
                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-12 col-md-12 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="{{ asset('image/referensi.png') }}" class="img-fluid" alt="" style="width: 100%; max-height: 500px;">
                <div class="portfolio-info">
                  <h4>Referensi PSA</h4>
                  <div class="portfolio-links">
                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-12 col-md-12 portfolio-item filter-web">
              <div class="portfolio-wrap">
                <img src="{{ asset('image/tools.jpg') }}" class="img-fluid" alt="" style="width: 100%; max-height: 500px;">
                <div class="portfolio-info">
                  <h4>Alat PSA</h4>
                  <div class="portfolio-links">
                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
    </section><!-- End Our Portfolio Section -->
    </main>

    <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>PSA</span></strong>. BPK PENABUR Jakarta
        </div>
    </div>
  </footer><!-- End Footer -->

@endsection

@push('after-scripts')
@endpush
