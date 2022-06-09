<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/assets/css/login.css">

  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/select2.min.css">
  <link rel="stylesheet" href="/assets/css/select2-bootstrap4.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/fbe62d959c.js" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-CK8zrp9KgMihrTv6"></script>

</head>

<body>
  <?= $this->include('/template/User/navbar'); ?>

  <!-- content -->
  <?= $this->renderSection('content') ?>

  <!-- footer -->
<?= $this->include('/template/User/footer'); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="/assets/js/select2.full.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <script src="/assets/js/scripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="/assets/js/datatables-simple-demo.js"></script>
  <script src="/assets/js/harga.js"></script>
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

    })
  </script>
</body>

</html>