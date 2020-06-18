@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('kandidat.tambah') }}" class="btn btn-primary">
                        Tambah
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-hover" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Foto Kandidat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kandidat as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->name }}</td>
                                <td><img src="{{ asset('storage/' . $item->avatar) }}" width="100" alt="" srcset=""></td>
                                <td>
                                <a href="{{ route('kandidat.edit',$item->id) }}" class="btn btn-warning">Edit</a>
                                <a href="javascript:void(0)" onclick="alertconfirmn('{{ route('kandidat.hapus',$item->id) }}')"
                                class="btn btn-danger ml-2">
                                Hapus
                            </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection