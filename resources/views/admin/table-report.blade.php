@extends('layouts.dashboard')
{{-- Memanggil Yield --}}
@section('title', 'Table Admin')
@section('content')
    {{-- Fitur --}}
    {{-- Sidebar --}}
    @include('components.navbaradmin')
    {{-- End Sidebar --}}
    @push('after-styles')
    <style>
        /* Tambahkan CSS ini atau integrasikan dengan file CSS Anda */
        .scrollable-modal-body {
            max-height: calc(70vh - 200px); /* Sesuaikan nilai sesuai kebutuhan */
            overflow-y: auto;
        }
    </style>
    @endpush
    <section class="content blog-page">
        <div class="block-header">
            <div class="row mt-5">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Blog Admin Tables
                        <small>Welcome to SAS BPK Penabur Jakarta</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                </div>
            </div>
        </div>
            <div class="row clearfix">
                <div class="col-sm-12">
                     <div class="card">
                        <div class="header">
                            <h2>Tables Admin Peminjaman Ruangan</h2>
                            {{-- <a href="" class="btn badge-secondary text-white"><i class="zmdi zmdi-file"></i></a>
                            <a href="" class="btn badge-secondary text-white"><i class="zmdi zmdi-cloud-download"></i></a> --}}
                            <div class="demo-button-groups">
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ route('admin.index') }}">Go To Dashboard</a></li>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="btn-group mb-3" role="group">
                                    <a href="{{ route('admin.destroyall') }}" class="btn btn-default waves-effect">Delete All</a>
                                    <button type="button" class="btn btn-default waves-effect">PDF</button>
                                    <button type="button" class="btn btn-default waves-effect">Excel</button>
                            </div>
                            <div class="table-responsive social_media_table">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>RUANGAN ID</th>
                                            <th>Pemohon</th>
                                            <th>Bagian/Unit</th>
                                            <th>Ruangan</th>
                                            <th>Approve</th>
                                            <th>Not Approve</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $index => $row)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $row->pemohon }}</td>
                                        <td>{{ $row->unit }}</td>
                                        <td>{{ $row->ruangan }}</td>
                                        <td class="text-center">
                                        @if ($row->rejected)
                                            <small class="text-danger font-italic">Anda telah rejected data ini.</small>
                                        @elseif ($row->approved)
                                            <span class="label bg-light-green">Approved</span>
                                        @else
                                            <button type="button" class="badge bg-green" data-toggle="modal" data-target="#approveModal{{ $row->id }}">Approve</button>
                                        @endif
                                        </td>
                                        <td class="text-center">
                                        @if ($row->rejected)
                                            <small class="text-danger font-italic">Anda telah rejected data ini.</small>
                                            @elseif ($row->unapproved)
                                            <span class="label bg-deep-purple">Not Approved</span>
                                        @else
                                            <button type="button" class="badge bg-deep-purple" data-toggle="modal" data-target="#notapproveModal{{ $row->id }}">Not Approve</button>
                                        @endif
                                        </td>

                                        <!-- Kolom Aksi -->
                                        <td>
                                            <a href="{{ route('admin.show',['id'=>$row->id]) }}" class="badge badge-primary"><i class="zmdi zmdi-edit"></i></a>
                                            <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#rejectedModal{{ $row->id }}"><i class="zmdi zmdi-close-circle"></i></button>
                                            {{-- <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#rejectModal{{ $row->id }}"></a> --}}
                                        </td>

                                        {{-- Modal Approve --}}
                                        <div class="modal fade" id="approveModal{{ $row->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="largeModalLabel">Approve Peminjaman</h4>
                                                    </div>
                                                    <div class="modal-body scrollable-modal-body">
                                                        <form>
                                                            <!-- Tambahkan elemen input form di sini -->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-3">
                                                                    <p class="text-dark font-bold" style="font-size: 14px">Kategori Identitas <small class="text-danger">*</small> </p>
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                <label class="text-dark" style="font-weight: bold; font-size:12px">Users</label>
                                                                                <input type="text" class="form-control" name="user_created" value="{{ $row->user_created }}" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <label class="text-dark" style="font-weight: bold; font-size:12px">Pemohon</label>
                                                                                    <input type="text" class="form-control" name="pemohon" value="{{ $row->pemohon }}" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <label class="text-dark" style="font-weight: bold; font-size:12px">Jumlah Peserta</label>
                                                                                    <input type="text" class="form-control" name="jumlah_peserta" value="{{ $row->jumlah_peserta }}" style="background-color: #fcfcfc; font-size:12px" placeholder="Input jumlah peserta yang mengikuti acara" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                                                                    <p class="text-dark font-bold" style="font-size: 14px">Kategori Tujuan <small class="text-danger">*</small> </p>
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                <label class="text-dark" style="font-weight: bold; font-size:12px">Unit/Bagian</label>
                                                                                <input type="text" class="form-control" name="unit" value="{{ $row->unit }}" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <label class="text-dark" style="font-weight: bold; font-size:12px">Keperluan</label>
                                                                                    <textarea name="keperluan" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>{{ $row->keperluan }}
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                                                                    <p class="text-dark font-bold" style="font-size: 14px">Kategori Tanggal/Waktu <small class="text-danger">*</small> </p>
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float" style="font-weight: bold; font-size:12px">
                                                                                Mulai Tanggal
                                                                                    <div class="input-group">
                                                                                        <div class="form-line">
                                                                                            <input type="date" name="mulai" value="{{ $row->mulai }}" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body mb-2">
                                                                            <div class="form-group form-float" style="font-weight: bold; font-size:12px">
                                                                                Waktu Mulai
                                                                                <div class="input-group">
                                                                                    <div class="form-line">
                                                                                        <input type="time" name="waktu_mulai" value="{{ date('H:i', strtotime($row->waktu_mulai)) }}" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float" style="font-weight: bold; font-size:12px">
                                                                                Selesai Tanggal
                                                                                <div class="input-group">
                                                                                    <div class="form-line">
                                                                                        <input type="date" name="selesai" value="{{ $row->selesai }}" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float" style="font-weight: bold; font-size:12px">
                                                                                Waktu Selesai
                                                                                <div class="input-group">
                                                                                    <div class="form-line">
                                                                                        <input type="time" name="waktu_selesai" value="{{ date('H:i', strtotime($row->waktu_selesai)) }}" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                                                                    <p class="text-dark font-bold" style="font-size: 14px">Kategori Peminjaman <small class="text-danger">*</small> </p>
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <label class="text-dark" style="font-weight: bold; font-size:12px">Keterangan</label>
                                                                                    <textarea name="keterangan" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>{{ $row->keterangan }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body mb-5">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                <label class="text-dark" style="font-weight: bold; font-size:12px">Ruangan</label>
                                                                                <input type="text" class="form-control" name="ruangan" value="{{ $row->ruangan }}" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <form action="{{ route('admin.approve-form', $row->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success waves-effect w-100">APPROVE</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Modal Not Approve --}}
                                        <div class="modal fade" id="notapproveModal{{ $row->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="largeModalLabel">Not Approve Peminjaman</h4>
                                                    </div>
                                                    <div class="modal-body scrollable-modal-body">
                                                        <form>
                                                            <!-- Tambahkan elemen input form di sini -->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-3">
                                                                    <p class="text-dark font-bold" style="font-size: 14px">Kategori Identitas <small class="text-danger">*</small> </p>
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                <label class="text-dark" style="font-weight: bold; font-size:12px">Users</label>
                                                                                <input type="text" class="form-control" name="user_created" value="{{ $row->user_created }}" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <label class="text-dark" style="font-weight: bold; font-size:12px">Pemohon</label>
                                                                                    <input type="text" class="form-control" name="pemohon" value="{{ $row->pemohon }}" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <label class="text-dark" style="font-weight: bold; font-size:12px">Jumlah Peserta</label>
                                                                                    <input type="text" class="form-control" name="jumlah_peserta" value="{{ $row->jumlah_peserta }}" style="background-color: #fcfcfc; font-size:12px" placeholder="Input jumlah peserta yang mengikuti acara" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                                                                    <p class="text-dark font-bold" style="font-size: 14px">Kategori Tujuan <small class="text-danger">*</small> </p>
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                <label class="text-dark" style="font-weight: bold; font-size:12px">Unit/Bagian</label>
                                                                                <input type="text" class="form-control" name="unit" value="{{ $row->unit }}" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <label class="text-dark" style="font-weight: bold; font-size:12px">Keperluan</label>
                                                                                    <textarea name="keperluan" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>{{ $row->keperluan }}
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                                                                    <p class="text-dark font-bold" style="font-size: 14px">Kategori Tanggal/Waktu <small class="text-danger">*</small> </p>
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float" style="font-weight: bold; font-size:12px">
                                                                                Mulai Tanggal
                                                                                    <div class="input-group">
                                                                                        <div class="form-line">
                                                                                            <input type="date" name="mulai" value="{{ $row->mulai }}" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body mb-2">
                                                                            <div class="form-group form-float" style="font-weight: bold; font-size:12px">
                                                                                Waktu Mulai
                                                                                <div class="input-group">
                                                                                    <div class="form-line">
                                                                                        <input type="time" name="waktu_mulai" value="{{ date('H:i', strtotime($row->waktu_mulai)) }}" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float" style="font-weight: bold; font-size:12px">
                                                                                Selesai Tanggal
                                                                                <div class="input-group">
                                                                                    <div class="form-line">
                                                                                        <input type="date" name="selesai" value="{{ $row->selesai }}" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float" style="font-weight: bold; font-size:12px">
                                                                                Waktu Selesai
                                                                                <div class="input-group">
                                                                                    <div class="form-line">
                                                                                        <input type="time" name="waktu_selesai" value="{{ date('H:i', strtotime($row->waktu_selesai)) }}" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                                                                    <p class="text-dark font-bold" style="font-size: 14px">Kategori Peminjaman <small class="text-danger">*</small> </p>
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <label class="text-dark" style="font-weight: bold; font-size:12px">Keterangan</label>
                                                                                    <textarea name="keterangan" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>{{ $row->keterangan }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body mb-5">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                <label class="text-dark" style="font-weight: bold; font-size:12px">Ruangan</label>
                                                                                <input type="text" class="form-control" name="ruangan" value="{{ $row->ruangan }}" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <form action="{{ route('admin.unapprove-form', $row->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn bg-deep-purple waves-effect w-100">NOT APPROVE</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal for reject reason -->
                                        <div class="modal fade" id="rejectedModal{{ $row->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="largeModalLabel">Not Approve Peminjaman</h4>
                                                    </div>
                                                    <div class="modal-body scrollable-modal-body">
                                                        <form action="{{ route('admin.reject-form', $row->id) }}" method="POST">
                                                            @csrf
                                                            <!-- Tambahkan elemen input form di sini -->
                                                            <div class="row clearfix">
                                                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-3">
                                                                    <p class="text-dark font-bold" style="font-size: 14px">Kategori Identitas <small class="text-danger">*</small> </p>
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                <label class="text-dark" style="font-weight: bold; font-size:12px">Users</label>
                                                                                <input type="text" class="form-control" name="user_created" value="{{ $row->user_created }}" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <label class="text-dark" style="font-weight: bold; font-size:12px">Pemohon</label>
                                                                                    <input type="text" class="form-control" name="pemohon" value="{{ $row->pemohon }}" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <label class="text-dark" style="font-weight: bold; font-size:12px">Jumlah Peserta</label>
                                                                                    <input type="text" class="form-control" name="jumlah_peserta" value="{{ $row->jumlah_peserta }}" style="background-color: #fcfcfc; font-size:12px" placeholder="Input jumlah peserta yang mengikuti acara" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                                                                    <p class="text-dark font-bold" style="font-size: 14px">Kategori Tujuan <small class="text-danger">*</small> </p>
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                <label class="text-dark" style="font-weight: bold; font-size:12px">Unit/Bagian</label>
                                                                                <input type="text" class="form-control" name="unit" value="{{ $row->unit }}" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <label class="text-dark" style="font-weight: bold; font-size:12px">Keperluan</label>
                                                                                    <textarea name="keperluan" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>{{ $row->keperluan }}
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                                                                    <p class="text-dark font-bold" style="font-size: 14px">Kategori Tanggal/Waktu <small class="text-danger">*</small> </p>
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float" style="font-weight: bold; font-size:12px">
                                                                                Mulai Tanggal
                                                                                    <div class="input-group">
                                                                                        <div class="form-line">
                                                                                            <input type="date" name="mulai" value="{{ $row->mulai }}" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body mb-2">
                                                                            <div class="form-group form-float" style="font-weight: bold; font-size:12px">
                                                                                Waktu Mulai
                                                                                <div class="input-group">
                                                                                    <div class="form-line">
                                                                                        <input type="time" name="waktu_mulai" value="{{ date('H:i', strtotime($row->waktu_mulai)) }}" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float" style="font-weight: bold; font-size:12px">
                                                                                Selesai Tanggal
                                                                                <div class="input-group">
                                                                                    <div class="form-line">
                                                                                        <input type="date" name="selesai" value="{{ $row->selesai }}" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float" style="font-weight: bold; font-size:12px">
                                                                                Waktu Selesai
                                                                                <div class="input-group">
                                                                                    <div class="form-line">
                                                                                        <input type="time" name="waktu_selesai" value="{{ date('H:i', strtotime($row->waktu_selesai)) }}" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                                                                    <p class="text-dark font-bold" style="font-size: 14px">Kategori Peminjaman <small class="text-danger">*</small> </p>
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <label class="text-dark" style="font-weight: bold; font-size:12px">Keterangan</label>
                                                                                    <textarea name="keterangan" class="form-control" style="background-color: #fcfcfc; font-size:12px" readonly>{{ $row->keterangan }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body mb-5">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                <label class="text-dark" style="font-weight: bold; font-size:12px">Ruangan</label>
                                                                                <input type="text" class="form-control" name="ruangan" value="{{ $row->ruangan }}" style="background-color: #fcfcfc; font-size:12px" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row clearfix">
                                                                <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12">
                                                                    <p class="text-dark font-bold" style="font-size: 14px">Rejected Peminjaman <small class="text-danger">*</small> </p>
                                                                    <div class="card" style="background-color: #fcfcfc">
                                                                        <div class="body">
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <textarea name="informasi" class="form-control" style="background-color: #fcfcfc; font-size:12px" required></textarea>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <button type="submit" class="text-white btn bg-danger waves-effect w-100">REJECTED</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    @endsection
    @push('after-scripts')
        {{-- select2 for Users --}}
        <script>
            $("#approveUsers").select2({
                tags: true,
            });
        </script>
        <script>
            $("#approveUnit").select2({
                tags: true,
            });
        </script>
        <script>
            $("#approveRuangan").select2({
                tags: true,
            });
        </script>
    @endpush