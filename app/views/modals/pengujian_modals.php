<!-- Modal kasus baru -->
<form action="<?= BASEURL; ?>pengujian/kasus_baru" method="post">
    <div class="modal fade" id="modalPengujianKasusBaru" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalPengujianKasusBaruLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header" id="modal-header-kasusbaru">
                    <h5 class="modal-title" id="modalPengujianKasusBaruLabel">Pengujian Kasus Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_data" id="id_data" value="" class="form-control">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="input-A1">Nama Kepala Keluarga</label>
                                <input type="text" class="form-control" id="input-A1" required="true" name="input-A1" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="input-A2">Alamat</label>
                                <textarea class="form-control" id="input-A2" rows="3" required="true" name="input-A2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="input-A3">Jenis Kelamin</label>
                                <select class="form-control" id="input-A3" required="true" name="input-A3">
                                    <option value="">- Pilih -</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Indikator Kemiskinan Rumah Tangga</h5>
                            <!-- K1 -->
                            <div class="form-group">
                                <label for="input-K1">Pelaksanaan ibadah anggota keluarga</label>
                                <select class="form-control" name="input-K1" id="input-K1" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Anggota keluarga tidak melaksanakan ibadah menurut agama*1">Anggota keluarga tidak melaksanakan ibadah menurut agama</option>
                                    <option value="Anggota keluarga melaksanakan ibadah menurut agama*2">Anggota keluarga melaksanakan ibadah menurut agama</option>
                                </select>
                            </div>
                            <!-- K2 -->
                            <div class="form-group">
                                <label for="input-K2">Makan minimal 2x sehari</label>
                                <select class="form-control" name="input-K2" id="input-K2" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Makan dua kali atau kurang dalam sehari*1">Makan dua kali atau kurang dalam sehari</option>
                                    <option value="Makan lebih dari dua kali sehari*2">Makan lebih dari dua kali sehari</option>
                                </select>
                            </div>
                            <!-- K3 -->
                            <div class="form-group">
                                <label for="input-K3">Pakaian Berbeda Anggota Keluarga</label>
                                <select class="form-control" name="input-K3" id="input-K3" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Tidak memiliki pakaian berbeda dirumah, sekolah, bekerja dan bepergian*1">Tidak memiliki pakaian berbeda dirumah, sekolah, bekerja dan bepergian</option>
                                    <option value="Pakaian berbeda dirumah saja*2">Pakaian berbeda dirumah saja</option>
                                    <option value="Pakaian berbeda dirumah dan sekolah*3">Pakaian berbeda dirumah dan sekolah</option>
                                    <option value="Pakaian berbeda dirumah, sekolah dan bepergian*4">Pakaian berbeda dirumah, sekolah dan bepergian</option>
                                    <option value="Pakaian berbeda dirumah dan bekerja*5">Pakaian berbeda dirumah dan bekerja</option>
                                    <option value="Pakaian berbeda dirumah, bekerja dan bepergian*6">Pakaian berbeda dirumah, bekerja dan bepergian</option>
                                </select>
                            </div>
                            <!-- K4 -->
                            <div class="form-group">
                                <label for="input-K4">Bagian terluas lantai rumah adalah tanah</label>
                                <select class="form-control" name="input-K4" id="input-K4" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Bagian terluas lantai adalah tanah*1">Bagian terluas lantai adalah tanah</option>
                                    <option value="Bagian terluas lantai adalah bukan tanah*2">Bagian terluas lantai adalah bukan tanah</option>
                                </select>
                            </div>
                            <!-- K5 -->
                            <div class="form-group">
                                <label for="input-K5">Anak sakit dibawa ke sarana kesehatan</label>
                                <select class="form-control" name="input-K5" id="input-K5" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Anak sakit tidak dibawa ke sarana kesehatan*1">Anak sakit tidak dibawa ke sarana kesehatan</option>
                                    <option value="Anak sakit dibawa ke sarana kesehatan*2">Anak sakit dibawa ke sarana kesehatan</option>
                                </select>
                            </div>
                            <!-- K6 -->
                            <div class="form-group">
                                <label for="input-K6">Ibadah secara teratur</label>
                                <select class="form-control" name="input-K6" id="input-K6" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Anggota keluarga tidak melaksanakan ibadah secara teratur*1">Anggota keluarga tidak melaksanakan ibadah secara teratur</option>
                                    <option value="Anggota keluarga melaksanakan ibadah secara teratur*2">Anggota keluarga melaksanakan ibadah secara teratur</option>
                                </select>
                            </div>
                            <!-- K7 -->
                            <div class="form-group">
                                <label for="input-K7">Konsumsi daging/ikan/telur</label>
                                <select class="form-control" name="input-K7" id="input-K7" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Keluarga tidak makan daging/ikan/telur minimal seminggu sekali*1">Keluarga tidak makan daging/ikan/telur minimal seminggu sekali</option>
                                    <option value="Keluarga makan daging/ikan/telur minimal seminggu sekali*2">Keluarga makan daging/ikan/telur minimal seminggu sekali</option>
                                    <option value="Keluarga makan daging/ikan/telur lebih dari sekali dalam seminggu*3">Keluarga makan daging/ikan/telur lebih dari sekali dalam seminggu</option>
                                </select>
                            </div>
                            <!-- K8 -->
                            <div class="form-group">
                                <label for="input-K8">Perolehan pakaian stel baru</label>
                                <select class="form-control" name="input-K8" id="input-K8" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Anggota keluarga tidak memperoleh satu stel pakaian baru dalam setahun*1">Anggota keluarga tidak memperoleh satu stel pakaian baru dalam setahun</option>
                                    <option value="Anggota keluarga memperoleh satu stel pakaian baru dalam setahun*2">Anggota keluarga memperoleh satu stel pakaian baru dalam setahun</option>
                                    <option value="Anggota keluarga memperoleh lebih dari satu stel pakaian baru dalam setahun*3">Anggota keluarga memperoleh lebih dari satu stel pakaian baru dalam setahun</option>
                                </select>
                            </div>
                            <!-- K9 -->
                            <div class="form-group">
                                <label for="input-K9">Luas minimal lantai rumah (8m^2)</label>
                                <select class="form-control" name="input-K9" id="input-K9" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Luas lantai rumah perpenghuni yaitu kurang dari 8 m2*1">Luas lantai rumah perpenghuni yaitu kurang dari 8 m2</option>
                                    <option value="Luas lantai rumah perpenghuni yaitu 8 m2 atau lebih*2">Luas lantai rumah perpenghuni yaitu 8 m2 atau lebih</option>
                                </select>
                            </div>
                            <!-- K10 -->
                            <div class="form-group">
                                <label for="input-K10">Keluarga sakit 3 bulan terakhir</label>
                                <select class="form-control" name="input-K10" id="input-K10" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Ada anggota keluarga sakit tiga bulan terakhir atau kurang*1">Ada anggota keluarga sakit tiga bulan terakhir atau kurang</option>
                                    <option value="Tidak ada anggota keluarga sakit tiga bulan terakhir atau kurang*2">Tidak ada anggota keluarga sakit tiga bulan terakhir atau kurang</option>
                                </select>
                            </div>
                            <!-- K11 -->
                            <div class="form-group">
                                <label for="input-K11">Anggota keluarga (>15 tahun) yang berpenghasilan tetap</label>
                                <select class="form-control" name="input-K11" id="input-K11" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Tidak ada anggota keluarga berumur 15 tahun ke atas berpenghasilan tetap*1">Tidak ada anggota keluarga berumur 15 tahun ke atas berpenghasilan tetap</option>
                                    <option value="Ada anggota keluarga berumur 15 tahun ke atas berpenghasilan tetap*2">Ada anggota keluarga berumur 15 tahun ke atas berpenghasilan tetap</option>
                                </select>
                            </div>
                            <!-- K12 -->
                            <div class="form-group">
                                <label for="input-K12">Ada keluarga yang tidak bisa baca-tulis</label>
                                <select class="form-control" name="input-K12" id="input-K12" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Ada anggota keluarga berumur 10-60 tahun tidak bisa baca tulis*1">Ada anggota keluarga berumur 10-60 tahun tidak bisa baca tulis</option>
                                    <option value="Tidak ada anggota keluarga berumur 10-60 tahun tidak bisa baca tulis*2">Tidak ada anggota keluarga berumur 10-60 tahun tidak bisa baca tulis</option>
                                </select>
                            </div>
                            <!-- K13 -->
                            <div class="form-group">
                                <label for="input-K13">Ada anak (5-15) tahun yang tidak bersekolah</label>
                                <select class="form-control" name="input-K13" id="input-K13" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Ada anak berumur 5-15 tahun yang tidak bersekolah*1">Ada anak berumur 5-15 tahun yang tidak bersekolah</option>
                                    <option value="Tidak ada anak berumur 5-15 tahun yang tidak bersekolah*2">Tidak ada anak berumur 5-15 tahun yang tidak bersekolah</option>
                                </select>
                            </div>
                            <!-- K14 -->
                            <div class="form-group">
                                <label for="input-K14">Keluarga tidak memakai kontrasepsi jika telah mempunyai >= 2 anak</label>
                                <select class="form-control" name="input-K14" id="input-K14" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Keluarga memiliki dua anak atau lebih tidak memakai kontrasepsi*1">Keluarga memiliki dua anak atau lebih tidak memakai kontrasepsi</option>
                                    <option value="Keluarga memiliki dua anak atau lebih memakai kontrasepsi*2">Keluarga memiliki dua anak atau lebih memakai kontrasepsi</option>
                                </select>
                            </div>
                            <!-- K15 -->
                            <div class="form-group">
                                <label for="input-K15">Peningkatan kemampuan agama keluarga</label>
                                <select class="form-control" name="input-K15" id="input-K15" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Keluarga belum dapat meningkatkan pengetahuan agamanya*1">Keluarga belum dapat meningkatkan pengetahuan agamanya</option>
                                    <option value="Keluarga dapat meningkatkan pengetahuan agamanya*2">Keluarga dapat meningkatkan pengetahuan agamanya</option>
                                </select>
                            </div>
                            <!-- K16 -->
                            <div class="form-group">
                                <label for="input-K16">Penghasilan keluarga ditabung</label>
                                <select class="form-control" name="input-K16" id="input-K16" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Sebagian penghasilan keluarga tidak ditabung*1">Sebagian penghasilan keluarga tidak ditabung</option>
                                    <option value="Sebagian penghasilan keluarga ditabung*2">Sebagian penghasilan keluarga ditabung</option>
                                </select>
                            </div>
                            <!-- K17 -->
                            <div class="form-group">
                                <label for="input-K17">Makan bersama dan saling berkomunikasi</label>
                                <select class="form-control" name="input-K17" id="input-K17" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Keluarga tidak dapat makan bersama sekali dalam sehari dan saling berkomunikasi*1">Keluarga tidak dapat makan bersama sekali dalam sehari dan saling berkomunikasi</option>
                                    <option value="Keluarga dapat makan bersama sekali dalam sehari dan saling berkomunikasi*2">Keluarga dapat makan bersama sekali dalam sehari dan saling berkomunikasi</option>
                                </select>
                            </div>
                            <!-- K18 -->
                            <div class="form-group">
                                <label for="input-K18">Partisipasi kegiatan masyarakat</label>
                                <select class="form-control" name="input-K18" id="input-K18" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Keluarga tidak ikut berpartisipasi dalam kegiatan masyarakat*1">Keluarga tidak ikut berpartisipasi dalam kegiatan masyarakat</option>
                                    <option value="Keluarga ikut berpartisipasi dalam kegiatan masyarakat*2">Keluarga ikut berpartisipasi dalam kegiatan masyarakat</option>
                                </select>
                            </div>
                            <!-- K19 -->
                            <div class="form-group">
                                <label for="input-K19">Rekreasi keluarga</label>
                                <select class="form-control" name="input-K19" id="input-K19" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Tidak pernah melakukan rekreasi di luar rumah minimal sekali sebulan*1">Tidak pernah melakukan rekreasi di luar rumah minimal sekali sebulan</option>
                                    <option value="Pernah melakukan rekreasi di luar rumah minimal sekali sebulan*2">Pernah melakukan rekreasi di luar rumah minimal sekali sebulan</option>
                                    <option value="Pernah melakukan rekreasi di luar rumah lebih dari sekali sebulan*3">Pernah melakukan rekreasi di luar rumah lebih dari sekali sebulan</option>
                                </select>
                            </div>
                            <!-- K20 -->
                            <div class="form-group">
                                <label for="input-K20">Akses berita</label>
                                <select class="form-control" name="input-K20" id="input-K20" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Keluarga tidak dapat mengakses berita dari surat kabar, radio, televisi atapun majalah*1">Keluarga tidak dapat mengakses berita dari surat kabar, radio, televisi atapun majalah</option>
                                    <option value="Keluarga dapat mengakses berita dari surat kabar, radio, televisi atapun majalah*2">Keluarga dapat mengakses berita dari surat kabar, radio, televisi atapun majalah</option>
                                </select>
                            </div>

                            <!-- K21 -->
                            <div class="form-group">
                                <label for="input-K21">Penggunaan fasilitas transportasi lokal</label>
                                <select class="form-control" name="input-K21" id="input-K21" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Anggota keluarga tidak dapat menggunakan fasilitas transfortasi lokal*1">Anggota keluarga tidak dapat menggunakan fasilitas transfortasi lokal</option>
                                    <option value="Anggota keluarga dapat menggunakan fasilitas transfortasi lokal*2">Anggota keluarga dapat menggunakan fasilitas transfortasi lokal</option>
                                </select>
                            </div>
                            <!-- K22 -->
                            <div class="form-group">
                                <label for="input-K22">Kontribusi dalam aktivitas sosial</label>
                                <select class="form-control" name="input-K22" id="input-K22" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Keluarga tidak berkontribusi dalam aktivitas sosial*1">Keluarga tidak berkontribusi dalam aktivitas sosial</option>
                                    <option value="Keluarga tidak berkontribusi secara teratur dalam aktivitas sosial*2">Keluarga tidak berkontribusi secara teratur dalam aktivitas sosial</option>
                                    <option value="Keluarga berkontribusi secara teratur dalam aktivitas sosial*3">Keluarga berkontribusi secara teratur dalam aktivitas sosial</option>
                                </select>
                            </div>
                            <!-- K23 -->
                            <div class="form-group">
                                <label for="input-K23">Keaktifan dalam pengelolaan lembaga lokal</label>
                                <select class="form-control" name="input-K23" id="input-K23" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Tidak ada anggota keluarga aktif dalam pengelolaan lembaga lokal*1">Tidak ada anggota keluarga aktif dalam pengelolaan lembaga lokal</option>
                                    <option value="Ada anggota keluarga aktif dalam pengelolaan lembaga lokal*2">Ada anggota keluarga aktif dalam pengelolaan lembaga lokal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="card-title">Kriteria Pedukung Program Bantuan Kemiskinan</h5>
                            <!-- K24 -->
                            <div class="form-group">
                                <label for="input-K24">Atap rumah berlubang dan keropos</label>
                                <select class="form-control" name="input-K24" id="input-K24" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Atap rumah berlubang/keropos*1">Atap rumah berlubang/keropos</option>
                                    <option value="Atap rumah tidak berlubang/keropos*2">Atap rumah tidak berlubang/keropos</option>
                                </select>
                            </div>
                            <!-- K25 -->
                            <div class="form-group">
                                <label for="input-K25">Dinding rumah masih terbuat dari bambu atau dari bata</label>
                                <select class="form-control" name="input-K25" id="input-K25" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Dinding rumah terbuat dari bambu*1">Dinding rumah terbuat dari bambu</option>
                                    <option value="Dinding rumah terbuat dari tembok semen*2">Dinding rumah terbuat dari tembok semen</option>
                                </select>
                            </div>
                            <!-- K26 -->
                            <div class="form-group">
                                <label for="input-K26">Tidak memiliki toilet atau toilet tidak memenuhi standar MCK</label>
                                <select class="form-control" name="input-K26" id="input-K26" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Tidak memiliki toilet*1">Tidak memiliki toilet</option>
                                    <option value="Toilet tidak memenuhi standar MCK*2">Toilet tidak memenuhi standar MCK</option>
                                    <option value="Memiliki toilet dan memenuhi standar MCK*3">Memiliki toilet dan memenuhi standar MCK</option>
                                </select>
                            </div>
                            <!-- K27 -->
                            <div class="form-group">
                                <label for="input-K27">Tanggungan anak</label>
                                <select class="form-control" name="input-K27" id="input-K27" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Tanggungan anak lebih dari 3*1">Tanggungan anak lebih dari 3</option>
                                    <option value="Tanggungan anak 1-2 anak*2">Tanggungan anak 1-2 anak</option>
                                    <option value="Tidak ada tanggungan anak*3">Tidak ada tanggungan anak</option>
                                </select>
                            </div>
                            <!-- K28 -->
                            <div class="form-group">
                                <label for="input-K28">Kepemilikan rumah</label>
                                <select class="form-control" name="input-K28" id="input-K28" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Rumah kontrak*1">Rumah kontrak</option>
                                    <option value="Rumah sendiri*2">Rumah sendiri</option>
                                </select>
                            </div>
                            <!-- K29 -->
                            <div class="form-group">
                                <label for="input-K29">Ibu hamil</label>
                                <select class="form-control" name="input-K29" id="input-K29" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Ada ibu dengan kemahamilan yang pertama*1">Ada ibu dengan kemahamilan yang pertama</option>
                                    <option value="Ada ibu dengan kemahamilan yang kedua*2">Ada ibu dengan kemahamilan yang kedua</option>
                                    <option value="Ada ibu dengan lebih dari dua kali kehamilan*3">Ada ibu dengan lebih dari dua kali kehamilan</option>
                                    <option value="Tidak ada ibu hamil dalam keluarga*4">Tidak ada ibu hamil dalam keluarga</option>
                                </select>
                            </div>
                            <!-- K30 -->
                            <div class="form-group">
                                <label for="input-K30">Anak usia dini</label>
                                <select class="form-control" name="input-K30" id="input-K30" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Ada anak usia dini berusia 0-6 tahun maksimal dua anak*1">Ada anak usia dini berusia 0-6 tahun maksimal dua anak</option>
                                    <option value="Tidak ada anak usia 0-6 tahun*2">Tidak ada anak usia 0-6 tahun</option>
                                </select>
                            </div>
                            <!-- K31 -->
                            <div class="form-group">
                                <label for="input-K31">Anak sekolah</label>
                                <select class="form-control" name="input-K31" id="input-K31" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Ada Anak yang sedang menempuh pendidikan SD atau SMP atau SMA atau yang belum menyelesaikan wajib belajar*1">Ada Anak yang sedang menempuh pendidikan SD atau SMP atau SMA atau yang belum menyelesaikan wajib belajar</option>
                                    <option value="Tidak ada anak yang sedang menempuh pendidikan SD atau SMP atau SMA atau yang belum menyelesaikan wajib belajar*2">Tidak ada anak yang sedang menempuh pendidikan SD atau SMP atau SMA atau yang belum menyelesaikan wajib belajar</option>
                                </select>
                            </div>
                            <!-- K32 -->
                            <div class="form-group">
                                <label for="input-K32">Orang tua/Lansia</label>
                                <select class="form-control" name="input-K32" id="input-K32" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Ada orang tua/lansia dengan umur 60 thn keatas dalam keluarga*1">Ada orang tua/lansia dengan umur 60 thn keatas dalam keluarga</option>
                                    <option value="Tidak ada orang tua/lansia dengan umur 60 thn keatas dalam keluarga*2">Tidak ada orang tua/lansia dengan umur 60 thn keatas dalam keluarga</option>
                                </select>
                            </div>
                            <!-- K33 -->
                            <div class="form-group">
                                <label for="input-K33">Penyandang disabilitas</label>
                                <select class="form-control" name="input-K33" id="input-K33" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Ada penyandang disabilitas dalam keluarga yang tidak dapat melakukan kegitan sehari-hari dan bergantung pada orang lain*1">Ada penyandang disabilitas dalam keluarga yang tidak dapat melakukan kegitan sehari-hari dan bergantung pada orang lain</option>
                                    <option value="Tidak ada penyandang disabilitas dalam keluarga yang tidak dapat melakukan kegitan sehari-hari dan bergantung pada orang lain*2">Tidak ada penyandang disabilitas dalam keluarga yang tidak dapat melakukan kegitan sehari-hari dan bergantung pada orang lain</option>
                                </select>
                            </div>
                            <!-- K34 -->
                            <div class="form-group">
                                <label for="input-K34">Penerangan tempat tinggal</label>
                                <select class="form-control" name="input-K34" id="input-K34" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Penerangan tempat tinggal bukan dari listrik negara*1">Penerangan tempat tinggal bukan dari listrik negara</option>
                                    <option value="Penerangan tempat tinggal menggunakan listrik negara*2">Penerangan tempat tinggal menggunakan listrik negara</option>
                                </select>
                            </div>
                            <!-- K35 -->
                            <div class="form-group">
                                <label for="input-K35">Sumber air</label>
                                <select class="form-control" name="input-K35" id="input-K35" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Sumber konsumsi air keluarga berasal dari mata air tak terlindungi*1">Sumber konsumsi air keluarga berasal dari mata air tak terlindungi</option>
                                    <option value="Sumber konsumsi air keluarga berasal dari PAM*2">Sumber konsumsi air keluarga berasal dari PAM</option>
                                </select>
                            </div>
                            <!-- K36 -->
                            <div class="form-group">
                                <label for="input-K36">Bahan bakar memasak</label>
                                <select class="form-control" name="input-K36" id="input-K36" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Bahan bakar untuk memasak menggunakan kayu bakar*1">Bahan bakar untuk memasak menggunakan kayu bakar</option>
                                    <option value="Bahan bakar untuk memasak menggunakan Gas*2">Bahan bakar untuk memasak menggunakan Gas</option>
                                </select>
                            </div>
                            <!-- K37 -->
                            <div class="form-group">
                                <label for="input-K37">Pekerjaan kepala keluarga</label>
                                <select class="form-control" name="input-K37" id="input-K37" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Pekerjaan serabutan*1">Pekerjaan serabutan</option>
                                    <option value="Pekerjaan tetap*2">Pekerjaan tetap</option>
                                </select>
                            </div>
                            <!-- K38 -->
                            <div class="form-group">
                                <label for="input-K38">Pendidikan tertinggi KK</label>
                                <select class="form-control" name="input-K38" id="input-K38" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Tidak sekolah atau tidak tamat SD atau tamatan SD*1">Tidak sekolah atau tidak tamat SD atau tamatan SD</option>
                                    <option value="Sekolah dengan pendidikan maksimal SMP atau SMA*2">Sekolah dengan pendidikan maksimal SMP atau SMA</option>
                                </select>
                            </div>
                            <!-- K39 -->
                            <div class="form-group">
                                <label for="input-K39">Gelandangan/pengemis</label>
                                <select class="form-control" name="input-K39" id="input-K39" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Ada anggota keluarga menjadi gelandangan/pengemis*1">Ada anggota keluarga menjadi gelandangan/pengemis</option>
                                    <option value="Tidak ada anggota keluarga menjadi gelandangan/pengemis*2">Tidak ada anggota keluarga menjadi gelandangan/pengemis</option>
                                </select>
                            </div>
                            <!-- K40 -->
                            <div class="form-group">
                                <label for="input-K40">Korban Napza</label>
                                <select class="form-control" name="input-K40" id="input-K40" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Ada anggota keluarga yang menjadi korba Napza*1">Ada anggota keluarga yang menjadi korba Napza</option>
                                    <option value="Tidak ada anggota keluarga yang menjadi korban Napza*2">Tidak ada anggota keluarga yang menjadi korban Napza</option>
                                </select>
                            </div>
                            <!-- K41 -->
                            <div class="form-group">
                                <label for="input-K41">Bekas warga binaan</label>
                                <select class="form-control" name="input-K41" id="input-K41" required="true">
                                    <option value="">- Pilih -</option>
                                    <option value="Ada anggota keluarga yang menjadi berkas warga binaan*1">Ada anggota keluarga yang menjadi berkas warga binaan</option>
                                    <option value="Tidak ada anggota keluarga yang menjadi berkas warga binaan*2">Tidak ada anggota keluarga yang menjadi berkas warga binaan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <!-- Jumlah k -->
                            <div class="form-group">
                                <label for="jumlahK">Jumlah K tetangga</label>
                                <input type="number" class="form-control" id="jumlahK" name="jumlahK" aria-describedby="jumlahKHelp" step="2" min="1" max="<?= $data['amount_data_uji']; ?>" required="true" placeholder="Range 1 - <?= $data['amount_data_uji']; ?>">
                                <small id="jumlahKHelp" class="form-text text-muted">Disarankan memasukkan nilai K yang ganjil</small>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="methodType" id="CBRKMeans" value="CBR-KMeans" checked>
                                    <label class="form-check-label" for="CBRKMeans">CBR-KMeans Clustering</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="methodType" id="CBR" value="CBR">
                                    <label class="form-check-label" for="CBR">CBR</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-success" value="" name="btnCariSolusiKasusBaru" id="btnCariSolusiKasusBaru">Solusi</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal kasus uji -->
