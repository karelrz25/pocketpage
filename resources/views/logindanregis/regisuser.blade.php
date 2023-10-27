<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width
  , initial-scale=1.0">
  <title>Registration</title>
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="{{asset('asset/css/regis.css')}}" rel="stylesheet">
</head>
<body>
    <div class="row justify-content-center">
      <div class="col-lg-4  ">
        <div class="card p-1 shadow-lg border-0 mt-5">
          <h2 class="py-2 text-center mt-3">R E G I S T R A T I O N</h2>
          <!-- Required meta tags -->
            <div class="global-container">
              <div class-="card-text">
                <form action="{{ route('user.register.create') }}" method="post">
                  @csrf
                  <div class="mb-2 ">
                    <label for="exampleInputUsername1" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp" name="nama" placeholder="Masukkan Nama">
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Masukkkan Password">
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputAlamat1" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputAlamat1" name="alamat" placeholder="Masukkan Alamat">
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputNoTelepon1" class="form-label">No. Telepon</label>
                    <input type="number" class="form-control" id="exampleInputNoTelepon1" name="noTelp" placeholder="Masukkan No. Telepon">
                  </div>
                  <div class="d-grid gap-2 col-3 mx-auto mb-1">
                  <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
                  </div>
                  <div class="mt-1 text-center">
                    <p>
                    Sudah punya akun? Silahkan <a href="login">Login</a>
                    </p>
                </div>
                </form>
        </div>
      </div>
    </div>
</body>
</html>