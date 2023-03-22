<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>

</head>

<style>
    .results tr[visible='false'],
    .no-result {
        display: none;
    }

    .results tr[visible='true'] {
        display: table-row;
    }

    .counter {
        padding: 8px;
        color: #ccc;
    }
</style>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark shadow-lg">

        <!-- Container wrapper -->
        <div class="container">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="/userDashboard" style="text-decoration: none">
                            <h2 class="" style="color:white; " href="/userDashboard">{{ Auth::user()->name }}</h2>
                        </a>
                    </li>
                </ul>
                <!-- Left links -->

                <div class="d-flex align-items-center">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger me-3 shadow-lg">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>

        <!-- Container wrapper -->
    </nav>
    <h1 class=" text-center my-5 display-3 fw-bold ls-tight">
        Selamat Datang Di Daftar Warga<br />
    </h1>
    <div class="container">



        <table class="table table-hover table-bordered results"id="tblCustomers">
            <thead>
                @if (Auth::user()->level == 'admin')
                    <a href="/warga/create" class="btn btn-success me-2 my-3 py-2 shadow-lg">Tambah</a>
                @endif
                <a href="/cetakPdf" class="btn btn-info me-2 my-3 py-2 shadow-lg " target="_blank">Cetak Pdf</a>
                <a href="/export" class="btn btn-warning me-2 my-3 py-2 shadow-lg " target="_blank">Cetak Excel </a>
                <a href="/exportMs" class="btn btn-primary me-2 my-3 py-2 shadow-lg " target="_blank"
                    onclick="ExportToExcel('xlsx')">Cetak Word</a>
                @if (Auth::user()->level == 'admin')
                    <a href="/logAc" class="btn btn-success me-2 my-2 py-2 shadow-lg">Log Activty</a>
                @endif
                <div class="panel" id="panel"></div>

                <div class="form-group pull-right">
                    {{-- <input type="text" class="search form-control" placeholder="What you looking for?"> --}}
                    <div class="card-header shadow-sm">
                        <form class="row row-cols-lg-auto g-1">
                            <div class=" col my-3">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nik" placeholder="Masukkan NIK"
                                        value="{{ $nik }}" />
                                    <input class="form-control" type="text" name="alamat"
                                        placeholder="Masukkan Alamat" value="{{ $alamat }}" />
                                    <input class="form-control" type="text" name="nama"
                                        placeholder="Masukkan Nama" value="{{ $nama }}" />

                                </div>
                            </div>
                            <div class="input-group">
                                <input class="form-control" type="text" name="search" value="{{ $search }}"
                                    placeholder="Search here..." />
                                <button class="btn btn-success">Search</button>

                            </div>
                        </form>
                    </div>
                </div>
                <span class="counter pull-right"></span>
                <tr>
                    <th scope="col">No</th>
                    <th class="col">NIK</th>
                    <th scope="col">Nama Warga</th>
                    <th scope="col">Alamat</th>
                    <th class="col">Nomor Telpon</th>
                    @if (Auth::user()->level == 'admin')
                        <th scope="col">Opsi</th>
                    @endif
                </tr>
                <tr class="warning no-result">
                    <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($warga as $warga)
                    @php($i = 0)
                    <tr>
                        <th scope="row">
                            {{ $i += $loop->iteration }}
                        </th>
                        <td>
                            {{ $warga->nik }}
                        </td>
                        <td>
                            {{ $warga->nama }}
                        </td>
                        <td>
                            {{ $warga->alamat }}
                        </td>
                        <td>
                            {{ $warga->no_telp }}
                        </td>
                        @if (Auth::user()->level == 'admin')
                            <td class="d-flex">

                                <a href="/warga/{{ $warga->id }}" class="btn btn-primary me-2">Edit</a>
                                <form action="/warga/{{ $warga->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm(`Apakah anda yakin untuk menghapus data?`)"
                                        class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example" class="">
            <ul class="pagination pg-blue">
                <li class="page-item ">
                    <a class="page-link" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link">1</a></li>
                <li class="page-item ">
                    <a class="page-link">2 </a>
                </li>
                <li class="page-item"><a class="page-link">3</a></li>
                <li class="page-item ">
                    <a class="page-link">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
        Highcharts.chart('panel', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Laporan Data Warga'
            },
            xAxis: {
                categories: [
                    'Sidoarjo',
                    'Surabaya',
                    'Jl. Raya Cibadak',
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Data Warga'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
                name: 'Total Data Warga',
                data: [48.9, 38.8, 39.3, ]

            }, ]
        });
    </script>
    <script>
        // window.print()

        $(document).ready(function() {
            $(".search").keyup(function() {
                var searchTerm = $(".search").val();
                var listItem = $('.results tbody').children('tr');
                var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

                $.extend($.expr[':'], {
                    'containsi': function(elem, i, match, array) {
                        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf(
                            (match[3] || "").toLowerCase()) >= 0;
                    }
                });

                $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e) {
                    $(this).attr('visible', 'false');
                });

                $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e) {
                    $(this).attr('visible', 'true');
                });

                var jobCount = $('.results tbody tr[visible="true"]').length;
                $('.counter').text(jobCount + ' item');

                if (jobCount == '0') {
                    $('.no-result').show();
                } else {
                    $('.no-result').hide();
                }
            });
        });
    </script>
</body>

</html>
