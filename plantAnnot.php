<?php
    session_start();
    include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/annotTable.css">
</head>
<body>
    
    <div class="title">
        Annotation-PiperLongum
    </div> 
    <div class="annot">
        <table>
            <tr class="col">
                <td>ID</td>
                <td>category</td>
                <td>term</td>
                <td>RT</td>
                <td>Count</td>
                <td>percent(%)</td>
                <td>P-Value</td>
                <td>Benjamimi</td>
            </tr>
            <!-- <tr class="value">
                <td>0</td>
                <td>UP_KEYWORDS</td>
                <td><a href="http://www.uniprot.org/keywords/?query=Oxidoreductase">Oxidoreductase</a></td>
                <td><a href="https://david.ncifcrf.gov/relatedTerms.jsp?id=870000802">RT</a></td>
                <td>14</td>
                <td>0.6</td>
                <td>4.7E-17</td>
                <td>2.6E-15</td>
            </tr> -->
            <?php
                    $sql_fetch="SELECT * FROM annotpiperlongum";
                    $result_f=mysqli_query($conn,$sql_fetch);

                    if(mysqli_num_rows($result_f) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result_f))
                        {
                            echo "<tr class='value'>";
                            echo "<td>".$row['rowNumber']."</td>";
                            echo "<td>".$row['category']."</td>";
                            echo "<td><a href=".$row['termLink'].">".$row['term']."</a></td>";
                            echo "<td><a href=".$row['RT'].">RT</a></td>";
                            echo "<td>".$row['Count']."</td>";
                            echo "<td>".$row['percent(%)']."</td>";
                            echo "<td>".$row['P-Value']."</td>";
                            echo "<td>".$row['Benjamimi']."</td>";
                            echo "</tr>";
                        }
                    }
                 
            ?>
        </table>
    </div>  
</body>
</html>