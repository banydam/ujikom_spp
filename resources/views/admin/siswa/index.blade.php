@extends('layouts.navadmin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Siswa Data</h5>
            <div class="table-responsive text-nowrap">
                <ul class="nav nav-pills flex-column flex-md-row mb-3 mx-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('siswa.create') }}">Tambah Data Siswa</a>
                    </li>
                </ul>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>SPP</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no=1;
                        @endphp
                        @forelse ($siswas as $siswa)
                            <tr class="table-default">
                                <td>{{ $no++ }}</td>
                                <td>{{ $siswa->nisn }}</td>
                                <td>{{ $siswa->nis }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td>{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                                <td>{{ $siswa->alamat }}</td>
                                <td>{{ $siswa->no_hp }}</td>
                                <td>{{ 'Rp ' . number_format($siswa->spp->nominal, 0, ',', '.') ?? '-' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('siswa.edit', $siswa->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $siswa->id }}').submit();">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </a>
                                            <!-- Form Hapus di dalam Dropdown -->
                                            <form id="delete-form-{{ $siswa->id }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');" action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display: none;">
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
                                    Data Siswa belum Tersedia.
                                </div>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
