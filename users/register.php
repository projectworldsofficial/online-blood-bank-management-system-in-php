<?php
if (isset($_POST['submitBtn'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];
    $bType = $_POST['blood_group'];
    
    require_once 'php/DBConnect.php';
    $db = new DBConnect();
    $flag = $db->registerUser($firstName, $lastName, $email, $dob, $gender, $bType, $address, $city, $mobile);
    
    if($flag){
        $success = "Thank You for registering with us.";
    } else {
        $message = "There was some technical error. Try again!";
    }
}
$title = "Join Us";
$setJoinUsActive = "active";
include 'layout/_header.php';

include 'layout/navbar.php';
?>

<div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        
        <?php if(isset($success)): ?>
        <div class="alert-success fade-out-5"><?= $success; ?></div>
        <?php endif; ?>
        <?php if(isset($message)): ?>
        <div class="alert-danger fade-out-5"><?= $message; ?></div>
        <?php endif; ?>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="col-md-4">
                    <img src="assets/register.jpg" class="img img-responsive">
                </div>
                <p>Join our community and reach out your hands for the others in need. Just by registering below you will make an agreement
                    with us that you are ready to donate and will be available whenever we will need you.</p>               
            </div>
            <div class="panel-body">
                <form method="post" action="register.php" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 form-label">Name</label>
                        <div class="col-md-4">
                            <input type="text" name="firstName" class="form-control" placeholder="First Name" required="true">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="lastName" class="form-control" placeholder="Last Name" required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label col-md-4">Email</label>
                        <div class="col-md-8">
                            <input type="email" required="true" class="form-control" name="email" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label col-md-4">D.O.B</label>
                        <div class="col-md-8">
                            <input type="date" required="true" class="form-control" name="dob" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label col-md-4">Gender</label>
                        <div class="col-md-8">
                            <input type="radio" value="Male" checked="true" class="radio-inline" name="gender" >Male
                            <input type="radio" value="Female" class="radio-inline" name="gender" >Female
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label col-md-4">Blood Group</label>
                        <div class="col-md-8">
                            <select name="blood_group" class="form-control">
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label col-md-4">Address</label>
                        <div class="col-md-8">
                            <textarea required="true" minlength="5" class="form-control" name="address" 
                                      rows="6" placeholder="Please fill out your complete address."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label col-md-4">City</label>
                        <div class="col-md-8">
                            <input type="text" required="true" class="form-control" name="city" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label col-md-4">Mobile</label>
                        <div class="col-md-8">
                            <input type="number" required="true" class="form-control" name="mobile" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label col-md-4"></label>
                        <div class="col-md-8">
                            <button class="btn btn-success" name="submitBtn" >Join</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>

<?php include 'layout/_footer.php'; ?>
