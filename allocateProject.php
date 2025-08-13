<?php
$prjArr = $_POST["prj_name"];
$date1Arr = $_POST["date1"];
$date2Arr = $_POST["date2"];
$nameArr = $_POST["name"];
require('config/conn.php');
/* Check connection */
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
for ($i = 0; $i < count($prjArr); $i++) {

    if(($prjArr[$i] != "")){   /* not allowing empty values and the row which has been removed. */
    $sql="INSERT INTO project_allocation (prj_name, s_date, e_date, name, status, approved_status)
VALUES
('$prjArr[$i]','$date1Arr[$i]', '$date2Arr[$i]', '$nameArr[$i]','1','0')";
    if (!mysqli_query($connect,$sql))
    {
        die('Error: ' . mysqli_error($connect));
    }
    }
}
header('Location:./manageAllocation.php');
mysqli_close($connect);
?>

