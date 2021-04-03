<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman <?= $data['judul'] ?></title>
  <link rel=stylesheet href="<?= BASEURL ?> /css/bootstrap.css">
  <link rel=stylesheet href="<?= BASEURL ?> /css/style.css">
  <link rel=stylesheet href="<?= BASEURL ?> /css/footer.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Vesper+Libre:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>
  <div class="row sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light  nav-cs ">
      <div class="container">
        <a class="navbar-brand" href="#">Anggit Books</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <div class="col-lg-8">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= BASEURL ?>">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL ?>/product">Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL ?>/cart">Cart</a>
              </li>

            </ul>
          </div>
          <div class="col-lg-4">
            <div class="float-end pt-4">
              <form method="POST" action="<?= BASEURL; ?>/auth/logout">
                <button class="btn btn-dark" type="submit">Logout</button>
              </form>
            </div>
          </div>
        </div>




      </div>
  </div>
  </div>
  </nav>