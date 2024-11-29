$(document).ready(function () {
    // start index
    $(".sweetalert-params-delete").click(function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest("form").submit();
            } else {
                Swal.fire(
                    "Cancelled",
                    "Your imaginary file is safe :)",
                    "error"
                );
            }
        });
    });
    // end index

    // start add
    $(".selectize").each(function () {
        NiceSelect.bind(this);
    });

    $(".search-select").each(function () {
        NiceSelect.bind(this, {
            searchable: true,
        });
    });

    $(".cinp-image").on("click", function (e) {
        e.preventDefault();
        $("#inp-image").trigger("click");
    });

    $("#inp-image").on("change", function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#default-image").hide();
                $("#cpreview-image").removeClass("hidden");
                $("#cpreview-image").addClass("flex");
                $("#preview-image").attr("src", e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
    // end add
});
