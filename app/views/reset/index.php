<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="jumbotron">
                <h1 class="display-4">Reset Seluruh Data Kasus</h1>
                <p class="lead">
                    Fitur ini akan menghapus seluruh data yang dijadikan kasus pada sistem cerdas ini. Data yang dihapus tidak dapat dikembalikan seperti semula.
                </p>
                <hr class="my-4">
                <p>Tekan tombol 'Reset' di bawah jika Anda ingin melakukannya!</p>
                <a href="" role="button" class="btn btn-danger  btn-resetSeluruhData" data-toggle="modal" data-target="#modalResetSeluruhData">Reset</a>
            </div>
        </div>
    </div>
</div>