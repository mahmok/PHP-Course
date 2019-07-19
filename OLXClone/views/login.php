<?php
require_once("header.php");


?>

<div class="container">

<div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
  <button onclick="onLoginClick()" class="btn btn-primary">Submit</button>



</div>

<script>
function onLoginClick()
{
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let response = JSON.parse(this.responseText);
                console.log(response);
            }
        };
        xhttp.open("POST", "http://localhost/php-mysql-course/OLXClone/users/login", true);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send(JSON.stringify({                
            email: document.getElementById('email').value,
            password: document.getElementById('password').value,
        }));
}

</script>


<?php
require_once("footer.php");

?>