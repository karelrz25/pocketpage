<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container col-lg-8">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ url("user/uploadpdf") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-8 mx-auto">
                {{-- PDF Upload --}}
                <div class="mx-auto mb-3">
                <label for="formFile" class="form-label">Upload PDF Buku</label>
                <input class="form-control @error('file') is-invalid @enderror" type="file" id="formFile" name="file" accept=".pdf">
                @error('pdf')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror 
            </div>
            <button type="submit" class="btn btn-primary" name="submit ">Upload</button>
            <a href="{{ route('user.dashboard') }}" class="btn btn-warning">Back to Dashboard</a>
        </form>
    </div>
</body>
</html>