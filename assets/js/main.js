$(function () {
  let formsAddModelOrDataset =
    document.getElementsByClassName("form-add-product");
  let validationModelOrDataset = Array.prototype.filter.call(
    formsAddModelOrDataset,
    function (form) {
      form.addEventListener(
        "submit",
        function (event) {
          if (form.checkValidity() === !1 && isValidFiles) {
            event.preventDefault();
            event.stopPropagation();
          } else {
            event.preventDefault();
            $(".preloader").removeClass("d-none");
            let formData = new FormData();

            if ($('input[name="name"]').val() != undefined)
              formData.append("name", $('input[name="name"]').val());

            if ($('input[name="price"]').val() != undefined)
              formData.append("price", $('input[name="price"]').val());

            if ($('input[name="date"]').val() != undefined)
              formData.append("date", $('input[name="date"]').val());

            if ($('select[name="type"]').val() != undefined)
              formData.append("type", $('select[name="type"]').val());

            if ($('input[name="file"]').val() != undefined)
              formData.append("file", $('input[name="file"]')[0].files[0]);

            $.ajax({
              type: "POST",
              url: formsAddModelOrDataset[0].getAttribute("action"),
              cache: false,
              contentType: false,
              processData: false,
              data: formData,
            }).done(function (msg) {
              $(".preloader").addClass("d-none");
              $("#modal").modal({
                show: true,
              });
              let result = JSON.parse(msg);
              $(".modal-title").text(result);
            });
          }
          form.classList.add("was-validated");
        },
        !1
      );
    }
  );
});
