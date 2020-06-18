@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Akun Evoting</h4>
                <div class="card-header-action">
                    <a href="javascript:void(0)" onclick="alertconfirmn('{{ route('pemilih.hapus') }}')"
                        class="btn btn-danger mr-2">
                        Hapus Semua Akun
                    </a>
                    <a href="{{ route('pemilih.tambah') }}" class="btn btn-primary">
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
                                <th>Token</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($akuns as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->token }}</td>
                                <td>
                                    <div class="alert {{ $item->status == 0 ? 'alert-warning' : 'alert-primary' }}"
                                        role="alert">
                                        {{ $item->status == 0 ? 'Belum Voting' : 'Sudah Voting' }}
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
</div>
@endsection