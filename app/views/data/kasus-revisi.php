<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Kasus Revisi</h4>
    <p>Kasus-kasus yang belum mendapatkan solusi penyelesaian oleh sistem untuk program bantuan prioritas</p>
    <hr>
    <p>Ketika selesai melakukan revisi, <strong>kasus baru otomatis akan tesimpan sebagai data basis kasus</strong> untuk bisa digunakan selanjutnya</p>
</div>
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped" id="table_data_transformasi">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">ID</th>
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
                    <?php foreach ($data['daftar_data'] as $index => $datum) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <td><?= $datum['id_kasusbaru_original']; ?></td>
                            <?php foreach ($data['daftar_kolom'] as $kolom) : ?>
                                <td><?= $datum[$kolom]; ?></td>
                            <?php endforeach; ?>
                            <?php if (!empty($data['user_login']) && $data['user_login']['status_user'] == "Admin") : ?>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-warning btn-sm btn-reviseKasusBaru" title="Revisi Kasus" data-toggle="modal" data-target="#modalDataBaru" data-id="<?= $datum['id_kasusbaru_original']; ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a class="btn btn-danger btn-sm" href="<?= BASEURL; ?>data/hapus_kasusrevisi/<?= $datum['id_kasusbaru_original']; ?>" onclick="return confirm('Hapus data ini?');" title="Hapus Data">
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