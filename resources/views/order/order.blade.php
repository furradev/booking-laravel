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
                                            <th>Order ID</th>
                                            <th>Nama</th>
                                            <th>No Telepon</th>
                                            <th>Alamat</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Berakhir</th>
                                            <th>Jenis Lapangan</th>
                                            <th>Harga Booking</th>
                                            <th>Status</th>
                                            <th>Hapus</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($orders as $value)
                                            <tr>
                                                <td>{{ $value->id_order ?? '-' }}</td>
                                                <td>{{ $value->nama_pemesan ?? '-' }}</td>
                                                <td>{{ $value->nohp ?? '-' }}</td>
                                                <td>{{ $value->alamat ?? '-' }}</td>
                                                <td>{{ $value->start_booking ?? '-' }}</td>
                                                <td>{{ $value->end_booking ?? '-' }}</td>
                                                <td>{{ $value->jenis_lapangan ?? '-' }}</td>
                                                <td>{{ $value->price ?? '-' }}</td>
                                                <td><span class="badge {{
                                                    $value->status == "pending" ? "badge-warning" :
                                                    ($value->status == "unverified" ? "badge-info" :
                                                    ($value->status == "verified" ? "badge-success" :
                                                    ($value->status == "rejected" ? "badge-danger" :
                                                    ($value->status == "finished" ? "badge-secondary" :
                                                    "badge-secondary"))))
                                                }}">{{$value->status}}</span></td>
                                                <td>
                                                    @if($value->status == "rejected" || $value->status == "finished" )
                                                        <form action="{{ Route('order.destroy', $value->id_order) }}" method="POST"
                                                            onsubmit="return confirm('Yakin Ingin Menghapus ?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    @else
                                                        <button type="submit" class="btn btn-danger" disabled><i class="fas fa-trash"></i></button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="#" data-target="#exampleModalCenter" data-toggle="modal" class="btn btn-success text-white btn-view" data-order-id="{{$value->id_order}}" data-image="{{$value->image}}"><i class="fas fa-eye" data-></i></a>
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="{{ url('/dashboard') }}" class="btn btn-danger">Kembali</a>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Bukti Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="cart-body">
                            <img src="" class="buktiBayar" alt="bukti-pembayaran" class="rounded">
                            <input type="hidden" id="selectedOrderId" name="selectedOrderId" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const modal = document.getElementById('exampleModalCenter'),
            btnView = document.querySelectorAll('.btn-view'),
            buktiBayar = document.querySelector('.buktiBayar'),
            selectingOrderId = document.getElementById('selectedOrderId');


            btnView.forEach(button => {
                button.addEventListener('click', () => {
                    const selectedOrderId = button.getAttribute('data-order-id');
                    const selectedImageSrc = button.getAttribute('data-image');
                    buktiBayar.src = `{{asset('storage/${selectedImageSrc}')}}`;
                    selectingOrderId.value = button.getAttribute('data-order-id');
                });
            });            

        </script>

    </body>
@stop

</html>
