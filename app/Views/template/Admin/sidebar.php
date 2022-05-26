<div id="layoutSidenav_nav" class="bg-info">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu</div>
                <a class="nav-link" href="/a/">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-box-open"></i></i></div>
                    Produk
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/a/produk/">All Produk</a>
                        <a class="nav-link" href="/a/category/">Categories</a>
                    </nav>
                </div>
                <a class="nav-link" href="/a/order/"">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-arrow-down"></i></div>
                    Order
                </a>
                <a class="nav-link" href="/a/account/">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></i></div>
                    Account
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php if(session()->get('status')): ?>
                <?= session()->get('data')['nama'] ;?>
            <?php endif; ?>
        </div>
    </nav>
</div>