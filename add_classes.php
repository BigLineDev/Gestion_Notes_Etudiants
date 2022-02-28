<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/form.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>SSRMS</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Section Formations</span>
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
                    <a href="add_classes.php">Ajouter Formation</a>
                    <a href="manage_classes.php">Gerer une formation</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Etudiants &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Ajouter Etudiant</a>
                    <a href="manage_students.php">Gerer les étudiants</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Notes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Ajouter Note</a>
                    <a href="manage_results.php">Afficher les notes</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <form action="" method="post">
            <fieldset>
                <legend>Ajouter une formation</legend>
                <input type="text" name="class_id" placeholder="Identifiant">
                <input type="text" name="class_name" placeholder="libelé de la Formation">
                <select name="matiere">
                    <option value=selection>-- selectioner matière--</option>
                    <option value="matiere1">Matière 1</option>
                    <option value="matiere2">Matière 2</option>
                    <option value="matiere3">Matière 3</option>
                    <option value="matiere4">Matière 4</option>
                    <option value="matiere5">Matière 5</option>
                </select>
                <input type="submit" value="Envoyer">
            </fieldset>        
        </form>
    </div>

    <div class="footer">

    </div>
</body>
</html>

<?php 
	include('init.php');
    include('session.php');

    if (isset($_POST['class_id'], $_POST['class_name'], $_POST["matiere"])) {
        $name=$_POST["class_name"];
        $id=$_POST["class_id"];
        $matiere=$_POST["matiere"];

        // validation
        if (empty($name) or empty($id) or empty($matiere) or preg_match("/[a-z]/i",$id)) {
            if(empty($name))
                echo '<p class="error">Entrer une classe</p>';
            if(empty($id))
                echo '<p class="error">Entrer un identifiant</p>';
            if(empty($matiere))
                echo '<p class="error">selectioner une matiere</p>';
            if(preg_match("/[a-z]/i",$id))
                echo '<p class="error">Please enter valid class id</p>';
            exit();
        }

        $sql = "INSERT INTO `class` (`name`, `id`, `matiere`) VALUES ('$name', '$id', '$matiere')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid class name or class id")';
            echo '</script>';
        } else{
            echo '<script language="javascript">';
            echo 'alert("Success!!")';
            echo '</script>';
        }
    }

?>