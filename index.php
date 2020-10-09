<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
     integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <title>Document</title>
</head>
<body>
<div>
    <?php
        session_start();
        include 'conn.php';
        $print=0;
        $Entry="";
        $EntryName="";
        $ProName="";
        $Organism="";
        $records="";
        $target="";
        if(isset($_POST['submit']))
        {
            // header('location:annotation.php');
            $p_name=$_POST['p_name'];
            $p_class=$_POST['p_class'];
            $p_SupperClass=$_POST['p_SupperClass'];
    
            $sql_fetch="SELECT TargetGene,ID,score FROM plantdata where  plantName='$p_name' AND CompoundName='$p_class' AND TargetGene='$p_SupperClass';";
            $result_f=mysqli_query($conn,$sql_fetch);
            $i=0;
            $print=1;
            $target="";
            if(mysqli_num_rows($result_f) > 0)
            {
                while ($row = mysqli_fetch_assoc($result_f))
                {
                    $target=$row['TargetGene'];
                    $ID[$i]=$row['ID'];
                    $score[$i]=$row['score'];
                    $i=$i+1;
                }
            }
        }
        // else
        // {
        //     echo "failed ";
        // }        
    ?>
</div>
    <div class="container">
            <div class="col-0 sidebar">
                <!-- <header>Plant Data Analysis</header> -->
                <!-- <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Statistic</a></li>
                    <li><a href="#">Visualization</a></li>
                    <li><a href="#">Information</a></li>
                </ul> -->
            </div>
        <div class="col-12 menu">
            <div class="col-12 main-menu">
                <form action="index.php" method="post" >
                    <ul>
                        <!-- <li><input type="text" name="p_name" id="p_name" placeholder="type Name"></li> -->
                        <li>
                            <select id="p_name" name="p_name">
                                <option disabled selected>-- Plant_Name --</option> 
                                <?php
                                    // Using database connection file here
                                    $records = mysqli_query($conn,"SELECT DISTINCT plantName From plantdata");  // Use select query here 
                            
                                    while($data = mysqli_fetch_array($records))
                                    {
                                        echo "<option value='". $data['plantName'] ."'>" .$data['plantName'] ."</option>";  // displaying data in option menu
                                    }
                                ?>
                            </select>
                        </li>
                        <!-- <li><input type="text" name="p_class" placeholder="type Class"></li> -->
                        <li>
                            <select id="p_class" name="p_class">
                                <option disabled selected>-- CompoundName --</option> 
                                <?php
                                    // Using database connection file here
                                    $records = mysqli_query($conn, "SELECT DISTINCT CompoundName From plantdata ");  // Use select query here 
                            
                                    while($data = mysqli_fetch_array($records))
                                    {
                                        echo "<option value='". $data['CompoundName'] ."'>" .$data['CompoundName'] ."</option>";  // displaying data in option menu
                                    }
                                ?>
                            </select>
                        </li>
                        <!-- <li><input type="text" name="p_SupperClass" placeholder="type SuperClass"></li> -->
                        <li>
                            <select id="p_SupperClass" name="p_SupperClass">
                                <option disabled selected>-- TargetGene --</option> 
                                <?php
                                    // Using database connection file here
                                    $records = mysqli_query($conn, "SELECT DISTINCT TargetGene From plantdata ");  // Use select query here 
                            
                                    while($data = mysqli_fetch_array($records))
                                    {
                                        echo "<option value='". $data['TargetGene'] ."'>" .$data['TargetGene'] ."</option>";  // displaying data in option menu
                                    }
                                ?>
                            </select>
                        </li>

                    </ul>
                    <div class="col-12 btn">
                        <button type="submit" name="submit">SUBMIT</button>
                    </div>
                </form>
            </div>
            <div class="col-12 title">
                <p><a href="http://localhost/komal/plantAnnot.php">
                        <?php
                            if($print==1){
                                echo "$p_name";
                            }else{
                                echo "";
                            }
                        ?>
                    </a>
                </p>
            </div>
            <div class="col-11 box-ans">
            <div class="box-a col-4 box-ac">
                <div class="id-title">CompoundName</div>
                    <ul class="scroll"> 
                    <?php
                        if($print==1){
                            // Using database connection file here
                            $records = mysqli_query($conn, "SELECT DISTINCT CompoundName From plantdata where plantName='$p_name'");  // Use select query here 
                            // 
                            while($data = mysqli_fetch_array($records))
                            {
                                echo "<li>".$data['CompoundName']."</li>";  // displaying data in option menu
                            }
                        }else{
                            echo "";
                        }
                        
                    ?>                        
                    </ul>
                </div>
                <div class="box-a col-4 box-aa">
                    <div class="id-title">TargetGene</div>
                    <ul class="scroll">
                         <?php
                            // $uniport="SELECT EntryName,ProName,Organism  from uniport where TargetGene=='$target'";
                            // $records = mysqli_query($conn,"SELECT  EntryName,Entry,ProName,Organism  FROM uniport WHERE TargetGene='$target'");
                            
                            // while($data = mysqli_fetch_array($records))
                            // {
                            //     $Entry=$data['Entry'];
                            //     $EntryName=$data['EntryName'];
                            //     $ProName=$data['ProName'];
                            //     $Organism=$data['Organism']; // displaying data in option menu
                            // }
                            
                            if($print==1)
                            {
                                
                                $records = mysqli_query($conn, "select DISTINCT p.TargetGene,t.link from plantdata as p,targetgenelink as t where p.TargetGene=t.TargetGene AND p.CompoundName='$p_class'");  // Use select query here 
                                // 
                                 while($data = mysqli_fetch_array($records))
                                 {
                                    echo "<li><a href=".$data['link'].">".$data['TargetGene']."</a></li>";  // displaying data in option menu
                                 }
                            }
                            else
                            {
                                echo "";
                            }
                        
                        ?> 
                    </ul>
                </div>
                <!-- fetching result based on give data -->
                <div class="box-a col-4 box-ab"> 
                    <div class="id-title">PDB-ID</div>
                    <ul class="scroll">
                       <?php
                        if($print==1)
                        {
                            // echo "<li>".$target."</li>";
                            while($i!=0)
                            {
                                $i--;
                                $ID[$i]=strtoupper($ID[$i]);
                                $link="https://www.rcsb.org/structure/".$ID[$i];
                                echo "<li><a href='$link' target='_blank'>".$ID[$i]." : ".$score[$i]."</a>
                                    <a href=annotation.php target='_blank'>structure</a></li>";  
                            }
                        }
                        else
                        {
                            echo "";
                        }
                       ?>
                    </ul>
                </div>
            </div>
           
        </div>
    </div>
<!-- <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();  
});
</script> -->
</body>
</html>

