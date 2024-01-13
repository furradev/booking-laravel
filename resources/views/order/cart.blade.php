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

    @if(session('sukses') || session('pesan'))
    <div class="alert alert-dismissible fade show {{ session('sukses') ? 'alert-success' : 'alert-danger' }}" role="alert">
        <strong>Halo {{ Auth::user()->name }}!</strong> {{ session('sukses') ? session('sukses') : session('pesan') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
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
                                <h3 class="card-title"></h3>
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
                                    <input type="checkbox" id="downPayment" onclick="toggleCheckbox(this)">
                                    <h6 class="pl-2">Bayar Uang Muka</h6>
                                </div>
                                <h6 class="flex justify-content-end my-2">Total Harga : <span class="priceNumber">{{$totalPendingPrice}}</span></h6>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="{{ url('/dashboard') }}" class="btn btn-danger">Kembali</a>
                                    <a href="#" data-target="#exampleModalCenter" data-toggle="modal" class="btn btn-warning text-white">Bayar
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

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Menu Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="cart-body">
                        <div class="form-group">
                            <label for="paymentMethod">Metode Pembayaran</label>
                            <div class="buttonMethod">
                                <button type="button" class="dana text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">DANA</button>
                                <button type="button" class="shopeepay text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">SHOPEEPAY</button>
                                <button type="button" class="tf-bank text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">TRANSFER BANK</button>
                            </div>
                          
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>

        <script>
            function toggleCheckbox(el) {

            const priceCheckbox = document.querySelector('#downPayment'),
            totalPrice = document.querySelector('.priceNumber');

            let priceText = parseFloat(totalPrice.textContent);
                if(el.checked) {
                    totalPrice.textContent = priceText * 0.5;
                } else {
                    totalPrice.textContent = priceText / 0.5;
                }
            }

        </script>
    </body>
@stop

</html>
