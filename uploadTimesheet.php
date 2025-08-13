

<?php
require('config/conn.php');
$valid['success'] = array('success' => false, 'messages' => array());
error_reporting(0);
if ($_POST['save']) {
	$day1 = $_POST['date1'];
$day2 = $_POST['date2'];
$day3 = $_POST['date3'];
$day4 = $_POST['date4'];
$day5 = $_POST['date5'];
//$day6 = $_POST['date6'];
$name = $_POST['name'];
$supervisor = $_POST['supervisor'];
$prj1 = $_POST['prj1'];
$prj2 = $_POST['prj2'];
$prj3 = $_POST['prj3']; 
$a1 = $_POST['a1'];
$b1 = $_POST['b1'];
$c1 = $_POST['c1'];
$d1 = $_POST['d1'];
$e1 = $_POST['e1'];

   
    $a2 = $_POST['a2'];
      
         $b2 = $_POST['b2'];
         
            $c2 = $_POST['c2'];
              
                $d2 = $_POST['d2'];
                 
                     $e2 = $_POST['e2'];
                      
                 
                        
                            $a3 = $_POST['a3'];
                              
                                $b3 = $_POST['b3'];
                                  
                                    $c3 = $_POST['c3'];
                                     
                                        $d3 = $_POST['d3'];
                                          
                                            $e3 = $_POST['e3'];
                                               
                                         
                                                 
                                                     $a4 = $_POST['a4'];
                                                      
                                                         $b4 = $_POST['b4'];
                                                        
                                                             $c4 = $_POST['c4'];
                                                            
                                                                $d4 = $_POST['d4'];
                                                                  
                                                                    $e4 = $_POST['e4'];
                                                                    
                                                                    $tot = $_POST['g4'];
                                                           
                                                                  if($_POST['save'] == 1){
                                                                    $day1 = $_POST['date1'];
$day2 = $_POST['date2'];
$day3 = $_POST['date3'];
$day4 = $_POST['date4'];
$day5 = $_POST['date5'];
//$day6 = $_POST['date6'];
$name = $_POST['name'];
$supervisor = $_POST['supervisor'];
$prj1 = $_POST['prj1'];
$prj2 = $_POST['prj2'];
$prj3 = $_POST['prj3']; 
$a1 = $_POST['a1'];
$b1 = $_POST['b1'];
$c1 = $_POST['c1'];
$d1 = $_POST['d1'];
$e1 = $_POST['e1'];

   
    $a2 = $_POST['a2'];
      
         $b2 = $_POST['b2'];
         
            $c2 = $_POST['c2'];
              
                $d2 = $_POST['d2'];
                 
                     $e2 = $_POST['e2'];
                      
                 
                        
                            $a3 = $_POST['a3'];
                              
                                $b3 = $_POST['b3'];
                                  
                                    $c3 = $_POST['c3'];
                                     
                                        $d3 = $_POST['d3'];
                                          
                                            $e3 = $_POST['e3'];
                                               
                                         
                                                 
                                                     $a4 = $_POST['a4'];
                                                      
                                                         $b4 = $_POST['b4'];
                                                        
                                                             $c4 = $_POST['c4'];
                                                            
                                                                $d4 = $_POST['d4'];
                                                                  
                                                                    $e4 = $_POST['e4'];
                                                                    
                                                                    $tot = $_POST['g4'];
                                                           
                                                                    $s = 1;
                                                                 

                                                                       


	$sql = "SELECT * from timesheet where day1='$day1' and name='$name' AND status = 2";
	$result = $connect->query($sql);
	$row_cnt = $result->num_rows;	
	if ($row_cnt == 0) {
        $insertQ = "INSERT INTO timesheet (name, supervisor, day1, day2,day3,day4,day5,  
  prj1, prj2,prj3,a1,b1, c1, d1, e1,a2, b2, c2,
   d2,e2,a3, b3, c3, d3,e3, a4, b4, c4,d4,e4,total_hrs,approved_status, status)
  VALUES ('$name','$supervisor', '$day1', '$day2','$day3','$day4', '$day5', 
'$prj1','$prj2', '$prj3', '$a1','$b1','$c1', '$d1',
   '$e1','$a2','$b2','$c2', '$d2',
   '$e2','$a3','$b3','$c3', '$d3',
   '$e3','$a4','$b4','$c4', '$d4',
   '$e4','$tot',0,'$s')";
  $insertR = mysqli_query($connect,$insertQ);
  
        if ($insertR === TRUE) { 
           $success =1;
        } else {                    
            $success = 0;            
        }
	}	
    else{
        $success = 2;
    }				
	
} 
}
else if($_POST['cancel']){
    $day1 = $_POST['date1'];
$day2 = $_POST['date2'];
$day3 = $_POST['date3'];
$day4 = $_POST['date4'];
$day5 = $_POST['date5'];
//$day6 = $_POST['date6'];
$name = $_POST['name'];
$supervisor = $_POST['supervisor'];
$prj1 = $_POST['prj1'];
$prj2 = $_POST['prj2'];
$prj3 = $_POST['prj3']; 
$a1 = $_POST['a1'];
$b1 = $_POST['b1'];
$c1 = $_POST['c1'];
$d1 = $_POST['d1'];
$e1 = $_POST['e1'];

   
    $a2 = $_POST['a2'];
      
         $b2 = $_POST['b2'];
         
            $c2 = $_POST['c2'];
              
                $d2 = $_POST['d2'];
                 
                     $e2 = $_POST['e2'];
                      
                 
                        
                            $a3 = $_POST['a3'];
                              
                                $b3 = $_POST['b3'];
                                  
                                    $c3 = $_POST['c3'];
                                     
                                        $d3 = $_POST['d3'];
                                          
                                            $e3 = $_POST['e3'];
                                               
                                         
                                                 
                                                     $a4 = $_POST['a4'];
                                                      
                                                         $b4 = $_POST['b4'];
                                                        
                                                             $c4 = $_POST['c4'];
                                                            
                                                                $d4 = $_POST['d4'];
                                                                  
                                                                    $e4 = $_POST['e4'];
                                                                    
                                                                    $tot = $_POST['g4'];
                                                           
    $s = 0;
    $sql = "SELECT * from timesheet where day1='$day1' and name='$name' AND status = 1 ORDER BY t_id DESC LIMIT 1 ";
      $result = $connect->query($sql);
      $row_cnt = $result->num_rows;	
      if ($row_cnt == 1) {
          $inserti =  "UPDATE  timesheet SET status = '$s' WHERE  day1='$day1' and name='$name' AND status = 1 ORDER BY t_id DESC LIMIT 1";
    $insertq = mysqli_query($connect,$inserti);
    
          if ($insertq === TRUE) {                   
              $success = 1;      
                    
          } else {                    
              $success = 0;            
          }
      }	
      else{
          $success = 2;
      }				
  }
  else if($_POST['submit']){
    $day1 = $_POST['date1'];
$day2 = $_POST['date2'];
$day3 = $_POST['date3'];
$day4 = $_POST['date4'];
$day5 = $_POST['date5'];
//$day6 = $_POST['date6'];
$name = $_POST['name'];
$supervisor = $_POST['supervisor'];
$prj1 = $_POST['prj1'];
$prj2 = $_POST['prj2'];
$prj3 = $_POST['prj3']; 
$a1 = $_POST['a1'];
$b1 = $_POST['b1'];
$c1 = $_POST['c1'];
$d1 = $_POST['d1'];
$e1 = $_POST['e1'];

   
    $a2 = $_POST['a2'];
      
         $b2 = $_POST['b2'];
         
            $c2 = $_POST['c2'];
              
                $d2 = $_POST['d2'];
                 
                     $e2 = $_POST['e2'];
                      
                 
                        
                            $a3 = $_POST['a3'];
                              
                                $b3 = $_POST['b3'];
                                  
                                    $c3 = $_POST['c3'];
                                     
                                        $d3 = $_POST['d3'];
                                          
                                            $e3 = $_POST['e3'];
                                               
                                         
                                                 
                                                     $a4 = $_POST['a4'];
                                                      
                                                         $b4 = $_POST['b4'];
                                                        
                                                             $c4 = $_POST['c4'];
                                                            
                                                                $d4 = $_POST['d4'];
                                                                  
                                                                    $e4 = $_POST['e4'];
                                                                    
                                                                    $tot = $_POST['g4'];
                                                           
    $s = 2;
    $sql = "SELECT * from timesheet where day1='$day1' and name='$name' AND status = 1 ORDER BY t_id DESC LIMIT 1";
      $result = $connect->query($sql);
      $row_cnt = $result->num_rows;	
      if ($row_cnt == 1) {
          $inserti =  "UPDATE  timesheet SET status = '$s' WHERE  day1='$day1' and name='$name' AND status = 1 ORDER BY t_id DESC LIMIT 1";
    $insertq = mysqli_query($connect,$inserti);
    
          if ($insertq === TRUE) {                   
              $success = 1;      
                    
          } else {                    
              $success = 0;            
          }
      }	
      else{
          $success = 1;
      }				
  }


$connect->close();
echo json_encode($success);// /if $_POST
?>