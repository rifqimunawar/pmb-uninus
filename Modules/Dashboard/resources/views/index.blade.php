@extends('dashboard::layouts.master')
@php
  use App\Helpers\Fungsi;
  use App\Helpers\GetSettings;
  use Carbon\Carbon;
  Carbon::setLocale('id');
  $now = Carbon::now();
  $limitDate = $now->copy()->addDays(5);
@endphp
@section('content')
  <!-- BEGIN row -->

  <!-- BEGIN row -->

  <!-- Tampilan Waktu -->
  <div class="container-fluid d-flex justify-content-center align-items-center" style="width:100%; margin-bottom: 2rem;">
    <div class="d-flex justify-content-between align-items-center p-4 rounded-4 shadow-lg"
      style="background: linear-gradient(135deg, #acb507, #1da20f); width: 100%; ;">

      <!-- Kolom 1: Logo -->
      <div class="text-center flex-fill">
        <img src="{{ GetSettings::getLogo() }}" alt="Logo Uninus"
          style="max-height: 60px; filter: drop-shadow(0 0 8px rgb(6, 243, 255));" />
      </div>

      <!-- Kolom 2: Selamat Datang -->
      <div class="text-center flex-fill">
        <div class="fs-5 fw-semibold text-white">Selamat Datang, {{ Auth::user()->username }}</div>


      </div>

      <!-- Kolom 3: Waktu -->
      <div class="text-center flex-fill">
        <div id="jam_menit" class="fs-4 fw-semibold text-white">Memuat...</div>
        <div id="tanggal_tahun" class="fs-6 fw-semibold text-white">Memuat...</div>
      </div>

    </div>
  </div>
  <!-- End Tampilan Waktu -->

  <!-- BEGIN REPORT UMUM  -->

  <div class="row g-3 mb-3">
    <!-- Info Kegiatan -->
    <div class="col-12 col-md-4">
      <div class="card h-100 bg-gray-800 text-white">
        <div id="carouselKegiatanUtama" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
          <div class="carousel-inner">
            @foreach ($data_kegiatan as $index => $item)
              <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <div class="card-body d-flex flex-column">
                  <img src="{{ asset('img/' . $item->img) }}" class="d-block w-100 rounded mb-3"
                    alt="Gambar {{ $item->nama_kegiatan }}" style="object-fit: cover; height: 200px;">

                  <h5 class="mb-2">Info Kegiatan</h5>
                  <div class="row text-white small gx-2">
                    <div class="col-4">
                      <strong>Tanggal:</strong><br>
                      {{ Fungsi::format_tgl($item->tgl_kegiatan) }}
                    </div>
                    <div class="col-4">
                      <strong>Nama:</strong><br>
                      {{ $item->nama_kegiatan }}
                    </div>
                    <div class="col-4">
                      <strong>Deskripsi:</strong><br>
                      {{ Str::limit($item->desc, 60) }}
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          <!-- Navigasi Manual -->
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselKegiatanUtama"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselKegiatanUtama"
            data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>


      </div>
    </div>


    <!-- Report Umum -->
    <!-- ✅ Perubahan 1: ubah col agar responsif -->
    <div class="col-12 col-md-4">
      <div class="card h-100 bg-gray-800 text-white">
        <div class="card-body d-flex flex-column justify-content-between h-100">
          <div>
            <h5 class="mb-2">Report Umum</h5>
            <p class="text-muted mb-4">Data CAMABA 2025-2026</p>
          </div>

          <div class="row text-center gy-3">

            <div class="col-6 d-flex flex-column justify-content-center">
              <div class="fw-bold mb-1">Total Pendaftar</div>
              <div class="text-info display-6 fw-semibold">{{ $totalPendaftar }}</div>
            </div>

            <div class="col-6 d-flex flex-column justify-content-center">
              <div class="fw-bold mb-1">Bayar Formulir</div>
              <div class="text-success display-6 fw-semibold">{{ $totalBayarFormulir }}</div>
            </div>

            <div class="col-6 d-flex flex-column justify-content-center">
              <div class="fw-bold mb-1">Bayar UKT</div>
              <div class="text-warning display-6 fw-semibold">{{ $totalBayarUKT }}</div>
            </div>

            <div class="col-6 d-flex flex-column justify-content-center">
              <div class="fw-bold mb-1">Peminat</div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Rencana Kegiatan -->
    <div class="col-4 col-md-4">
      <div class="card h-100 bg-gray-800 text-white">
        <div class="card-body d-flex flex-column">
          <h5 class="mb-3">Rencana Kegiatan</h5>
          <ul class="list-unstyled mb-0 flex-grow-1">
            @foreach ($data_kegiatan as $item)
              @php
                $tglKegiatan = Carbon::parse($item->tgl_kegiatan);
              @endphp

              @if ($tglKegiatan->isAfter($now) && $tglKegiatan->lessThanOrEqualTo($limitDate))
                <li class="mb-3">
                  <strong>{{ $item->nama_kegiatan }}</strong><br />
                  <span class="text-white small">
                    {{ $tglKegiatan->translatedFormat('l, d F Y') }} — {{ Str::limit($item->desc, 60) }}
                  </span>
                </li>
              @endif
            @endforeach

            {{-- Jika tidak ada kegiatan dalam 5 hari ke depan --}}
            @if (
                $data_kegiatan->filter(fn($item) => Carbon::parse($item->tgl_kegiatan)->isAfter($now) &&
                            Carbon::parse($item->tgl_kegiatan)->lessThanOrEqualTo($limitDate))->isEmpty())
              <li class="text-white small">Tidak ada kegiatan dalam 5 hari ke depan.</li>
            @endif
          </ul>
          <div class="mt-auto"></div> <!-- Spacer -->
        </div>
      </div>
    </div>
  </div>

  <!-- END REPORT UMUM -->

  <!-- BEGIN daterange-filter -->
  <div class="d-flex align-items-center mb-3 gap-2 flex-wrap">

    <select id="tahun-dropdown" class="form-select form-select-sm w-auto">
      <option value="">Semua Tahun</option>
      <option value="2024-2025">2024-2025</option>
      <option value="2025-2026">2025-2026</option>
    </select>

    <select id="jenjang-dropdown" class="form-select form-select-sm w-auto">
      <option value="">Semua Jenjang</option>
      <option value="SARJANA">SARJANA</option>
      <option value="PASCASARJANA">PASCASARJANA</option>
    </select>

    <select id="fakultas-dropdown" class="form-select form-select-sm w-auto">
      <option value="">Semua Fakultas</option>
    </select>

    <select id="prodi-dropdown" class="form-select form-select-sm w-auto">
      <option value="">Semua Prodi</option>
    </select>

  </div>

  <!-- END daterange-filter -->

  <!-- BEGIN row -->
  <div class="row">
    <!-- BEGIN col-6 -->
    <div class="col-xl-6">
      <!-- BEGIN card -->
      <div class="card border-0 mb-3 overflow-hidden bg-gray-800 text-white">
        <!-- BEGIN card-body -->
        <div class="card-body">
          <!-- BEGIN row -->
          <div class="row">
            <!-- BEGIN col-7 -->
            <div class="col-xl-7 col-lg-8">
              <!-- BEGIN title -->
              <div class="mb-3 text-gray-500">
                <b>Total Pendaftar</b>
                <span class="ms-2">
                  <i class="fa fa-info-circle" data-bs-toggle="popover" data-bs-trigger="hover"
                    data-bs-title="Total sales" data-bs-placement="top"
                    data-bs-content="Net sales (gross sales minus discounts and returns) plus taxes and shipping. Includes orders from all sales channels."></i>
                </span>
              </div>
              <!-- END title -->
              <!-- BEGIN total-sales -->
              <div class="d-flex mb-1">
                <h2 class="mb-0"><span data-animation="number" data-value="total-pendaftar">0</span> Camaba</h2>
                <div class="ms-auto mt-n1 mb-n1">
                  <div id="total-sales-sparkline"></div>
                </div>
              </div>
              <!-- END total-sales -->
              <hr class="bg-white bg-opacity-50" />
              <!-- BEGIN row -->
              <div class="row text-truncate">
                <!-- BEGIN col-6 -->
                <div class="col-6">
                  <div class=" text-gray-500">Total Pelayanan Online</div>
                  <div class="fs-18px mb-5px fw-bold" data-animation="number" data-value="pelayanan-online">0</div>
                  <div class="progress h-5px rounded-3 bg-gray-900 mb-5px">
                    <div class="progress-bar progress-bar-striped rounded-right bg-teal" data-animation="width"
                      data-value="55%" style="width: 0%"></div>
                  </div>
                </div>
                <!-- END col-6 -->
                <!-- BEGIN col-6 -->
                <div class="col-6">
                  <div class=" text-gray-500">Total Pelayanan Offline</div>
                  <div class="fs-18px mb-5px fw-bold"><span data-animation="number"
                      data-value="pelayanan-offline">0</span></div>
                  <div class="progress h-5px rounded-3 bg-gray-900 mb-5px">
                    <div class="progress-bar progress-bar-striped rounded-right" data-animation="width"
                      data-value="55%" style="width: 0%"></div>
                  </div>
                </div>
                <!-- END col-6 -->
              </div>
              <!-- END row -->
            </div>
            <!-- END col-7 -->
            <!-- BEGIN col-5 -->
            <div class="col-xl-5 col-lg-4 align-items-center d-flex justify-content-center">
              <img src="../assets/img/svg/img-1.svg" height="150px" class="d-none d-lg-block" />
            </div>
            <!-- END col-5 -->
          </div>
          <!-- END row -->
        </div>
        <!-- END card-body -->
      </div>
      <!-- END card -->
    </div>
    <!-- END col-6 -->
    <!-- BEGIN col-6 -->
    <div class="col-xl-6">
      <!-- BEGIN row -->
      <div class="row">
        <!-- BEGIN col-6 -->
        <div class="col-sm-6">
          <!-- BEGIN card -->
          <div class="card border-0 text-truncate mb-3 bg-gray-800 text-white">
            <!-- BEGIN card-body -->
            <div class="card-body">
              <!-- BEGIN title -->
              <div class="mb-3 text-gray-500">
                <b class="mb-3">Bayar Formulir</b>
                <span class="ms-2"><i class="fa fa-info-circle" data-bs-toggle="popover" data-bs-trigger="hover"
                    data-bs-title="Bayar Formulir" data-bs-placement="top"
                    data-bs-content="Percentage of sessions that resulted in orders from total number of sessions."
                    data-original-title="" title=""></i></span>
              </div>
              <!-- END title -->
              <!-- BEGIN conversion-rate -->
              <div class="d-flex align-items-center mb-1">
                <h2 class="text-white mb-0"><span data-animation="number" data-value="total-bayar-formulir">0.00</span>
                </h2>
                <div class="ms-auto">
                  <div id="conversion-rate-sparkline"></div>
                </div>
              </div>
              <!-- END conversion-rate -->
              <!-- BEGIN info-row -->
              <div class="d-flex mb-2">
                <div class="d-flex align-items-center">
                  <i class="fa fa-circle text-red fs-8px me-2"></i>
                  REGULER
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <div class="w-50px ps-2 fw-bold"><span data-animation="number"
                      data-value="data-form-reguler">0</span>
                  </div>
                  Camaba
                </div>
              </div>
              <!-- END info-row -->
              <!-- BEGIN info-row -->
              <div class="d-flex mb-2">
                <div class="d-flex align-items-center">
                  <i class="fa fa-circle text-warning fs-8px me-2"></i>
                  RPL
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <div class="w-50px ps-2 fw-bold"><span data-animation="number" data-value="data-form-rpl">0</span>
                  </div>
                  Camaba
                </div>
              </div>
              <!-- END info-row -->
              <!-- BEGIN info-row -->
              <div class="d-flex mb-2">
                <div class="d-flex align-items-center">
                  <i class="fa fa-circle text-lime fs-8px me-2"></i>
                  KARYAWAN
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <div class="w-50px ps-2 fw-bold"><span data-animation="number"
                      data-value="data-form-karyawan">0</span>
                  </div>
                  Camaba
                </div>
              </div>
              <!-- END info-row -->
              <!-- BEGIN info-row -->
              <div class="d-flex">
                <div class="d-flex align-items-center">
                  <i class="fa fa-circle text-teal fs-8px me-2"></i>
                  KIPK
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <div class="w-50px ps-2 fw-bold"><span data-animation="number" data-value="data-form-kipk">0</span>
                  </div>
                  Camaba
                </div>
              </div>
              <!-- END info-row -->
            </div>
            <!-- END card-body -->
          </div>
          <!-- END card -->
        </div>
        <!-- END col-6 -->
        <!-- BEGIN col-6 -->
        <div class="col-sm-6">
          <!-- BEGIN card -->
          <div class="card border-0 text-truncate mb-3 bg-gray-800 text-white">
            <!-- BEGIN card-body -->
            <div class="card-body">
              <!-- BEGIN title -->
              <div class="mb-3 text-gray-500">
                <b class="mb-3">Bayar UKT</b>
                <span class="ms-2"><i class="fa fa-info-circle" data-bs-toggle="popover" data-bs-trigger="hover"
                    data-bs-title="Store Sessions" data-bs-placement="top"
                    data-bs-content="Number of sessions on your online store. A session is a period of continuous activity from a visitor."
                    data-original-title="" title=""></i></span>
              </div>
              <!-- END title -->
              <!-- BEGIN store-session -->
              <div class="d-flex align-items-center mb-1">
                <h2 class="text-white mb-0"><span data-animation="number" data-value="total-bayar-ukt">0</span></h2>
                <div class="ms-auto">
                  <div id="store-session-sparkline"></div>
                </div>
              </div>
              <!-- END store-session -->
              <!-- BEGIN info-row -->
              <div class="d-flex mb-2">
                <div class="d-flex align-items-center">
                  <i class="fa fa-circle text-teal fs-8px me-2"></i>
                  REGULER
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <div class="w-50px ps-2 fw-bold"><span data-animation="number" data-value="data-ukt-reguler">0</span>
                  </div>
                  Camaba
                </div>
              </div>
              <!-- END info-row -->
              <!-- BEGIN info-row -->
              <div class="d-flex mb-2">
                <div class="d-flex align-items-center">
                  <i class="fa fa-circle text-blue fs-8px me-2"></i>
                  RPL
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <div class="w-50px ps-2 fw-bold"><span data-animation="number" data-value="data-ukt-rpl">0</span>
                  </div>
                  Camaba
                </div>
              </div>
              <!-- END info-row -->
              <!-- BEGIN info-row -->
              <div class="d-flex mb-2">
                <div class="d-flex align-items-center">
                  <i class="fa fa-circle text-cyan fs-8px me-2"></i>
                  KARYAWAN
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <div class="w-50px ps-2 fw-bold"><span data-animation="number"
                      data-value="data-ukt-karyawan">0</span>
                  </div>
                  Camaba
                </div>
              </div>
              <!-- END info-row -->
              <!-- BEGIN info-row -->
              <div class="d-flex">
                <div class="d-flex align-items-center">
                  <i class="fa fa-circle text-cyan fs-8px me-2"></i>
                  KIPK
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <div class="w-50px ps-2 fw-bold"><span data-animation="number" data-value="0">0</span>
                  </div>
                  Camaba
                </div>
              </div>
              <!-- END info-row -->
            </div>
            <!-- END card-body -->
          </div>
          <!-- END card -->
        </div>
        <!-- END col-6 -->
      </div>
      <!-- END row -->
    </div>
    <!-- END col-6 -->
  </div>
  <div class="row">
    <!-- BEGIN col-8 -->
    <div class="col-xl-8 col-lg-6">
      <!-- BEGIN card -->
      <div class="card border-0 mb-3 bg-gray-800 text-white">
        <div class="card-body" style="background-color: #ffffff;">
          <div class="mb-3 text-gray-500 "><b>CAMABA ANALYTICS</b> <span class="ms-2"><i class="fa fa-info-circle"
                data-bs-toggle="popover" data-bs-trigger="hover" data-bs-title="Top products with units sold"
                data-bs-placement="top"
                data-bs-content="Products with the most individual units sold. Includes orders from all sales channels."
                data-original-title="" title=""></i></span></div>
          {{-- <div class="row">
            <div class="col-xl-3 col-4">
              <h3 class="mb-1"><span data-animation="number" data-value="127.1">0</span>K</h3>
              <div>New Visitors</div>
              <div class="text-gray-500 small text-truncate"><i class="fa fa-caret-up"></i> <span
                  data-animation="number" data-value="25.5">0.00</span>% from previous 7 days</div>
            </div>
            <div class="col-xl-3 col-4">
              <h3 class="mb-1"><span data-animation="number" data-value="179.9">0</span>K</h3>
              <div>Returning Visitors</div>
              <div class="text-gray-500 small text-truncate"><i class="fa fa-caret-up"></i> <span
                  data-animation="number" data-value="5.33">0.00</span>% from previous 7 days</div>
            </div>
            <div class="col-xl-3 col-4">
              <h3 class="mb-1"><span data-animation="number" data-value="766.8">0</span>K</h3>
              <div>Total Page Views</div>
              <div class="text-gray-500 small text-truncate"><i class="fa fa-caret-up"></i> <span
                  data-animation="number" data-value="0.323">0.00</span>% from previous 7 days</div>
            </div>
          </div> --}}
        </div>
        <div class="panel-body p-0 pe-10px ps-10px" style="background-color: #ffffff;">
          <div id="apex-column-chart"></div>
        </div>
      </div>
      <!-- END card -->
    </div>
    <!-- END col-8 -->
    <!-- BEGIN col-4 -->
    <div class="col-xl-4 col-lg-6">
      <!-- BEGIN card -->
      <div class="card border-0 mb-3 bg-gray-800 text-white">
        <div class="card-body" style="background-color: #ffffff;">
          <div class="mb-2 text-gray-500">
            <b>DATA PENDAFTAR</b>
            <span class="ms-2"><i class="fa fa-info-circle" data-bs-toggle="popover" data-bs-trigger="hover"
                data-bs-title="Total sales" data-bs-placement="top"
                data-bs-content="Net sales (gross sales minus discounts and returns) plus taxes and shipping. Includes orders from all sales channels."></i></span>
          </div>
          <div id="apex-pie-chart" class="mb-2" style="height: 200px; background-color: #ffffff"></div>
        </div>
      </div>
      <!-- END card -->
    </div>
    <!-- END col-4 -->
  </div>

  <div class="col-xl-12 col-lg-12">
    <div class="card border-0 mb-3  text-white">
      <div class="card-body" style="background-color: #ffffff;">
        <div class="mb-3 text-gray-500 "><b>CAMABA ANALYTICS</b> <span class="ms-2"><i class="fa fa-info-circle"
              data-bs-toggle="popover" data-bs-trigger="hover" data-bs-title="Top products with units sold"
              data-bs-placement="top"
              data-bs-content="Products with the most individual units sold. Includes orders from all sales channels."
              data-original-title="" title=""></i></span></div>
      </div>
      <div class="panel-body p-0 pe-10px ps-10px">
        <div id="chartBayarFormulir" style="background-color: #ffffff;"></div>
      </div>
    </div>
  </div>

  <!-- ================== BEGIN page-js ================== -->
  <script src="{{ asset('assets/plugins/d3/d3.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/nvd3/build/nv.d3.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jvectormap-content/world-mill.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('assets/js/demo/dashboard-v3.js') }}"></script>

  <script src="../assets/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
  <script src="../assets/js/demo/render.highlight.js"></script>

  <script src="../assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
  <!-- ================== END page-js ================== -->

  <script>
    const tahunDropdown = document.getElementById('tahun-dropdown');
    const jenjangDropdown = document.getElementById('jenjang-dropdown');
    const fakultasDropdown = document.getElementById('fakultas-dropdown');
    const prodiDropdown = document.getElementById('prodi-dropdown');
    const pendaftarSpan = document.querySelector('[data-value="total-pendaftar"]');
    const pelayananOnline = document.querySelector('[data-value="pelayanan-online"]');
    const pelayananOffline = document.querySelector('[data-value="pelayanan-offline"]');
    const totalBayarFormulir = document.querySelector('[data-value="total-bayar-formulir"]');
    const totalBayarUkt = document.querySelector('[data-value="total-bayar-ukt"]');
    const formReguler = document.querySelector('[data-value="data-form-reguler"]');
    const formRpl = document.querySelector('[data-value="data-form-rpl"]');
    const formKaryawan = document.querySelector('[data-value="data-form-karyawan"]');
    const formKipk = document.querySelector('[data-value="data-form-kipk"]');
    const uktReguler = document.querySelector('[data-value="data-ukt-reguler"]');
    const uktRpl = document.querySelector('[data-value="data-ukt-rpl"]');
    const uktKaryawan = document.querySelector('[data-value="data-ukt-karyawan"]');
    const updateNim = document.querySelector('[data-value="data-nim"]');

    let pieChartInstance = null;
    let allData = [];

    function populateDropdown(dropdown, items, defaultLabel = 'Semua') {
      dropdown.innerHTML = '';

      const defaultOption = document.createElement('option');
      defaultOption.value = '';
      defaultOption.textContent = defaultLabel;
      dropdown.appendChild(defaultOption);

      const uniqueItems = [...new Set(items)].sort();
      uniqueItems.forEach(item => {
        const option = document.createElement('option');
        option.value = item;
        option.textContent = item;
        dropdown.appendChild(option);
      });
    }


    function updateDateTime() {
      const waktu = new Date();

      const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
      const bulan = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
      ];

      const jam = waktu.getHours().toString().padStart(2, '0');
      const menit = waktu.getMinutes().toString().padStart(2, '0');
      const detik = waktu.getSeconds().toString().padStart(2, '0');

      const hariText = hari[waktu.getDay()];
      const tanggal = waktu.getDate();
      const bulanText = bulan[waktu.getMonth()];
      const tahun = waktu.getFullYear();

      const jam_menit = `${jam}:${menit}:${detik}`;
      const tanggal_tahun = `${hariText} ${tanggal} ${bulanText} ${tahun}`;
      document.getElementById("jam_menit").textContent = jam_menit;
      document.getElementById("tanggal_tahun").textContent = tanggal_tahun;
    }

    function updateTotalPendaftar(data) {
      const total = data.reduce((sum, item) => sum + (item.pendaftar || 0), 0);
      if (pendaftarSpan) {
        pendaftarSpan.setAttribute('data-value', total);
        pendaftarSpan.textContent = total.toLocaleString();
      }
    }

    function updateTotalPelayananOnline(data) {
      const total = data.reduce((sum, item) => sum + (item.pelayanan_online || 0), 0);
      if (pelayananOnline) {
        pelayananOnline.setAttribute('data-value', total);
        pelayananOnline.textContent = total.toLocaleString();
      }
    }

    function updateTotalPelayananOffline(data) {
      const total = data.reduce((sum, item) => sum + (item.pelayanan_offline || 0), 0);
      if (pelayananOffline) {
        pelayananOffline.setAttribute('data-value', total);
        pelayananOffline.textContent = total.toLocaleString();
      }
    }

    function updateTotalBayarFormulir(data) {
      const total = data.reduce((sum, item) => {
        const karyawan = Number(item.bayar_form_karyawan) || 0;
        const kipk = Number(item.bayar_form_kipk) || 0;
        const reguler = Number(item.bayar_form_reguler) || 0;
        const rpl = Number(item.bayar_form_rpl) || 0;
        return sum + karyawan + kipk + reguler + rpl;
      }, 0);

      if (totalBayarFormulir) {
        totalBayarFormulir.setAttribute('data-value', total);
        totalBayarFormulir.textContent = total.toLocaleString();
      }
    }

    function updateTotalBayarUkt(data) {
      const total = data.reduce((sum, item) => {
        const karyawan = Number(item.bayar_ukt_karyawan) || 0;
        const reguler = Number(item.bayar_ukt_reguler) || 0;
        const rpl = Number(item.bayar_ukt_rpl) || 0;
        return sum + karyawan + reguler + rpl;
      }, 0);

      if (totalBayarUkt) {
        totalBayarUkt.setAttribute('data-value', total);
        totalBayarUkt.textContent = total.toLocaleString();
      }
    }

    function updateTotalFormReguler(data) {
      const total = data.reduce((sum, item) => sum + (item.bayar_form_reguler || 0), 0);
      if (formReguler) {
        formReguler.setAttribute('data-value', total);
        formReguler.textContent = total.toLocaleString();
      }
    }

    function updateTotalFormRpl(data) {
      const total = data.reduce((sum, item) => sum + (item.bayar_form_rpl || 0), 0);
      if (formRpl) {
        formRpl.setAttribute('data-value', total);
        formRpl.textContent = total.toLocaleString();
      }
    }

    function updateTotalFormKaryawan(data) {
      const total = data.reduce((sum, item) => sum + (item.bayar_form_karyawan || 0), 0);
      if (formKaryawan) {
        formKaryawan.setAttribute('data-value', total);
        formKaryawan.textContent = total.toLocaleString();
      }
    }

    function updateTotalFormKipk(data) {
      const total = data.reduce((sum, item) => sum + (item.bayar_form_kipk || 0), 0);
      if (formKipk) {
        formKipk.setAttribute('data-value', total);
        formKipk.textContent = total.toLocaleString();
      }
    }

    function updateTotalUktReguler(data) {
      const total = data.reduce((sum, item) => sum + (item.bayar_ukt_reguler || 0), 0);
      if (uktReguler) {
        uktReguler.setAttribute('data-value', total);
        uktReguler.textContent = total.toLocaleString();
      }
    }

    function updateTotalUktRpl(data) {
      const total = data.reduce((sum, item) => sum + (item.bayar_ukt_rpl || 0), 0);
      if (uktRpl) {
        uktRpl.setAttribute('data-value', total);
        uktRpl.textContent = total.toLocaleString();
      }
    }

    function updateTotalUktKaryawan(data) {
      const total = data.reduce((sum, item) => sum + (item.bayar_ukt_karyawan || 0), 0);
      if (uktKaryawan) {
        uktKaryawan.setAttribute('data-value', total);
        uktKaryawan.textContent = total.toLocaleString();
      }
    }

    function updateTotalNim(data) {
      const total = data.reduce((sum, item) => sum + (item.nim || 0), 0);
      if (updateNim) {
        updateNim.setAttribute('data-value', total);
        updateNim.textContent = total.toLocaleString();
      }
    }

    function updateChart(data, jenjang) {
      const grouped = {};

      data.forEach(item => {
        const key = jenjang === 'SARJANA' ? item.fakultas : item.prodi;
        if (!grouped[key]) {
          grouped[key] = {
            pendaftar: 0,
            bayarFormulir: 0,
            bayarUKT: 0,
            nim: 0
          };
        }
        grouped[key].pendaftar += Number(item.pendaftar || 0);
        grouped[key].bayarFormulir +=
          Number(item.bayar_form_karyawan || 0) +
          Number(item.bayar_form_kipk || 0) +
          Number(item.bayar_form_reguler || 0) +
          Number(item.bayar_form_rpl || 0);
        grouped[key].bayarUKT +=
          Number(item.bayar_ukt_karyawan || 0) +
          Number(item.bayar_ukt_reguler || 0) +
          Number(item.bayar_ukt_rpl || 0);
        grouped[key].nim += Number(item.nim || 0);
      });

      const categories = Object.keys(grouped);
      const pendaftarData = categories.map(cat => grouped[cat].pendaftar);
      const bayarFormulirData = categories.map(cat => grouped[cat].bayarFormulir);
      const bayarUKTData = categories.map(cat => grouped[cat].bayarUKT);
      const nimData = categories.map(cat => grouped[cat].nim);

      const options = {
        chart: {
          height: 350,
          type: 'bar'
        },
        title: {
          text: `Data berdasarkan ${jenjang === 'SARJANA' ? 'Fakultas' : 'Prodi'}`,
          align: 'center'
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '100%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        colors: ['rgba(' + app.color.componentColorRgb + ', .5)', app.color.indigo, 'rgba(' + app.color
          .componentColorRgb + ', .25)', app.color.teal
        ],
        series: [{
            name: 'Pendaftar',
            data: pendaftarData
          },
          {
            name: 'Bayar Formulir',
            data: bayarFormulirData
          },
          {
            name: 'Bayar UKT',
            data: bayarUKTData
          },
          {
            name: 'NIM',
            data: nimData
          }
        ],
        xaxis: {
          categories: categories
        },
        yaxis: {
          title: {
            text: 'Jumlah'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function(val) {
              return val.toLocaleString();
            }
          }
        }
      };

      const chartContainer = document.querySelector('#apex-column-chart');
      chartContainer.innerHTML = '';
      const chart = new ApexCharts(chartContainer, options);
      chart.render();
    }

    function updateChartFormulir(data) {
      let totalReguler = 0;
      let totalRPL = 0;
      let totalKaryawan = 0;
      let totalKIPK = 0;

      data.forEach(item => {
        totalKaryawan += Number(item.bayar_form_karyawan) || 0;
        totalKIPK += Number(item.bayar_form_kipk) || 0;
        totalReguler += Number(item.bayar_form_reguler) || 0;
        totalRPL += Number(item.bayar_form_rpl) || 0;
      });

      const optionsFormulir = {
        chart: {
          height: 350,
          type: 'bar'
        },
        title: {
          text: 'Total Pembayaran Formulir',
          align: 'center'
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '100%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        colors: ['rgba(' + app.color.componentColorRgb + ', .5)', app.color.indigo, 'rgba(' + app.color
          .componentColorRgb + ', .25)', app.color.teal
        ],
        series: [{
            name: 'REGULER',
            data: [totalReguler]
          },
          {
            name: 'RPL',
            data: [totalRPL]
          },
          {
            name: 'KARYAWAN',
            data: [totalKaryawan]
          },
          {
            name: 'KIPK',
            data: [totalKIPK]
          }
        ],
        xaxis: {
          categories: ['']
        },
        yaxis: {
          title: {
            text: 'Jumlah'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function(val) {
              return val.toLocaleString();
            }
          }
        },
        legend: {
          show: true
        }
      };

      const chartContainer = document.querySelector('#chartBayarFormulir');
      chartContainer.innerHTML = '';
      const chart = new ApexCharts(chartContainer, optionsFormulir);
      chart.render();
    }

    function updatePieChart(data, filters) {
      let groupBy;

      const angkatanSet = new Set(data.map(d => d.angkatan));
      const jenjangSet = new Set(data.map(d => d.jenjang));
      const fakultasSet = new Set(data.map(d => d.fakultas));
      const prodiSet = new Set(data.map(d => d.prodi));

      // Deteksi level filter berdasarkan pilihan user
      const isFilteredByTahun = filters.tahun && filters.tahun !== 'Semua';
      const isFilteredByJenjang = filters.jenjang && filters.jenjang !== 'Semua';
      const isFilteredByFakultas = filters.fakultas && filters.fakultas !== 'Semua Fakultas';
      const isFilteredByProdi = filters.prodi && filters.prodi !== 'Semua Prodi';

      if (!isFilteredByTahun) {
        groupBy = 'angkatan';
      } else if (!isFilteredByJenjang) {
        groupBy = 'jenjang';
      } else if (!isFilteredByFakultas) {
        groupBy = 'fakultas';
      } else if (!isFilteredByProdi) {
        groupBy = 'prodi';
      } else {
        groupBy = 'summary'; // hanya satu prodi tersisa
      }

      let labels = [];
      let series = [];

      if (groupBy === 'summary') {
        const total = (key) => data.reduce((acc, item) => acc + Number(item[key] || 0), 0);

        labels = ['Pendaftar', 'Formulir', 'UKT', 'NIM'];
        series = [
          total('pendaftar'),
          total('bayar_form_reguler') + total('bayar_form_rpl') + total('bayar_form_karyawan') + total(
            'bayar_form_kipk'),
          total('bayar_ukt_reguler') + total('bayar_ukt_rpl') + total('bayar_ukt_karyawan'),
          total('nim')
        ];
      } else {
        const grouped = {};
        data.forEach(item => {
          const key = item[groupBy];
          if (!grouped[key]) grouped[key] = 0;
          grouped[key] += Number(item.pendaftar || 0);
        });

        const fullLabels = Object.keys(grouped);
        labels = fullLabels.map(label => {
          if (label.length > 10) {
            return label.split(' ').map(word => word[0]).join('').toUpperCase();
          }
          return label;
        });
        series = fullLabels.map(label => grouped[label]);
      }

      const options = {
        chart: {
          height: 665,
          type: 'pie',
        },
        labels: labels,
        series: series,
        legend: {
          position: 'bottom',
          horizontalAlign: 'center',
          fontSize: '14px'
        },
        stroke: {
          show: true,
          colors: [app.color.componentBg],
          width: 2,
          dashArray: 0
        },
        colors: [app.color.pink, app.color.orange, app.color.blue, app.color.success, app.color.indigo],
        tooltip: {
          custom: function({
            series,
            seriesIndex
          }) {
            const value = series[seriesIndex].toLocaleString();
            const fullLabel = labels[seriesIndex];
            return `<strong>${fullLabel}</strong>: ${value}`;
          }
        }
      };

      const chartContainer = document.querySelector('#apex-pie-chart');

      if (pieChartInstance) {
        pieChartInstance.destroy();
        pieChartInstance = null;
      }

      chartContainer.innerHTML = '';
      pieChartInstance = new ApexCharts(chartContainer, options);
      pieChartInstance.render();
    }


    // ========================= Fetch Data Start
    function fetchAllData() {
      fetch('/ajx_get/get_data_all')
        .then(res => res.json())
        .then(data => {
          allData = data;

          applyAllFilters();
        });
    }

    function applyAllFilters() {
      const tahun = tahunDropdown.value;
      const jenjang = jenjangDropdown.value;
      const fakultas = fakultasDropdown.value;
      const prodi = prodiDropdown.value;

      let filteredData = allData;

      if (tahun && tahun !== 'Semua') {
        filteredData = filteredData.filter(item => item.angkatan === tahun);
      }

      if (jenjang && jenjang !== 'Semua') {
        filteredData = filteredData.filter(item => item.jenjang === jenjang);
      }

      if (fakultas && fakultas !== 'Semua Fakultas') {
        filteredData = filteredData.filter(item => item.fakultas === fakultas);
      }

      if (prodi && prodi !== 'Semua Prodi') {
        filteredData = filteredData.filter(item => item.prodi === prodi);
      }


      const fakultasList = [...new Set(filteredData.map(item => item.fakultas).filter(f => f && f !== 'PASCASARJANA'))];
      const prodiList = [...new Set(filteredData.map(item => item.prodi).filter(Boolean))];


      // Tentukan label default secara dinamis, misalnya berdasarkan jumlah data
      const defaultFakultasLabel = fakultasList.length > 1 ? 'Semua Fakultas' : fakultasList[0] || '-';
      const defaultProdiLabel = prodiList.length > 1 ? 'Semua Prodi' : prodiList[0] || '-';

      populateDropdown(fakultasDropdown, fakultasList, defaultFakultasLabel);
      populateDropdown(prodiDropdown, prodiList, defaultProdiLabel);


      // update semua tampilan
      updateTotalPendaftar(filteredData);
      updateTotalPelayananOnline(filteredData);
      updateTotalPelayananOffline(filteredData);
      updateTotalBayarFormulir(filteredData);
      updateTotalBayarUkt(filteredData);
      updateTotalFormReguler(filteredData);
      updateTotalFormRpl(filteredData);
      updateTotalFormKaryawan(filteredData);
      updateTotalFormKipk(filteredData);
      updateTotalUktReguler(filteredData);
      updateTotalUktRpl(filteredData);
      updateTotalUktKaryawan(filteredData);
      updateTotalNim(filteredData);

      updateChart(filteredData, jenjang);
      updateChartFormulir(filteredData, jenjang);
      updatePieChart(filteredData, {
        tahun,
        jenjang,
        fakultas,
        prodi
      });

    }
    // ========================= Fetch Data End


    // ========================= Event Listerner start
    tahunDropdown.addEventListener('change', applyAllFilters);
    jenjangDropdown.addEventListener('change', () => {
      if (jenjangDropdown.value === 'PASCASARJANA') {
        fakultasDropdown.style.display = 'none';
      } else {
        fakultasDropdown.style.display = 'inline-block';
      }

      applyAllFilters();
    });

    fakultasDropdown.addEventListener('change', applyAllFilters);
    prodiDropdown.addEventListener('change', applyAllFilters);

    document.addEventListener('DOMContentLoaded', () => {
      fakultasDropdown.style.display = 'inline-block';
      prodiDropdown.style.display = 'inline-block';
      fetchAllData();
    });

    // ========================= Event Listerner end
    // return chart start
    var ChartApex = function() {
      "use strict";
      return {
        //main function
        init: function() {
          Apex = {
            grid: {
              borderColor: 'rgba(' + app.color.componentColorRgb + ', .15)'
            },
            title: {
              style: {
                color: app.color.componentColor
              }
            },
            legend: {
              labels: {
                colors: app.color.componentColor
              }
            },
            xaxis: {
              axisBorder: {
                show: true,
                color: 'rgba(' + app.color.componentColorRgb + ', .25)',
                height: 1,
                width: '100%',
                offsetX: 0,
                offsetY: -1
              },
              axisTicks: {
                show: true,
                borderType: 'solid',
                color: 'rgba(' + app.color.componentColorRgb + ', .25)',
                height: 6,
                offsetX: 0,
                offsetY: 0
              },
              labels: {
                style: {
                  colors: app.color.componentColor,
                  fontSize: app.font.size,
                  fontFamily: app.font.family,
                  fontWeight: 400,
                  cssClass: 'apexcharts-xaxis-label',
                }
              }
            },
            yaxis: {
              labels: {
                style: {
                  colors: app.color.componentColor,
                  fontSize: app.font.size,
                  fontFamily: app.font.family,
                  fontWeight: 400,
                  cssClass: 'apexcharts-xaxis-label',
                }
              }
            }
          }

          updateChart();
          updateChartFormulir();
          updatePieChart();
        }
      };
    }();

    $(document).ready(function() {
      ChartApex.init();

      $(document).on('theme-reload', function() {
        ChartApex.init();
      });
    });
    // return chart end

    // pemanggilan waktu
    setInterval(updateDateTime, 1000);
    updateDateTime();
  </script>
@endsection
