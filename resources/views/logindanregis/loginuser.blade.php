<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="{{asset('asset/css/login.css')}}" rel="stylesheet">

    <title>Login</title>
  </head>
  <body>
    
        <div class="global-container">
            <div class="card login-form mt-5">
                <div class="card-body">
                    <h2 class="card-title text-center">L O G I N</h2>
                </div>
                <div class-="card-text">
                    <form action="{{ route('user.login') }}" method="post">
                            @csrf
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Nama</label>
                            <input type="username" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp" name="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Masukkan Password">
                        </div>
                        <div class="d-grid gap-2 col-3 mx-auto">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form> 
                    <div class="mt-3 text-center">
                        <p>
                        Belum punya akun? Silahkan <a href="register">Daftar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>