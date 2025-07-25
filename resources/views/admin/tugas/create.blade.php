@extends('layouts.backend')
@section('content')

<section class="tab-components">
  <div class="container-fluid">

    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title">
            <h2>Form Tugas</h2>
          </div>
        </div>
        <div class="col-md-6">
          <div class="breadcrumb-wrapper">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#0">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form tugas</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="form-elements-wrapper">
      <div class="row">
        <div class="col-lg-12">

          {{-- Bagian 1: Form input soal --}}
          @if(request()->has('next'))
            @php 
              $judul = request('judul');
              $id_mapel = request('id_mapel');
              $jumlah_soal = request('jumlah_soal');
            @endphp

            <form action="{{ route('tugas.store') }}" method="POST">
              @csrf
              <input type="hidden" name="judul" class="@error('judul') is-invalid @enderror" value="{{ $judul }}">
              <input type="hidden" name="id_mapel" class="@error('id_mapel') is-invalid @enderror" value="{{ $id_mapel }}">
              <input type="hidden" name="jumlah_soal" class="@error('jumlah_soal') is-invalid @enderror" value="{{ $jumlah_soal }}">
              <input type="hidden" name="tenggat_waktu" class="@error('tenggat_waktu') is-invalid @enderror" value="{{ request('tenggat_waktu') }}">



              @for($i = 0; $i < $jumlah_soal; $i++)
              <div class="card-style mb-30">
                <div class="input-style-1">
                  <label>Soal {{ $i+1 }}</label>
                  <input type="text" name="soal[{{ $i }}]" placeholder="Masukkan Soal" required>
                </div>

                <label>Pilihan Jawaban</label><br>
                @foreach(['A', 'B', 'C', 'D'] as $option)
                  <div>
                    <input type="radio" name="jawaban_benar[{{ $i }}]" value="{{ $option }}" required>
                    {{ $option }} <input type="text" class="form-control" name="opsi[{{ $i }}][{{ $option }}]" placeholder="Jawaban {{ $option }}" required>
                  </div>
                @endforeach
              </div>
            
              @endfor

              <div class="col-12">
                <button type="submit" class="btn btn-primary">Simpan Soal</button>
              </div>
            </form>

          {{-- Bagian 2: Form input metadata quiz --}}
          @else
            <div class="card-style mb-30">
              <h6 class="mb-25">Informasi Tugas</h6>
              <form action="" method="get">
                <div class="input-style-1">
                  <label>Judul</label>
                  <input type="text" name="judul" placeholder="Judul" required />
                </div>

                <div class="input-style-1">
                  <label>Mapel</label>
                  <div class="select-style-1">
                    <div class="select-position">
                      <select name="id_mapel" required>
                        <option disabled selected value="">Pilih Mapel</option>
                        @foreach($mapel as $m)
                          <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="input-style-1">
                  <label>Kelas</label>
                  <div class="select-style-1">
                    <div class="select-position">
                      <select name="id_kelas" required>
                        <option disabled selected value="">Pilih Kelas</option>
                       @foreach($guru->kelasDiampu as $kelas)
                            <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="input-style-1">
                  <label>Jumlah Soal</label>
                  <input type="number" name="jumlah_soal" min="1" required />
                </div>
                <div class="input-style-1">
                  <label>Tenggat Waktu</label>
                  <input type="datetime-local" name="tenggat_waktu" class="form-control" required>
                </div>

                <div class="col-12">
                  <button type="submit" name="next" class="btn btn-primary">Lanjut Input Soal</button>
                </div>
              </form>
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>
</section>

@endsection