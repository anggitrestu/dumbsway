<style scoped>
    .product-pict {
        margin-bottom: 10px;
        position: relative;
        z-index: 1;
    }

    .product-pict img:hover {
        -webkit-box-shadow: -10px 0px 13px -7px #000000, 10px 0px 13px -7px #000000,
            -50px -50px 0px -30px rgba(0, 0, 0, 0);
        box-shadow: -10px 0px 13px -7px #000000, 10px 0px 13px -7px #000000,
            -50px -50px 0px -30px rgba(0, 0, 0, 0);
    }

    .product-pict img {
        width: 200px;
        height: 300px;

    }

    .pd-title h2 {

        text-align: left;
        color: rgba(40, 30, 90, 0.86);
    }



    .pd-title h2:hover {
        text-decoration: underline;
        font-weight: bold;
    }

    .pd-title h5:hover {
        text-decoration: underline;
        font-weight: bold;

    }

    .pd-desc p {
        color: #636363;
    }

    .price {
        text-align: center;
        border-radius: 5px;
        background: #e8eaf6;
        border: 1px solid #e8eaf6;
    }

    .price h5 {
        color: #e61e64;
        padding: 10px;
    }

    .buy {
        width: 100%;
        background-color: #281e5a;
        border-radius: 10px;
        border: none;
        text-align: center;
        padding: 5px;

    }

    .buy a {
        color: #fff;
        font-size: 16px;
        text-decoration: none;
    }

    .buy:hover {
        -webkit-box-shadow: -10px 0px 13px -7px #000000, 10px 0px 13px -7px #000000,
            -50px -50px 0px -30px rgba(0, 0, 0, 0);
        box-shadow: -10px 0px 13px -7px #000000, 10px 0px 13px -7px #000000,
            -50px -50px 0px -30px rgba(0, 0, 0, 0);
    }
</style>

<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="<?= BASEURL ?>/dashboard/index">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
        <hr>
    </nav>
    <article>
        <section>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-3 ">
                    <div class="product-pict">
                        <img class="rounded" src="<?= BASEURL; ?>/uploads/<?php echo $data['books']['image'] ?>">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="pd-title">
                        <h2 class="font-monospace"><?php echo $data['books']['name'] ?></h2>
                        <h5 class="font-monospace text-muted"><?php echo $data['books']['namecategories'] ?></h5>
                        <h5 class="font-monospace text-muted">Stok : <?php echo $data['books']['stok'] ?></h5>
                        <div class="accordion accordion-flush desc" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Deskripsi
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body"><?php echo $data['books']['deskripsi']; ?></div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Ubah Data Buku
                        </button>
                        <a class="btn btn-danger" href="<?= BASEURL ?>/dashboard/delete/<?= $data['books']['id']; ?>">
                            Delete Data Buku
                        </a>
                    </div>
                </div>

            </div>
        </section>
    </article>
</div>

<div class=" modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/dashboard/ubah" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value=" <?php echo $data['books']['id'] ?>">
                    <div class="form-group mt-2">
                        <select class="custom-select mb-2" name="category_id">
                            <option selected value="<?= $data['books']['idcategories'] ?>"><?= $data['books']['namecategories'] ?></option>
                            <?php foreach ($data['categories'] as $category) : ?>
                                <option value="<?= $category['id'] ?>"> <?= $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">name Buku </label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $data['books']['name'] ?>">
                    </div>
                    <div class="form-group mb-2">
                        <label for="stok">Stok </label>
                        <input type="number" class="form-control" id="stok" name="stok" value="<?= $data['books']['stok'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="dekripsi">Deskripsi </label>
                        <div class="form-floating">
                            <textarea class="form-control" type="text" name="deskripsi" vid="deskripsi"> <?= $data['books']['deskripsi'] ?></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Cover Komik</label><br>
                        <input type="file" name="image" id="image" value="<?= $data['books']['image'] ?>" required="required">
                        <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="sumbit" class="btn btn-primary btn-title">Ubah Data</button>
            </div>
            </form>
        </div>
    </div>
</div>