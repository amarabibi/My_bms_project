$(document).ready(function () {
  $("#roleform").on("submit", function (e) {
    e.preventDefault();

    const $form   = $(this);
    const $button = $form.find('button[type="submit"]');
    const modalEl = $form.closest(".modal")[0];

    $button.prop("disabled", true).text("Saving...");

    $.ajax({
      url: "/my_site/sps/bms/bms-beta/modules/backend/employee_data/tbl_emp_roles.php",
      type: "POST",
      data: $form.serialize(),
      dataType: "json",
      success: function (res) {
        if (res.status === "success") {
          // Reset form
          $form[0].reset();
          $button.prop("disabled", false).text("Save");

          // Hide modal after short delay
          setTimeout(() => {
            if (window.bootstrap && bootstrap.Modal) {
              const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
              modalEl.addEventListener("hidden.bs.modal", () => location.reload(), { once: true });
              modal.hide();
            } else {
              $(modalEl).modal("hide").one("hidden.bs.modal", () => location.reload());
            }
          }, 500);
        } else {
          alert("⚠️ " + res.message);
          $button.prop("disabled", false).text("Save");
        }
      },
      error: function (xhr, status, error) {
        let message = "❌ Something went wrong.";
        try {
          // Try to parse server response as JSON
          const res = JSON.parse(xhr.responseText);
          if (res.message) {
            message = "❌ " + res.message;
          }
        } catch (e) {
          // If not JSON, log full response for debugging
          console.error("AJAX Error:", status, error, xhr.responseText);
        }
        alert(message);
        $button.prop("disabled", false).text("Save");
      }
    });
  });
});
