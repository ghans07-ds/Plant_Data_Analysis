<?php
    include 'conn.php';
    if(isset($_POST['submit']))
    {
        $p_name=$_POST['p_name'];
        $p_class=$_POST['p_class'];
        $p_SupperClass=$_POST['p_SupperClass'];

        $sql="SELECT pID,pScore FROM trialtable where  p_name=$p_name AND CompoundName=$p_class AND targetGen=$p_SupperClass";
        $result=mysqli_query($conn,$sql);
        $i=0;
        if(mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                $pID[$i]=$row['pID'];
                $pScore[$i]=$row['pScore'];
                // echo "print";
                $i=$i+1;
            }
        }
    }
    else
    {
        echo "failed";
    }

?>