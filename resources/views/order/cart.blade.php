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

    @if(session('sukses'))
    <div class="alert alert-dismissible fade show alert-success" role="alert">
        <strong>Halo, {{ Auth::user()->name }}!</strong> {{ session('sukses')  }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if($errors->has('image'))
    <div class="alert alert-dismissible fade show alert-danger" role="alert">
        <strong>Halo {{ Auth::user()->name }}!</strong> {{ $errors->first('image') == 'The image field must be an image.' ? 'Format gambar tidak sesuai atau ukuran terlalu besar, max:2MB' : 'Gambar belum diupload atau ukuran terlalu besar, max:2MB!' }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Keranjang</h1>
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
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Hapus</th>
                                            <th>Edit</th>
                                            <th>Bayar</th>
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
                                                <td>{{ $value->price ?? '-' }}</td>
                                                <td>{{ $value->status ?? '-' }}</td>
                                                <td>
                                                    <form action="{{ Route('firsthall.destroy', $value->id_order) }}" method="POST"
                                                        onsubmit="return confirm('Yakin Ingin Menghapus ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                                <td><a href="{{ Route('firsthall.edit', $value->id_order) }}"
                                                    class="btn btn-primary"><i class="fas fa-pen"></i></a></td>
                                                <td>
                                                    <a href="#" data-target="#exampleModalCenter" data-toggle="modal" class="btn btn-success text-white btn-bayar" data-price="{{ $value->price }}" data-order-id="{{$value->id_order}}"><i class="fas fa-money-bill-wave-alt" data-></i></a>
                                                </td>
                                            
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                    <p class="mt-2">Note : Jika tidak melakukan pembayaran dalam waktu 10 menit, booking akan otomatis tertolak.</p>
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
                            <div class="form-group">
                                <h4 class="metodePembayaran text-center">DANA</h4>
                                <h6 class="text-center pt-3">Tagihan Anda : </h6>
                                <p class="text-center text-xl pt-2 total-price">Rp. 0</p>
                                <h6 class="text-center pt-3">Kode Pembayaran : </h6>
                                <p class="kodePembayaran text-center text-xl pt-2">082384493291</p>
                                <div class=" p-4 my-4 text-base text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                                    <span class="font-medium">Perhatian!</span> Jika telah berhasil melakukan pembayaraan harap melakukan screenshot bukti pembayaran dan upload pada formulir dibawah.
                                </div>
                                <form action="{{url('/cart')}}" class="max-w-lg mx-auto" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload Bukti Pembayaran</label>
                                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 mb-4" aria-describedby="user_avatar_help" id="image" name="image" type="file">
                                    <input type="hidden" id="selectedOrderId" name="selectedOrderId" value="">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const btnDana = document.querySelector('.dana'),
            btnShopeePay = document.querySelector('.shopeepay'),
            btnTfBank = document.querySelector('.tf-bank'),
            metodePembayaran = document.querySelector('.metodePembayaran'),
            kodePembayaran = document.querySelector('.kodePembayaran'),
            modal = document.getElementById('exampleModalCenter'),
            btnBayar = document.querySelectorAll('.btn-bayar'),
            totalBayar = document.querySelector('.total-price'),
            selectingOrderId = document.getElementById('selectedOrderId');

            let selectedOrderPrice = 0;

            btnBayar.forEach(button => {
                button.addEventListener('click', () => {
                selectedOrderPrice = parseFloat(button.getAttribute('data-price'));
                totalBayar.textContent = `Rp. ${selectedOrderPrice}`;

                selectingOrderId.value = button.getAttribute('data-order-id');
                });
            });            

            btnDana.addEventListener('click', ()=> {
                metodePembayaran.textContent = 'DANA';
                kodePembayaran.textContent = '082384493291';
            });

            btnShopeePay.addEventListener('click', ()=> {
                metodePembayaran.textContent = 'SHOPEEPAY';
                kodePembayaran.textContent = '082384493291';
            });

            btnTfBank.addEventListener('click', ()=> {
                metodePembayaran.textContent = 'TRANSFER BRI (BANK RAKYAT INDONESIA)';
                kodePembayaran.textContent = '0001-01-011822-53-4';
            })

        </script>
    </body>
@stop

</html>
