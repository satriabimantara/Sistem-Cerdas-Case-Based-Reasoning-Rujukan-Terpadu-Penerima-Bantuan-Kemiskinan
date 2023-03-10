<div class="footer ">
    <footer>
        <h4 class="copyright">
            Copyright © 2021 I Wayan Supriana, S.Si., M.Cs.
        </h4>
    </footer>
</div>

</div>
</div>
<!-- Modal Logout -->
<form action="<?= BASEURL; ?>login/logout" method="post">
    <div class="modal fade" id="modalLogoutUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalLogoutUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLogoutUserLabel">Logout Sistem Cerdas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body" id="modal-body-logout">
                        <div class="alert alert-danger" role="alert">
                            Anda yakin ingin keluar dari Sistem Cerdas Bantuan Kemiskinan? <br>
                            Tekan tombol "<strong>Logout</strong>" untuk mengonfirmasinya!
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-success" value="" name="btnSubmitLogoutUser" id="btnSubmitLogoutUser">Logout</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- jquery -->
<script type="text/javascript" src="<?= BASEURL; ?>js/jquery.js"></script>
<!-- Popper -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<!-- Bootstrap -->
<script src="<?= BASEURL; ?>js/bootstrap.js"></script>
<!-- Adding our script -->
<script src="<?= BASEURL; ?>js/script.js"></script>
<!-- Custom jquery -->
<script type="text/javascript" src="<?= BASEURL; ?>js/jquerycustom.js"></script>
<!-- Data table properties -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>

<!-- Adding sidebar css -->
<script src="<?= BASEURL; ?>js/sidebar.js" type="text/javascript"></script>
</body>
<!-- Adding tables.js -->
<script type="text/javascript" src="<?= BASEURL; ?>js/tables.js"></script>
<!-- Adding our script -->
<script src="<?= BASEURL; ?>js/script.js"></script>
</body>

</html>