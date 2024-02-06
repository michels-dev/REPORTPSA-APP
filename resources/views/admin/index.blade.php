@extends('layouts.dashboard')
{{-- Memanggil Yield --}}
@section('title', 'Dashboard Admin')
@section('content')
    {{-- Fitur --}}
    {{-- Sidebar --}}
    @include('components.navbaradmin')
    {{-- End Sidebar --}}
    <div class="container">
    <div class="row clearfix mt-5">
        <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 mt-5">
            <div class="card mt-5" style="background-color: rgba(29, 206, 222, 0.2);">
                <div class="body">
                    <h5>Selamat Datang Di Peminjaman Ruangan | Manajemen Gedung</h5>
                    <p class="text-dark">Aplikasi Layanan SAS BPK PENABUR Jakarta</p>
                    <a href="{{ route('admin.form-ruangan') }}" class="btn  btn-raised bg-blue btn-lg waves-effect mt-3 font-20">PINJAM RUANGAN</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row clearfix mt-4">
        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-3">
            <h5>Cek Data Peminjaman Ruangan</h5>
            <div class="card">
                <div class="body">
                    <p class="text-dark">Data Approved</p>
                    <span class="label label-success mt-3">{{ $approvedData }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-5">
            <div class="card">
                <div class="body">
                    <p class="text-dark">Data Not Approved</p>
                    <span class="label label-warning mt-3">{{ $unapprovedData }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-5">
            <div class="card">
                <div class="body">
                    <p class="text-dark">Data Rejected</p>
                    <span class="label label-danger mt-3">{{ $rejectedData }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row clearfix mt-4">
        <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 mt-3">
            <h5>Peminjaman Ruangan Terkini <small class="text-danger">*</small></h5>
            <div class="card">
                <div class="table-responsive social_media_table mt-4">
                    <table class="table table-hover js-basic-terkini dataTable" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="font-italic">Data terkini - <small class="font-bold">{{ $totalToday }}</small> &nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($dataToday as $row)
                                <tr>
                                    <th>
                                        <div class="body">
                                            <div class="comment-action">
                                                <h5 class="c_name"><a href="{{ route('admin.table-ruangan',['id'=>$row->id]) }}">{{ $row->pemohon }}</a></h5>
                                                <p class="c_msg m-b-0">{{ $row->ruangan }}</p>
                                                <div>
                                                    @if ($row->rejected)
                                                        <span class="badge btn-danger" data-toggle="modal" data-target="#rejectModal{{ $row->id }}">Rejected</span>
                                                    @elseif (!$row->approved && !$row->unapproved)
                                                        <span class="badge bg-amber">Pending approval</span>
                                                    @elseif ($row->approved)
                                                        <span href="{{ route('email.show-tapproved',['id'=>$row->id]) }}" class="badge bg-light-green">approved</span>
                                                    @else
                                                        <span href="{{ route('email.show-tnapproved',['id'=>$row->id]) }}" class="badge badge-warning text-white">not approved</span>
                                                    @endif
                                                </div>
                                                <small class="comment-date float-sm-right">{{ $row->mulai }}</small>
                                            </div>
                                        </div>
                                    </th>
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

@push('after-scripts')
<script>
$(function () {
    $('.js-basic-terkini').DataTable({
        "pageLength": 3,
        "lengthMenu": [3, 10, 25, 50, 100], // Specify the entries to show in the dropdown
    });
});
</script>
@endpush