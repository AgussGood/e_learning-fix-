<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

  <title>Hasil Tugas</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-scholar.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}" />
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <style>
    .jawaban-benar {
      color: green;
      font-weight: bold;
    }

    .jawaban-salah {
      color: red;
    }

    ul.jawaban-list {
      list-style: none;
      padding-left: 0;
    }
  </style>
</head>

<body>
  <div class="services section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="service-item">
            <div class="main-content">
              <h4 class="mb-3">Hasil Tugas</h4>
              <p><strong>Nilai:</strong> {{ $hasil->nilai }}</p>
              <p><strong>Benar:</strong>{{ $jawaban->benar}}</p>
              <hr />

              @foreach ($hasil->tugas->soal as $soal)
                <div class="mb-4">
                  <strong>Soal {{ $loop->iteration }}:</strong>
                  <p>{{ $soal->pertanyaan }}</p>

                  @php
                    $jawabanUser = $hasil->jawaban[$soal->id] ?? null;
                    $kunci = $soal->kunci_jawaban;
                  @endphp

                  <ul class="jawaban-list">
                    @foreach (['A', 'B', 'C', 'D'] as $opt)
                      @php
                        $pilihan = $soal->{'pilihan_' . strtolower($opt)};
                      @endphp
                      <li class="
                        @if ($opt == $kunci)
                          jawaban-benar
                        @elseif ($opt == $jawabanUser)
                          jawaban-salah
                        @endif
                      ">
                        {{ $opt }}. {{ $pilihan }}
                        @if ($opt == $kunci)
                          <span> (Jawaban Benar)</span>
                        @endif
                        @if ($opt == $jawabanUser && $opt != $kunci)
                          <span> (Jawaban Anda)</span>
                        @endif
                      </li>
                    @endforeach
                  </ul>
                </div>
              @endforeach

              <div class="main-button mt-4">
                <a href="{{ route('tugas.index') }}" class="btn btn-light">Kembali</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JS Scripts -->
  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/counter.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
</body>

</html>
