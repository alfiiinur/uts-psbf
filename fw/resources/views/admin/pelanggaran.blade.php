<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saldo Sampah Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

{{--  <style>
  body {
    background: #bcaec6;
  }

  .back {
    text-decoration: none;
    color: purple;
  }

  .btnhome a {
    text-decoration: none;
    color: #863a6f;
    font-weight: bold;
    font-size: xx-large;
    text-transform: uppercase;
  }

  .button {
    width: fit-content;
  }
</style>  --}}

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
                        <a href="/adminDashboard" style="text-decoration: none">
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
        Selamat Datang Di Saldo Sampah Warga<br />
    </h1>
    <!-- make boostrap table -->
    <div class="container">
        <div class="header">
            <a href="/pelanggaran/create">
                <button class="btn btn-primary my-3">Tambah Saldo Sampah Warga</button>
            </a>
        </div>
        <table class="table table-striped bg-white rounded shadow-lg">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis Sampah</th>
                    <th class="col">Satuan</th>
                    <th class="col">Harga</th>
                    <th class="col">Gambar</th>
                    <th class="col">Deskripsi</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggaran as $key => $pel)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $pel->nama }}</td>
                        <td>{{ $pel->nama }}</td>
                        <td>{{ $pel->total_pel }}</td>
                        <td>{{ $pel->total_pel }}</td>
                        <td>{{ $pel->total_point }}</td>
                        <td class="d-flex">
                            <a href="/pelanggaran/{{ $pel->karyawan_id }}" class="btn btn-warning me-2">Detail</a>
                            <form action="/pelanggaran/{{ $pel->karyawan_id }}" method="post">
                                @csrf
                                <button class="btn btn-danger"
                                    onclick="return confirm('Apakah anda yakin untuk menghapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
</body>

</html>
