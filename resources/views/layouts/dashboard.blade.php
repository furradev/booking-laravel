@extends('layouts.app')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Jadwal Bakti Hall</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Jadwal</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Jadwal Yang Terdaftar Hari Ini</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Pemesan</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Berakhir</th>
                                    <th>Jenis Lapangan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($orderMultiple as $value)
                                    <tr>
                                        <td>{{ $value->nama_pemesan ?? '-' }}</td>
                                        <td>{{ $value->start_booking ?? '-' }}</td>
                                        <td>{{ $value->end_booking ?? '-' }}</td>
                                        <td>{{ $value->jenis_lapangan ?? '-' }}</td>
                                        <td><span class="badge {{
                                            $value->status == "pending" ? "badge-warning" :
                                            ($value->status == "unverified" ? "badge-info" :
                                            ($value->status == "verified" ? "badge-success" :
                                            ($value->status == "rejected" ? "badge-danger" :
                                            ($value->status == "finished" ? "badge-dark" :
                                            "badge-secondary"))))
                                        }}">{{$value->status}}</span></td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@stop