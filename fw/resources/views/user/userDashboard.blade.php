<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Homepage</title>
</head>

<body>
    {{--
    <div class="menubar">
        <h2>
            {{ Auth::user()->name }}
        </h2>
    </div>

    <div class="center">
        <div class="menubox">
            <a href="/karyawan">
                <img src="../assets/images/Data Pegawai.png" alt="data pegawai">
            </a>
        </div><br>

        <div class="menubox">
            <a href="/izin">
                <img src="../assets/images/Perizinan.png" alt="perizinan">
            </a>
        </div><br>

    </div>

    <div class="btnbox">
        <div class="btnlogout">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btnlogout">LogOut</button>
            </form>
        </div>
    </div> --}}

    <!-- Navbar -->
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
                        <h2 class="" style="color:white; " href="#">{{ Auth::user()->name }}</h2>
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
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                {{-- <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="container px-6 " style="width:30rem; padding-top:100px;">
                        <div class="card text-center shadow-lg ">
                            <div class="card-header">
                                Data Pegawai
                            </div>
                            <div class="card-body">
                                <img src="../assets/images/img2.png" style="width: 200px; height:200px;" alt="">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="/karyawan"" class="btn btn-primary col-md-5">Data Pegawai</a>

                            </div>
                        </div>

                    </div>
                </div> --}}

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="container px-6 " style="width:30rem; padding-top:100px;">
                        <div class="card text-center shadow-lg ">
                            <div class="card-header">
                                Sampah Warga
                            </div>
                            <div class="card-body">
                                <img src="../assets/images/img2.png" style="width: 200px; height:200px;" alt="">

                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="/barang" class="btn btn-primary col-md-5">Data Perizinan</a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
