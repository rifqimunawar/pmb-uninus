@extends('dashboard::layouts.master')
@php
  use App\Helpers\Fungsi;
@endphp
@section('content')
  <!-- BEGIN row -->

  <!-- BEGIN daterange-filter -->
  <div class="d-sm-flex align-items-center mb-3 gap-2 flex-wrap">

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
                    <div class="progress-bar progress-bar-striped rounded-right" data-animation="width" data-value="55%"
                      style="width: 0%"></div>
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
                  <div class="w-50px text-end ps-2 fw-bold"><span data-animation="number" data-value="3.79">0</span>
                  </div>
                </div>
              </div>
              <!-- END info-row -->
              <!-- BEGIN info-row -->
              <div class="d-flex mb-2">
                <div class="d-flex align-items-center">
                  <i class="fa fa-circle text-warning fs-8px me-2"></i>
                  Reached checkout
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <div class="text-gray-500 small"><i class="fa fa-caret-up"></i> <span data-animation="number"
                      data-value="11">0</span>%</div>
                  <div class="w-50px text-end ps-2 fw-bold"><span data-animation="number" data-value="3.85">0.00</span>%
                  </div>
                </div>
              </div>
              <!-- END info-row -->
              <!-- BEGIN info-row -->
              <div class="d-flex">
                <div class="d-flex align-items-center">
                  <i class="fa fa-circle text-lime fs-8px me-2"></i>
                  Sessions converted
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <div class="text-gray-500 small"><i class="fa fa-caret-up"></i> <span data-animation="number"
                      data-value="57">0</span>%</div>
                  <div class="w-50px text-end ps-2 fw-bold"><span data-animation="number"
                      data-value="2.19">0.00</span>%</div>
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
              <!-- BEGIN percentage -->
              <div class="mb-4 text-gray-500 ">
                <i class="fa fa-caret-up"></i> <span data-animation="number" data-value="9.5">0.00</span>% compare to
                last week
              </div>
              <!-- END percentage -->
              <!-- BEGIN info-row -->
              <div class="d-flex mb-2">
                <div class="d-flex align-items-center">
                  <i class="fa fa-circle text-teal fs-8px me-2"></i>
                  Mobile
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <div class="text-gray-500 small"><i class="fa fa-caret-up"></i> <span data-animation="number"
                      data-value="25.7">0.00</span>%</div>
                  <div class="w-50px text-end ps-2 fw-bold"><span data-animation="number" data-value="53210">0</span>
                  </div>
                </div>
              </div>
              <!-- END info-row -->
              <!-- BEGIN info-row -->
              <div class="d-flex mb-2">
                <div class="d-flex align-items-center">
                  <i class="fa fa-circle text-blue fs-8px me-2"></i>
                  Desktop
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <div class="text-gray-500 small"><i class="fa fa-caret-up"></i> <span data-animation="number"
                      data-value="16.0">0.00</span>%</div>
                  <div class="w-50px text-end ps-2 fw-bold"><span data-animation="number" data-value="11959">0</span>
                  </div>
                </div>
              </div>
              <!-- END info-row -->
              <!-- BEGIN info-row -->
              <div class="d-flex">
                <div class="d-flex align-items-center">
                  <i class="fa fa-circle text-cyan fs-8px me-2"></i>
                  Tablet
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <div class="text-gray-500 small"><i class="fa fa-caret-up"></i> <span data-animation="number"
                      data-value="7.9">0.00</span>%</div>
                  <div class="w-50px text-end ps-2 fw-bold"><span data-animation="number" data-value="5545">0</span>
                  </div>
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
  <!-- END row -->
  <!-- BEGIN row -->
  <div class="row">
    <!-- BEGIN col-8 -->
    <div class="col-xl-8 col-lg-6">
      <!-- BEGIN card -->
      <div class="card border-0 mb-3 bg-gray-800 text-white">
        <div class="card-body">
          <div class="mb-3 text-gray-500 "><b>VISITORS ANALYTICS</b> <span class="ms-2"><i class="fa fa-info-circle"
                data-bs-toggle="popover" data-bs-trigger="hover" data-bs-title="Top products with units sold"
                data-bs-placement="top"
                data-bs-content="Products with the most individual units sold. Includes orders from all sales channels."
                data-original-title="" title=""></i></span></div>
          <div class="row">
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
          </div>
        </div>
        <div class="card-body p-0">
          <div style="height: 269px">
            <div id="visitors-line-chart" class="widget-chart-full-width" data-bs-theme="dark" style="height: 254px">
            </div>
          </div>
        </div>
      </div>
      <!-- END card -->
    </div>
    <!-- END col-8 -->
    <!-- BEGIN col-4 -->
    <div class="col-xl-4 col-lg-6">
      <!-- BEGIN card -->
      <div class="card border-0 mb-3 bg-gray-800 text-white">
        <div class="card-body">
          <div class="mb-2 text-gray-500">
            <b>SESSION BY LOCATION</b>
            <span class="ms-2"><i class="fa fa-info-circle" data-bs-toggle="popover" data-bs-trigger="hover"
                data-bs-title="Total sales" data-bs-placement="top"
                data-bs-content="Net sales (gross sales minus discounts and returns) plus taxes and shipping. Includes orders from all sales channels."></i></span>
          </div>
          <div id="visitors-map" class="mb-2" style="height: 200px"></div>
          <div>
            <div class="d-flex align-items-center text-white mb-2">
              <div class="widget-img widget-img-xs rounded bg-dark me-2 w-40px"
                style="background-image: url(../assets/img/flag/us.jpg)"></div>
              <div class="d-flex w-100">
                <div>United States</div>
                <div class="ms-auto text-gray-500"><span data-animation="number" data-value="39.85">0.00</span>%</div>
              </div>
            </div>
            <div class="d-flex align-items-center text-white mb-2">
              <div class="widget-img widget-img-xs rounded bg-dark me-2 w-40px"
                style="background-image: url(../assets/img/flag/cn.jpg)"></div>
              <div class="d-flex w-100">
                <div>China</div>
                <div class="ms-auto text-gray-500"><span data-animation="number" data-value="14.23">0.00</span>%</div>
              </div>
            </div>
            <div class="d-flex align-items-center text-white mb-2">
              <div class="widget-img widget-img-xs rounded bg-dark me-2 w-40px"
                style="background-image: url(../assets/img/flag/de.jpg)"></div>
              <div class="d-flex w-100">
                <div>Germany</div>
                <div class="ms-auto text-gray-500"><span data-animation="number" data-value="12.83">0.00</span>%</div>
              </div>
            </div>
            <div class="d-flex align-items-center text-white mb-2">
              <div class="widget-img widget-img-xs rounded bg-dark me-2 w-40px"
                style="background-image: url(../assets/img/flag/fr.jpg)"></div>
              <div class="d-flex w-100">
                <div>France</div>
                <div class="ms-auto text-gray-500"><span data-animation="number" data-value="11.14">0.00</span>%</div>
              </div>
            </div>
            <div class="d-flex align-items-center text-white mb-0">
              <div class="widget-img widget-img-xs rounded bg-dark me-2 w-40px"
                style="background-image: url(../assets/img/flag/jp.jpg)"></div>
              <div class="d-flex w-100">
                <div>Japan</div>
                <div class="ms-auto text-gray-500"><span data-animation="number" data-value="10.75">0.00</span>%</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END card -->
    </div>
    <!-- END col-4 -->
  </div>
  <!-- END row -->

  <!-- ================== BEGIN page-js ================== -->
  <script src="{{ asset('assets/plugins/d3/d3.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/nvd3/build/nv.d3.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jvectormap-content/world-mill.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('assets/js/demo/dashboard-v3.js') }}"></script>
  <!-- ================== END page-js ================== -->

  <script>
    const jenjangDropdown = document.getElementById('jenjang-dropdown');
    const fakultasDropdown = document.getElementById('fakultas-dropdown');
    const prodiDropdown = document.getElementById('prodi-dropdown');
    const pendaftarSpan = document.querySelector('[data-value="total-pendaftar"]');
    const pelayananOnline = document.querySelector('[data-value="pelayanan-online"]');
    const pelayananOffline = document.querySelector('[data-value="pelayanan-offline"]');
    const totalBayarFormulir = document.querySelector('[data-value="total-bayar-formulir"]');
    const totalBayarUkt = document.querySelector('[data-value="total-bayar-ukt"]');

    function populateDropdown(dropdown, data, defaultOptionText = '') {
      dropdown.innerHTML = `<option value="">${defaultOptionText}</option>`;
      const uniqueData = [...new Set(data)];
      uniqueData.forEach(item => {
        const option = document.createElement('option');
        option.value = item;
        option.textContent = item;
        dropdown.appendChild(option);
      });
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


    function fetchAllData() {
      fetch('/ajx_get/get_data_all')
        .then(res => res.json())
        .then(data => {
          const fakultasList = data.map(item => item.fakultas).filter(f => f && f !== 'PASCASARJANA');
          const prodiList = data.map(item => item.prodi).filter(Boolean);
          populateDropdown(fakultasDropdown, fakultasList, 'Semua Fakultas');
          populateDropdown(prodiDropdown, prodiList, 'Semua Prodi');
          updateTotalPendaftar(data);
          updateTotalPelayananOnline(data);
          updateTotalPelayananOffline(data);
          updateTotalBayarFormulir(data);
          updateTotalBayarUkt(data);
        });
    }

    function fetchFakultas(jenjang) {
      fetch(`/ajx_get/get_data_jenjang/${jenjang}`)
        .then(res => res.json())
        .then(data => {
          const fakultasList = data.map(item => item.fakultas).filter(f => f && f !== 'PASCASARJANA');
          populateDropdown(fakultasDropdown, fakultasList, 'Semua Fakultas');
          updateTotalPendaftar(data);
          updateTotalPelayananOnline(data);
          updateTotalPelayananOffline(data);
          updateTotalBayarFormulir(data);
          updateTotalBayarUkt(data);
        });
    }

    function fetchProdi(fakultas) {
      fetch(`/ajx_get/get_data_fakultas/${fakultas}`)
        .then(res => res.json())
        .then(data => {
          const prodiList = data.map(item => item.prodi).filter(Boolean);
          populateDropdown(prodiDropdown, prodiList, 'Semua Prodi');
          updateTotalPendaftar(data);
          updateTotalPelayananOnline(data);
          updateTotalPelayananOffline(data);
          updateTotalBayarFormulir(data);
          updateTotalBayarUkt(data);
        });
    }

    function fetchByJenjang(jenjang) {
      fetch(`/ajx_get/get_data_jenjang/${jenjang}`)
        .then(res => res.json())
        .then(data => {
          const prodiList = data.map(item => item.prodi).filter(Boolean);
          populateDropdown(prodiDropdown, prodiList, 'Semua Prodi');
          updateTotalPendaftar(data);
          updateTotalPelayananOnline(data);
          updateTotalPelayananOffline(data);
          updateTotalBayarFormulir(data);
          updateTotalBayarUkt(data);
        });
    }

    function fetchByProdi(prodi) {
      fetch(`/ajx_get/get_data_prodi/${prodi}`)
        .then(res => res.json())
        .then(data => {
          updateTotalPendaftar(data);
          updateTotalPelayananOnline(data);
          updateTotalPelayananOffline(data);
          updateTotalBayarFormulir(data);
          updateTotalBayarUkt(data);
        });
    }

    jenjangDropdown.addEventListener('change', function() {
      const jenjang = this.value;
      if (jenjang === 'SARJANA') {
        fakultasDropdown.style.display = 'inline-block';
        prodiDropdown.style.display = 'inline-block';
        fetchFakultas(jenjang);
      } else if (jenjang === 'PASCASARJANA') {
        fakultasDropdown.style.display = 'none';
        prodiDropdown.style.display = 'inline-block';
        fetchByJenjang('PASCASARJANA');
      } else {
        fakultasDropdown.style.display = 'inline-block';
        prodiDropdown.style.display = 'inline-block';
        fetchAllData();
      }
    });

    fakultasDropdown.addEventListener('change', function() {
      const fakultas = this.value;
      if (fakultas) {
        fetchProdi(fakultas);
      } else {
        fetchAllData();
      }
    });

    prodiDropdown.addEventListener('change', function() {
      const prodi = this.value;
      if (prodi) {
        fetchByProdi(prodi);
      } else {
        const jenjang = jenjangDropdown.value;
        const fakultas = fakultasDropdown.value;
        if (jenjang) {
          fetchByJenjang(jenjang);
        } else if (fakultas) {
          fetchProdi(fakultas);
        } else {
          fetchAllData();
        }
      }
    });

    document.addEventListener('DOMContentLoaded', () => {
      fakultasDropdown.style.display = 'inline-block';
      prodiDropdown.style.display = 'inline-block';
      fetchAllData();
    });
  </script>
@endsection
