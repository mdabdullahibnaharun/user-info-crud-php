<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
    <head> 
        <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1"> 
        <title>Search  Users</title> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
        <style type="text/css">
            .wrapper{
                width: 650px;
                margin: 0 auto;
                margin-top:50px;
            }
            p {
                font-size:20px;
            }
        </style>
    </head> 
    <body> 
        <div class="wrapper">
            <?php
            if (isset($_POST['submit'])) {
                if (isset($_GET['go'])) {
                    if (preg_match("/^[  a-zA-Z]+/", $_POST['name'])) {
                        $name = $_POST['name'];
                        //connect  to the database 
                        $db = mysqli_connect("localhost", "root", "","user_test_php") or die('I cannot connect to the database  because: ' . mysql_error());
                        //-select  the database to use 
                        $mydb = mysqli_select_db($db,"users");
                        //-query  the database table 
                        $sql = "SELECT  id, name, age, email,mobile, address FROM users WHERE name LIKE '%" .$name. "%' OR address LIKE '%" . $name . "%'";
                        //-run  the query against the mysql query function 
                        $result = mysqli_query($db,$sql);
                        //-create  while loop and loop through result set 
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $Name = $row["name"];
                                $Age = $row["age"];
                                $Email = $row["email"];
                                $Mobile = $row["mobile"];
                                $Address = $row["address"];

                                //-display the result of the array 
                                echo "<table class='table table-bordered table-striped table-hover '>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>#</th>";
                                echo "<th>Name</th>";
                                echo "<th>Age</th>";
                                echo "<th>Email</th>";
                                echo "<th>mobile</th>";
                                echo "<th>Address</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['age'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['mobile'] . "</td>";
                                echo "<td>" . $row['address'] . "</td>";
                                echo "</tr>";
                                echo "</tbody>";
                                echo "</table>";
                                echo "<p><a href='index.php' class='btn btn-primary'>Back</a></p>";
                            }
                        } else {
                            echo "<p>No matches found</p>";
                            echo "<p><a href='index.php' class='btn btn-primary'>Back</a></p>";
                        }
                    } else {
                        echo "<p>Please enter a search query</p>";
                        echo "<p><a href='index.php' class='btn btn-primary'>Back</a></p>";
                    }
                }
            }
            ?> 
        </div>
    </body> 
</html> 