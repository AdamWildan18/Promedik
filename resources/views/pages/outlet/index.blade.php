@extends('layouts.main')
@section('content')
<div class="main-content">
<div class="row">
    <div class="col">
        <h1>Data Outlet</h1>
    </div>
    <div class="col-2">
        <a href="{{ route('outlet.create') }}">
            <button class="btn btn-primary">Create Outlet</button>
        </a>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        {{-- <div class="card-header">
            <h4>Responsive</h4>
        </div> --}}
        <div class="card-body">
            {{-- <p class="form-text">Across every breakpoint, use <code>.table-responsive</code>  for horizontally scrolling tables.</p>
            <p class="form-text mb-2">For Different break point use <code>.table-responsive-sm</code> or <code>.table-responsive-md</code> or <code>.table-responsive-lg</code> or <code>.table-responsive-xl</code> or <code>.table-responsive-xxl</code> </p> --}}
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Code Outlet</th>
                            <th scope="col">Nama Outlet</th>
                            {{-- <th scope="col">Code Provisi</th> --}}
                            <th scope="col">Nama Provisi</th>
                            {{-- <th scope="col">Code Kota</th> --}}
                            <th scope="col">Nama Kota</th>
                            {{-- <th scope="col">Code Cabang</th> --}}
                            <th scope="col">Nama Cabang</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->code_outlet }}</td>
                            <td>{{ $item->nama_outlet }}</td>
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
                                        <button class="btn btn-sm btn-warning mr-1"><i class="bi bi-pencil-square"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('delete.outlet', ['id' => $item->code_outlet]) }}" class="branchdelete" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit"
                                            onclick="return confirm('Anda Yakin?')"><i
                                                    class="bi bi-trash2"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
