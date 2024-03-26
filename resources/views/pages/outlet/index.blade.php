@extends('layouts.main')
@section('content')
<div class="main-content">
    <div class="col">
        <h1>Data Outlet</h1>
    </div>

    <div class="p-2">
        <div class="col d-flex justify-content-end">
            <form class="form-inline my-2 my-lg-0" action="/outlet" method="GET">
                @csrf
                <div class=" input-group">
                    <button class="btn btn-sm input-group-addon btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                    <input class="form-control btn-outline-primary" name="search" type="search" placeholder="Search" aria-label="Search">
                </div>
            </form>
            <div class="btn">
                <a href="{{ route('outletExel.create') }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Import Excel"><i class="bi bi-filetype-exe"></i></a>
            </div>
            <div class="btn">
                <a href="{{ route('outlet.create') }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Create">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>

            <div class="btn">
                <a href="{{ route('export.outlets') }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Export"><i class="bi bi-download"></i></a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Code</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Provisi</th>
                        <th scope="col">Kota</th>
                        <th scope="col">Cabang</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->code_outlet }}</td>
                        <td>{{ $item->nama_outlet }}</td>
                        <td>{{ $item->alamat }}</td>
                        {{-- <td>{{ $item->code_provinsi }}</td> --}}
                        <td>
                            @if($item->provinsi)
                                {{ $item->provinsi->nama_provinsi }}
                            @else
                                Nama Provinsi Tidak Ditemukan
                            @endif
                        </td>
                        <td>
                            @if($item->kota)
                                {{ $item->kota->nama_kota }}
                            @else
                                Nama Kota Tidak Ditemukan
                            @endif
                        </td>
                        <td>
                            @if($item->cabang)
                                {{ $item->cabang->nama_cabang }}
                            @else
                                Nama Cabang Tidak Ditemukan
                            @endif
                        </td>
                        <td>
                            <div class=" d-flex inline-block">
                                <a href="{{ route('edit.outlet', ['id' => $item->code_outlet]) }}">
                                    <button class="btn btn-sm btn-warning mr-1" data-bs-toggle="tooltip" data-bs-placement="right" title="Edit"><i class="bi bi-pencil-square"></i>
                                    </button>
                                </a>
                                <form action="{{ route('delete.outlet', ['id' => $item->code_outlet]) }}" class="branchdelete" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit"
                                        onclick="return confirm('Anda Yakin?')" data-bs-toggle="tooltip" data-bs-placement="right" title="Delete"><i
                                                class="bi bi-trash2"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
</div>


<footer>
    Copyright © 2022 &nbsp <a href="https://www.youtube.com/c/mulaidarinull" target="_blank" class="ml-1"> Mulai Dari Null </a> <span> . All rights Reserved</span>
</footer>
<div class="overlay action-toggle">
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('submit', '.branchdelete', function (event) {
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
