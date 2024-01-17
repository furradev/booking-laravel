@extends('layouts.app')
@section('content')

<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('patch')
    <div class="card-body">
        <div class="form-group">
            <label for="nama_pemesan">Nama Profile</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="nohp">Nomor Handphone</label>
            <input type="number" class="form-control" id="nohp" name="nohp">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat Pemesan</label>
            <input type="text" class="form-control" id="alamat" name="alamat">
        </div>
        <div class="form-group">
            <label for="start_booking">Jam Mulai Booking</label>
            <input type="time" class="form-control" id="start_booking" name="start_booking">
        </div>
        <div class="form-group">
            <label for="end_booking">Jam Selesai Booking</label>
            <input type="time" class="form-control" id="end_booking" name="end_booking">
        </div>
        <input type="hidden" class="form-control" id="jenis_lapangan" name="jenis_lapangan" value="{{'Lapangan 1'}}">
        {{-- <input type="hidden" class="form-control" id="price" name="price" value="{{$totalPrice}}"> --}}
        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{Auth::user()->id}}">
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@stop