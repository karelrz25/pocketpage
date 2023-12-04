@extends('admin.sidebar.index')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Master Kategori</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <?php $i = 1 ?>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        @foreach ($kategori as $k)
                        <tbody>
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $k->nama }}</td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#EditModal{{$k->id}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>

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


        <!-- modal create -->
        <div class="modal fade mt-4" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md mt-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/kategori') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" name="nama" id="kategori" placeholder="Masukkan Nama Kategori">
                                    </div>

                                    <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($kategori as $k)
        <!-- modal delete -->
        <div class="modal fade" id="deleteModal{{$k->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin menghapus kategori ini?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Ketuk "HAPUS" ketika anda sudah membulatkan pikiran untuk menghapus kategori ini</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form action="{{ url('admin/kategori/'.$k->id) }}" method="post">
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


        @foreach ($kategori as $k)
        <!-- modal edit -->
        <div class="modal fade" id="EditModal{{$k->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md mt-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/kategori/'.$k->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" name="nama" id="kategori" value="{{ $k->nama }}">
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-block btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
@endsection