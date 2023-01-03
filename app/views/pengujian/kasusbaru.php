<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <!-- Program Bantuan -->
    <div class="row">
        <div class="col">
            <div class="alert alert-info d-flex justify-content-between" role="alert">
                <div>
                    <h4 class="alert-heading">Program Bantuan Prioritas : <?= $data['program_bantuan']; ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="alert alert-dark">
                <h4 class="alert-heading">Tingkat Kemiskinan Rumah Tangga : <?= $data['class_tingkat_kemiskinan']; ?></h4>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card border-light mb-3">
                <h5 class="card-header">Hasil Perhitungan KNN Pada Basis Kasus Untuk Program Bantuan</h5>
                <div class="card-body">
                    <table class="table table-striped" id="table_hasil_knn_program_bantuan">
                        <thead>
                            <tr>
                                <th scope="col">Nomor</th>
                                <?php
                                foreach ($data['daftar_kolom'] as $index => $kolom) {
                                    if (($index >= 0 && $index <= 2) || ($index > 25 && $index <= 43)) {
                                        echo '<th scope="col">' . $kolom . '</th>';
                                    }
                                }
                                ?>
                                <th scope="col">Program Bantuan</th>
                                <th scope="col">Kluster</th>
                                <th scope="col">Similarity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['K_case_tetangga_program_bantuan'] as $index => $row) : ?>
                                <tr>
                                    <th scope="row"><?= $index + 1; ?></th>
                                    <?php
                                    foreach ($data['daftar_kolom'] as $index => $kolom) {
                                        if (($index >= 0 && $index <= 2) || ($index > 25 && $index <= 43)) {
                                            echo '<td>' . $row[$kolom] . '</td>';
                                        }
                                    }
                                    ?>
                                    <td><?= $row["Bantuan"]; ?></td>
                                    <td><?= $row["kluster"]; ?></td>
                                    <td><?= $row["similarity"]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Program Bantuan -->
    <!-- Tingkat Kemiskinan -->
    <div class="row mt-3">
        <div class="col">
            <div class="card border-light mb-3">
                <h5 class="card-header">Hasil Perhitungan KNN Pada Basis Kasus Untuk Tingkat Kemiskinan</h5>
                <div class="card-body">
                    <table class="table table-striped" id="table_hasil_knn_tingkat_kemiskinan">
                        <thead>
                            <tr>
                                <th scope="col">Nomor</th>
                                <?php
                                foreach ($data['daftar_kolom'] as $index => $kolom) {
                                    if ($index >= 0 && $index <= 25) {
                                        echo '<th scope="col">' . $kolom . '</th>';
                                    }
                                }
                                ?>
                                <th scope="col">Tingkat Kemiskinan</th>
                                <th scope="col">Kluster</th>
                                <th scope="col">Similarity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['K_case_tetangga_kemiskinan'] as $index => $row) : ?>
                                <tr>
                                    <th scope="row"><?= $index + 1; ?></th>
                                    <?php
                                    foreach ($data['daftar_kolom'] as $index => $kolom) {
                                        if ($index >= 0 && $index <= 25) {
                                            echo '<td >' . $row[$kolom] . '</td>';
                                        }
                                    }
                                    ?>
                                    <td><?= $row["Class"]; ?></td>
                                    <td><?= $row["kluster"]; ?></td>
                                    <td><?= $row["similarity"]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Tingkat Kemiskinan -->
    <!-- Solusi ditemukan -->
    <div class="row">
        <div class="col">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Solusi Kasus Baru Ditemukan</h4>
                <p>
                    Program Bantuan Prioritas dan Tingkat Kemiskinan dari kasus baru berhasil ditemukan oleh sistem
                </p>
                <hr>
                <div class="d-flex justify-content-between">
                    <?php if (!empty($data['user_login']) && $data['user_login']['status_user'] == "Admin") : ?>
                        <div>
                            <p class="mb-0">
                                <a href="" role="button" class="btn btn-success btn-sm btn-retainKasusBaru" data-toggle="modal" data-target="#modalRetainKasusBaru">
                                    Simpan kasus sebagai basis kasus
                                </a>
                            </p>
                        </div>
                    <?php endif; ?>
                    <div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-transparent btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
                                <i class="fas fa-file-alt"></i>&nbsp;Deskripsi Kasus Baru
                            </button>
                            <button class="btn btn-transparent btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-sign-in-alt"></i>&nbsp;Deskripsi Masukkan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="collapse " id="collapseExample">
                <div class="card border-light mb-3">
                    <h5 class="card-header">Deskripsi Masukkan</h5>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Jumlah K : <?= $data['jumlahK']; ?></li>
                            <li class="list-group-item">Penyelesaian : <?= $data['type_cbr']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col">
            <div class="collapse " id="collapseExample1">
                <div class="card border-light mb-3">
                    <h5 class="card-header">Deskripsi Kasus Baru</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($data['kasusbaru_original'] as $key => $value) : ?>
                                        <li class="list-group-item"><?= $key . " : " . $value; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="col">
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($data['kasusbaru_transform'] as $key => $value) : ?>
                                        <li class="list-group-item"><?= $key . " : " . $value; ?></li>
                                    <?php endforeach; ?>
                                    <?php if (isset($data['kluster_terdekat'])) : ?>
                                        <li class="list-group-item">Kluster : <?= $data['kluster_terdekat']; ?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>