@extends('layouts.main')
@section('content')
<div id="app">
    <div class="main-content">
        <div class="row justify-content-sm-center h-100 align-items-center">
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-8">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h1 class="fs-4 text-center fw-bold mb-4">Create User</h1>
                        <form method="POST" action="/user/update/{{ $data->id }}" class="updateform" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="username">username</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="name" type="text" placeholder="Enter Username" class="form-control rounded"
                                        name="name" value="{{ $data->name }}" required autofocus>
                                    <div class="invalid-feedback">
                                        Username is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="email">Email</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="email" type="email" placeholder="Enter email" class="form-control rounded"
                                        name="email" value="{{ $data->email }}" required autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    <label class="text-muted" for="password">Password</label>
                                </div>

                                <div class="input-group input-group-join mb-3">
                                    <input type="password" name="password" value="{{ $data->password }}" class="form-control rounded" placeholder="Your password" required>
                                    <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i class="fa fa-eye"></i>&nbsp</span>
                                    <div class="invalid-feedback">
                                        Password required
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    <label class="text-muted" for="level">Level</label>
                                </div>

                                <div class="input-group input-group-join mb-3">
                                    <select name="level" id="level" class="form-select rounded-end">
                                        <option value="" {{ $data->level == '' ? 'selected' : '' }}>Choice Level</option>
                                        <option value="AT" {{ $data->level == 'AT' ? 'selected' : '' }}>Admin Tiket</option>
                                        <option value="IT" {{ $data->level == 'IT' ? 'selected' : '' }}>Admin IT</option>
                                        <option value="AKU" {{ $data->level == 'AKU' ? 'selected' : '' }}>Akutansi</option>
                                        <option value="AC" {{ $data->level == 'AC' ? 'selected' : '' }}>Analist & Control</option>
                                        <option value="AM" {{ $data->level == 'AM' ? 'selected' : '' }}>Area Manager</option>
                                        <option value="BC" {{ $data->level == 'BC' ? 'selected' : '' }}>Branch Cabang</option>
                                        <option value="BDM" {{ $data->level == 'BDM' ? 'selected' : '' }}>Bussines & Develotment Manager</option>
                                        <option value="DirOp" {{ $data->level == 'DirOp' ? 'selected' : '' }}>Direktur Operational</option>
                                        <option value="Dirut" {{ $data->level == 'Dirut' ? 'selected' : '' }}>Direktur Utama</option>
                                        <option value="INF" {{ $data->level == 'INF' ? 'selected' : '' }}>Informasi</option>
                                        <option value="IC" {{ $data->level == 'IC' ? 'selected' : '' }}>Internal Control</option>
                                        <option value="KEU" {{ $data->level == 'KEU' ? 'selected' : '' }}>Keuangan</option>
                                        <option value="MK" {{ $data->level == 'MK' ? 'selected' : '' }}>Manager Keuangan</option>
                                        <option value="PRO" {{ $data->level == 'PRO' ? 'selected' : '' }}>Product Manager</option>
                                        <option value="PM" {{ $data->level == 'PM' ? 'selected' : '' }}>Promedik</option>
                                        <option value="SM" {{ $data->level == 'SM' ? 'selected' : '' }}>Sales Manager</option>
                                        <option value="SMR" {{ $data->level == 'SMR' ? 'selected' : '' }}>Sales Manager Regional</option>
                                        <option value="SPV" {{ $data->level == 'SPV' ? 'selected' : '' }}>Supervisor</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        level required
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
    //toggle eye
    $(document).ready(function() {
        $('.password').on('click', function() {
            var passwordField = $(this).closest('.input-group').find('input[type]');
            var icon = $(this).find('i');
            if (passwordField.attr('type') === 'password') {
                passwordField.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else if(passwordField.attr('type') === 'text' ) {
                passwordField.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }

            // Mengatur fokus ke akhir input field
            var tempValue = passwordField.val();
            passwordField.val('');
            passwordField.val(tempValue);
        });
    });

    $(document).on('submit', '.updateform', function (event) {
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
