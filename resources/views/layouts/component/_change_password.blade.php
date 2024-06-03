<!-- sample modal content -->
<div id="modal-change-password" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal-change-passwordLabel" aria-hidden="true">
    <form action="{{ route('users.change-password') }}" method="post" id="form-change-password" autocomplete="off">
        @method('PATCH')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-change-passwordLabel">Form Ganti Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="update-password">Kata Sandi</label>
                        <input type="password" name="password" id="update-password" class="form-control"
                            placeholder="Masukkan Kata Sandi" required>
                        <div id="error-update-password"></div>
                    </div>
                    <div class="form-group">
                        <label for="update-confirmation_password">Konfirmasi Kata Sandi</label>
                        <input type="password" name="confirmation_password" id="update-confirmation_password"
                            class="form-control" placeholder="Masukkan Nama Lengkap" required>
                        <div id="error-update-confirmation_password"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </form>
</div><!-- /.modal -->