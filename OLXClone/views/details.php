<?php

    $postId = $_GET["id"];


?>

<img id="image" width=100 height=100 src="" alt="LOADING">


<h3 id="title">Title: </h3>

<h3 id="description">Description: </h3>

<h3 id="price">Price: </h3>


<h3 id="name">Name: </h3>
<h3 id="mobile">Mobile: </h3>


<script>


function loadUser(userId)
{
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let response = JSON.parse(this.responseText);
                console.log(response);

                document.getElementById("mobile").innerHTML += response.user.mobile;
                document.getElementById("name").innerHTML += response.user.name;
                
            }
        };
        xhttp.open("GET", "http://localhost/php-mysql-course/OLXClone/users/" + userId, true);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send();
}

function loadPost()
{
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let response = JSON.parse(this.responseText);
                
                document.getElementById("image").src = "http://localhost/php-mysql-course/OLXClone/uploads/" + response.post.image;
                document.getElementById("title").innerHTML += response.post.title;
                document.getElementById("description").innerHTML += response.post.description;
                document.getElementById("price").innerHTML += response.post.price;
                loadUser(response.post.user_id);
                
            }
        };
        xhttp.open("GET", "http://localhost/php-mysql-course/OLXClone/posts/<?php echo $postId; ?>", true);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send();
}


loadPost();
</script>