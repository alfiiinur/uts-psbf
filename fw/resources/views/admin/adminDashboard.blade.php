<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Homepage</title>
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
        Selamat Datang Di Admin Bank Sampah<br />
    </h1>

    <div class="container">
        <ul class="list-group text-center shadow-lg">
            <li class="list-group-item"><a href="/warga" style="text-decoration:none; ">Data Warga</a> </li>
            <li class="list-group-item"><a href="/barang" style="text-decoration:none; ">Manajmenet Sampah</a>
        </ul>
    </div>



</body>

</html>
