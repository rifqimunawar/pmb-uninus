@extends('kegiatan::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
@endphp
@section('module-content')
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Form {{ $title }}</div>
        </div>
        <div class="card-body">
          <div>
            <form action="{{ route('kegiatan.store') }}" method="post" class="row" enctype="multipart/form-data">
              @csrf
              <div class="form-group mb-2">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control" required name="nama_kegiatan" id="nama_kegiatan"
                  placeholder="Nama Kegiatan" />
              </div>

              <div class="card-action gap-2 d-flex justify-content-center mt-4">
                <input type="hidden" name="id">
                <a href="{{ route('kegiatan.index') }}" class="btn btn-warning btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
              </div>
            </form>
          </div>


        </div>
      </div>
    </div>
  </div>
@endsection
<script>
  function numberInput(input) {
    input.value = input.value.replace(/[^0-9]/g, '');
  }

  function formatRupiah(input) {
    let value = input.value.replace(/[^0-9]/g, '');
    let formatted = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0,
    }).format(value);
    input.value = formatted.replace('Rp', 'Rp');
  }
</script>
