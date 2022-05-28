<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?> 

<div class="wrapper">
    <div class="inner">
        <img src="/assets/img2/images/image-1.png" alt="" class="image-1">
        <form action="">
            <h3>Have an account?</h3>
            <div class="form-holder">
                <span class="lnr lnr-user"></span>
                <input type="text" class="form-control" placeholder="Username or Phone Number">
            </div>
            <div class="form-holder">
                <span class="lnr lnr-lock"></span>
                <input type="password" class="form-control" placeholder="Password">
            </div>
            <button>
                <span>Login</span>
            </button>
            <div class="text-center mt-4">
                <p>Don't have an account? <a href="register.html">Register</a></p>
            </div>
        </form>
        <img src="assets/images/image-2.png" alt="" class="image-2">
    </div>   
</div>

<?= $this->endSection() ?>