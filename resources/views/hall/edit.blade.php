<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bakti Hall | Lapangan 1</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    @php
    $rec = DB::Table("orders")
            ->where('id_firsthall', $id_firsthall)
            ->first();
    @endphp
    <section class="content pt-2">
        <div class="container-fluid">
            <div class="row mt-4">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{$judul}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('firsthall/' .$id_firsthall) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" class="form-control" id="id_firsthall" name="id_firsthall" value="{{$id_firsthall}}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_pemesan">Nama Pemesan</label>
                                    <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" value="{{$rec->nama_pemesan ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="nohp">Nomor Handphone</label>
                                    <input type="number" class="form-control" id="nohp" name="nohp" value="{{$rec->nohp ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Pemesan</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{$rec->alamat ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="start_booking">Jam Mulai Booking</label>
                                    <input type="time" class="form-control" id="start_booking" name="start_booking" value="{{$rec->start_booking ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="end_booking">Jam Selesai Booking</label>
                                    <input type="time" class="form-control" id="end_booking" name="end_booking" value="{{$rec->end_booking ?? ''}}">
                                </div>
                                <input type="hidden" class="form-control" id="jenis_lapangan" name="jenis_lapangan" value="{{$rec->jenis_lapangan ?? ''}}">
                                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$rec->user_id ?? ''}}">
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</body>
@stop
</html>
