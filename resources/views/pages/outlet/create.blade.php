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
                                <div class="input-group input-group-join mb-3">
                                    <input id="name" type="text" placeholder="Enter Nama Outlet" class="form-control"
                                        name="name" value="" required autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        Nama Outlet is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="code_outlet">Code Outlet</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="code_outlet" type="text" placeholder="Enter code_outlet" class="form-control"
                                        name="code_outlet" value="" required autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        Code Outlet is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="specialist">Jenis Outlet</label>
                                <div class="input-group input-group-join mb-3">
                                    <select name="jenis_outlet" id="" class="form-select rounded-end">
                                        <option value="">Choice Jenis Outlet</option>
                                        <option value="Rumah Sakit">Rumah Sakit</option>
                                        <option value="Apotek">Apotek</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Specialist is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="specialist">Type Outlet</label>
                                <div class="input-group input-group-join mb-3">
                                    <select name="type_outlet" id="" class="form-select rounded-end">
                                        <option value="">Choice Type Outlet</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Specialist is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="nama_direktur">Nama Direktur</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="nama_direktur" type="text" placeholder="Enter Nama Direktur" class="form-control"
                                        name="nama_direktur" value="" autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        Nama Direktur is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="nama_ok">Nama OK</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="nama_ok" type="text" placeholder="Enter Nama OK" class="form-control"
                                        name="nama_ok" value="" autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        Nama OK is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="ppk">PPK</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="ppk" type="text" placeholder="Enter PPK" class="form-control"
                                        name="ppk" value="" autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        PPK is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="if_informasi">IF Informasi</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="if_informasi" type="text" placeholder="Enter IF Informasi" class="form-control"
                                        name="if_informasi" value="" autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        IF Informasi is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="listing_product">Listing Product</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="listing_product" type="text" placeholder="Enter Listing Product" class="form-control"
                                        name="listing_product" value="" autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        Listing Product is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="progres_outlet">Progres Outlet</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="progres_outlet" type="text" placeholder="Enter Progres Outlet" class="form-control"
                                        name="progres_outlet" value="" autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        Progres Outlet is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="keterangan">Keterangan</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="keterangan" type="text" placeholder="Enter Keterangan" class="form-control"
                                        name="keterangan" value="" autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        Keterangan is invalid
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
