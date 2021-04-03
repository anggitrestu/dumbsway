<section class="container">

    <div class="tambahBuku">
        <div class="row mb-3 mt-4">
            <div class="col-lg-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah Data Buku
                </button>
            </div>
        </div>
    </div>

    <div class="header">

        <h2 class=" judul-h2">Daftar Buku</h2>

    </div>

    <div class="categories">
        <div class="books">
            <div class="row">
                <?php foreach ($data['books'] as $book) : ?>
                    <div class="col-lg-3 col-md-3">
                        <div class="card pt-2">
                            <img src="<?= BASEURL; ?>/uploads/<?php echo $book['image'] ?>" class="card-img-top item-image mx-auto d-block" alt="...">
                            <div class="card-body">
                                <a href="<?= BASEURL ?>/dashboard/detail/<?= $book['id']; ?>" style="text-decoration:none">
                                    <h5 class="card-title"><?= $book['name'] ?></h5>
                                </a>
                                <p class="card-text">Stock : <?= $book['stok'] ?></p>
                                <?php
                                if ($book['stok'] > 0) {
                                ?>
                                    <a href="<?= BASEURL; ?>/dashboard/pinjam" class="btn btn-primary">Pinjam</a>
                                <?php } ?>
                                <a href="<?= BASEURL; ?>/dashboard/kembalikan" class="btn btn-dark">Kembalikan</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<div class=" modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/dashboard/tambah" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <select class="custom-select mb-2" name="category_id">
                            <option selected>-- Select Category --</option>
                            <?php foreach ($data['categories'] as $category) : ?>
                                <option value="<?= $category['id'] ?>"> <?= $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">name Buku </label>
                        <input type="text" class="form-control" id="name" name="name" required="required">
                    </div>
                    <div class="form-group mb-2">
                        <label for="stok">Stok </label>
                        <input type="number" class="form-control" id="stok" name="stok" required="required">
                    </div>
                    <div class="form-group">
                        <label for="dekripsi">Deskripsi </label>
                        <div class="form-floating">
                            <textarea class="form-control" type="text" name="deskripsi" id="deskripsi"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Cover Komik</label><br>
                        <input type="file" name="image" id="image" required="required">
                        <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="sumbit" class="btn btn-primary btn-title">Tambah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>