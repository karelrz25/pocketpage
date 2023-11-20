<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nulis Buku</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<body>

    {{-- Cover Buku --}}
    <div class="col-lg-8 mx-auto">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div> 
        @endif
        <form action="{{ url("user/buku") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-8 mx-auto">
                <h2>Nulis Disiniii</h2>
            </div>
            <div class="col-lg-8 mx-auto mb-3">
                <label for="image" class="form-label">Input Cover Buku</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" required>
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror   
            </div>
            {{-- Detail Buku --}}
            <div class="col-lg-8 mx-auto">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control @error ('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Judul Buku" required autofocus value="{{ old('judul') }}">
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="sinopsis" class="form-label">Sinopsis</label>
                    <textarea class="form-control @error ('sinopsis') is-invalid @enderror" id="sinopsis" rows="3" name="sinopsis" placeholder="Sinopsis Buku" required>
                    @error('sinopsis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Pilih Kategori</label>
                    <select class="form-select @error ('kategori') is-invalid @enderror" name="kategori">
                        @foreach ($categories as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary mt-3" type="submit" name="submit">Upload</button>
            </div>
        </form> 
    </div>
</body>
</html> 