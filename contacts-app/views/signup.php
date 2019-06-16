<?php 
require("../template-header.php");
?>


<div class="container">
    <form method="POST" action="../scripts/create-user.php">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Signup</button>
    </form>


</div>






<?php 
require("../template-footer.php");
?>

