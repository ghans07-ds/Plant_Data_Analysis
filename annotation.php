<?php
    session_start();
    include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/annotation.css">
    <!-- <script src="js/annotation.js"></script> -->
    <title>Document</title>
</head>
<body>
    
    <div class="mainTitle">strcutur Image with infoTable</div>
    
   <!-- <h1 id="one">it is in the first paragraph...</h1> -->
   <div id="one">
        <img class="struct" src="image/sample.png" alt="structure">
        <img src="image/label.jpg" alt="label">
   </div>
   <!-- <h1 id="two">of course second paragraph...</h1> -->
   <div class='two'>
        <div class="title">HPinteractionTable</div>
        <table>
            <tr class="col">
                <td>ID</td>
                <td>RESNR</td>
                <td>RESTYPE</td>
                <td>RESCHAIN</td>
                <td>RESNR_LIG</td>
                <td>RESTYPE_LIG</td>
                <td>RESCHAIN_LIG</td>
                <td>DIST</td>
                <td>LIGCARBONIDX</td>
                <td>PROTCARBONIDX</td>
                <td>LIGCOO</td>
                <td>PROTCOO</td>
            </tr>
                <?php
                    $sql_fetch="SELECT * FROM hpinteraction";
                    $result_f=mysqli_query($conn,$sql_fetch);
                    if(mysqli_num_rows($result_f) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result_f))
                        {
                            echo "<tr class='value'>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['RESNR']."</td>";
                            echo "<td>".$row['RESTYPE']."</td>";
                            echo "<td>".$row['RESCHAIN']."</td>";
                            echo "<td>".$row['RESNR_LIG']."</td>";
                            echo "<td>".$row['RESTYPE_LIG']."</td>";
                            echo "<td>".$row['RESCHAIN_LIG']."</td>";
                            echo "<td>".$row['DIST']."</td>";
                            echo "<td>".$row['LIGCARBONIDX']."</td>";
                            echo "<td>".$row['PROTCARBONIDX']."</td>";
                            echo "<td>".$row['LIGCOO']."</td>";
                            echo "<td>".$row['PROTCOO']."</td>";
                            echo "</tr>";
                        }
                    }
                 
                ?>
        </table>
        <div class="title">HPinteractionTable</div>
        <table>

            <tr class="col">
                <td>ID</td>
                <td>RESNR</td>
                <td>RESTYPE</td>
                <td>RESCHAIN</td>
                <td>RESNR_LIG</td>
                <td>RESTYPE_LIG</td>
                <td>RESCHAIN_LIG</td>
                <td>DIST</td>
                <td>PROTISPOS</td>
                <td>LIG_GROUP</td>
                <td>LIG_IDX_LIST</td>
                <td>LIGCOO</td>
                <td>PROTCOO</td>
            </tr>
                <?php
                    $sql_fetch="SELECT * FROM hpinteraction";
                    $result_f=mysqli_query($conn,$sql_fetch);
                    if(mysqli_num_rows($result_f) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result_f))
                        {
                            echo "<tr class='value'>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['RESNR']."</td>";
                            echo "<td>".$row['RESTYPE']."</td>";
                            echo "<td>".$row['RESCHAIN']."</td>";
                            echo "<td>".$row['RESNR_LIG']."</td>";
                            echo "<td>".$row['RESTYPE_LIG']."</td>";
                            echo "<td>".$row['RESCHAIN_LIG']."</td>";
                            echo "<td>".$row['DIST']."</td>";
                            echo "<td>".$row['LIGCARBONIDX']."</td>";
                            echo "<td>".$row['PROTCARBONIDX']."</td>";
                            echo "<td>".$row['LIGCOO']."</td>";
                            echo "<td>".$row['PROTCOO']."</td>";
                            echo "</tr>";
                        }
                    }
                 
                ?>
        </table>
   </div>
</body>
</html> 