jQuery(document).ready(function ($) {
  $(document).on("click", ".product_custom_image__select-file", function (e) {
    e.preventDefault();
    let $button = $(this);

    // Create the media frame.
    let file_frame = (wp.media.frames.file_frame = wp.media({
      title: "Select or upload image",
      library: {
        // remove these to show all
        type: "image", // specific mime
      },
      button: {
        text: "Select",
      },
      multiple: false, // Set to true to allow multiple files to be selected
    }));

    // When an image is selected, run a callback.
    file_frame.on("select", function () {
      // We set multiple to false so only get one image from the uploader

      let attachment = file_frame.state().get("selection").first().toJSON();

      $button.siblings("img").attr("src", attachment.url);
      $button.siblings("img").addClass("added");
      $button.siblings("input").val(attachment.url).change();
    });

    // Finally, open the modal
    file_frame.open();
  });

  $(".product_custom_image__delete-btn").click(() => {
    $(".product_custom_image").attr("src", "");
    $(".product_custom_image").removeClass("added");
    $(".product_custom_image-input").attr("value", "");
  });

  $(".btn-clean-custom-fields").click(() => {
    $(".product_custom_image").attr("src", "");
    $(".product_custom_image").removeClass("added");
    $(".product_custom_image-input").attr("value", "");

    let input = `<input type="date" class="short" name="custom-date" id="custom-date">`;
    $("#custom-date").remove();
    $(".custom-date_field").append(input);

    document
      .querySelector("#custom-type option")
      .setAttribute("selected", "selected");
  });

  let markupBtn;
  if ($("#original_publish").val() === "Update") {
    markupBtn = `
      <span class="spinner"></span>
      <input name="original_publish" type="hidden" id="original_publish" value="Custom update btn">
      <input type="submit" name="save" id="publish" class="button custom-btn button-primary button-large" value="Custom update btn">
    `;
  } else {
    markupBtn = `
      <span class="spinner"></span>
      <input name="original_publish" type="hidden" id="original_publish" value="Custom publish btn">
      <input type="submit" name="publish" id="publish" class="button custom-btn button-primary button-large" value="Custom publish btn">
    `;
  }
  document.querySelector("#publishing-action").innerHTML = markupBtn;
});
