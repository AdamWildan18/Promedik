@extends('layouts.main')
@section('content')
<div id="app">
    <div class="main-content">
        <div class="row justify-content-sm-center h-100 align-items-center">
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-8">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h1 class="fs-4 text-center fw-bold mb-4">Edit Customer</h1>
                        <form method="POST" action="{{ route('update.customer', ['id' => $data->id]) }}" class="cretaebranch" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="name">Nama Customer</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="name" type="text" placeholder="Enter Nama Customer" class="form-control"
                                        name="name" value="{{ $data->name }}" required autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        Nama Customer is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="code_customer">Code Customer</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="code_customer" type="text" placeholder="Enter code_customer" class="form-control"
                                        name="code_customer" value="{{ $data->code_customer }}" required autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        Code Customer is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="gender">Gender</label>
                                <div class="input-group input-group-join mb-3">
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="L" {{ $data->gender == 'L' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                          Laki-laki
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="P" {{ $data->gender == 'P' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Perempuan
                                        </label>
                                      </div>
                                    <div class="invalid-feedback">
                                        Gender is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="address">Address</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="address" type="text" placeholder="Enter address" class="form-control"
                                        name="address" value="{{ $data->address }}" required autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        Address is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="specialist">Specialist</label>
                                <div class="input-group input-group-join mb-3">
                                    <select name="specialist" id="" class="form-select rounded-end">
                                        <option value="" {{ $data->specialist == '' ? 'selected' : '' }}>Choice Specialist</option>
                                        <option value="Orthopedi" {{ $data->specialist == 'Orthopedi' ? 'selected' : '' }}>Orthopedi</option>
                                        <option value="BedahSyaraf" {{ $data->specialist == 'BedahSyaraf' ? 'selected' : '' }}>BedahSyaraf</option>
                                        <option value="BedahUmum" {{ $data->specialist == 'BedahUmum' ? 'selected' : '' }}>BedahUmum</option>
                                        <option value="Cardio" {{ $data->specialist == 'Cardio' ? 'selected' : '' }}>Cardio</option>
                                        <option value="Internis" {{ $data->specialist == 'Internis' ? 'selected' : '' }}>Internis</option>
                                        <option value="Obgyn" {{ $data->specialist == 'Obgyn' ? 'selected' : '' }}>Obgyn</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        Specialist is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="hari">Hari</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="hari" type="text" placeholder="Enter Hari" class="form-control"
                                        name="hari" value="{{ $data->hari }}" required autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        Hari is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="jam">Jam</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="jam" type="text" placeholder="Enter Jam cth: 17:00 - 18:00" class="form-control"
                                        name="jam" value="{{ $data->jam }}" required autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        Jam is invalid
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
