<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="/assets/invoice/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

    <title>Invoice..!</title>
</head>

<body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="/assets/invoice/logo.png" alt="" class="img-fluid">
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>Invoice</p>
                    </div>
                    <div class="position-relative">
                        <p>Invoice No. <span><?= $pemesan['no_invoice']; ?></span></p>
                    </div>
                </div>
            </section>

            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <p>Supplier,</p>
                            <h2>ARBEAUTY STORE</h2>
                            <p class="address"> Jalan Tengiri, Campurejo,Panceng,<br>61156 <br>GRESIK </p>
                            
                        </div>
                        <div class="col-5">
                            <p>Client</p>
                            <h2><?= strtoupper($pemesan['nama']); ?></h2>
                            <p class="address"> <?= $pemesan['alamat']; ?>, <br> <?= $pemesan['postal_code']; ?>, <br><?= strtoupper($pemesan['city']) ?></p>
                            
                        </div>
                    </div>
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p>Payment Method: <span><?=strtoupper($metode); ?></span></p>
                            <p>Order ID: <span><?= $id; ?></span></p>
                        </div>
                        <div class="col-5">
                            <p>Deliver Date: <span><?= $waktu; ?></span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Item Description</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($produk as $key): ?>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="media-body">
                                        <p class="mt-0 title"><?=strtoupper($key['nama']); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td><?= $key['harga']; ?></td>
                            <td id="jumlah"><?= $key['jumlah']; ?></td>
                            <td>200$</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <div class="row">
                    <div class="col-8">
                        <p class="m-0 font-weight-bold"> Note: </p>
                        <p>Batas waktu pembayaran paling lambat 1 hari</p>
                    </div>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            <tr>
                                <td>Sub Total Produk:</td>
                                <td id="total_produk">15$</td>
                            </tr>
                            <tr>
                                <td id="total_pengiriman">Deliver:</td>
                                <td><?= $pemesan['pengiriman']; ?>.00</td>
                            </tr>
                            <tfoot>
                                <tr>
                                    <td>Total:</td>
                                    <td id="total_pembayaran">825$</td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Signature -->
                        <div class="col-10">
                            <img src="/assets/invoice/tanda-tangan.png" class="img-fluid mx-auto" alt="" width="200px">
                            <p class="text-center m-0"> Pemilik Toko </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Cart BG -->
            <img src="/assets/invoice/cart.jpg" class="img-fluid cart-bg" alt="">

            <footer style="margin-left: 50px;">
                <hr class="mb-3">
               
                <div class="social">
                    <span class="pr-2">
                        <i class="fas fa-mobile-alt"></i>
                        <span>+62 812-3023-9307</span>
                    </span>
                    <span class="pr-2">
                        <i class="fas fa-envelope"></i>
                        <span>dianprayodha@yahoo.com</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-instagram"></i>
                        <span>@dianprayodha</span>
                    </span>
                </div>
            </footer>
        </div>
    </div>



    <script>
        window.addEventListener("load", window.print());
        jumlah = document.querySelectorAll('#jumlah');
        let pengiriman = <?= $pemesan['pengiriman'];?>;
        let subtotal_produk = 0;
        jumlah.forEach(e => {
            harga = e.previousElementSibling.innerHTML
            total = e.innerHTML * harga
            e.previousElementSibling.innerHTML = harga + '.00'
            e.nextElementSibling.innerHTML = total + '.00'
            subtotal_produk += total
        });
        $('#total_produk').html(subtotal_produk+'.00')
        total_keseluruhan = subtotal_produk + pengiriman
        $('#total_pembayaran').html(total_keseluruhan+'.00')
        
    </script>






</body>

</html>