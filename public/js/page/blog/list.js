let table;
$(() => {
    $("#table-data").on("click", ".btn-delete", function () {
        let data = table.row($(this).closest("tr")).data();

        let { id, title } = data;

        Swal.fire({
            title: "Anda yakin?",
            html: `Anda akan menghapus blog "<b>${title}</b>"!`,
            footer: "Data yang sudah dihapus tidak bisa dikembalikan kembali!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(BASE_URL + "blog/delete", {
                    id,
                    _method: "DELETE",
                })
                    .done((res) => {
                        showSuccessToastr("sukses", "Blog berhasil dihapus");
                        table.ajax.reload();
                    })
                    .fail((res) => {
                        let { status, responseJSON } = res;
                        showErrorToastr("oops", responseJSON.msg);
                    });
            }
        });
    });

    $("#form-blog-update").on("submit", function (e) {
        e.preventDefault();

        var data = new FormData(this);

        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: () => {
                clearErrorMessage();
                $("#modal-blog-update")
                    .find(".modal-dialog")
                    .LoadingOverlay("show");
            },
            success: (res) => {
                $("#modal-blog-update")
                    .find(".modal-dialog")
                    .LoadingOverlay("hide", true);
                $(this)[0].reset();
                clearErrorMessage();
                table.ajax.reload();
                $("#modal-blog-update").modal("hide");
            },
            error: ({ status, responseJSON }) => {
                $("#modal-blog-update")
                    .find(".modal-dialog")
                    .LoadingOverlay("hide", true);

                if (status == 422) {
                    generateErrorMessage(responseJSON);
                    return false;
                }

                showErrorToastr("oops", responseJSON.msg);
            },
        });
    });

    $("#table-data").on("click", ".btn-update", function () {
        var tr = $(this).closest("tr");
        var data = table.row(tr).data();

        clearErrorMessage();
        $("#form-blog-update")[0].reset();

        $.each(data, (key, value) => {
            $("#update-" + key).val(value);
        });

        $("#modal-blog-update").modal("show");
    });

    $("#form-blog").on("submit", function (e) {
        e.preventDefault();

        var data = new FormData(this);

        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: () => {
                clearErrorMessage();
                $("#modal-blog").find(".modal-dialog").LoadingOverlay("show");
            },
            success: (res) => {
                $("#modal-blog")
                    .find(".modal-dialog")
                    .LoadingOverlay("hide", true);
                $(this)[0].reset();
                clearErrorMessage();
                table.ajax.reload();
                $("#modal-blog").modal("hide");
            },
            error: ({ status, responseJSON }) => {
                $("#modal-blog")
                    .find(".modal-dialog")
                    .LoadingOverlay("hide", true);

                if (status == 422) {
                    generateErrorMessage(responseJSON);
                    return false;
                }

                showErrorToastr("oops", responseJSON.msg);
            },
        });
    });

    $(".btn-tambah").on("click", function () {
        $("#form-blog")[0].reset();
        clearErrorMessage();
        $("#modal-blog").modal("show");
    });

    table = $("#table-data").DataTable({
        processing: true,
        serverSide: true,
        language: dtLang,
        ajax: {
            url: BASE_URL + "blog/data",
            type: "get",
            dataType: "json",
        },
        order: [[3, "desc"]],
        columnDefs: [
            {
                targets: [0, 2],
                searchable: false,
                orderable: false,
                className: "text-center align-top",
            },
            {
                targets: [1, 3],
                className: "text-left align-top",
            },
            {
                targets: [4],
                visible: false,
            },
        ],
        columns: [
            {
                data: "DT_RowIndex",
            },
            {
                data: "title",
            },
            {
                data: "body",
            },
            {
                data: "id",
                render: (data, row) => {
                    const button_edit = $("<button>", {
                        class: "btn btn-primary btn-update",
                        html: '<i class="bx bx-pencil"></i>',
                        "data-id": data,
                        title: "Update Data",
                        "data-placement": "top",
                        "data-toggle": "tooltip",
                    });

                    const button_delete = $("<button>", {
                        class: "btn btn-danger btn-delete",
                        html: '<i class="bx bx-trash"></i>',
                        "data-id": data,
                        title: "Delete Data",
                        "data-placement": "top",
                        "data-toggle": "tooltip",
                    });

                    return $("<div>", {
                        class: "btn-group",
                        html: () => {
                            let arr = [];

                            if (permissions.update) {
                                arr.push(button_edit);
                            }
                            // if (UPDATE) arr.push(button_edit)
                            if (permissions.delete) arr.push(button_delete);

                            return arr;
                        },
                    }).prop("outerHTML");
                },
            },
            {
                data: "created_at",
            },
        ],
    });
});
