<?php
if(isset($_GET['id'])){
    $id = $_GET['id']; // get the employee id
}

require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->auth();

$success = NULL;
$message = NULL;
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $designation = $_POST['designation'];
    $landline = $_POST['landline'];
    $mobile = $_POST['mobile'];

    $flag = $db->updateEmployee($id, $username, $password, $firstName, $middleName, $lastName, $designation, $landline, $mobile, $dob);

    if ($flag) {
        $success = "User has been updated successfully!";
    } else {
        $message = "Error updating the employee to the database!";
    }
}

$employee = $db->getEmployeeById($id);

$employees = $db->getEmployees();

$title = "Employee";
$setEmployeeActive = "active";
include 'layout/_header.php';
include 'layout/_top_nav.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <?php if (isset($success)): ?>
                <div class="alert-success"><?= $success; ?></div>
            <?php endif ?>
            <?php if (isset($message)): ?>
                <div class="alert-success"><?= $message; ?></div>
            <?php endif ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Add Employee</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="edit.php">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <div class="form-group">
                            <label class="col-md-3">Name:</label>
                            <div class="col-sm-3"> <input type="text" value="<?= $employee[0]['f_name']; ?>" name="firstName" class="form-control" placeholder="First Name" required="true"> </div>
                            <div class="col-sm-3"><input type="text" value="<?= $employee[0]['m_name']; ?>" name="middleName" class="form-control" placeholder="Middle Name"></div>
                            <div class="col-sm-3"><input type="text" value="<?= $employee[0]['l_name']; ?>" name="lastName" class="form-control" placeholder="Last Name" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Username:</label>
                            <div class="col-sm-9"><input type="text" value="<?= $employee[0]['username']; ?>" name="username" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Password:</label>
                            <div class="col-sm-9"><input type="password" value="<?= $employee[0]['password']; ?>" name="password" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Date of Birth:</label>
                            <div class="col-sm-9"><input type="date" value="<?= $employee[0]['b_day']; ?>" name="dob" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Designation:</label>
                            <div class="col-sm-9"><input type="text" value="<?= $employee[0]['designation']; ?>" name="designation" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Landline:</label>
                            <div class="col-sm-9"><input type="number" value="<?= $employee[0]['landline']; ?>" min="0" max="10000000000" name="landline" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Mobile:</label>
                            <div class="col-sm-9"><input type="number" value="<?= $employee[0]['mobile_nr']; ?>" min="0" max="10000000000" name="mobile" class="form-control" required="true"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"></label>
                            <button type="submit" class="btn btn-success btn-md" name="submit">Update Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php include 'layout/_footer.php'; ?>
