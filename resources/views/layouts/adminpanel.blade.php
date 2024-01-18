    @extends('layouts.app')
    @section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Panel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Admin Panel</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid flex">
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah Order</span>
                <span class="info-box-number">{{$totalOrder}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah User</span>
                <span class="info-box-number">{{$totalUser}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- /.card -->
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Pesanan Menunggu Verifikasi</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Nama User</th>
                      <th>No Telp</th>
                      <th>Alamat</th>
                      <th>Mulai Booking</th>
                      <th>Selesai Booking</th>
                      <th>Jenis Lapangan</th>
                      <th>Harga Pesanan</th>
                      <th>Status Pesanan</th>
                      <th>Reject</th>
                      <th>View</th>
                      <th>Accept</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($orderMultiple as $order)
                        <tr>
                            <td>{{$order->id_order}}</td>
                            <td>{{$order->nama_pemesan}}</td>
                            <td>{{$order->nohp}}</td>
                            <td>{{$order->alamat}}</td>
                            <td>{{$order->start_booking}}</td>
                            <td>{{$order->end_booking}}</td>
                            <td>{{$order->jenis_lapangan}}</td>
                            <td>{{$order->price}}</td>
                            <td><span class="badge {{
                                $order->status == "pending" ? "badge-warning" :
                                ($order->status == "unverified" ? "badge-info" :
                                ($order->status == "verified" ? "badge-success" :
                                ($order->status == "rejected" ? "badge-danger" :
                                ($order->status == "finished" ? "badge-dark" :
                                "badge-secondary"))))
                            }}">
                                {{ $order->status }}
                            </span></td>
                            <td><a href="{{ Route('admin.edit', $order->id_order) }}"
                                class="btn btn-danger"><i class="fas fa-times"></i></a>
                            </td>
                            <td>
                                <a href="#" data-target="#exampleModalCenter" data-toggle="modal" class="btn btn-info text-white btn-view" data-order-id="{{$order->id_order}}" data-image="{{$order->image}}"><i class="fas fa-eye" data-></i></a>
                            </td>
                            <td>
                                <a href="{{ Route('admin.show', $order->id_order) }}"
                                  class="btn btn-success"><i class="fas fa-check"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header border-transparent">
                      <h3 class="card-title">Pesanan Rejected</h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table m">
                          <thead>
                          <tr>
                            <th>Order ID</th>
                            <th>Nama User</th>
                            <th>No Telp</th>
                            <th>Mulai Booking</th>
                            <th>Selesai Booking</th>
                            <th>Jenis Lapangan</th>
                            <th>Harga Pesanan</th>
                            <th>Status Pesanan</th>
                            <th>View</th>
                          </tr>
                          </thead>
                          <tbody>
                              @foreach($orderRejected as $rejected)
                              <tr>
                                  <td>{{$rejected->id_order}}</td>
                                  <td>{{$rejected->nama_pemesan}}</td>
                                  <td>{{$rejected->nohp}}</td>
                                  <td>{{$rejected->start_booking}}</td>
                                  <td>{{$rejected->end_booking}}</td>
                                  <td>{{$rejected->jenis_lapangan}}</td>
                                  <td>{{$rejected->price}}</td>
                                  <td><span class="badge {{
                                      $rejected->status == "pending" ? "badge-warning" :
                                      ($rejected->status == "unverified" ? "badge-info" :
                                      ($rejected->status == "verified" ? "badge-success" :
                                      ($rejected->status == "rejected" ? "badge-danger" :
                                      ($rejected->status == "finished" ? "badge-dark" :
                                      "badge-secondary"))))
                                  }}">
                                      {{ $rejected->status }}
                                  </span></td>
                                  <td>
                                      <a href="#" data-target="#exampleModalCenter" data-toggle="modal" class="btn btn-info text-white btn-view" data-order-id="{{$rejected->id_order}}" data-image="{{$rejected->image}}"><i class="fas fa-eye" data-></i></a>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                      <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                    </div>
                    <!-- /.card-footer -->
                  </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header border-transparent">
                      <h3 class="card-title">Pesanan Verified</h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table m">
                          <thead>
                          <tr>
                            <th>Order ID</th>
                            <th>Nama User</th>
                            <th>No Telp</th>
                            <th>Mulai Booking</th>
                            <th>Selesai Booking</th>
                            <th>Jenis Lapangan</th>
                            <th>Harga Pesanan</th>
                            <th>Status Pesanan</th>
                            <th>View</th>
                            <th>Selesai</th>
                          </tr>
                          </thead>
                          <tbody>
                              @foreach($orderVerified as $verified)
                              <tr>
                                  <td>{{$verified->id_order}}</td>
                                  <td>{{$verified->nama_pemesan}}</td>
                                  <td>{{$verified->nohp}}</td>
                                  <td>{{$verified->start_booking}}</td>
                                  <td>{{$verified->end_booking}}</td>
                                  <td>{{$verified->jenis_lapangan}}</td>
                                  <td>{{$verified->price}}</td>
                                  <td><span class="badge {{
                                      $verified->status == "pending" ? "badge-warning" :
                                      ($verified->status == "unverified" ? "badge-info" :
                                      ($verified->status == "verified" ? "badge-success" :
                                      ($verified->status == "rejected" ? "badge-danger" :
                                      ($verified->status == "finished" ? "badge-secondary" :
                                      "badge-secondary"))))
                                  }}">
                                      {{ $verified->status }}
                                  </span></td>
                                  <td>
                                      <a href="#" data-target="#exampleModalCenter" data-toggle="modal" class="btn btn-info text-white btn-view" data-order-id="{{$verified->id_order}}" data-image="{{$verified->image}}"><i class="fas fa-eye" data-></i></a>
                                  </td>
                                  <td>
                                    <form action="{{ Route('admin.update', $verified->id_order) }}" method="POST">
                                      @csrf
                                      @method('patch')
                                      <button type="submit" class="btn btn-danger"><i class="fas fa-stopwatch"></i></button>
                                  </form>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                      <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                    </div>
                    <!-- /.card-footer -->
                  </div>
                <!-- /.card -->
            </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

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
@stop

