@extends('admin.sidebar.index')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Master Buku</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <?php $i = 1 ?>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Rekomendasi</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        @foreach ($buku as $k)
                        <tbody>
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $k->judul }}</td>
                                <td>{{ $k->penulis->nama }}</td>
                                <td>{{ $k->kategori->nama }}</td>
                                <td>
                                    @if ($k->rekomendasi == "I")
                                        Direkomendasi
                                    @else
                                        Tidak Direkomendasi
                                    @endif
                                </td>
                                <td>
                                    @if ($k->status == "I")
                                        Diterima
                                    @elseif ($k->status == "T")
                                        Tidak Diterima
                                    @else
                                        Menunggu Verify
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-info btn-icon" data-toggle="modal" data-target="#infoModal{{$k->id }}">
                                        <i class="fas fa-info"></i>
                                    </button>
                                
                                    <button class="btn btn-danger btn-icon" data-toggle="modal" data-target="#deleteModal{{$k->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>




        @foreach ($buku as $k)
        <!-- modal info -->
        <div class="modal fade" id="infoModal{{$k->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg mt-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Verify Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/buku/'.$k->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Judul Buku :</label><br>
                                        <label class="form-label">Penulis</label><br>
                                        <label class="form-label">Penerbit</label><br>
                                        <label class="form-label">Tahun Terbit</label><br>
                                        <label class="form-label">Tebal Buku</label><br>
                                        <label class="form-label">ISBN</label><br>
                                        <label class="form-label">Kategori</label><br>
                                        <label class="form-label">Sinopsis</label><br>
                                        <label class="form-label">Rekomendasi</label><br>
                                        <label class="form-label">Status</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">{{ $k->judul }}</label><br>
                                        <label class="form-label">{{ $k->penulis->nama }}</label><br>
                                        <label class="form-label">
                                            @if($k->penerbit == "")
                                                -
                                            @else
                                                {{ $k->penerbit }}
                                            @endif
                                        </label><br>
                                        <label class="form-label">
                                            @if($k->tahun_terbit == "")
                                                -
                                            @else
                                                {{ $k->tahun_terbit }}
                                            @endif
                                        </label><br>
                                        <label class="form-label">
                                            @if($k->tebal == "")
                                                -
                                            @else
                                                {{ $k->tebal }}
                                            @endif
                                        </label><br>
                                        <label class="form-label">
                                            @if($k->isbn == "")
                                                -
                                            @else
                                                {{ $k->isbn }}
                                            @endif
                                        </label><br>
                                        <label class="form-label">{{ $k->kategori->nama }}</label><br>
                                        <label class="form-label">{{ $k->sinopsis }}</label><br>
                                        <select id="rekomendasi" name="rekomendasi" required >
                                            <option value="I">Direkomendasikan</option>
                                            <option value="T">Tidak Direkomendasi</option>
                                        </select><br>
                                        <select id="status" name="status" required >
                                            <option value="I">Diterima</option>
                                            <option value="T">Tidak Diterima</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-block btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        @foreach ($buku as $k)
        <!-- modal delete -->
        <div class="modal fade" id="deleteModal{{$k->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin menghapus buku ini?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Ketuk "HAPUS" ketika anda sudah membulatkan pikiran untuk menghapus buku ini</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form action="{{ url('admin/buku/'.$k->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-icon">
                                <span class="icon text-white">
                                    <i class="fas fa-trash"> Hapus</i>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
@endsection