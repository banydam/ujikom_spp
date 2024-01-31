@extends('layouts.navadmin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Contextual Classes</h5>
            <div class="table-responsive text-nowrap">

                <ul class="nav nav-pills flex-column flex-md-row mb-3 mx-4">

                    <li class="nav-item " >
                      <a class="nav-link active" href="{{ route('kelas.create') }}"
                        > Tambah Kelas</a
                      >
                    </li>

                  </ul>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Kelas</th>
                            <th>Kompetensi Keahlian</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($kelas as $kelas)
                        <tr class="table-default">
                            <td>
                                <i class="bx bxl-sketch bx-sm text-warning me-3"></i>
                                <span class="fw-medium">{{$kelas->nama_kelas}}</span>
                            </td>
                            <td>{{$kelas->kompetensi_keahlian}}</td>

                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('kelas.edit', $kelas->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $kelas->id }}').submit();">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </a>
                                        <!-- Form Hapus di dalam Dropdown -->
                                        <form id="delete-form-{{ $kelas->id }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');" action="{{ route('kelas.destroy', $kelas->id) }}" method="POST"style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @empty
                        <div class="container">

                            <div class="alert alert-danger">
                                Data Post belum Tersedia.
                            </div>
                        </div>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
