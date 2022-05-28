<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="/assets/css/styles.css" rel="stylesheet" />
        <link href="/assets/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/select2-bootstrap4.min.css">
        <link href="/assets/css/style2.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/fbe62d959c.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- navbar -->
        <?= $this->include('template/Admin/navbar') ?>

        <div id="layoutSidenav" >
            <!-- sidebar -->
            <?= $this->include('template/Admin/sidebar') ?> 
            <div id="layoutSidenav_content">
                <main style="background-color: rgb(240, 239, 239); min-height: 85vh">
                
                <!-- content -->
               <?= $this->renderSection('content') ?>

               </main>
                <!-- footer -->
                <?= $this->include('template/Admin/footer') ?>
            </div>
        </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/select2.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="/assets/js/datatables-simple-demo.js"></script>
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
