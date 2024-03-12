@extends('layouts.main')
@section('content')
<div class="main-content">
<div class="row">
    <div class="col">
        <h1>Data Teritory</h1>
    </div>
    <div class="col-2">
        <a href="/teritory/create">
            <button class="btn btn-primary">Create Teritory</button>
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
                            <th scope="col">Code Teritory</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->level }}</td>
                            <td>
                                <div class=" d-flex inline-block">
                                    <a href="/user/edit/{{ $item->id }}" class=" mr-2">
                                        <span class="badge badge-warning">Edit</span>
                                    </a>
                                    <form action="/user/delete/{{ $item->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <span class="badge badge-danger">Delete</span>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach --}}
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
@endsection
