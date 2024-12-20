$(document).ready(function () {
  $("#registrationForm").submit(function (e) {
    let isValid = true;

    // Clear previous error messages
    $(".error").remove();

    // Validate each field
    $("input, select, textarea").each(function () {
      if ($(this).val() === "") {
        // Add error message
        $(this).after('<span class="error" style="color: red; font-size: 0.9em;">This field is required</span>');
        isValid = false;
      }
    });

    // Additional validation for email
    const email = $("#email").val();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email && !emailPattern.test(email)) {
      $("#email").after('<span class="error" style="color: red; font-size: 0.9em;">Invalid email format</span>');
      isValid = false;
    }

    // Additional validation for phone (digits only)
    const phone = $("#phone").val();
    const phonePattern = /^[0-9]{10}$/; // Adjust pattern as needed
    if (phone && !phonePattern.test(phone)) {
      $("#phone").after('<span class="error" style="color: red; font-size: 0.9em;">Invalid phone number</span>');
      isValid = false;
    }

    if (!isValid) e.preventDefault();
  });
});
