@extends('layouts.app', ['title' => 'Perpus | Dashboard'])

@section('content')
      <!-- Cards -->
      <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
          <!-- Book -->
        <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
        <div
          class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
        >
          <i class="fa fa-users"></i>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Banyak Admin
          </p>
          <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
            {{ $admins }}
          </p>
        </div>
      </div>
        <!-- Book -->
        <div
          class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
          >
            <i class="fa fa-book"></i>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Banyak Buku
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              {{ $books }}
            </p>
          </div>
        </div>
         <!-- Classrooms -->
        <div
          class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
          >
            <i class="fa fa-id-card"></i>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Banyak Kelas
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              {{ $classrooms }}
            </p>
          </div>
        </div>
         <!-- Classrooms -->
         <div
         class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
       >
         <div
            class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
         >
           <i class="fa fa-user-graduate"></i>
         </div>
         <div>
           <p
             class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
           >
             Banyak Siswa
           </p>
           <p
             class="text-lg font-semibold text-gray-700 dark:text-gray-200"
           >
             {{ $students }}
           </p>
         </div>
       </div>
      </div>

      <!-- Charts -->
      <div class="grid gap-12 mb-12 md:grid-cols-12 xl:grid-cols-12">
          <div id="chartPeminjaman"></div>
      </div>
      {{-- <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
      >
        Charts
      </h2>
      <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div
          class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Revenue
          </h4>
          <canvas id="pie"></canvas>
          <div
            class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
          >
            <!-- Chart legend -->
            <div class="flex items-center">
              <span
                class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"
              ></span>
              <span>Shirts</span>
            </div>
            <div class="flex items-center">
              <span
                class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
              ></span>
              <span>Shoes</span>
            </div>
            <div class="flex items-center">
              <span
                class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
              ></span>
              <span>Bags</span>
            </div>
          </div>
        </div>
        <div
          class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Traffic
          </h4>
          <canvas id="line"></canvas>
          <div
            class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
          >
            <!-- Chart legend -->
            <div class="flex items-center">
              <span
                class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
              ></span>
              <span>Organic</span>
            </div>
            <div class="flex items-center">
              <span
                class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
              ></span>
              <span>Paid</span>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
@endsection
@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chartPeminjaman', {
            chart: {
                type: 'column'
            },
            title: {
                text: '<b>Grafik Peminjaman Buku</b>'
            },
            xAxis: {
                categories: {!! json_encode($categories) !!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Peminjaman'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Dipinjam ',
                data: {!! json_encode($data) !!}

            }]
        });
    </script>
@endsection
