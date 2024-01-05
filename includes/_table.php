<?php include('config.php') ?>
<?php include('createModal.php') ?>
<?php include('updateModal.php') ?>
<?php include('readModal.php') ?>

<div class="container bg-white mt-4 p-4 px-5 rounded-3">
  <h1 class="d-inline-flex">Employee Details</h1>
  <button type="button" class="btn btn-primary rounded-pill float-end p-2 px-4 my-2" data-bs-toggle="modal" data-bs-target="#createModal">
    <i class="bi bi-plus-circle me-1 fs-5"></i> Add Employee
  </button>
  
  <div class="d-flex my-4 justify-content-center align-items-center rounded-4">
    <table class="table table-striped w-auto" id="myTable">
      <thead>
        <tr>
          <th scope="col">Record ID</th>
          <th scope="col">Employee Fullname</th>
          <th scope="col">Address</th>
          <th scope="col">Birthday</th>
          <th scope="col">Age</th>
          <th scope="col" hidden>Gender</th>
          <th scope="col" hidden>Civil Status</th>
          <th scope="col" hidden>Contact Number</th>
          <th scope="col" hidden>Salary</th>
          <th scope="col">Status</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM employeefile";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <th scope='row' class='text-center recid'>" . $row["recid"] . "</th>
                <td>" . $row["fullname"] . "</td>
                <td>" . $row["address"] . "</td>
                <td>" . $row["birthdate"] . "</td>
                <td >" . $row["age"] . "</td>
                <td class='gender' hidden>" . $row["gender"] . "</td>
                <td hidden>" . $row["civilstat"] . "</td>
                <td hidden>" . $row["contactnum"] . "</td>
                <td hidden>" . number_format($row["salary"]) . "</td>
                <td class='isactive'>" . ($row["isactive"] ? '<span class="badge text-bg-success rounded-pill">Active</span>' : '<span class="badge text-bg-secondary rounded-pill">Inactive</span>') . "</td>
                <td>";

            include('action_handle.php');

            echo "</td>
                      </tr>";
          }
        } else {

          echo "0 results";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</div>