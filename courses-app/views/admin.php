<html>
    <head>

        <link rel="stylesheet" type="text/css" href="./styles.css">
    </head>

    <body>
        <h1>Admin Panel</h1>
        <hr>

        <h1>Courses</h1>
        <table id="coursesTable">
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Teacher Name</th>
            </tr>
        </table>
        <br>
        <input id="newCourseName" > <button onclick="addCourse()">Create Course</button> &nbsp; &nbsp;

        <input id="courseId" placeholder="Course ID">
        <input id="teacherId"  placeholder="Teacher ID">
        <button onclick="assignTeacherToCourse()">Assign Teacher to Course</button>
        

        <hr>

        <h1>Teachers</h1>
        <table id="teachersTable">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
        </table>
        <br>
        <input id="newTeacherName" placeholder="Name">  
        <input id="newTeacherUsername" placeholder="Username">
        <input id="newTeacherPassword" placeholder="Password">
        <button onclick="addTeacher()">Create Teacher</button>

        <hr>


        <h1>Students</h1>
        <table id="studentsTable">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
            </tr>
        </table>
        



    </body>


    <script>
        
        let teachersMap = new Map();

        function addRowToCoursesTable(course)
        {
            document.getElementById("coursesTable").innerHTML += (`<tr> 
                                                                    <td> ${course.id} </td>
                                                                    <td> ${course.cname} </td>
                                                                    <td id='${course.id}-teacher'> ${course.name?course.name: "No teacher yet!"} </td>
                                                                    </tr>`);
        }
        

        function addRowToTeaachersTable(teacher)
        {
            document.getElementById("teachersTable").innerHTML += (`<tr> 
                                                                    <td> ${teacher.id} </td>
                                                                    <td> ${teacher.name} </td>
                                                                    <td> ${teacher.username} </td>
                                                                    <td> ${teacher.password} </td>
                                                                    </tr>`);
        }


        function addRowToStudentsTable(student)
        {
            document.getElementById("studentsTable").innerHTML += (`<tr> 
                                                                    <td> ${student.id} </td>
                                                                    <td> ${student.name} </td>
                                                                    <td> ${student.username} </td>
                                                                    </tr>`);
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
            xhttp.open("GET", "http://localhost/php-mysql-course/courses-app/scripts/courses.php?query=getAllCourses", true);
            xhttp.send();
        }
        

        function getTeachers() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    let response =  JSON.parse(this.responseText);

                    if(response.status == "success")
                    {
                        for(let i = 0; i < response.teachers.length; i++)
                        {
                            teachersMap.set(response.teachers[i].id, response.teachers[i].name);
                            addRowToTeaachersTable(response.teachers[i]);
                        }
                    }

                }
            };
            xhttp.open("GET", "http://localhost/php-mysql-course/courses-app/scripts/users.php?query=getAllTeachers", true);
            xhttp.send();
        }

        
        function getStudents() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    let response =  JSON.parse(this.responseText);
                    console.log("STUDENTD: ", response);

                    if(response.status == "success")
                    {
                        for(let i = 0; i < response.students.length; i++)
                        {
                            addRowToStudentsTable(response.students[i]);
                        }
                    }

                }
            };
            xhttp.open("GET", "http://localhost/php-mysql-course/courses-app/scripts/users.php?query=getAllStudents", true);
            xhttp.send();
        }




        getCourses();
        getTeachers();
        getStudents();

        function addCourse()
        {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    let response = JSON.parse(this.responseText);
                    console.log(response);

                    if(response.status == "success")
                    {
                        course = {
                            id: response.newId,
                            cname: document.getElementById("newCourseName").value,
                            name: "No teacher yet!"
                        }
                        addRowToCoursesTable(course);
                        alert("Course Created!");
                    }
                    else
                    {
                        alert("Error");
                    }
                }
            };
            xhttp.open("POST", "http://localhost/php-mysql-course/courses-app/scripts/courses.php", true);
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.send(JSON.stringify({                
                query:"createCourse",
                name: document.getElementById("newCourseName").value
            }));
        }


        function addTeacher()
        {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    let response = JSON.parse(this.responseText);
                    console.log(response);

                    if(response.status == "success")
                    {
                        teacher = {
                            id: response.newId,
                            name: document.getElementById("newTeacherName").value,
                            username: document.getElementById("newTeacherUsername").value,
                            password: document.getElementById("newTeacherPassword").value
                        }
                        addRowToTeaachersTable(teacher);
                        alert("Teacher Created!");
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
                name: document.getElementById("newTeacherName").value,
                username: document.getElementById("newTeacherUsername").value,
                password: document.getElementById("newTeacherPassword").value,
                type: "teacher"
            }));
        }

        function assignTeacherToCourse()
        {
            let courseId = document.getElementById("courseId").value
            let teacherId = document.getElementById("teacherId").value

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    let response =  JSON.parse(this.responseText);

                    if(response.status == "success")
                    {
                        document.getElementById(courseId + "-teacher").innerHTML = teachersMap.get(teacherId);
                        alert("Teacher assigned!");
                    }

                }
            };

            xhttp.open("GET", `http://localhost/php-mysql-course/courses-app/scripts/users.php?query=teachCourse&courseId=${courseId}&teacherId=${teacherId}` , true);
            xhttp.send();
        }









    
    </script>


</html>