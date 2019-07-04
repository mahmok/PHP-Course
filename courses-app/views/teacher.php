
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="./styles.css">
    </head>

    <body>
        <h1>Teacher Panel</h1>
        <hr>

        <h1>Courses</h1>
        <table id="coursesTable">
            <tr>
                <th>ID</th>
                <th>Course Name</th>
            </tr>
        </table>
        <br>
        <ol id="studentsList">

        
        </ol>
        
    </body>


    <script>
        

        function addRowToCoursesTable(course)
        {
            document.getElementById("coursesTable").innerHTML += (`<tr onclick='getStudents(${course.id})'> 
                                                                    <td> ${course.id} </td>
                                                                    <td> ${course.cname} </td>
                                                                    </tr>`);
        }
        

        function addItemToStudentsList(name)
        {
            document.getElementById("studentsList").innerHTML += `<li>${name}</li>`
        }
        
        function getCourses() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    let response =  JSON.parse(this.responseText);

                    if(response.status == "success")
                    {
                        for(let i = 0; i < response.courses.length; i++)
                        {
                            addRowToCoursesTable(response.courses[i]);
                        }
                    }

                }
            };
            xhttp.open("GET", "http://localhost/php-mysql-course/courses-app/scripts/courses.php?query=getCoursesByTeacher&teacherId=" + <?php echo $_SESSION['id']; ?>, true);
            xhttp.send();
        }
                
        function getStudents(courseId) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    let response =  JSON.parse(this.responseText);
                    document.getElementById("studentsList").innerHTML = "";
                    if(response.status == "success")
                    {
                        for(let i = 0; i < response.students.length; i++)
                        {
                            addItemToStudentsList(response.students[i].name);
                        }
                    }

                }
            };
            xhttp.open("GET", "http://localhost/php-mysql-course/courses-app/scripts/courses.php?query=getStudentsInCourse&courseId=" + courseId, true);
            xhttp.send();
        }




        getCourses();



    
    </script>


</html>