<div class="alert alert-primary" role="alert">
    <h4 class="alert-heading">Kasus Uji</h4>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped" id="table_kasus_uji">
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
                        <th scope="col">Kluster</th>
                        <th scope="col">Program Bantuan Hasil CBR</th>
                        <th scope="col">Program Bantuan Hasil CBR-KMeans</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['daftar_data'] as $index => $datum) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <?php foreach ($data['daftar_kolom'] as $kolom) : ?>
                                <td><?= $datum[$kolom]; ?></td>
                            <?php endforeach; ?>
                            <td><?= $datum['kluster']; ?></td>
                            <td><?= $datum['bantuan_cbr']; ?></td>
                            <td><?= $datum['bantuan_cbrkmeans']; ?></td>
                            <!-- <td>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-warning btn-sm btn-ubahDataOriginal" title="Edit Data" data-toggle="modal" data-target="#modalDataOriginal" data-id="<?= $review['id_reviews'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a class="btn btn-danger btn-sm" href="<?= BASEURL; ?>data/hapus_data_original/<?= $review['id_reviews'] ?>" onclick="return confirm('Hapus data ini?');" title="Hapus Data">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>