<form action="<?= BASEURL; ?>pengujian/kasus_uji" method="post">
    <div class="modal fade" id="modalPengujianKasusUji" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalPengujianKasusUjiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header" id="modal-header-kasusuji">
                    <h5 class="modal-title" id="modalPengujianKasusUjiLabel">Pengujian Kasus Uji</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="">
                        Proses pengujian akan menggunakan <span class="font-weight-bold"><?= $data['amount_data_uji']; ?></span> kasus uji. Metode <span class="font-weight-bold">CBR-KMeans</span> dan <span class="font-weight-bold">CBR</span> akan dibandingkan keduanya. Proses perhitungan mungkin membutuhkan waktu beberapa menit.
                    </p>
                    <div class="form-group">
                        <label for="jumlahK">Jumlah K tetangga</label>
                        <input type="number" class="form-control" id="jumlahK" name="jumlahK" aria-describedby="jumlahKHelp" step="2" min="1" max="<?= $data['amount_data_uji']; ?>" required="true" placeholder="Range 1 - <?= $data['amount_data_uji']; ?>">
                        <small id="jumlahKHelp" class="form-text text-muted">Disarankan memasukkan nilai K yang ganjil</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-success" value="" name="btnCariSolusiKasusUji" id="btnCariSolusiKasusUji">Uji</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal retain kasus baru -->
