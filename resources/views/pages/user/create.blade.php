@extends('layouts.main')
@section('content')
<div id="app">
    <div class="main-content">
        <div class="row justify-content-sm-center h-100 align-items-center">
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-8">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h1 class="fs-4 text-center fw-bold mb-4">Create User</h1>
                        <form method="POST" action="/user/store" class="loginform" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="username">username</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="name" type="text" placeholder="Enter Username" class="form-control"
                                        name="name" value="" required autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        Username is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="email">Email</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="email" type="email" placeholder="Enter email" class="form-control"
                                        name="email" value="" required autofocus>
                                        <span class="input-group-text rounded-end"></span>
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
                                    <input type="password" name="password" class="form-control" placeholder="Your password" required>
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
                                    <select name="level" id="level" class="form-select rounded-end" onchange="levelselect()">
                                        <option value="">Choice Level</option>
                                        <option value="AT">Admin Tiket</option>
                                        <option value="IT">Admin IT</option>
                                        <option value="AKU">Akutansi</option>
                                        <option value="AC">Analist & Control</option>
                                        <option value="AM">Area Manager</option>
                                        <option value="BC">Branch Cabang</option>
                                        <option value="BDM">Bussines & Develotment Manager</option>
                                        <option value="DirOp">Direktur Operational</option>
                                        <option value="Dirut">Direktur Utama</option>
                                        <option value="INF">Informasi</option>
                                        <option value="IC">Internal Control</option>
                                        <option value="KEU">Keuangan</option>
                                        <option value="MK">Manager Keuangan</option>
                                        <option value="PRO">Product Manager</option>
                                        <option value="PM">Promedik</option>
                                        <option value="SM">Sales Manager</option>
                                        <option value="SMR">Sales Manager Regional</option>
                                        <option value="SPV">Supervisor</option>

                                    </select>
                                    <div class="invalid-feedback">
                                        level required
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 cabang" style="display: none">
                                <div class="mb-2 w-100">
                                    <label class="text-muted" for="cabang">Cabang</label>
                                </div>

                                <div class="input-group input-group-join mb-3">
                                    <select name="cabang" id="cabang" class="form-select rounded-end">
                                        <option value="">Choice Cabang</option>
                                        @foreach ($data as $cabang)
                                        <option value="{{$cabang->nama_cabang}}">{{$cabang->nama_cabang}}</option>
                                        @endforeach
                                    </select>
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
    $(document).on('submit', '.loginform', function (event) {
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

    function levelselect() {
        var level = document.getElementById('level').value;
        var cabangDiv = document.querySelector('.cabang');

        if (level == "BC") {
            cabangDiv.style.display = 'block';
        } else {
            cabangDiv.style.display = 'none';
        }
    }
</script>
@endsection
