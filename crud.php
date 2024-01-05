<?php

include('config.php'); //CONNECTING TO DATABASE

//CREATE/INSERT DATA====================================

if (isset($_POST['create_data'])) {
  session_start();

  function generateRandomString($length = 5) {
    $randomNumber = str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
    return $randomNumber;
  }

  $recid = generateRandomString();
  $fullname = $_POST["fullname"];
  $address = $_POST["address"];
  $birthdate = $_POST["birthdate"];
  $age = $_POST["age"];
  $gender = $_POST["gender"];
  $civilstat = $_POST["civilstat"];
  $contactnum = $_POST["contactnum"];
  $isactive = isset($_POST["isactive"]) ? 1 : 0;
  $salary = $_POST["salary"];

  $sql = "INSERT INTO employeefile (recid, fullname, address, birthdate, age, gender, civilstat, contactnum, isactive, salary) 
          VALUES ('$recid', '$fullname', '$address', '$birthdate', '$age', '$gender', '$civilstat', '$contactnum', '$isactive', '$salary')";

  $result = $conn->query($sql);

  if($result == true){
    $_SESSION['status'] = "Data created successfully.";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_title'] = "Success!";
    header('location: menu.php');
  }
  else {
    $_SESSION['status'] = "Unable to create data.";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_title'] = "Error!";
    header('location: menu.php');
  }
}

//======================================================

//READ/VIEW DATA========================================

if (isset($_POST['read_data'])) {

  $recid = $_POST['recid'];
  $arrayresult = [];

  $sql = "SELECT * FROM employeefile WHERE recid='$recid'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      array_push($arrayresult, $row);
      header('content-type: application/json');
      echo json_encode($arrayresult);
    }
  } else {

    echo "0 results";
  }
}
//======================================================

//UPDATE/EDIT DATA======================================

if (isset($_POST['update_data'])) {
  session_start();

  $recid = $_POST["recid"];
  $fullname = $_POST["fullname"];
  $address = $_POST["address"];
  $birthdate = $_POST["birthdate"];
  $age = $_POST["age"];
  $gender = $_POST["update_gender"];
  $civilstat = $_POST["civilstat"];
  $contactnum = $_POST["contactnum"];
  $isactive = isset($_POST["update_isactive"]) ? 1 : 0;
  $salary = $_POST["salary"];

  $sql = "UPDATE employeefile 
          SET fullname='$fullname', address='$address', birthdate='$birthdate', age='$age', gender='$gender', 
              civilstat='$civilstat', contactnum='$contactnum', isactive='$isactive', salary='$salary'
          WHERE recid='$recid'";

  $result = $conn->query($sql);

  if($result == true){
    $_SESSION['status'] = "Data updated successfully.";
    $_SESSION['status_code'] = "success";
    $_SESSION['status_title'] = "Success!";
    header('location: menu.php');
  }
  else {
    $_SESSION['status'] = "Unable to update data.";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_title'] = "Error!";
    header('location: menu.php');
  }

}

//======================================================

//DELETE DATA===========================================

if (isset($_POST['delete_data'])) {
  session_start();
  $recid = $_POST['recid'];

  $delete_query = "DELETE FROM employeefile WHERE recid='$recid'";
  $result = $conn->query($delete_query);

if($result == true){
  $_SESSION['status'] = "Data successfully delete.";
  $_SESSION['status_code'] = "success";
  $_SESSION['status_title'] = "Success!";
  header('location: menu.php');
}
else {
  $_SESSION['status'] = "Unable to delete data.";
  $_SESSION['status_code'] = "error";
  $_SESSION['status_title'] = "Error!";
  header('location: menu.php');
}
}

//======================================================
