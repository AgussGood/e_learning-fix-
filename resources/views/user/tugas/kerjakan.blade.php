<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Scholar - Online School HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-scholar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css')}}" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f5f5;
        }

        .container {
            background-color: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        .tugas-header {
            background: linear-gradient(135deg, #7e5bef, #a779e9);
            color: #fff;
            padding: 25px 30px;
            border-radius: 16px;
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            position: relative;
        }

        .tugas-header h2 {
            font-weight: 700;
            color: #fff;
            margin: 0;
            font-size: 24px;
        }

        .tugas-header h4 {
            margin: 0;
            color: #fff;
            font-size: 20px;
            font-weight: 600;
        }

        .tugas-header p {
            font-size: 14px;
            margin: 0;
            opacity: 0.95;
        }

        #countdown {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 15px;
            background-color: #f3e8ff;
            color: #6f42c1;
            padding: 6px 14px;
            border-radius: 8px;
            font-weight: 600;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.2);
        }

        .info-note {
            font-size: 14px;
            color: red;
            margin-top: 5px;
        }

        .card.question-card {
            border: none;
            border-left: 4px solid #7e5bef;
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }

        .card.question-card:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .form-check {
            background-color: #f9f5ff;
            border: 1px solid #e0d4ff;
            border-radius: 6px;
            padding: 10px 15px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: #7e5bef;
            border-color: #7e5bef;
        }

        .submit-btn {
            background: linear-gradient(135deg, #7e5bef, #a779e9);
            border: none;
            color: white;
            padding: 12px 40px;
            font-weight: 600;
            border-radius: 30px;
            transition: 0.3s;
        }

        .submit-btn:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .tugas-note {
            font-size: 13px;
            color: #ffe6e6;
            margin-top: 10px;
            font-style: italic;
            opacity: 0.9;
            padding-top: 8px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>


<body>
    <div class="container">
        <div class="tugas-header">
            <h2>Mengerjakan Tugas</h2>
            <h4>{{ $tugas->judul }}</h4>

            @if ($tugas->deskripsi)
                <p>{{ $tugas->deskripsi }}</p>
            @endif

        </div>


        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('user.tugas.submit', $tugas->id) }}">
            @csrf
            @foreach ($tugas->soal as $soal)
                <div class="card question-card">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Soal {{ $loop->iteration }}</h5>
                        <p class="card-text">{{ $soal->pertanyaan }}</p>

                        @foreach (['A', 'B', 'C', 'D'] as $opt)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="jawaban[{{ $soal->id }}]"
                                    value="{{ $opt }}" id="soal{{ $soal->id }}_{{ $opt }}"
                                    required>
                                <label class="form-check-label" for="soal{{ $soal->id }}_{{ $opt }}">
                                    {{ $opt }}.
                                    {{ $soal->{'pilihan_' . strtolower($opt)} }}
                                </label>
                            </div>
                        @endforeach

                        @error("jawaban.{$soal->id}")
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach

            <div class="text-center mt-4">
                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane me-2"></i> Selesaikan tugas
                </button>
            </div>
        </form>
    </div>

</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/isotope.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('frontend/assets/js/counter.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

<!-- Code injected by live-server -->
<script>
    // <![CDATA[  <-- For SVG support
    if ('WebSocket' in window) {
        (function() {
            function refreshCSS() {
                var sheets = [].slice.call(document.getElementsByTagName("link"));
                var head = document.getElementsByTagName("head")[0];
                for (var i = 0; i < sheets.length; ++i) {
                    var elem = sheets[i];
                    var parent = elem.parentElement || head;
                    parent.removeChild(elem);
                    var rel = elem.rel;
                    if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() ==
                        "stylesheet") {
                        var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                        elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date()
                            .valueOf());
                    }
                    parent.appendChild(elem);
                }
            }
            var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
            var address = protocol + window.location.host + window.location.pathname + '/ws';
            var socket = new WebSocket(address);
            socket.onmessage = function(msg) {
                if (msg.data == 'reload') window.location.reload();
                else if (msg.data == 'refreshcss') refreshCSS();
            };
            if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                console.log('Live reload enabled.');
                sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
            }
        })();
    } else {
        console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    }
    // ]]>
</script>
</body>

</html>
