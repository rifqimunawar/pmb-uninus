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
              <!-- Nama Kegiatan -->
              <div class="form-group mb-2">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control" required name="nama_kegiatan" id="nama_kegiatan"
                  placeholder="Nama Kegiatan" />
              </div>

              <!-- Deskripsi -->
              <div class="form-group mb-2">
                <label for="desc">Deskripsi</label>
                <textarea class="form-control" required name="desc" id="desc" rows="3" placeholder="Deskripsi kegiatan"></textarea>
              </div>

              <!-- Tanggal Kegiatan -->
              <div class="form-group mb-2">
                <label for="tgl_kegiatan">Tanggal Kegiatan</label>
                <input type="date" class="form-control" required name="tgl_kegiatan" id="tgl_kegiatan" />
              </div>

              <!-- Upload Gambar -->
              <div class="form-group mb-2">
                <label for="img">Gambar Kegiatan</label>
                <input type="file" class="form-control" required name="img" id="img" accept="image/*"
                  onchange="previewImage(event)" />
              </div>

              <!-- Preview Gambar -->
              <div class="form-group mb-2">
                <img id="preview" src="#" alt="Preview Gambar" style="max-width: 300px; display: none;" />
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

  function previewImage(event) {
    const input = event.target;
    const reader = new FileReader();
    reader.onload = function() {
      const preview = document.getElementById('preview');
      preview.src = reader.result;
      preview.style.display = 'block';
    };
    if (input.files[0]) {
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
