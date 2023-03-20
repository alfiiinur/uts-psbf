<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perizinan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>


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
        Selamat Datang Di Manjemen Sampah<br />
    </h1>
    <div class="container p-5">
        <div class="header">
            @if (Auth::user()->level == 'admin')
                <a href="/izin/create">
                    <button class="btn btn-primary my-3">Tambah Sampah</button>
                </a>
            @endif
        </div>
        <table class="table table-striped bg-white rounded shadow-lg">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th class="col">Jenis Sampah</th>
                    <th scope="col">Satuan (KG)</th>
                    <th scope="col">Harga /KG</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Keterangan</th>
                    @if (Auth::user()->level == 'admin')
                        <th scope="col">Opsi</th>
                    @endif


                </tr>
            </thead>
            <tbody>
                @php($no = 1)
                @foreach ($izin as $key => $i)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $i->karyawan->nama }}</td>
                        <td>{{ $i->tgl_keluar }}</td>
                        <td>{{ $i->tgl_masuk }}</td>
                        <td>{{ $i->karyawan_id }}</td>
                        <td>{{ $i->keterangan }}</td>
                        @if (Auth::user()->level == 'admin')
                            <td class="d-flex">
                                <!-- Button trigger modal -->

                                <form action="/izin/{{ $i->id }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Apakah anda yakin untuk menghapus data?')">Delete</button>
                                    {{-- <button class="btn btn-danger"
                                        onclick="return confirm('Apakah anda yakin untuk menghapus data?')">Edit</button> --}}
                                </form>
                            </td>
                        @endif
                    </tr>


                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop{{ $i->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="form-floating">
                                        <input type="date">
                                        <label for="floatingTextarea2">Tanggal Keluar</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="date">
                                        <label for="floatingTextarea2">Tanggal Masuk</label>
                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $i->keterangan }}</textarea>
                                        <label for="floatingTextarea2">Keterangan</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Understood</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
