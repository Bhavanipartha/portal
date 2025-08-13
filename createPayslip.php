
<?php
require('config/conn.php');
$nameArr = $_POST["name"];
$superArr = $_POST["head"];
$jobArr = $_POST["job"];
$payArr = $_POST["pay"];
$date = $_POST["date1"];


/* Check connection */
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
for ($i = 0; $i < count($nameArr); $i++) {
    if(($nameArr[$i] != "")){   /* not allowing empty values and the row which has been removed. */

        // Check if this employee is a best performer for the given month
        $name = mysqli_real_escape_string($connect, $nameArr[$i]);
        $month = date('Y-m', strtotime($date)); // Extract year-month from date1 for match
        $checkPerf = "SELECT incentive FROM best_performers WHERE name='$name' AND month='$month' LIMIT 1";
        $resultPerf = mysqli_query($connect, $checkPerf);

        $incentive = 0;
        if (mysqli_num_rows($resultPerf) > 0) {
            $row = mysqli_fetch_assoc($resultPerf);
            $incentive = $row['incentive'];
        }

        $finalSalary = (float)$payArr[$i] + $incentive;

        $sql = "INSERT INTO pay_slip (ps_id, name, supervisor, salary, status, designation, date1) 
                VALUES ('', '$nameArr[$i]', '$superArr[$i]', '$finalSalary', '1', '$jobArr[$i]', '$date')";
   
        if (!mysqli_query($connect, $sql)) {
            die('Error: ' . mysqli_error($connect));
        }
    }
}

echo "<script>alert('PaySlip created successfully!');</script>";
echo "<script>window.location.href='paySlip.php'</script>";

mysqli_close($connect);

?>


