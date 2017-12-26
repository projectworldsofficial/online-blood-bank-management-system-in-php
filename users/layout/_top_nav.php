
<nav class="nav navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="logo-left-15 pull-left">
                    <div class="h4" id="logo"><a href="index.php">Blood Bank </a></div>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="pull-right">
                    <ul class="nav nav-pills">
                        <li class="<?php
                        if (isset($setHomeActive)) {
                            echo $setHomeActive;
                        } else {
                            echo '';
                        }
                        ?>"><a href="index.php">Home</a></li>
                        <li class="<?php
                        if (isset($setAboutActive)) {
                            echo $setAboutActive;
                        } else {
                            echo '';
                        }
                        ?>"><a href="about.php">About Us</a></li>
                        <li class="<?php if(isset($setMemberActive)){ echo $setMemberActive; } else { echo ''; } ?>">
                            <a href="member.php">Our Members</a>
                        </li>
                        
                        <li class="<?php if(isset($setJoinUsActive)){ echo $setJoinUsActive; } else { echo ''; } ?>">
                            <a href="register.php">Join Us</a>
                        </li>
                        
                        <li class="<?php if(isset($setAvailabilityActive)) {echo $setAvailabilityActive;} else {echo '';} ?>">
                            <a href="availability.php">Check Availability</a>
                        </li>
                        
                        <li class="">
                            <a href="../index.php">Employee Login</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>


</nav>
        

