@extends('layouts.backend')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-4">
                <div class="title">
                    <h2>Data Rekap</h2>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card-style-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <form action="{{ route('rekap.index') }}" method="get" class="d-flex" style="max-width: 300px;">
                                <button class="btn btn-outline-primary btn-sm" type="submit">
                                    <i class="lni lni-search-alt"></i>
                                </button>
                            </form>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table" id="tabelPetugas">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">User<i class="lni lni-arrows-vertical"></i></th>
                                            <th scope="col">Nilai<i class="lni lni-arrows-vertical"></i></th>
                                            <th scope="col">Aksi<i class="lni lni-arrows-vertical"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($user as $data)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>{{ $data->email }}</td>
                                                <td>@foreach($data->nilaiTugas as $Nilai){{ $Nilai->nilai }} @endforeach</td>
                                                <td>
                                                    <div class="action justify-content">
                                                        <div class="dropdown">
                                                            <button class="more-btn ml-10 dropdown-toggle" id="moreAction1"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="lni lni-more-alt"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="moreAction1">
                                                                <li>
                                                                    <a href="{{ route('rekap.show', $data->id) }}"
                                                                        class="dropdown-item">
                                                                        <i class="lni lni-eye"></i> View
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li>
                                                                    <form action="{{ route('rekap.destroy', $data->id) }}"
                                                                        method="post" style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="dropdown-item text-danger"
                                                                            onclick="return confirm('Apakah anda yakin?')">
                                                                            <i class="lni lni-trash-can"></i> Delete
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
