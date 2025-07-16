@extends('layouts.backend')

@section('content')
<div class="container mt-4">
    <div class="col-md-8 offset-md-2">
        <h3 class="mb-4">Edit Tahun Ajaran</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tahun_ajaran.update', $tahun->id) }}" method="POST" class="card p-4 shadow-sm">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Tahun Ajaran</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama', $tahun->nama) }}" placeholder="Contoh: 2024/2025" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-check mb-4">
                <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active"
                    {{ old('is_active', $tahun->is_active) ? 'checked' : '' }}>
                <label for="is_active" class="form-check-label">Jadikan Tahun Ajaran Aktif</label>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('tahun_ajaran.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
