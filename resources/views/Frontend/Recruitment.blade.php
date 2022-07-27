@extends('layouts.Frontend.main-layouts')

@section('Title')
    <h2>Recruitment</h2>
@endsection

@section('Content')
    <div class="container align-items-center" data-aos="fade-up">
        @if (session('status'))
            <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Success</div>
                    {{ session('status') }}
                </div>
            </div>
        @endif
        <form action="{{ route('recruitment.store') }}" method="POST" id="form-recruitment" name="form-recruitment" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row" style="width: 100%">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Nim</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-lg" id="nim" name="nim" @error('nim') invalid-feedback @enderror
                            placeholder="Nomor Induk Mahasiswa">
                        @error('nim')
                            <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-lg" id="nama_lengkap" name="nama_lengkap"placeholder="Nama Lengkap">
                        @error('nama_lengkap')
                            <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-3" style="width: 100%">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Nama Panggilan</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-lg" id="nama_panggilan" name="nama_panggilan" placeholder="Nama Panggilan">
                        @error('nama_panggilan')
                            <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">No. Handphone</label><span class="text-danger">*</span>
                        <input type="text" class="form-control form-control-lg" id="handphone" name="handphone" placeholder="Nomor Telepon">
                        @error('handphone')
                            <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-3" style="width: 100%">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label><span class="text-danger">*</span>
                        <input type="date" class="form-control form-control-lg" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir">
                        @error('tanggal_lahir')
                            <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Fakultas</label><span class="text-danger">*</span>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="fakultas" id="fakultas">
                            <option selected disabled>Pilih Fakultas</option>
                            <option value="Fakultas Ilmu Komputer">Fakultas Ilmu Komputer</option>
                            <option value="Fakultas Ilmu Kesehatan">Fakultas Ilmu Kesehatan</option>
                            <option value="Fakultas Ilmu Hukum dan Bisnis">Fakultas Ilmu Hukum dan Bisnis</option>
                            <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
                        </select>
                        @error('fakultas')
                            <div class="text-danger">* {{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="row mt-3" style="width: 100%">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">Program Studi</label><span class="text-danger">*</span>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="program_studi" id="program_studi">
                            <option selected disabled>Pilih Program Studi</option>
                            <option value="Managemen Informatika">Managemen Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Komputer">Teknik Komputer</option>
                            {{-- Progdi kesehatan --}}
                            <option value="D3 Keperawatan">D3 Keperawatan</option>
                            <option value="D3 Rekam Medis">D3 Rekam Medis</option>
                            <option value="D3 Kebidanan">D3 Kebidanan</option>
                            <option value="S1 Keperawatan">S1 Keperawatan</option>
                            <option value="S1 Farmasi">S1 Farmasi</option>
                            <option value="S1 Administrasi Rumah Sakit">S1 Administrasi Rumah Sakit</option>
                            {{-- Progdi Hukum dan Bisnis --}}
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="Hukum">Hukum</option>
                            <option value="Manajemen">Manajemen</option>
                            {{-- Progdi Sains Teknologi --}}
                            <option value="Agribisnis">Agribisnis</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                        </select>
                    </div>
                    @error('program_studi')
                        <div class="text-danger">* {{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Upload Surat Keterangan Sehat</label><span class="text-danger">*</span>
                    <div class="input-group mb-3">
                        <div class="custom-file" style="width: 100%">
                            <input type="file" class="custom-file-input form-control form-control-lg" id="surat_sehat" name="surat_sehat"
                                aria-describedby="inputGroupFileAddon01">
                            @error('surat_sehat')
                                <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3" style="width: 100%">
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Upload Surat Izin Orang Tua</label><span class="text-danger">*</span>
                    <div class="input-group mb-3">
                        <div class="custom-file" style="width: 100%">
                            <input type="file" class="custom-file-input form-control form-control-lg" id="surat_izin_orang_tua" name="surat_izin_orang_tua"
                                aria-describedby="inputGroupFileAddon01">
                            @error('surat_izin_orang_tua')
                                <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Upload Pas Foto</label><span class="text-danger">*</span>
                    <div class="input-group mb-3">
                        <div class="custom-file" style="width: 100%">
                            <input type="file" class="custom-file-input form-control form-control-lg" id="foto" name="foto"
                                aria-describedby="inputGroupFileAddon01">
                            @error('foto')
                                <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Upload Bukti Pembayaran</label><span class="text-danger">*</span>
                    <div class="input-group mb-3">
                        <div class="custom-file" style="width: 100%">
                            <input type="file" class="custom-file-input form-control form-control-lg" id="bukti_pembayaran" name="bukti_pembayaran"
                                aria-describedby="inputGroupFileAddon01">
                            @error('bukti_pembayaran')
                                <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 justify-content-right" style="width: 100%">
                <div class="col-6">
                    {!! NoCaptcha::display() !!}
                    {!! NoCaptcha::renderJs() !!}
                    <div class="text-danger">
                        @error('g-recaptcha-response')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg mt-3" style="width: 30%; background-color:#eb5d1e; border-color: #eb5d1e;">Selesai</button>
                </div>
            </div>
        </form>
    </div>
@endsection