<form action="<?= BASEURL; ?>data/tambah_data" method="post">
    <div class="modal fade" id="modalRetainKasusBaru" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalRetainKasusBaruLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="modalRetainKasusBaruLabel">Simpan Kasus Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="">
                        Proses ini akan menyimpan kasus baru dan solusi yang dihasilkannya sebagai data <span class="font-weight-bold">basis kasus</span> yang bisa digunakan pada proses pengujian berikutnya.
                    </p>
                    <?php
                    $dt_now = date("Y-m-d");
                    $exception_col = ['A1', 'A2', 'A3', 'Class', 'Bantuan'];
                    foreach ($data['daftar_kolom'] as $col) {
                        $name_input = "input-" . $col;
                        if (!in_array($col, $exception_col)) {
                            $value = $data['kasusbaru_original'][$col] . "*" . $data['kasusbaru_transform'][$col];
                        } else {
                            $value = $data['kasusbaru_original'][$col];
                        }
                        echo "<input type='hidden' name='" . $name_input . "' value='" . $value . "'>";
                    }
                    $name_input = 'input-' . "date";
                    echo "<input type='hidden' name='" . $name_input . "' value='" . $dt_now . "'>";
                    $name_input = 'input-' . "type";
                    echo "<input type='hidden' name='" . $name_input . "' value='Kasus Baru'>";
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-success" value="" name="btnRetainKasusBaru" id="btnRetainKasusBaru">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal lihat detail data pengujian kasus baru -->
<div class="modal fade" id="modalDetailKasusBaru" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalDetailKasusBaruLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-dark" style="color: whitesmoke;">
                <h5 class="modal-title" id="modalDetailKasusBaruLabel">Tambah Data Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:whitesmoke">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="read-A1">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control" id="read-A1" required="true" name="read-A1" value="" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="read-A2">Alamat</label>
                            <textarea class="form-control" id="read-A2" rows="3" required="true" name="read-A2" disabled></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="read-A3">Jenis Kelamin</label>
                            <select class="form-control" id="read-A3" required="true" name="read-A3" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Indikator Kemiskinan Rumah Tangga</h5>
                        <!-- K1 -->
                        <div class="form-group">
                            <label for="read-K1">Pelaksanaan ibadah anggota keluarga</label>
                            <select class="form-control" name="read-K1" id="read-K1" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Anggota keluarga tidak melaksanakan ibadah menurut agama*1">Anggota keluarga tidak melaksanakan ibadah menurut agama</option>
                                <option value="Anggota keluarga melaksanakan ibadah menurut agama*2">Anggota keluarga melaksanakan ibadah menurut agama</option>
                            </select>
                        </div>
                        <!-- K2 -->
                        <div class="form-group">
                            <label for="read-K2">Makan minimal 2x sehari</label>
                            <select class="form-control" name="read-K2" id="read-K2" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Makan dua kali atau kurang dalam sehari*1">Makan dua kali atau kurang dalam sehari</option>
                                <option value="Makan lebih dari dua kali sehari*2">Makan lebih dari dua kali sehari</option>
                            </select>
                        </div>
                        <!-- K3 -->
                        <div class="form-group">
                            <label for="read-K3">Pakaian Berbeda Anggota Keluarga</label>
                            <select class="form-control" name="read-K3" id="read-K3" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Tidak memiliki pakaian berbeda dirumah, sekolah, bekerja dan bepergian*1">Tidak memiliki pakaian berbeda dirumah, sekolah, bekerja dan bepergian</option>
                                <option value="Pakaian berbeda dirumah saja*2">Pakaian berbeda dirumah saja</option>
                                <option value="Pakaian berbeda dirumah dan sekolah*3">Pakaian berbeda dirumah dan sekolah</option>
                                <option value="Pakaian berbeda dirumah, sekolah dan bepergian*4">Pakaian berbeda dirumah, sekolah dan bepergian</option>
                                <option value="Pakaian berbeda dirumah dan bekerja*5">Pakaian berbeda dirumah dan bekerja</option>
                                <option value="Pakaian berbeda dirumah, bekerja dan bepergian*6">Pakaian berbeda dirumah, bekerja dan bepergian</option>
                            </select>
                        </div>
                        <!-- K4 -->
                        <div class="form-group">
                            <label for="read-K4">Bagian terluas lantai rumah adalah tanah</label>
                            <select class="form-control" name="read-K4" id="read-K4" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Bagian terluas lantai adalah tanah*1">Bagian terluas lantai adalah tanah</option>
                                <option value="Bagian terluas lantai adalah bukan tanah*2">Bagian terluas lantai adalah bukan tanah</option>
                            </select>
                        </div>
                        <!-- K5 -->
                        <div class="form-group">
                            <label for="read-K5">Anak sakit dibawa ke sarana kesehatan</label>
                            <select class="form-control" name="read-K5" id="read-K5" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Anak sakit tidak dibawa ke sarana kesehatan*1">Anak sakit tidak dibawa ke sarana kesehatan</option>
                                <option value="Anak sakit dibawa ke sarana kesehatan*2">Anak sakit dibawa ke sarana kesehatan</option>
                            </select>
                        </div>
                        <!-- K6 -->
                        <div class="form-group">
                            <label for="read-K6">Ibadah secara teratur</label>
                            <select class="form-control" name="read-K6" id="read-K6" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Anggota keluarga tidak melaksanakan ibadah secara teratur*1">Anggota keluarga tidak melaksanakan ibadah secara teratur</option>
                                <option value="Anggota keluarga melaksanakan ibadah secara teratur*2">Anggota keluarga melaksanakan ibadah secara teratur</option>
                            </select>
                        </div>
                        <!-- K7 -->
                        <div class="form-group">
                            <label for="read-K7">Konsumsi daging/ikan/telur</label>
                            <select class="form-control" name="read-K7" id="read-K7" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Keluarga tidak makan daging/ikan/telur minimal seminggu sekali*1">Keluarga tidak makan daging/ikan/telur minimal seminggu sekali</option>
                                <option value="Keluarga makan daging/ikan/telur minimal seminggu sekali*2">Keluarga makan daging/ikan/telur minimal seminggu sekali</option>
                                <option value="Keluarga makan daging/ikan/telur lebih dari sekali dalam seminggu*3">Keluarga makan daging/ikan/telur lebih dari sekali dalam seminggu</option>
                            </select>
                        </div>
                        <!-- K8 -->
                        <div class="form-group">
                            <label for="read-K8">Perolehan pakaian stel baru</label>
                            <select class="form-control" name="read-K8" id="read-K8" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Anggota keluarga tidak memperoleh satu stel pakaian baru dalam setahun*1">Anggota keluarga tidak memperoleh satu stel pakaian baru dalam setahun</option>
                                <option value="Anggota keluarga memperoleh satu stel pakaian baru dalam setahun*2">Anggota keluarga memperoleh satu stel pakaian baru dalam setahun</option>
                                <option value="Anggota keluarga memperoleh lebih dari satu stel pakaian baru dalam setahun*3">Anggota keluarga memperoleh lebih dari satu stel pakaian baru dalam setahun</option>
                            </select>
                        </div>
                        <!-- K9 -->
                        <div class="form-group">
                            <label for="read-K9">Luas minimal lantai rumah (8m^2)</label>
                            <select class="form-control" name="read-K9" id="read-K9" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Luas lantai rumah perpenghuni yaitu kurang dari 8 m2*1">Luas lantai rumah perpenghuni yaitu kurang dari 8 m2</option>
                                <option value="Luas lantai rumah perpenghuni yaitu 8 m2 atau lebih*2">Luas lantai rumah perpenghuni yaitu 8 m2 atau lebih</option>
                            </select>
                        </div>
                        <!-- K10 -->
                        <div class="form-group">
                            <label for="read-K10">Keluarga sakit 3 bulan terakhir</label>
                            <select class="form-control" name="read-K10" id="read-K10" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Ada anggota keluarga sakit tiga bulan terakhir atau kurang*1">Ada anggota keluarga sakit tiga bulan terakhir atau kurang</option>
                                <option value="Tidak ada anggota keluarga sakit tiga bulan terakhir atau kurang*2">Tidak ada anggota keluarga sakit tiga bulan terakhir atau kurang</option>
                            </select>
                        </div>
                        <!-- K11 -->
                        <div class="form-group">
                            <label for="read-K11">Anggota keluarga (>15 tahun) yang berpenghasilan tetap</label>
                            <select class="form-control" name="read-K11" id="read-K11" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Tidak ada anggota keluarga berumur 15 tahun ke atas berpenghasilan tetap*1">Tidak ada anggota keluarga berumur 15 tahun ke atas berpenghasilan tetap</option>
                                <option value="Ada anggota keluarga berumur 15 tahun ke atas berpenghasilan tetap*2">Ada anggota keluarga berumur 15 tahun ke atas berpenghasilan tetap</option>
                            </select>
                        </div>
                        <!-- K12 -->
                        <div class="form-group">
                            <label for="read-K12">Ada keluarga yang tidak bisa baca-tulis</label>
                            <select class="form-control" name="read-K12" id="read-K12" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Ada anggota keluarga berumur 10-60 tahun tidak bisa baca tulis*1">Ada anggota keluarga berumur 10-60 tahun tidak bisa baca tulis</option>
                                <option value="Tidak ada anggota keluarga berumur 10-60 tahun tidak bisa baca tulis*2">Tidak ada anggota keluarga berumur 10-60 tahun tidak bisa baca tulis</option>
                            </select>
                        </div>
                        <!-- K13 -->
                        <div class="form-group">
                            <label for="read-K13">Ada anak (5-15) tahun yang tidak bersekolah</label>
                            <select class="form-control" name="read-K13" id="read-K13" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Ada anak berumur 5-15 tahun yang tidak bersekolah*1">Ada anak berumur 5-15 tahun yang tidak bersekolah</option>
                                <option value="Tidak ada anak berumur 5-15 tahun yang tidak bersekolah*2">Tidak ada anak berumur 5-15 tahun yang tidak bersekolah</option>
                            </select>
                        </div>
                        <!-- K14 -->
                        <div class="form-group">
                            <label for="read-K14">Keluarga tidak memakai kontrasepsi jika telah mempunyai >= 2 anak</label>
                            <select class="form-control" name="read-K14" id="read-K14" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Keluarga memiliki dua anak atau lebih tidak memakai kontrasepsi*1">Keluarga memiliki dua anak atau lebih tidak memakai kontrasepsi</option>
                                <option value="Keluarga memiliki dua anak atau lebih memakai kontrasepsi*2">Keluarga memiliki dua anak atau lebih memakai kontrasepsi</option>
                            </select>
                        </div>
                        <!-- K15 -->
                        <div class="form-group">
                            <label for="read-K15">Peningkatan kemampuan agama keluarga</label>
                            <select class="form-control" name="read-K15" id="read-K15" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Keluarga belum dapat meningkatkan pengetahuan agamanya*1">Keluarga belum dapat meningkatkan pengetahuan agamanya</option>
                                <option value="Keluarga dapat meningkatkan pengetahuan agamanya*2">Keluarga dapat meningkatkan pengetahuan agamanya</option>
                            </select>
                        </div>
                        <!-- K16 -->
                        <div class="form-group">
                            <label for="read-K16">Penghasilan keluarga ditabung</label>
                            <select class="form-control" name="read-K16" id="read-K16" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Sebagian penghasilan keluarga tidak ditabung*1">Sebagian penghasilan keluarga tidak ditabung</option>
                                <option value="Sebagian penghasilan keluarga ditabung*2">Sebagian penghasilan keluarga ditabung</option>
                            </select>
                        </div>
                        <!-- K17 -->
                        <div class="form-group">
                            <label for="read-K17">Makan bersama dan saling berkomunikasi</label>
                            <select class="form-control" name="read-K17" id="read-K17" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Keluarga tidak dapat makan bersama sekali dalam sehari dan saling berkomunikasi*1">Keluarga tidak dapat makan bersama sekali dalam sehari dan saling berkomunikasi</option>
                                <option value="Keluarga dapat makan bersama sekali dalam sehari dan saling berkomunikasi*2">Keluarga dapat makan bersama sekali dalam sehari dan saling berkomunikasi</option>
                            </select>
                        </div>
                        <!-- K18 -->
                        <div class="form-group">
                            <label for="read-K18">Partisipasi kegiatan masyarakat</label>
                            <select class="form-control" name="read-K18" id="read-K18" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Keluarga tidak ikut berpartisipasi dalam kegiatan masyarakat*1">Keluarga tidak ikut berpartisipasi dalam kegiatan masyarakat</option>
                                <option value="Keluarga ikut berpartisipasi dalam kegiatan masyarakat*2">Keluarga ikut berpartisipasi dalam kegiatan masyarakat</option>
                            </select>
                        </div>
                        <!-- K19 -->
                        <div class="form-group">
                            <label for="read-K19">Rekreasi keluarga</label>
                            <select class="form-control" name="read-K19" id="read-K19" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Tidak pernah melakukan rekreasi di luar rumah minimal sekali sebulan*1">Tidak pernah melakukan rekreasi di luar rumah minimal sekali sebulan</option>
                                <option value="Pernah melakukan rekreasi di luar rumah minimal sekali sebulan*2">Pernah melakukan rekreasi di luar rumah minimal sekali sebulan</option>
                                <option value="Pernah melakukan rekreasi di luar rumah lebih dari sekali sebulan*3">Pernah melakukan rekreasi di luar rumah lebih dari sekali sebulan</option>
                            </select>
                        </div>
                        <!-- K20 -->
                        <div class="form-group">
                            <label for="read-K20">Akses berita</label>
                            <select class="form-control" name="read-K20" id="read-K20" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Keluarga tidak dapat mengakses berita dari surat kabar, radio, televisi atapun majalah*1">Keluarga tidak dapat mengakses berita dari surat kabar, radio, televisi atapun majalah</option>
                                <option value="Keluarga dapat mengakses berita dari surat kabar, radio, televisi atapun majalah*2">Keluarga dapat mengakses berita dari surat kabar, radio, televisi atapun majalah</option>
                            </select>
                        </div>

                        <!-- K21 -->
                        <div class="form-group">
                            <label for="read-K21">Penggunaan fasilitas transportasi lokal</label>
                            <select class="form-control" name="read-K21" id="read-K21" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Anggota keluarga tidak dapat menggunakan fasilitas transfortasi lokal*1">Anggota keluarga tidak dapat menggunakan fasilitas transfortasi lokal</option>
                                <option value="Anggota keluarga dapat menggunakan fasilitas transfortasi lokal*2">Anggota keluarga dapat menggunakan fasilitas transfortasi lokal</option>
                            </select>
                        </div>
                        <!-- K22 -->
                        <div class="form-group">
                            <label for="read-K22">Kontribusi dalam aktivitas sosial</label>
                            <select class="form-control" name="read-K22" id="read-K22" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Keluarga tidak berkontribusi dalam aktivitas sosial*1">Keluarga tidak berkontribusi dalam aktivitas sosial</option>
                                <option value="Keluarga tidak berkontribusi secara teratur dalam aktivitas sosial*2">Keluarga tidak berkontribusi secara teratur dalam aktivitas sosial</option>
                                <option value="Keluarga berkontribusi secara teratur dalam aktivitas sosial*3">Keluarga berkontribusi secara teratur dalam aktivitas sosial</option>
                            </select>
                        </div>
                        <!-- K23 -->
                        <div class="form-group">
                            <label for="read-K23">Keaktifan dalam pengelolaan lembaga lokal</label>
                            <select class="form-control" name="read-K23" id="read-K23" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Tidak ada anggota keluarga aktif dalam pengelolaan lembaga lokal*1">Tidak ada anggota keluarga aktif dalam pengelolaan lembaga lokal</option>
                                <option value="Ada anggota keluarga aktif dalam pengelolaan lembaga lokal*2">Ada anggota keluarga aktif dalam pengelolaan lembaga lokal</option>
                            </select>
                        </div>
                        <!-- Tingkat Kemiskinan -->
                        <div class="form-group">
                            <label for="read-Class"><strong>Tingkat Kemiskinan Masyarakat</strong></label>
                            <select class="form-control" name="read-Class" id="read-Class" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="KS III Plus">KS III Plus</option>
                                <option value="KS III">KS III</option>
                                <option value="KS II">KS II</option>
                                <option value="KS I">KS I</option>
                                <option value="KPS">KPS</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <h5 class="card-title">Kriteria Pedukung Program Bantuan Kemiskinan</h5>
                        <!-- K24 -->
                        <div class="form-group">
                            <label for="read-K24">Atap rumah berlubang dan keropos</label>
                            <select class="form-control" name="read-K24" id="read-K24" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Atap rumah berlubang/keropos*1">Atap rumah berlubang/keropos</option>
                                <option value="Atap rumah tidak berlubang/keropos*2">Atap rumah tidak berlubang/keropos</option>
                            </select>
                        </div>
                        <!-- K25 -->
                        <div class="form-group">
                            <label for="read-K25">Dinding rumah masih terbuat dari bambu atau dari bata</label>
                            <select class="form-control" name="read-K25" id="read-K25" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Dinding rumah terbuat dari bambu*1">Dinding rumah terbuat dari bambu</option>
                                <option value="Dinding rumah terbuat dari tembok semen*2">Dinding rumah terbuat dari tembok semen</option>
                            </select>
                        </div>
                        <!-- K26 -->
                        <div class="form-group">
                            <label for="read-K26">Tidak memiliki toilet atau toilet tidak memenuhi standar MCK</label>
                            <select class="form-control" name="read-K26" id="read-K26" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Tidak memiliki toilet*1">Tidak memiliki toilet</option>
                                <option value="Toilet tidak memenuhi standar MCK*2">Toilet tidak memenuhi standar MCK</option>
                                <option value="Memiliki toilet dan memenuhi standar MCK*3">Memiliki toilet dan memenuhi standar MCK</option>
                            </select>
                        </div>
                        <!-- K27 -->
                        <div class="form-group">
                            <label for="read-K27">Tanggungan anak</label>
                            <select class="form-control" name="read-K27" id="read-K27" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Tanggungan anak lebih dari 3*1">Tanggungan anak lebih dari 3</option>
                                <option value="Tanggungan anak 1-2 anak*2">Tanggungan anak 1-2 anak</option>
                                <option value="Tidak ada tanggungan anak*3">Tidak ada tanggungan anak</option>
                            </select>
                        </div>
                        <!-- K28 -->
                        <div class="form-group">
                            <label for="read-K28">Kepemilikan rumah</label>
                            <select class="form-control" name="read-K28" id="read-K28" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Rumah kontrak*1">Rumah kontrak</option>
                                <option value="Rumah sendiri*2">Rumah sendiri</option>
                            </select>
                        </div>
                        <!-- K29 -->
                        <div class="form-group">
                            <label for="read-K29">Ibu hamil</label>
                            <select class="form-control" name="read-K29" id="read-K29" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Ada ibu dengan kemahamilan yang pertama*1">Ada ibu dengan kemahamilan yang pertama</option>
                                <option value="Ada ibu dengan kemahamilan yang kedua*2">Ada ibu dengan kemahamilan yang kedua</option>
                                <option value="Ada ibu dengan lebih dari dua kali kehamilan*3">Ada ibu dengan lebih dari dua kali kehamilan</option>
                                <option value="Tidak ada ibu hamil dalam keluarga*4">Tidak ada ibu hamil dalam keluarga</option>
                            </select>
                        </div>
                        <!-- K30 -->
                        <div class="form-group">
                            <label for="read-K30">Anak usia dini</label>
                            <select class="form-control" name="read-K30" id="read-K30" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Ada anak usia dini berusia 0-6 tahun maksimal dua anak*1">Ada anak usia dini berusia 0-6 tahun maksimal dua anak</option>
                                <option value="Tidak ada anak usia 0-6 tahun*2">Tidak ada anak usia 0-6 tahun</option>
                            </select>
                        </div>
                        <!-- K31 -->
                        <div class="form-group">
                            <label for="read-K31">Anak sekolah</label>
                            <select class="form-control" name="read-K31" id="read-K31" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Ada Anak yang sedang menempuh pendidikan SD atau SMP atau SMA atau yang belum menyelesaikan wajib belajar*1">Ada Anak yang sedang menempuh pendidikan SD atau SMP atau SMA atau yang belum menyelesaikan wajib belajar</option>
                                <option value="Tidak ada anak yang sedang menempuh pendidikan SD atau SMP atau SMA atau yang belum menyelesaikan wajib belajar*2">Tidak ada anak yang sedang menempuh pendidikan SD atau SMP atau SMA atau yang belum menyelesaikan wajib belajar</option>
                            </select>
                        </div>
                        <!-- K32 -->
                        <div class="form-group">
                            <label for="read-K32">Orang tua/Lansia</label>
                            <select class="form-control" name="read-K32" id="read-K32" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Ada orang tua/lansia dengan umur 60 thn keatas dalam keluarga*1">Ada orang tua/lansia dengan umur 60 thn keatas dalam keluarga</option>
                                <option value="Tidak ada orang tua/lansia dengan umur 60 thn keatas dalam keluarga*2">Tidak ada orang tua/lansia dengan umur 60 thn keatas dalam keluarga</option>
                            </select>
                        </div>
                        <!-- K33 -->
                        <div class="form-group">
                            <label for="read-K33">Penyandang disabilitas</label>
                            <select class="form-control" name="read-K33" id="read-K33" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Ada penyandang disabilitas dalam keluarga yang tidak dapat melakukan kegitan sehari-hari dan bergantung pada orang lain*1">Ada penyandang disabilitas dalam keluarga yang tidak dapat melakukan kegitan sehari-hari dan bergantung pada orang lain</option>
                                <option value="Tidak ada penyandang disabilitas dalam keluarga yang tidak dapat melakukan kegitan sehari-hari dan bergantung pada orang lain*2">Tidak ada penyandang disabilitas dalam keluarga yang tidak dapat melakukan kegitan sehari-hari dan bergantung pada orang lain</option>
                            </select>
                        </div>
                        <!-- K34 -->
                        <div class="form-group">
                            <label for="read-K34">Penerangan tempat tinggal</label>
                            <select class="form-control" name="read-K34" id="read-K34" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Penerangan tempat tinggal bukan dari listrik negara*1">Penerangan tempat tinggal bukan dari listrik negara</option>
                                <option value="Penerangan tempat tinggal menggunakan listrik negara*2">Penerangan tempat tinggal menggunakan listrik negara</option>
                            </select>
                        </div>
                        <!-- K35 -->
                        <div class="form-group">
                            <label for="read-K35">Sumber air</label>
                            <select class="form-control" name="read-K35" id="read-K35" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Sumber konsumsi air keluarga berasal dari mata air tak terlindungi*1">Sumber konsumsi air keluarga berasal dari mata air tak terlindungi</option>
                                <option value="Sumber konsumsi air keluarga berasal dari PAM*2">Sumber konsumsi air keluarga berasal dari PAM</option>
                            </select>
                        </div>
                        <!-- K36 -->
                        <div class="form-group">
                            <label for="read-K36">Bahan bakar memasak</label>
                            <select class="form-control" name="read-K36" id="read-K36" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Bahan bakar untuk memasak menggunakan kayu bakar*1">Bahan bakar untuk memasak menggunakan kayu bakar</option>
                                <option value="Bahan bakar untuk memasak menggunakan Gas*2">Bahan bakar untuk memasak menggunakan Gas</option>
                            </select>
                        </div>
                        <!-- K37 -->
                        <div class="form-group">
                            <label for="read-K37">Pekerjaan kepala keluarga</label>
                            <select class="form-control" name="read-K37" id="read-K37" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Pekerjaan serabutan*1">Pekerjaan serabutan</option>
                                <option value="Pekerjaan tetap*2">Pekerjaan tetap</option>
                            </select>
                        </div>
                        <!-- K38 -->
                        <div class="form-group">
                            <label for="read-K38">Pendidikan tertinggi KK</label>
                            <select class="form-control" name="read-K38" id="read-K38" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Tidak sekolah atau tidak tamat SD atau tamatan SD*1">Tidak sekolah atau tidak tamat SD atau tamatan SD</option>
                                <option value="Sekolah dengan pendidikan maksimal SMP atau SMA*2">Sekolah dengan pendidikan maksimal SMP atau SMA</option>
                            </select>
                        </div>
                        <!-- K39 -->
                        <div class="form-group">
                            <label for="read-K39">Gelandangan/pengemis</label>
                            <select class="form-control" name="read-K39" id="read-K39" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Ada anggota keluarga menjadi gelandangan/pengemis*1">Ada anggota keluarga menjadi gelandangan/pengemis</option>
                                <option value="Tidak ada anggota keluarga menjadi gelandangan/pengemis*2">Tidak ada anggota keluarga menjadi gelandangan/pengemis</option>
                            </select>
                        </div>
                        <!-- K40 -->
                        <div class="form-group">
                            <label for="read-K40">Korban Napza</label>
                            <select class="form-control" name="read-K40" id="read-K40" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Ada anggota keluarga yang menjadi korba Napza*1">Ada anggota keluarga yang menjadi korba Napza</option>
                                <option value="Tidak ada anggota keluarga yang menjadi korban Napza*2">Tidak ada anggota keluarga yang menjadi korban Napza</option>
                            </select>
                        </div>
                        <!-- K41 -->
                        <div class="form-group">
                            <label for="read-K41">Bekas warga binaan</label>
                            <select class="form-control" name="read-K41" id="read-K41" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Ada anggota keluarga yang menjadi berkas warga binaan*1">Ada anggota keluarga yang menjadi berkas warga binaan</option>
                                <option value="Tidak ada anggota keluarga yang menjadi berkas warga binaan*2">Tidak ada anggota keluarga yang menjadi berkas warga binaan</option>
                            </select>
                        </div>
                        <!-- Program Bantuan -->
                        <div class="form-group">
                            <label for="read-Bantuan"><strong>Program Bantuan Pemerintah</strong></label>
                            <select class="form-control" name="read-Bantuan" id="read-Bantuan" required="true" disabled>
                                <option value="">- Pilih -</option>
                                <option value="Program Bantuan Sosial Tunai">Program Bantuan Sosial Tunai</option>
                                <option value="Program Keluarga Harapan">Program Keluarga Harapan</option>
                                <option value="Program Raskin">Program Raskin</option>
                                <option value="Program Bantuan Langsung Tunai">Program Bantuan Langsung Tunai</option>
                                <option value="Program Perlindungan dan Jaminan Sosial">Program Perlindungan dan Jaminan Sosial</option>
                                <option value="Program Bedah Rumah">Program Bedah Rumah</option>
                                <option value="Program Penerima Bantuan Iuran">Program Penerima Bantuan Iuran</option>
                                <option value="Program Pangan Non Tunai">Program Pangan Non Tunai</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>