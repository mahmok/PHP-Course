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
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="mobile">mobile</label>
    <input type="text" class="form-control" id="mobile" placeholder="mobile">
  </div>


  <button onclick="onSignupClick()" class="btn btn-primary">Signup</button>



</div>

<script>
function onSignupClick()
{
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                let response = JSON.parse(this.responseText);
                console.log(response);
            }
        };
        xhttp.open("POST", "http://localhost/php-mysql-course/OLXClone/users/signup", true);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send(JSON.stringify({                
            email: document.getElementById('email').value,
            password: document.getElementById('password').value,
            name: document.getElementById('name').value,
            mobile: document.getElementById('mobile').value,
        }));
}

</script>


<?php
require_once("footer.php");

?>