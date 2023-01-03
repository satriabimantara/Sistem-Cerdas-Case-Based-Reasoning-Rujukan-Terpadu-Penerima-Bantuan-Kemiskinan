<div class="container bg-card-login shadow-lg">

    <!-- Start Row -->
    <div class="row">
        <!-- Start First COlumn -->
        <div class="col-md-6 pict-card in-card">
            <img src="<?= BASEURL; ?>img/pictlogin.jpg" alt="" class="img img-fluid">
        </div>
        <!-- End First Column -->
        <!-- Start Second Column -->
        <div class="col-md-6 in-card">
            <h1 class="display-4 login-title text-center mb-5">
                Login
            </h1>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php Flasher::flash(); ?>
                    </div>
                </div>
                <form action="<?= BASEURL; ?>login/login_user" method="post">
                    <div class="form-group">
                        <label for="username_user" class="form-label">Username</label>
                        <input type="text" class="form-control input-login" id="username_user" required="true" name="username_user" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password_user" class="form-label">Password</label>
                        <input type="password" class="form-control input-login" id="password_user" required="true" name="password_user">
                    </div>
                    <button class="btn btn-success btn-block mt-5" name="btnLoginUser" value="" type="submit">
                        Login
                    </button>
                </form>
                <p class="text-center  mt-5">
                    <a href="<?= BASEURL; ?>registrasi/" class="text-createaccount">
                        Belum punya akun? Registrasi Di sini!
                    </a>
                </p>
            </div>
        </div>
        <!-- End Second Columns -->
    </div>
    <!-- End Row -->
</div>