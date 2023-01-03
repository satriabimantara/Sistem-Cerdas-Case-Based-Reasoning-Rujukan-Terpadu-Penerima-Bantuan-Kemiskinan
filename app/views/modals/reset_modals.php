<!-- Modal reset seluruh data -->
<form action="<?= BASEURL; ?>reset/reset_all" method="post">
    <div class="modal fade" id="modalResetSeluruhData" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalResetSeluruhDataLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="modalResetSeluruhDataLabel">Reset Seluruh Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="">
                        Yakin ingin mereset seluruh data? Anda <span class="font-weight-bold">tidak bisa mengembalikannya seperti semula!</span>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-danger" value="" name="btnResetSeluruhData" id="btnResetSeluruhData">Reset</button>
                </div>
            </div>
        </div>
    </div>
</form>