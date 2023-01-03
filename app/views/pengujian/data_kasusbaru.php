<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Data Riwayat Pengujian Kasus Baru</h4>
</div>
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped" id="table_riwayat_kasus_baru">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Kepala Keluarga</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['daftar_data'] as $index => $datum) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <td><?= $datum["A1"]; ?></td>
                            <td><?= $datum["A2"]; ?></td>
                            <td><?= $datum["A3"]; ?></td>
                            <td><?= $datum["date"]; ?></td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-lihatDetailKasusBaru" title="Lihat Detail Kasus Baru" data-toggle="modal" data-target="#modalDetailKasusBaru" data-id="<?= $datum['id_data'] ?>">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>