@extends('layouts.main')
@section('content')
<div id="app">
    <div class="main-content">
        <div class="row justify-content-sm-center h-100 align-items-center">
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-8">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h1 class="fs-4 text-center fw-bold mb-4">Update Area</h1>
                        <form method="POST" action="{{ route('update.branch', ['id' => $data->id]) }}" class="updatebranch" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="name">Nama Branch</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="name" type="text" placeholder="Enter Nama Branch" class="form-control"
                                        name="name" value="{{ $data->name }}" required autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        Nama Branch is invalid
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="code_branch">Code Branch</label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="code_branch" type="text" placeholder="Enter code_branch" class="form-control"
                                        name="code_branch" value="{{ $data->code_branch }}" required autofocus>
                                        <span class="input-group-text rounded-end"></span>
                                    <div class="invalid-feedback">
                                        Code Branch is invalid
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
    $(document).on('submit', '.updatebranch', function (event) {
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
