<?php
class Navbar_list_model
{
    private $data;
    public function __construct()
    {
        $this->data = array();
    }
    public function page_data()
    {
        $this->data['nav_list'] = array(
            ' <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#modalSplittingData" href="' . BASEURL . 'data/">Pembagian Data Set</a></li>',
            ' <li class="nav-item"><a class="nav-link" href="' . BASEURL . 'data/basis_kasus">Basis Kasus</a></li>',
            ' <li class="nav-item"><a class="nav-link" href="' . BASEURL . 'data/kasus_uji">Kasus Uji</a></li>',
        );
        return $this->data['nav_list'];
    }
    public function page_metode()
    {
        $this->data['nav_list'] = array(
            ' <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#modalCariKlusterOptimal" href="' . BASEURL . 'metode/">Cari Kluster Optimal</a></li>',
            ' <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#modalKMeans" href="' . BASEURL . 'metode/">Indexing K-Means</a></li>',
        );
        return $this->data['nav_list'];
    }
    public function page_pengujian()
    {
        $this->data['nav_list'] = array(
            ' <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#modalPengujianKasusBaru" href="' . BASEURL . 'pengujian/"> Pengujian Kasus Baru</a></li>',
            ' <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#modalPengujianKasusUji" href="' . BASEURL . 'pengujian/kasus_uji">Pengujian Kasus Uji</a></li>',
            '<li class="nav-item"><a class="nav-link" href="' . BASEURL . 'pengujian/data_kasusbaru">Data Kasus Baru</a></li>'
        );
        return $this->data['nav_list'];
    }
}
