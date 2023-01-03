<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header">Hasil Pengujian Untuk Kasus Uji</h5>
                <div class="card-body">
                    <h5 class="card-title">CBR-KMeans</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Waktu Komputasi = <?= $data['waktu_cbrkmeans']; ?></li>
                        <li class="list-group-item">Akurasi Program Bantuan = <span class="font-weight-bolder"><?= $data['akurasi_programBantuan_cbrkmeans']; ?>%</span></li>
                    </ul>
                    <h5 class="card-title">CBR</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Waktu Komputasi = <?= $data['waktu_cbr']; ?></li>
                        <li class="list-group-item">Akurasi Program Bantuan = <span class="font-weight-bolder"><?= $data['akurasi_programBantuan_cbr']; ?>%</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped" id="table_pengujian_kasusuji">
                <thead>
                    <tr>
                        <th scope="col">ID Kasus Uji</th>
                        <th scope="col">Label Tingkat Kemiskinan</th>
                        <th scope="col">Label Program Bantuan</th>
                        <th scope="col">Program Bantuan Hasil CBR</th>
                        <th scope="col">Program Bantuan Hasil CBR-KMeans</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['kasus_uji'] as $kasus) : ?>
                        <tr>
                            <th scope="row"><?= $kasus['id_kasusuji']; ?></th>
                            <td><?= $kasus['Class']; ?></td>
                            <td><?= $kasus['Bantuan']; ?></td>
                            <td><?= $kasus['bantuan_cbr']; ?></td>
                            <td><?= $kasus['bantuan_cbrkmeans']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>