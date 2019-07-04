
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="./styles.css">
    </head>

    <body>
        <h1>Student Panel</h1>
        <hr>

        <h1>My Courses</h1>
        <table id="myCoursesTable">
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Actions</th>
            </tr>
        </table>
        <hr>
        <h1>Other Courses</h1>
        <table id="otherCoursesTable">
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Actions</th>
            </tr>
        </table>
        
    </body>


    <script>
        
        let myCoursesMap = new Map();
        let otherCoursesMap = new Map();

        function addRowToMyCoursesTable(course)
        {
            console.log(course)
            document.getElementById("myCoursesTable").innerHTML += (`<tr id='${course.id}-mycourses'> 
                                                                    <td> ${course.id} </td>
                                                                    <td> ${course.cname} </td>
                                                                    <td> <button onclick='leave(<?php echo $_SESSION['id'] ?>, ${course.id})'>Leave</button> </td>
                                                                    </tr>`);
        }

        
        function addRowToOtherCoursesTable(course)
        {
            console.log(course)
            if(myCoursesMap.get(parseInt(course.id)) == null)
            {
                
            
                document.getElementById("otherCoursesTable").innerHTML += (`<tr id='${course.id}-othercourses'> 
                                                                    <td> ${course.id} </td>
                                                                    <td> ${course.cname} </td>
                                                                    <td> <button onclick='join(<?php echo $_SESSION['id'] ?>, ${course.id})'>Join</button> </td>
                                                                    </tr>`);
            }
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
                            otherCoursesMap.set(parseInt(response.courses[i].id), response.courses[i])
                            addRowToOtherCoursesTable(response.courses[i]);
                        }
                        console.log(otherCoursesMap)
                    }

                }
            };
            xhttp.open("GET", "http://localhost/php-mysql-course/courses-app/scripts/courses.php?query=getAllCourses", true);
            xhttp.send();
        }


        function getMyCourses() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    let response =  JSON.parse(this.responseText);

                    if(response.status == "success")
                    {
                        for(let i = 0; i < response.courses.length; i++)
                        {
                            myCoursesMap.set(parseInt(response.courses[i].id), response.courses[i])
                            addRowToMyCoursesTable(response.courses[i]);
                        }
                        getCourses();
                        
                    }

                }
            };
            xhttp.open("GET", "http://localhost/php-mysql-course/courses-app/scripts/users.php?query=getJoinedCourses&studentId=" + <?php echo $_SESSION['id'] ?>, true);
            xhttp.send();
        }





        
        getMyCourses();
        

        function join(studentId, courseId)
        {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    let response =  JSON.parse(this.responseText);

                    if(response.status == "success")
                    {
                        let course = otherCoursesMap.get(parseInt(courseId));
                        otherCoursesMap.delete(parseInt(courseId))
                        addRowToMyCoursesTable(course);
                        myCoursesMap.set(parseInt(courseId), course)
                        document.getElementById(courseId + "-othercourses").remove();
                    }

                }
            };
            xhttp.open("GET", "http://localhost/php-mysql-course/courses-app/scripts/users.php?query=joinCourse&studentId=" + studentId + "&courseId=" + courseId, true);
            xhttp.send();
        }


        function leave(studentId, courseId)
        {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    let response =  JSON.parse(this.responseText);

                    if(response.status == "success")
                    {
                        let course = myCoursesMap.get(parseInt(courseId));
                        myCoursesMap.delete(parseInt(courseId))
                        addRowToOtherCoursesTable(course);
                        otherCoursesMap.set(parseInt(courseId), course)
                        document.getElementById(courseId + "-mycourses").remove();
                    }

                }
            };
            xhttp.open("GET", `http://localhost/php-mysql-course/courses-app/scripts/users.php?query=leaveCourse&studentId=${studentId}&courseId=${courseId}` , true);
            xhttp.send();
        }








    
    </script>


</html>