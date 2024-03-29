<!-- index.blade.php -->
@extends('layouts.main')
@section('content')
{{-- modal edit --}}
<div class="main-content">
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form untuk mengedit data -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </div>
    </div>
  </div>
{{-- end modal edit --}}
<div class="row">
    <div class="col">
        <h1>Data user</h1>
    </div>
    <div class="col-2">
        <a href="/user/create">
            <button class="btn btn-primary">Create User</button>
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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Level</th>
                            <th scope="col">Cabang</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->level }}</td>
                            <td>{{ $item->cabang }}</td>
                            <td>
                                <div class=" d-flex inline-block">
                                    <a href="/user/edit/{{ $item->id }}">
                                        <button class="btn btn-sm btn-warning mr-1"><i class="bi bi-pencil-square"></i>
                                        </button>
                                    </a>
                                    <form action="/user/delete/{{ $item->id }}" class="deleteuser" method="POST">
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

<script>
    $(document).ready(function() {
        $('.edit-button').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/user/edit/' + id, // Ubah sesuai dengan rute yang Anda tentukan
                method: 'GET',
                success: function(response) {
                    // Mengisi form modal dengan data yang diperoleh
                    $('#editModal').find('.modal-body').html(response);
                }
            });
        });
    });
</script>
@endsection
