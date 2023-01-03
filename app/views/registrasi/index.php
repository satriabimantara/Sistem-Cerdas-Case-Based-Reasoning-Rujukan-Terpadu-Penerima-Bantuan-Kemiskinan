<div class="container bg-card-login shadow-lg">

    <div class="row">
        <div class="col-md-6 in-card">
            <h1 class="display-4 login-title text-center mb-5">
                Register
            </h1>
            <form action="<?= BASEURL; ?>registrasi/registrasi_user" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <?php Flasher::flash(); ?>
                        </div>
                    </div>
                    <!-- Row for elemen -->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="input_nama_user" class="form-label">Nama</label>
                                <input type="text" class="form-control input-login" id="input_nama_user" name="input_nama_user" value="" required="true">
                            </div>
                            <div class="form-group">
                                <label for="input_email_user" class="form-label">Email</label>
                                <input type="email" class="form-control input-login" id="input_email_user" name="input_email_user" value="" required="true">
                            </div>
                            <div class="form-group">
                                <label for="input_hp_user" class="form-label">Handphone</label>
                                <input type="number" class="form-control input-login" id="input_hp_user" name="input_hp_user" value="" required="true" minlength="12" maxlength="12">
                            </div>
                            <div class="form-group">
                                <label for="input_username_user" class="form-label">Username</label>
                                <input type="text" class="form-control input-login" id="input_username_user" name="input_username_user" value="" required="true">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="input_password_user" class="form-label">New Password</label>
                                    <input type="password" class="form-control input-login" id="input_password_user" name="input_password_user" value="" required="true">
                                </div>
                                <div class="form-group col-6">
                                    <label for="input_repeat_password" class="form-label">Repeat Password</label>
                                    <input type="password" class="form-control input-login" id="input_repeat_password" name="input_repeat_password" value="" required="true">
                                </div>
                            </div>
                            <label class="form-label">
                                Status
                            </label>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="input_status_user" value="Admin">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" value="Admin" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="input_status_user" value="User" checked="">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" value="User" readonly="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir row elemen -->
                    <!-- Row for button -->
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-success btn-block mt-3 " name="btnRegisterUser" value="" id="btnRegisterUser">
                                Register
                            </button>
                            <p class="text-center  mt-3">
                                <a href="<?= BASEURL; ?>login/" class="text-createaccount">
                                    Sudah punya akun? Login!
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- Akhir row button -->
                </div>
            </form>
        </div>
        <!-- End First Columns -->

        <!-- Start Second COlumn -->
        <div class="col-md-6 pict-card in-card">
            <img src="<?= BASEURL; ?>img/registerpict.jpg" alt="Foto Registrasi" class="img-portrait shadow">
        </div>
        <!-- End Second Column -->

    </div>
</div>