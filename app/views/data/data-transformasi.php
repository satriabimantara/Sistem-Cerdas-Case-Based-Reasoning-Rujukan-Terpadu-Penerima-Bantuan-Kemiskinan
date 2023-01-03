<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Data Hasil Transformasi</h4>
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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['daftar_data'] as $index => $obesity) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <?php foreach ($data['daftar_kolom'] as $kolom) : ?>
                                <td><?= $obesity[$kolom]; ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>