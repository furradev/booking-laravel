<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakti Hall | Order</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pesanan Anda</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Pesanan</li>
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
                                <h3 class="card-title">DataTable with minimal features & hover style</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No Telepon</th>
                                            <th>Alamat</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Berakhir</th>
                                            <th>Jenis Lapangan</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            // $firsthall = DB::Table('firsthall')->SELECT('*');
                                            // $secondhall = DB::Table('secondhall')->SELECT('*');

                                            // $res = $firsthall->union($secondhall)->GET();
                                            // $res = DB::Table('orders')->GET();
                                            $no = 0;
                                        @endphp
                                        @foreach ($orders as $value)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $value->nama_pemesan ?? '-' }}</td>
                                                <td>{{ $value->nohp ?? '-' }}</td>
                                                <td>{{ $value->alamat ?? '-' }}</td>
                                                <td>{{ $value->start_booking ?? '-' }}</td>
                                                <td>{{ $value->end_booking ?? '-' }}</td>
                                                <td>{{ $value->jenis_lapangan ?? '-' }}</td>
                                                <td>{{ $value->status ?? '-' }}</td>
                                                <td><a href="{{ Route('firsthall.edit', $value->id_firsthall) }}"
                                                    class="btn btn-primary"><i class="fas fa-pen"></i></a></td>

                                            <td>
                                                <form action="{{ Route('firsthall.destroy', $value->id_firsthall) }}" method="POST"
                                                    onsubmit="return confirm('Yakin Ingin Menghapus ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="flex justify-content-end mt-2">
                                    <input type="checkbox" id="downPayment">
                                    <h6 class="pl-2">Bayar Uang Muka</h6>
                                </div>
                                <h6 class="flex justify-content-end my-2">Total Harga : <span class="priceNumber">{{$totalPrice}}</span></h6>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="{{ url('/dashboard') }}" class="btn btn-danger">Kembali</a>
                                    <a href="{{ url('dosen/create') }}" class="btn btn-warning text-white">Bayar
                                        Sekarang</a>
                                </div>
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

        <script>
            const priceCheckbox = document.querySelector('#downPayment'),
            totalPrice = document.querySelector('.priceNumber').textContent;

            let priceText = parseFloat(totalPrice);

            priceCheckbox.addEventListener('click',()=> {
               let calculatePrice = totalPrice * 0.5;
               totalPrice.textContent = calculatePrice.toFixed(2);
               
               console.log(calculatePrice);
            })
            
            
        </script>
    </body>
@stop

</html>
