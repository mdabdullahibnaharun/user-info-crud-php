<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
        <style type="text/css">
            .wrapper{
                width: 650px;
                margin: 0 auto;
            }
            .page-header h2{
                margin-top: 0;
            }
            table tr td:last-child a{
                margin-right: 15px;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="pull-left">User Record System</h2>
                        <div class="page-header clearfix ">
                            <a href="create.php" class="btn btn-primary pull-right">Add New user</a>
                        </div>
                        <?php
                        // Include config file
                        require_once "config.php";

                        // Attempt select query execution
                        $sql = "SELECT * FROM users";
                        if ($result = mysqli_query($conn, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                echo "<table class='table table-bordered table-striped table-hover '>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>#</th>";
                                echo "<th>Name</th>";
                                echo "<th>Age</th>";
                                echo "<th>Email</th>";
                                echo "<th>mobile</th>";
                                echo "<th>Address</th>";
                                echo "<th>Action</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['age'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['mobile'] . "</td>";
                                    echo "<td>" . $row['address'] . "</td>";
                                    echo "<td>";
                                    echo "<a href='read.php?id=" . $row['id'] . "' class='text-success'>view</a>";
                                    echo "<a href='update.php?id=" . $row['id'] . "' class='text-warning'>update</a>";
                                    echo "<a href='delete.php?id=" . $row['id'] . "' class='text-danger'>delete</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else {
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        } else {
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                        // Close connection
                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
                <form  method="post" action="search.php?go"  id="searchform"> 
                    <input  type="text" name="name"> 
                    <input  type="submit" class="btn btn-info" name="submit" value="Search"> 
                </form> 
            </div>
        </div>
    </body>
</html>















