<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--  <link rel="stylesheet" href="assets/edit_data_pegawai.css">  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>{{ $title }}</title>
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
        Edit Warga<br />
    </h1>
    <div class="container">
        <form action="/warga/{{ $warga->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-outline mb-4">
                <input type="text" id="form1Example1" class="form-control" name="nik" value="{{ $warga->nik }}"
                    required />
                <label class="form-label" for="form1Example1">Nik Warga</label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" id="form1Example1" class="form-control" name="nama" value="{{ $warga->nama }}"
                    required />
                <label class="form-label" for="form1Example1">Nama Warga</label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" id="form1Example1" class="form-control" name="alamat"
                    value="{{ $warga->alamat }}" required />
                <label class="form-label" for="form1Example1">Alamat Warga</label>
            </div>
            <div class="form-outline mb-4">
                <input type="number" id="form1Example1" class="form-control" name="no_telp"
                    value="{{ $warga->no_telp }}" required />
                <label class="form-label" for="form1Example1">No Telp</label>
            </div>

            <button type="submit" name="submit" class="btn btn-primary py-2 my-2">Submit</button>
        </form>
    </div>
</body>

</html>
