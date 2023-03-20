<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Izin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
{{--  <style>
  @import url("https://fonts.googleapis.com/css?family=Poppins: 200,300,400,500,600,700,800,900&display=swap");

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }

  body {
    background: #bcaec6;
  }

  .btndataperizinan {
    position: relative;
    margin: 1cm 0 0 1cm;
  }

  .btndataperizinan a {
    text-decoration: none;
    color: #863a6f;
    font-weight: bold;
    font-size: xx-large;
    text-transform: uppercase;
  }

  .center {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-left: -1.5cm;
    justify-content: center;
    margin-top: -1cm;
  }

  .tittle_text {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #863a6f;
    width: 20%;
    height: 1.5cm;
    margin-left: 2cm;
    border-radius: 30px;
  }

  .tittle_text h3 {
    color: white;
  }

  .inp_form {
    display: flex;
    width: 70%;
    margin-top: 1cm;
  }

  .inp_form label {
    justify-content: flex-start;
    font-size: 20px;
    width: 30%;
  }

  .inp_form h3 {
    margin: 0 1cm 0 0;
  }

  .inp_form select {
    width: 100%;
    border: 1px solid white;
    background: white;
  }

  .inp_form textarea {
    min-width: 73.5%;
    min-height: 4cm;
    max-height: 4cm;
    padding: 10px;
    font-size: 17px;
    font-weight: 380;
    border: 1px solid white;
  }

  .inp_form input[type="date"] {
    width: 100%;
    border: 1px solid white;
    background: white;
    padding-left: 5px;
    font-weight: 400;
  }

  .btnbox {
    position: relative;
    display: flex;
    justify-content: flex-end;
    margin: 0.7cm 2cm -2cm 0;
  }

  .btnsubmit {
    position: relative;
    width: 150px;
    height: 37px;
    border-radius: 20px;
    background: #d989b5;
  }

  .btnsubmit button {
    color: white;
    background-color: #d989b5;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 150px;
    height: 37px;
    font-size: 18px;
    font-weight: 500;
    text-decoration: none;
  }

  .btnsubmit:hover {
    background: #d989b5;
    transition: 0.5s;
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
                        <a href="/izin" style="text-decoration: none">
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
        Tambah Point Perizinan<br />
    </h1>
  <div class="container">
    <form action="/izin" method="post" class="mt-5">
      @csrf
            <div class="form-outline mb-4">
    <label class="form-label" for="form1Example1">Nama Pegawai</label>
    <select name="karyawan_id" id="">
            <option disabled selected>Pilih Nama Pegawaii</option>
            @foreach ($karyawan as $k)
            <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
          </select>
  </div class="container">
        <div class="form-outline mb-4">
    <textarea id="form1Example1" class="form-control" name="keterangan" required /></textarea>
    <label class="form-label" for="form1Example1">Keterangan</label>
  </div>

        <div class="form-outline mb-4">
    <input type="date" id="form1Example1" class="form-control" name="tgl_keluar" required />
    <label class="form-label" for="form1Example1"> Tanggal Izin</label>
  </div>

        <div class="form-outline mb-4">
    <input type="date" id="form1Example1" class="form-control" name="tgl_masuk" required />
    <label class="form-label" for="form1Example1"> Tanggal Masuk</label>
  </div>
    
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>