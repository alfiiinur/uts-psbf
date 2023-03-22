<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
        Selamat Datang Di Sampah Warga<br />
    </h1>
    <div class="container">
        <table class="table p-5 bg-white table-striped rounded shadow-lg">
            <thead>
                @if (Auth::user()->level == 'admin')
                    <a href="/barang/create" class="btn btn-success me-2 my-3 py-2 shadow-lg">Tambah</a>
                @endif

                <tr>
                    <th scope="col">No</th>
                    <th class="col">Nama Sampah</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga</th>
                    <th class="col">Deskripsi</th>
                    @if (Auth::user()->level == 'admin')
                        <th scope="col">Opsi</th>
                    @endif
                </tr>
            </thead>
            <tbody>

                @foreach ($barang as $barang)
                    @php($i = 0)
                    <tr>
                        <th scope="row">
                            {{ $i += $loop->iteration }}
                        </th>
                        <td>
                            {{ $barang->nama_sampah }}
                        </td>
                        <td>
                            {{ $barang->satuan }}
                        </td>
                        <td>
                            {{ $barang->harga }}
                        </td>
                        <td>
                            {{ $barang->deskripsi }}
                        </td>
                        @if (Auth::user()->level == 'admin')
                            <td class="d-flex">

                                <a href="/barang/{{ $barang->id }}" class="btn btn-primary me-2">Edit</a>
                                <form action="/barang/{{ $barang->id }}" method="post">
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
