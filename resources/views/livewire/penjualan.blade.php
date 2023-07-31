<div class="row">

<div class="col-lg-4">

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Input Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class=" card-body">
                <div class="form-group">
                    <label for="name">Nama Kategori</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder=" Nama Kategori">
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" class=" form-control" rows="4" placeholder="Deskripsi"></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>


</div>

<div class="col-lg-8">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Data Category</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>No</td>
                        <td>Kategori</td>
                        <td>Deskripsi</td>
                        <td>Aksi</td>
                    </tr>

                </tbody>
            </table>

        </div>


    </div>
</div>

</div>