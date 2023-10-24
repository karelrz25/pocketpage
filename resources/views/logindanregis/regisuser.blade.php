<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width
  , initial-scale=1.0">
  <title>Document</title>
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="{{asset('asset/css/regis.css')}}" rel="stylesheet">
</head>
<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-20">
                <div class="card p-4 shadow-lg border-0 mt-4">
                    <img src="img/book.jpg" alt="Register" width="150" class="d-block mx-auto">
                    <h4 class="py-2 text-center">REGISTER</h4>
                    <!-- Required meta tags -->
  <div class="global-container">
    <div class-="card-text">
    <form action="{{ route('user.register.create') }}" method="post">
      @csrf
    <div class="mb-2 ">
    <label for="exampleInputUsername1" class="form-label">Nama</label>
    <input type="text" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp" name="nama">
  </div>
  <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="mb-2">
    <label for="exampleInputAlamat1" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="exampleInputAlamat1" name="alamat">
  </div>
  <div class="mb-2">
    <label for="exampleInputNoTelepon1" class="form-label">No Telepon</label>
    <input type="number" class="form-control" id="exampleInputNoTelepon1" name="noTelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

                </div>
            </div>
        </div>
    </div>
  
</body>
</html>
   
