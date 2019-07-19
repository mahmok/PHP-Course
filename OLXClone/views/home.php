<?php 

    


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
</style>
</head>
<body>
<table id="postsTable">
  <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Image</th>
    <th>Price</th>
    <th>Actions</th>
  </tr>

</table>

<script>

  function renderPost(post)
  {
    document.getElementById("postsTable").innerHTML += `  <tr>
    <td>${post.title}</td>
    <td>${post.description}</td>
    <td><img src="http://localhost/php-mysql-course/OLXClone/uploads/${post.image}" width=100 height=100 alt="LOADING" ></td>
    <td>${post.price}</td>
    <td><a href="details.php?id=${post.id}">View Details</a></td>
    </tr>`
  }


 

  function getPosts()
  {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let response = JSON.parse(this.responseText);
                console.log(response);
                for(let i = 0; i < response.posts.length; i++)
                {
                  renderPost(response.posts[i]);
                }
            }
        };
        xhttp.open("GET", "http://localhost/php-mysql-course/OLXClone/posts", true);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send();
  }

  getPosts();

</script>
    


    
</body>
</html>