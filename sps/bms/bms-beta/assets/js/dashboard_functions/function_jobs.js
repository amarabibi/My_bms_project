
$(document).ready(function () {
  const $form = $("#personalform");
  const $button = $("#savebutton");
  const $response = $("#response");

  $form.on("submit", function (e) {
    e.preventDefault();

    $button.prop("disabled", true).text("Saving...");

    let formData = new FormData(this); // ✅ handles files too

    $.ajax({
      url: "/my_site/sps/bms-beta/modules/backend/employee_data/jobs_apply.php",
      type: "POST",
      data: formData,
      contentType: false,   // ✅ required for FormData
      processData: false,   // ✅ required for FormData
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          $response.html(
            `<div class="alert alert-success alert-dismissible fade show" role="alert">
              ✅ ${response.message}
            </div>`
          );

          $button.text("Saved");

          setTimeout(function () {
            $(".alert").fadeOut(500, function () { $(this).remove(); });

            // ✅ Close modal
            let modalEl = $form.closest(".modal")[0];
            if (modalEl) {
              let modal = bootstrap.Modal.getOrCreateInstance(modalEl);
              modal.hide();

              // ✅ Reload page AFTER modal hides
              modalEl.addEventListener("hidden.bs.modal", function () {
                location.reload();
              }, { once: true });
            }
          }, 1500);

        } else {
          $response.html(
            `<div class="alert alert-danger alert-dismissible fade show" role="alert">
              ⚠️ ${response.message}
            </div>`
          );

          $button.prop("disabled", false).text("Save");

          setTimeout(function () {
            $(".alert").fadeOut(500, function () { $(this).remove(); });
          }, 3000);
        }
      },
      error: function (xhr, status, error) {
        $response.html(
          `<div class="alert alert-danger alert-dismissible fade show" role="alert">
            ❌ Something went wrong: ${error}
          </div>`
        );

        $button.prop("disabled", false).text("Save");

        setTimeout(function () {
          $(".alert").fadeOut(500, function () { $(this).remove(); });
        }, 3000);

        console.error("AJAX Error:", xhr.responseText);
      }
    });
  });
});

