<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type='text/css' href="css/manage.css">
    <title>SSRMS</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Section Etudiants</span>
        <a href="logout.php" style="color: white; text-decoration:none;"><span class="fa fa-sign-out"></span> Logout</a>
    </div>

        <div class="nav">
        <ul>
        <li>
                <a href="dashboard.php">Tableau de bord</a>
            </li>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Formations &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Ajouter Formations</a>
                    <a href="manage_classes.php">Gerer les formations</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Etudiants &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Ajouter Etudiants</a>
                    <a href="manage_students.php">Gerer Etudiants</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Notes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Ajouter Notes</a>
                    <a href="manage_results.php">Gerer Notes</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <?php
            include('init.php');
            include('session.php');

            $sql = "SELECT `name`, `rno`, `class_name` FROM `students`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               echo "<table>
                <caption>Liste des Etudiants</caption>
                <tr>
                <th>#</th>
                <th>PRENOM/NOM</th>
                <th>MATRICULE</th>
                <th>FORMATIONS</th>
                <th>ACTION</th>
                </tr>";
                $cnt=1;
                while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr>";
                    echo"<td>$cnt</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['rno'] . "</td>";
                    echo "<td>" . $row['class_name'] . "</td>";
                    echo "<td><a href='delete-student.php?rno=".$row['rno']."' style='color:#F66; text-decoration:none;'><span class='fa fa-trash'></span> Supprimer</a></td>";
                    echo "</tr>";
                 $cnt++; }

                echo "</table>";
            } else {
                echo "0 Students";
            }
        ?>
    </div>

  
</body>
</html>
