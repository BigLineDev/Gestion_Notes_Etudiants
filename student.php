<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>SSRMS</title>
</head>
<body>
    <?php
        include("init.php");

        if(!isset($_GET['class']))
            $class=null;
        else
            $class=$_GET['class'];
        $rn=$_GET['rn'];

        // validation
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid roll number</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `rno`='$rn' and `class_name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }

        $result_sql=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        }
    ?>

    <div class="container">
        <!-- <div class="details">
            <span>Name:</span> <?php echo $name ?> <br>
            <span>Class:</span> <?php echo $class; ?> <br>
            <span>Roll No:</span> <?php echo $rn; ?> <br>
        </div>

        <div class="main">
            <div class="s1">
                <p>Subjects</p>
                <p>Paper 1</p>
                <p>Paper 2</p>
                <p>Paper 3</p>
                <p>Paper 4</p>
                <p>Paper 5</p>
            </div>
            <div class="s2">
                <p>Marks</p>
                <?php echo '<p>'.$p1.'</p>';?>
                <?php echo '<p>'.$p2.'</p>';?>
                <?php echo '<p>'.$p3.'</p>';?>
                <?php echo '<p>'.$p4.'</p>';?>
                <?php echo '<p>'.$p5.'</p>';?>
            </div>
        </div>

        <div class="result">
            <?php echo '<p>Total Notes:&nbsp'.$mark.'</p>';?>
            <?php echo '<p>Pourcentage:&nbsp'.$percentage.'%</p>';?>
        </div>

        <div class="button">
            <button onclick="window.print()">Print Result</button>
        </div> -->


        <div class="main2">
            <table>
                <thead>
                  <tr>
                    <td> Numéro </td>
                    <td colspan="10">Sujets</td>
                    <td rowspan="2"> Notes Obtenues </td>
                  </tr>   
                </thead>
                <tbody>
                  <tr>
                    <td> 1 </td>
                    <td colspan="10">TD 1 </td>
                    <td> <?php echo '<p>'.$p1.' / 100</p>';?> </td>
                  </tr>
                
                  <tr>
                    <td> 2 </td>
                    <td colspan="10">TD 2 </td>
                    <td> <?php echo '<p>'.$p2.' / 100</p>';?></td>
                  </tr>
            
                  <tr>
                    <td> 3 </td>
                    <td colspan="10">TD 3 </td>
                    <td> <?php echo '<p>'.$p3.' / 100</p>';?> </td>
                  </tr>
            
                  <tr>
                    <td> 4 </td>
                    <td colspan="10">TD 4 </td>
                    <td> <?php echo '<p>'.$p4.' / 100</p>';?> </td>
                  </tr>
            
                  <tr>
                    <td> 5 </td>
                    <td colspan="10">TD 5 </td>
                    <td> <?php echo '<p>'.$p5.' / 100</p>';?> </td>
                  </tr>
                </tbody>
            
                
                <tfoot>
                    
                    <tr>
                    <td>#</td>
                    <td colspan="10" class="footer">Total Notes Obtenues</td>
                    <td colspan="2"> <?php echo $mark;?> / 500 </td>
                    </tr>
                    
                    <tr>
                    <td colspan="10" class="footer">Pourcentage</td>
                    <td colspan="2"><?php echo $percentage;?>% </td>
                    </tr>

                    <tr>
                        <td colspan="10" class="footer">Préom / Nom</td>
                        <td colspan="2"><?php echo $name;?> </td>
                        </tr>

                    <tr>
                        <td colspan="10" class="footer">Formation</td>
                        <td colspan="2"><?php echo $class;?> </td>
                        </tr>
                
                        <tr>
                        <td colspan="10" class="footer">Matricule</td>
                        <td colspan="2"><?php echo $rn;?> </td>
                        </tr>
                </tfoot>
              </table>

              <div class="row">
                  <div class="container">
                  <div class="button">
                    <button class="button" onclick="window.print()">Imprimer Notes</button>
        </div>
                  </div>
              </div>
        </div>
    </div>
</body>
</html>

<style>
  
  td {
    border: 1px solid #726E6D;
    padding: 7px;
  }
  
  thead{
    font-weight:bold;
    text-align:center;
    background: #625D5D;
    color:white;
  }

  .button {
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 3px 6px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
  
  table {
    border-collapse: collapse;
  }
  
  .footer {
    text-align:right;
    font-weight:bold;
  }
  
  tbody >tr:nth-child(odd) {
    background: #D1D0CE;
  }
  
  </style>