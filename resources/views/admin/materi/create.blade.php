@extends('layouts.backend')
@section('content')
    <section class="tab-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Tambah Data Materi</h2>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#0">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Data Materi
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <!-- ========== form-elements-wrapper start ========== -->
            <div class="form-elements-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- input style start -->
                        <form action="{{ route('materi.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-style mb-30">
                                <h6 class="mb-25">Materi</h6>
                                <div class="input-style-1">
                                    <label>Judul</label>
                                    <input type="text" placeholder="Judul" name="judul"
                                        class="@error('judul') is-invalid @enderror" />
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- foto -->
                                <div class="mb-3">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        name="foto">
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- end input -->
                                <div class="input-style-1">
                                    <label>Isi Materi</label>
                                    <textarea placeholder="Isi Materi" name="isi_materi" class="@error('isi_materi') is-invalid @enderror" rows="5"></textarea>
                                    @error('isi_materi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- end input -->
                                <div class="input-style-1">
                                    <div class="select-style-1">
                                        <label>Mapel</label>
                                        <div class="select-position">
                                            <select name="id_mapel" class="@error('id_mapel') is-invalid @enderror">
                                                @foreach ($mapel as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_mapel')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="input-style-1">
                                    <div class="select-style-1">
                                        <label>Kelas</label>
                                        <div class="select-position">
                                            <select name="id_kelas" class="@error('id_kelas') is-invalid @enderror">
                                                @foreach ($kelas as $data)
                                                    <option value="{{ $data->id }}">{{ $data->kelas }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_kelas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="input-style-1">
                                    <button type="submit" class="btn btn-primary mr-2 mt-3">Simpan</button>
                                    <a href="{{ route('materi.index') }}" class="btn btn-dark mt-3">Kembali</a>

                                </div>
                                <!-- end input -->
                            </div>
                        </form>
                        <!-- end card -->
                        <!-- ======= input style end ======= -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== form-elements-wrapper end ========== -->
            </div>
            <!-- end container -->
    </section>
@endsection
