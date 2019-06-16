<?php 
require("./template-header.php");
?>

<div class="container">
    <form method="POST" action="./scripts/login-user.php">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <p>If you do not have an account, <a href="./views/signup.php">signup here</a></p>

</div>





<?php 
require("./template-footer.php");
?>

