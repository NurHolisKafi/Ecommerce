<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?> 



<div class="d-md-flex half">
    <div class="bg" style="background-image: url('/assets/img/bg_1.jpg');"></div>
    <div class="contents">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
                <h3>Login</h3>
                <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form action="/AuthController/Auth" method="post">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <div class="form-group first mb-3">
                  <label for="username">Username</label>
                  <input type="text" class="form-control mt-2" placeholder="John doe" name="username" id="username">
                </div>
                <div class="form-group last mb-5">
                  <label for="password">Password</label>
                  <input type="password" class="form-control mt-2" placeholder="********" name="pass" id="password">
                </div>
                <button class="btn btn-block btn-primary w-100 mb-4"> LOG IN</button>
				        <p>Don't Have a Account ? <a href="/register">SIGN IN</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
		

<?= $this->endSection() ?>