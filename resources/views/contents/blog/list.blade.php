@extends('layouts.app')

@php
    $plugins = ['datatable', 'swal'];
@endphp

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('affected'))
                        <div class="alert alert-success" role="alert">
                            Data berhasil disimpan!
                        </div>
                    @endif
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="text-sm-right">
                                <button type="button"
                                    class="btn btn-success btn-rounded waves-effect waves-light btn-tambah"><i
                                        class="bx bx-plus-circle mr-1"></i> Tambah</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table class="table table-striped" id="table-data" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th>Judul</th>
                                    <th>Konten</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- sample modal content -->
    <div id="modal-blog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-blogLabel"
        aria-hidden="true">
        <form action="{{ route('blog.store') }}" method="post" id="form-blog" autocomplete="off">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="modal-blogLabel">Form Blog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Judul Blog</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Masukkan Judul Blog" required>
                            <div id="error-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="body">Isi Blog</label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control" required
                                placeholder="masukkan isi blog.."></textarea>
                            <div id="error-body"></div>
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

    <!-- sample modal content -->
    <div id="modal-blog-update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-blog-updateLabel"
        aria-hidden="true">
        <form action="{{ route('blog.update') }}" method="post" id="form-blog-update" autocomplete="off">
            <input type="hidden" name="id" id="update-id">
            @method('PATCH')
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="modal-blog-updateLabel">Form Blog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="update-title">Judul Blog</label>
                            <input type="text" name="title" id="update-title" class="form-control"
                                placeholder="Masukkan Judul Blog" required>
                            <div id="error-update-title"></div>
                        </div>
                        <div class="form-group">
                            <label for="update-body">Isi Blog</label>
                            <textarea name="body" id="update-body" cols="30" rows="10" class="form-control" required></textarea>
                            <div id="error-update-body"></div>
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
@endsection

@push('scripts')
    <script src="{{ asset('js/page/blog/list.js?q=' . Str::random(5)) }}"></script>
@endpush
