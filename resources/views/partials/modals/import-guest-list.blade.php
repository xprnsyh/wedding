<div class="modal fade" tabindex="-1" id="modal_import_guest_list">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('import.guest.list')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title">Import Guest List</h3>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                </div>

                <div class="modal-body d-grid gap-5">
                    <div>
                        <h3>1. Download Contoh File</h3>
                        <div class="d-grid gap-1">
                            <label class="form-label gray-600">Tekan Tombol Download dibawah untuk mendapatakan contoh
                                file</label>
                            <a href="{{ route('sample.guest.list') }}" class="btn btn-light-success">Download</a>
                        </div>
                    </div>
                    <div>
                        <h3>2. Upload File</h3>
                        <div class="">
                            <label class="form-label required gray-600">File dalam format .xls, atau .xlsx. Maks. 2
                                MB</label>
                            <input type="file" class="form-control" name="document_file" required />
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
