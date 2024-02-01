$(document).ready(function () {
    $(".edit-btn").click(function (e) {
        e.preventDefault();
        let id = $(this).data("id");

        $.ajax({
            url: route("company.status.edit", { id }),
            type: "GET",
            dataType: "json",
            success: function (obj) {
                $("#editName").val(obj.data.name);
                $("#statusID").val(obj.data.id);
                $("#statusEditModal").modal("show");
            },
            error: function (data) {
                toastr.error(data.responseJSON.message);
            },
        });
    });

    $("#formStatusUpdate").on("submit", function (e) {
        e.preventDefault();
        let id = $("#statusID").val();
        $.ajax({
            url: route("company.status.update", { id }),
            type: "post",
            dataType: "json",
            data: $(this).serialize(),
            success: function (obj) {
                toastr.success(obj.message);
                $("#statusEditModal").modal("hide");
                refreshDatatable();
            },
            error: function (data) {
                toastr.error(data.responseJSON.message);
            },
        });
    });
});
