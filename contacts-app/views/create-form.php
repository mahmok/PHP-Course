<?php 
require("../template-header.php");
session_start();
if(!isset($_SESSION['userId']))
{
    header("Location: ../index.php");
}
?>


<div class="container">
    <form action="../scripts/create-contact.php" method="POST">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Full Name">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="mobile">Mobile Number</label>
            <input type="text" class="form-control" id="mobile" name="mobile" aria-describedby="emailHelp" placeholder="Mobile Number">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

</div>






<?php 
require("../template-footer.php");
?>

