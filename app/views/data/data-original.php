<div class="alert alert-dark d-flex justify-content-between" role="alert">
    <h4 class="alert-heading">Data Penelitian</h4>
    <?php if (!empty($data['user_login']) && $data['user_login']['status_user'] == "Admin") : ?>
        <button class="btn btn-transparent btn-tambahData" data-toggle="modal" data-target="#modalDataBaru" role="button">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Tambah Data
        </button>
    <?php endif; ?>
</div>
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped" id="table_data_original">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <?php
                        foreach ($data['daftar_kolom'] as $kolom) {
                            if ($kolom == "Class" || $kolom == "Bantuan") {
                                if ($kolom == "Class") {
                                    echo '<th scope="col">Tingkat Kemiskinan</th>';
                                } else {
                                    echo '<th scope="col">Program Bantuan</th>';
                                }
                            } else {
                                echo '<th scope="col">' . $kolom . '</th>';
                            }
                        }
                        ?>
                        <?php if (!empty($data['user_login']) && $data['user_login']['status_user'] == "Admin") : ?>
                            <th scope="col">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['daftar_data'] as $index => $row) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <?php foreach ($data['daftar_kolom'] as $kolom) : ?>
                                <td><?= $row[$kolom]; ?></td>
                            <?php endforeach; ?>
                            <?php if (!empty($data['user_login']) && $data['user_login']['status_user'] == "Admin") : ?>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-warning btn-sm btn-ubahData" title="Edit Data" data-toggle="modal" data-target="#modalDataBaru" data-id="<?= $row['id_data'] ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a class="btn btn-danger btn-sm" href="<?= BASEURL; ?>data/hapus_kasusbaru/<?= $row['id_data'] ?>" onclick="return confirm('Hapus data ini?');" title="Hapus Data">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>