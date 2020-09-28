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
            header('location:annotation.php');
            $p_name=$_POST['p_name'];
            $p_class=$_POST['p_class'];
            $p_SupperClass=$_POST['p_SupperClass'];
    
            $sql_fetch="SELECT targetGen,pID,pScore FROM trialtable where  name='$p_name' AND CompoundName='$p_class' AND targetGen='$p_SupperClass';";
            $result_f=mysqli_query($conn,$sql_fetch);
            $i=0;
            $print=1;
            $target="";
            if(mysqli_num_rows($result_f) > 0)
            {
                while ($row = mysqli_fetch_assoc($result_f))
                {
                    $target=$row['targetGen'];
                    $pID[$i]=$row['pID'];
                    $pScore[$i]=$row['pScore'];
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
        <div class="col-3 sidebar">
            <header>Plant Data Analysis</header>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Statistic</a></li>
                <li><a href="#">Visualization</a></li>
                <li><a href="#">Information</a></li>
            </ul>
        </div>
        <div class="col-9 menu">
            <div class="col-12 main-menu">
                <form action="index.php" method="post" >
                    <ul>
                        <!-- <li><input type="text" name="p_name" id="p_name" placeholder="type Name"></li> -->
                        <li>
                            <select id="p_name" name="p_name">
                                <option disabled selected>-- Plant_Name --</option> 
                                <?php
                                    // Using database connection file here
                                    $records = mysqli_query($conn,"SELECT DISTINCT name From trialtable");  // Use select query here 
                            
                                    while($data = mysqli_fetch_array($records))
                                    {
                                        echo "<option value='". $data['name'] ."'>" .$data['name'] ."</option>";  // displaying data in option menu
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
                                    $records = mysqli_query($conn, "SELECT DISTINCT CompoundName From trialtable");  // Use select query here 
                            
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
                                <option disabled selected>-- targetGen --</option> 
                                <?php
                                    // Using database connection file here
                                    $records = mysqli_query($conn, "SELECT DISTINCT targetGen,name From trialtable");  // Use select query here 
                            
                                    while($data = mysqli_fetch_array($records))
                                    {
                                        echo "<option value='". $data['targetGen'] ."'>" .$data['targetGen'] ."</option>";  // displaying data in option menu
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
            
            <div class="col-8 box-ans">
                <div class="box-a col-6 box-aa">
                    <ul>
                         <?php
                            // $uniport="SELECT EntryName,ProName,Organism  from uniport where TargetGen=='$target'";
                            $records = mysqli_query($conn,"SELECT  EntryName,Entry,ProName,Organism  FROM uniport WHERE TargetGen='$target'");
                            
                            while($data = mysqli_fetch_array($records))
                            {
                                $Entry=$data['Entry'];
                                $EntryName=$data['EntryName'];
                                $ProName=$data['ProName'];
                                $Organism=$data['Organism']; // displaying data in option menu
                            }
                            
                            if($print==1)
                            {
                                
                                $text="<ul><li>".$Entry."</li><li>".$EntryName."</li><li>".$ProName."</li><li>".$Organism."</li></ul>";
                                echo "<li>".$p_name."</li>";
                                echo "<li>".$p_class."</li>";
                                echo "<li>".$p_SupperClass."<span class='tooltiptext'>".$text."</li>";
                            }
                            else
                            {
                                echo "";
                            }
                        
                        ?> 
                    </ul>
                </div>
                <!-- fetching result based on give data -->
                <div class="box-a col-6 box-ab"> 
                    <ul>
                       <?php
                        if($print==1)
                        {
                            // echo "<li>".$target."</li>";
                            while($i!=0)
                            {
                                $i--;
                                $pID[$i]=strtoupper($pID[$i]);
                                $link="https://www.rcsb.org/structure/".$pID[$i];
                                echo "<li><a href='$link' target='_blank'>".$pID[$i]." : ".$pScore[$i]."</a></li>";  
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
            <div class="col-11 box-same">
                <div class="box-s col-4">
                    <div class="id-title">
                        <?php
                            if($print==1)
                                {echo $pID[2];} 
                            else{echo " ";}
                        ?>
                    </div>
                    <ul>
                    <!-- fetching similar result for box1 -->
                        <?php  
                            if($print==1)
                            {
                                $error_b1=0;
                                $sql_b1="SELECT CompoundName,pScore from trialtable WHERE pID='$pID[2]';";
                                $result_b1=mysqli_query($conn,$sql_b1);

                                if(mysqli_num_rows($result_b1)>0 && $print==1)
                                {
                                    while($row=mysqli_fetch_assoc($result_b1))
                                    {
                                        if($row['CompoundName']!=$p_class)
                                        {
                                            echo "<li>".$row['CompoundName']." : ".$row['pScore']."</li>"; 
                                            $error_b1=1;
                                        }
                                    }
                                    if($error_b1==0)
                                    {
                                        echo "<li>"."No Similarity"."</li>";   
                                    }
                                }
                            }
                            else{echo "";}
                        
                        ?>
                    </ul>
                </div>
                <div class="box-s col-4">
                    <div class="id-title">
                        <?php
                            if($print==1)
                                {echo $pID[1];} 
                            else{echo " ";}
                        ?>
                    </div>
                    <ul>
                    <!-- fetching similar result for box2 -->
                        <?php  
                            if($print==1)
                            {
                                $error_b2=0;
                                $sql_b1="SELECT CompoundName,pScore from trialtable WHERE pID='$pID[1]';";
                                $result_b1=mysqli_query($conn,$sql_b1);

                                if(mysqli_num_rows($result_b1)>0 && $print==1)
                                {
                                    while($row=mysqli_fetch_assoc($result_b1))
                                    {
                                        if($row['CompoundName']!=$p_class)
                                        {
                                            echo "<li>".$row['CompoundName']." : ".$row['pScore']."</li>"; 
                                            $error_b2=1;
                                        }
                                    }
                                    if($error_b2==0)
                                    {
                                        echo "<li>"."No Similarity"."</li>";   
                                    }
                                }
                            }
                            else{echo "";}

                        ?>
                    </ul>
                </div>
                <div class="box-s col-4">
                    <div class="id-title">
                        <?php
                        if($print==1)
                            {echo $pID[0];} 
                        else{echo " ";}
                        ?>
                    </div>
                    <ul>
                    <!-- fetching similar result for box3 -->
                        <?php  
                            if($print==1)
                            {
                                $error_b3=0;
                                $sql_b1="SELECT CompoundName,pScore from trialtable WHERE pID='$pID[0]';";
                                $result_b1=mysqli_query($conn,$sql_b1);

                                if(mysqli_num_rows($result_b1)>0 && $print==1)
                                {
                                    while($row=mysqli_fetch_assoc($result_b1))
                                    {
                                        if($row['CompoundName']!=$p_class)
                                        {
                                            echo "<li>".$row['CompoundName']." : ".$row['pScore']."</li>"; 
                                            $error_b3=1;
                                        }
                                    }
                                    if($error_b3==0)
                                    {
                                        echo "<li>"."No Similarity"."</li>";   
                                    }
                                }
                            }
                            else{echo "";}

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

