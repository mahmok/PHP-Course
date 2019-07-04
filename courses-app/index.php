<html>
    <head></head>

    <body>

        <input  id="username" placeholder="Username"> <br>
        <input id="password" type="password" placeholder="Password"> <br>
        <button onclick="login()">Login</button>


        <br>
        <br>
        <br>

        <hr>
        <input  id="signup-name" placeholder="Name"> <br>
        <input  id="signup-username" placeholder="Username"> <br>
        <input id="signup-password" type="password" placeholder="Password"> <br>
        <button onclick="signup()">Signup</button>

        
    </body>

    <script>

        function login()
        {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    let response = JSON.parse(this.responseText);
                    console.log(response);

                    if(response.status == "success")
                    {

                        window.location.href= "./views/dashboard.php";
                    }
                    else
                    {
                        alert("Invalid username/password");
                    }
                }
            };
            xhttp.open("POST", "http://localhost/php-mysql-course/courses-app/scripts/users.php", true);
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.send(JSON.stringify({                
                query:"login",
                username: document.getElementById("username").value,
                password: document.getElementById("password").value,
                type: "student"
            }));
        }


        function signup()
        {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    let response = JSON.parse(this.responseText);
                    console.log(response);

                    if(response.status == "success")
                    {
                        alert("Account Created!");
                    }
                    else
                    {
                        alert("Error");
                    }
                }
            };
            xhttp.open("POST", "http://localhost/php-mysql-course/courses-app/scripts/users.php", true);
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.send(JSON.stringify({                
                query:"signup",
                name: document.getElementById("signup-name").value,
                username: document.getElementById("signup-username").value,
                password: document.getElementById("signup-password").value,
                type: "student"
            }));
        }



    </script>

</html>