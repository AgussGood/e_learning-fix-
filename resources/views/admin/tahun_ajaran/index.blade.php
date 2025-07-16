@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-4">
            <div class="title">
                <h2>Daftar Tahun Ajaran</h2>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card-style-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('tahun_ajaran.create') }}" class="btn btn-primary">
                            <i class="mdi mdi-plus-box"></i> Tambah
                        </a>
                        <form action="{{ route('tahun_ajaran.index') }}" method="get" class="d-flex" style="max-width: 300px;">
                            <button class="btn btn-outline-primary btn-sm" type="submit">
                                <i class="lni lni-search-alt"></i>
                            </button>
                        </form>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table align-middle text-center" id="tabelPetugas">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Ajaran <i class="lni lni-arrows-vertical"></i></th>
                                        <th>Status <i class="lni lni-arrows-vertical"></i></th>
                                        <th>Set Aktif</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tahun as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                @if ($item->is_active)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-secondary">Tidak Aktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (!$item->is_active)
                                                    <form action="{{ route('tahun_ajaran.setAktif', $item->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button class="btn btn-sm btn-outline-success"
                                                            onclick="return confirm('Jadikan tahun ini aktif?')">
                                                            Jadikan Aktif
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="text-muted">--</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenu{{ $item->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="lni lni-more-alt"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu{{ $item->id }}">
                                                        <li>
                                                            <a href="{{ route('tahun_ajaran.edit', $item->id) }}" class="dropdown-item">
                                                                <i class="mdi mdi-pencil"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li>
                                                            <form action="{{ route('tahun_ajaran.destroy', $item->id) }}" method="POST"
                                                                onsubmit="return confirm('Apakah anda yakin?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-danger">
                                                                    <i class="lni lni-trash-can"></i> Hapus
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">
                                                <i class="lni lni-clipboard"></i> Belum ada data tahun ajaran.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> <!-- /.table-responsive -->
                    </div> <!-- /.panel-body -->
                </div> <!-- /.card-body -->
            </div> <!-- /.card-style-2 -->
        </div>
    </div>
</div>
@endsection
