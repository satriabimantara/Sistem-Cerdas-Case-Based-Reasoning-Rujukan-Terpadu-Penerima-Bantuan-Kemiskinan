<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="jumbotron">
                <h1 class="display-4">Data Penelitian</h1>
                <p class="lead">
                    Sumber Data
                </p>
                <hr class="my-4">
                <p>
                    Deskripsi Data
                </p>
                <p>
                    Jumlah data penelitian : <strong><?= $data['jumlah_data_penelitian']; ?></strong><br>
                    Jumlah basis kasus : <strong><?= $data['jumlah_basis_kasus']; ?></strong><br>
                    Jumlah kasus uji : <strong><?= $data['jumlah_kasus_uji']; ?></strong>
                </p>
            </div>
        </div>
    </div>
</div>