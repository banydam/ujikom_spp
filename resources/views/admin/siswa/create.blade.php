@extends('layouts.navadmin')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Horizontal Layouts</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Data Siswa</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-nisn">NISN</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="basic-default-nisn"
                                    placeholder="Masukkan NISN" />

                                @error('nisn')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-nis">NIS</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('nis') is-invalid @enderror" name="nis" id="basic-default-nis"
                                    placeholder="Masukkan NIS" />

                                @error('nis')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-nama">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="basic-default-nama"
                                    placeholder="Masukkan nama" />

                                @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-kelas">Kelas</label>
                            <div class="col-sm-10">
                                <!-- Ganti ini dengan dropdown untuk memilih kelas -->
                                <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id" id="basic-default-kelas">
                                    <!-- Isi dropdown dengan opsi-opsi kelas -->
                                </select>

                                @error('kelas_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-alamat">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="basic-default-alamat"
                                    placeholder="Masukkan alamat"></textarea>

                                @error('alamat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-no-hp">Nomor HP</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="basic-default-no-hp"
                                    placeholder="Masukkan nomor HP" />

                                @error('no_hp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-spp">SPP</label>
                            <div class="col-sm-10">
                                <!-- Ganti ini dengan dropdown untuk memilih SPP -->
                                <select class="form-control @error('spp_id') is-invalid @enderror" name="spp_id" id="basic-default-spp">
                                    <!-- Isi dropdown dengan opsi-opsi SPP -->
                                </select>

                                @error('spp_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
