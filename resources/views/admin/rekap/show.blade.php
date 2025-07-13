@extends('layouts.backend')
@section('content')

<section class="tab-components">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Rekap</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#0">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#0">Rekap</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Lihat Rekap
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========== title-wrapper end ========== -->

        <!-- ========== form-elements-wrapper start ========== -->
        <div class="form-elements-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('rekap.update', $rekap->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-style mb-30">
                            <div class="input-style-1">
                                <label>User</label>
                                <input type="text" name="user" value="{{ $user->email }}" disabled/>
                            </div>
                            <div class="input-style-1">
                                <label>Nilai</label>
                                <input type="text" name="mapel" value="{{ $nilai->nilai}}" disabled/>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
