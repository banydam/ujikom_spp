@extends('layouts.navadmin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">SPP Data</h5>
            <div class="table-responsive text-nowrap">
                <ul class="nav nav-pills flex-column flex-md-row mb-3 mx-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('spp.create') }}">Tambah Data SPP</a>
                    </li>
                </ul>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Nominal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no=1;
                        @endphp
                        @forelse ($spps as $spp)
                            <tr class="table-default">
                                <td>{{ $no++ }}</td>
                                <td>{{ $spp->tahun }}</td>
                                <td>{{ 'Rp ' . number_format($spp->nominal, 0, ',', '.') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('spp.edit', $spp->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $spp->id }}').submit();">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </a>
                                            <!-- Form Hapus di dalam Dropdown -->
                                            <form id="delete-form-{{ $spp->id }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');" action="{{ route('spp.destroy', $spp->id) }}" method="POST" style="display: none;">
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
                                    Data SPP belum Tersedia.
                                </div>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
