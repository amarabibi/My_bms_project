$(document).ready(function () {
  const $form = $("#historyform");
  const $button = $("#savebutton");
  const $response = $("#response");
  const modalEl = document.getElementById("jobRoleModal");

  $form.on("submit", function (e) {
    e.preventDefault();

    $button.prop("disabled", true).text("Saving...");

    $.ajax({
      url: "/my_site/sps/bms-beta/modules/backend/employee_data/employment_history.php",
      type: "POST",
      data: $form.serialize(),
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          $response.html(
            '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
              '✅ ' + response.message +
            '</div>'
          );

          $button.text("Saved");

          setTimeout(function () {
            $(".alert").fadeOut(500, function(){ $(this).remove(); });
            $form[0].reset();
            $button.prop("disabled", false).text("Save");

            // ✅ Properly close modal
            let modal = bootstrap.Modal.getInstance(modalEl);
            if (modal) modal.hide();

            // ✅ Ensure backdrop is removed
            $(".modal-backdrop").remove();
            $("body").removeClass("modal-open").css("overflow", "auto");

          }, 2500);

        } else {
          $response.html(
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
              '⚠️ ' + response.message +
            '</div>'
          );

          $button.prop("disabled", false).text("Save");

          setTimeout(function () {
            $(".alert").fadeOut(500, function(){ $(this).remove(); });
          }, 3000);
        }
      },
      error: function (xhr, status, error) {
        $response.html(
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
            '❌ Something went wrong: ' + error +
          '</div>'
        );

        $button.prop("disabled", false).text("Save");

        setTimeout(function () {
          $(".alert").fadeOut(500, function(){ $(this).remove(); });
        }, 3000);
      }
    });
  });
});
