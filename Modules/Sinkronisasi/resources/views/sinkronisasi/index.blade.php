@extends('sinkronisasi::layouts.master')
@php
  use App\Helpers\Fungsi;
  use app\Helpers\GetSettings;
@endphp

@section('module-content')
  <!-- BEGIN panel -->
  <div class="panel panel-inverse">
    <!-- BEGIN panel-heading -->
    <div class="panel-heading">
      <h4 class="panel-title">{{ $title }}</h4>
      <div class="panel-heading-btn">
        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
            class="fa fa-expand"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
            class="fa fa-redo"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
            class="fa fa-minus"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
            class="fa fa-times"></i></a>
      </div>
    </div>
    <div
      style="display: flex; justify-content: center; align-items: center; margin: 10px auto 15px auto; width: max-content;">
      <a href="{{ route('sinkronisasi.create') }}" data-confirm-sinkron="true"
        class="btn btn-primary
      {{-- disabled --}}
      ">
        Sinkronkan Database &ensp;
        <i class="fa fa fa-refresh" aria-hidden="true" style="font-size: 14px"></i>
        <i class="fa fa fa fa-database" aria-hidden="true" style="font-size: 14px"></i>
      </a>
    </div>
    <div
      style="display: flex; justify-content: center; align-items: center; margin: 10px auto 15px auto; width: max-content;">
      <p>
        Sinkronisasi data dapat dilakukan maksimal <strong>500 kali</strong>. <br> dan telah digunakan sebanyak
        <strong>{{ $data->usage_count }}</strong> kali.
        <br> Terakhir diperbarui oleh
        <strong>{{ $data->users->username }}</strong> pada
        <strong>{{ Fungsi::format_tgl($data->updated_at) }}</strong>.<br>
        {{-- <i>Untuk sementara tombol tidak difungsikan --}}
      </p>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('[data-confirm-sinkron]').forEach(function(button) {
        button.addEventListener('click', function(event) {
          event.preventDefault();

          const alertConfig = {!! json_encode(
              Session::pull('alert.config', [
                  'title' => 'Yakin ingin sinkronisasi data?',
                  'text' => 'Proses ini akan memperbarui data dari Sheet.',
                  'icon' => 'warning',
                  'showCancelButton' => true,
                  'cancelButtonText' => 'Batal',
                  'confirmButtonText' => 'Ya, sinkronkan!',
              ]),
          ) !!};

          Swal.fire(alertConfig).then(function(result) {
            if (result.isConfirmed) {
              window.location.href = button.getAttribute('href');
            }
          });
        });
      });
    });
  </script>
@endsection
