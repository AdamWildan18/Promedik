@extends('layouts.main')
@section('content')
<div id="app">
    <div class="main-content">
        <div class="row justify-content-sm-center h-100 align-items-center">
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-8">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h1 class="fs-4 text-center fw-bold mb-4">Create Outlet</h1>
                        <form method="POST" action="{{ route('add.outlet') }}" class="cretaebranch" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="name">Nama Outlet</label>
                                <div class="mb-3">
                                    <input id="nama_outlet" type="text" placeholder="Enter Nama Outlet" class="form-control rounded-end"
                                        name="nama_outlet" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Nama Outlet is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="alamat">Alamat Outlet</label>
                                <div class="mb-3">
                                    <input type="text" name="alamat" class="form-control rounded-end" placeholder="Enter Alamat">
                                    <div class="invalid-feedback">
                                        Alamat is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="nama_provinsi">Provinsi</label>
                                <div class="mb-3">
                                    <input type="text" name="provinsi" placeholder="Enter Provinsi" class="form-control rounded-end">
                                    <div class="invalid-feedback">
                                        Provinsi is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="nama_kota">Kota</label>
                                <div class="mb-3">
                                    <input type="text" name="nama_kota" placeholder="Enter Kota" class="form-control rounded-end">
                                    <div class="invalid-feedback">
                                        Kota is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="nama_cabang">Cabang</label>
                                <div class="mb-3">
                                    <input type="text" name="nama_cabang" placeholder="Enter Cabang" class="form-control rounded-end">
                                    <div class="invalid-feedback">
                                        Cabang is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        Copyright © 2022 &nbsp <a href="https://www.youtube.com/c/mulaidarinull" target="_blank" class="ml-1"> Mulai Dari Null </a> <span> . All rights Reserved</span>
    </footer>
    <div class="overlay action-toggle">
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).on('submit', '.cretaebranch', function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.post($(this).attr('action'), formData, function (response) {
            // Handle the server response
            if (response.success) {
                alert(response.message)
                window.location=document.referrer; // Redirect to a success page if needed
            } else {
                alert('Gagal Data sudah ada atau ada kesalahan input'); // Show error message
            }
        }).fail(function () {
            alert('Terjadi kesalahan saat memproses formulir.'); // Show a generic error message
        });
    });
</script>
@endsection
