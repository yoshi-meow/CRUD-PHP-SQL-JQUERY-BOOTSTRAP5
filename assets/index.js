//CHECK THE $_SESSION STATUS TO SWEETALERT========================

function checkSessionStatus() {
    fetch('includes/check_session.php')
        .then(response => response.json())
        .then(data => {
            if (data.status !== '' && data.status_code !== '' && data.status_title !== '') {
                Swal.fire({
                    icon: data.status_code,
                    title: data.status_title,
                    text: data.status,
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        })
        .catch(error => console.error('Error:', error));
  }

  document.addEventListener('DOMContentLoaded', function () {
    checkSessionStatus();
});

//================================================================

//READ/VIEW DATA IN MODAL ========================================

$(document).ready(function () {
  $(".read_modal").on("click", function (e) {
    e.preventDefault();
    var recid = $(this).closest("tr").find(".recid").text();
    var isactive = $(this).closest("tr").find(".isactive").text();

    $.ajax({
      method: "POST",
      url: "crud.php",
      data: {
        read_data: true,
        recid: recid,
      },
      success: function (response) {
        $.each(response, function (Key, value) {
          var read_recid = $("#read_recid");
          var read_fullname = $("#read_fullname");
          var read_address = $("#read_address");
          var read_birthdate = $("#read_birthdate");
          var read_age = $("#read_age");
          var read_gender = $("#read_gender");
          var read_civilstat = $("#read_civilstat");
          var read_contactnum = $("#read_contactnum");
          var read_salary = $("#read_salary");
          var read_isactive = $("#read_isactive");

          read_recid.html("<tr><td>" + value["recid"] + "</td></tr>");
          read_fullname.html("<tr><td>" + value["fullname"] + "</td></tr>");
          read_address.html("<tr><td>" + value["address"] + "</td></tr>");
          read_birthdate.html("<tr><td>" + value["birthdate"] + "</td></tr>");
          read_age.html("<tr><td>" + value["age"] + "</td></tr>");
          read_gender.html("<tr><td>" + value["gender"] + "</td></tr>");
          read_civilstat.html("<tr><td>" + value["civilstat"] + "</td></tr>");
          read_contactnum.html("<tr><td>" + value["contactnum"] + "</td></tr>");
          read_salary.html("<tr><td>&#8369;" + new Intl.NumberFormat("en-US", {style: "decimal",maximumFractionDigits: 0,}).format(value["salary"]) + "</td></tr>");
          read_isactive.html("<tr><td>" + (isactive === "Active" ? '<span class="badge text-bg-success rounded-pill">Active</span>' : '<span class="badge text-bg-secondary rounded-pill">Inactive</span>') + "</td></tr>");
        });
      },
    });
  });
});

//================================================================

//MODAL SHOW DATA FOR UPDATE/EDIT ================================

$(document).ready(function () {
  $(".update_modal").on("click", function (e) {
    e.preventDefault();

    var recid = $(this).closest("tr").find(".recid").text();
    var gender = $(this).closest("tr").find(".gender").text();
    var isactive = $(this).closest("tr").find(".isactive").text();

    // console.log(gender);
    // console.log(isactive);

    $.ajax({
      method: "POST",
      url: "crud.php",
      data: {
        read_data: true,
        recid: recid,
      },
      success: function (response) {
        $.each(response, function (key, value) {
          $("#recid").val(value["recid"]);
          $("#displayRecid").val(value["recid"]);
          $("#update_fullname").val(value["fullname"]);
          $("#update_address").val(value["address"]);
          $("#update_age").val(value["age"]);
          $("#update_birthdate").val(value["birthdate"]);
          $('input:radio[name="update_gender"]').filter('[value="' + gender + '"]').prop("checked", true);
          $("#update_civilstat").val(value["civilstat"]);
          $("#update_contactnum").val(value["contactnum"]);
          $("#update_salary").val(value["salary"]);
          $('input:checkbox[name="update_isactive"]').prop("checked", isactive === "Active");
        });
      },
      error: function (error) {
        Swal.fire({
          icon: "error",
          title: error,
          text: "Unable to show data.",
          confirmButtonColor: "#45BA6C"
        });
      }
    });
  });
});

//================================================================

//DELETE DATA ====================================================

$(document).ready(function () {
  $(".delete_data").on("click", function (e) {
    e.preventDefault();
    var recid = $(this).closest("tr").find(".recid").text();

    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#45BA6C",
      cancelButtonColor: "#909293",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          method: "POST",
          url: "crud.php",
          data: {
            delete_data: true,
            recid: recid,
          },
          success: function (response) {
            window.location.reload();
          },
        });
      }
    });
  });
});

//================================================================

//DATATABLE ======================================================

$(document).ready(function() {
  $('#myTable').DataTable();
});

//================================================================

//FOR CIVIL STATUS VALIDATION ====================================

document.getElementById("create_form").addEventListener("submit", function(event) {
  var selectedValue = document.getElementById("civilstat").value;

    if (selectedValue === "Select status") {
      event.preventDefault();
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Please select civil status!",
        confirmButtonColor: "#45BA6C"
      });
    }
});

//================================================================

//FOR BIRTHDATE VALIDATION =======================================

function validateBirthdate() {
  var birthdateInput = document.getElementById('birthdate');
  var selectedDate = new Date(birthdateInput.value);
  var currentDate = new Date();

  if (selectedDate >= currentDate) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Birthdate must be in the past!",
      confirmButtonColor: "#45BA6C"
    });
    birthdateInput.value = '';
  } 
}

function validateUpdateBirthdate() {
  var UpdatebirthdateInput = document.getElementById('update_birthdate');
  var UpdateselectedDate = new Date(UpdatebirthdateInput.value);
  var UpdatecurrentDate = new Date();

  if (UpdateselectedDate >= UpdatecurrentDate) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Birthdate must be in the past!",
      confirmButtonColor: "#45BA6C"
    });
    UpdatebirthdateInput.value = '';
  } 
}


//================================================================

//LIMIT INPUT DIGITS IN AGE AND CONTACT NUMBER ===================

function limitDigits(input, maxLength) {
  // Remove any non-digit characters
  var sanitizedValue = input.value.replace(/\D/g, '');
  // Ensure the value is limited to the specified maxLength
  sanitizedValue = sanitizedValue.substring(0, maxLength);
  // Update the input value
  input.value = sanitizedValue;
}

//================================================================
