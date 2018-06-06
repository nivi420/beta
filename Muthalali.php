
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script type="text/javascript">
            $(document).ready(function(){
                $('.action').click(function(){
                    var action = $(this).attr('name');
                    $('#action').val(action);
                    $(this).closest('form').submit();

                })
            })
     </script>

<?php 

session_start(); 
date_default_timezone_set("Asia/Kolkata");
 
require 'config.php' ; 

$query = "SELECT 
            custMaster.custId,
            custMaster.firstName,
            custMaster.lastName,
            paymentTable.planId,
            addressMaster.addressOne,
            addressMaster.addressTwo,
            addressMaster.city,
            addressMaster.state,
            addressMaster.pin,
            addressMaster.email,
            addressMaster.phone, 
            planMaster.planName, 
            paymentTable.paymentRequested
FROM custMaster 
INNER JOIN addressMaster ON custMaster.custId=addressMaster.custId
INNER JOIN paymentTable ON paymentTable.custId=custMaster.custId
INNER JOIN planMaster ON paymentTable.planId = planMaster.planId
WHERE 
custMaster.custStatus != 'ACTIVE'

";

 if (!$result = mysqli_query ($link, $query)){                   
    echo "INSERT paymentTable Error  - ".mysqli_error ($link);
             
}

echo "<p class='mainTitle'> <br>Pending Customer Approvals<br><br><p>"; 

$i = 1; //counter for the checkboxes so that each has a unique name
echo "<form action='../../approval.php' method='post'>"; //form started here
echo "<table id='newCust' border='1'>
<tr>
<th>Customer Id</th>
<th>Cust Name</th>
<th>Address 1</th>
<th>Address 2</th>
<th>City</th>
<th>PIN</th>
<th>Email</th>
<th>Phone</th>
<th>Plan Name</th>
<th>Total Amount</th>
<th>Select</th>
</tr>";

while ($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
  echo "<td>" . $row['custId'] . "</td>";
  echo "<td>" . $row['firstName'] ." ". $row['lastName'] . "</td>";
  echo "<td>" . $row['addressOne'] . "</td>";
  echo "<td>" . $row['addressTwo'] . "</td>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['pin'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['phone'] . "</td>";
  echo "<td>" . $row['planName'] . "</td>";
  echo "<td>" . $row['paymentRequested'] . "</td>";
  echo "<td><input type='checkbox' name='check[$i]' value='".$row['custId']."'/>";   
  echo "</tr>";
  $i++;
    
    
} 
echo "</table>";
echo "<input class='action' type='button' name='approve' value='Approve' />";
 //  echo "<input class='action' type='button' name='edit' value='EDIT' />";
   echo "<input class='action' type='button' name='pending' value='Move to Pending' />";
   echo "<input type='hidden' name='action' value='' id='action' />"; //Action (edit, approve or delete) will be set here which will be passed as POST variable on form submission

echo "</form>";
/*

if (mysqli_num_rows($result)>0) {
    
    while ($row = mysqli_fetch_assoc($result)){
        echo "Cust Name : ".$row[custName]. "-Plan   : ".$row[planId]."-City : ".$row[city]."-PIN: ".$row[pin]."-Plan Name  : ".$row[planName]."-Total Amount  : ".$row[totalAmount]."<br>"; 
         
    } 
     
}
*/

//$row=mysqli_fetch_assoc($result);   

/*

if ($_POST) { 
      
    $query = "INSERT INTO loginTable (email,password,userRole) VALUES ('$_POST[email]','password','patron')"; 
    
    mysqli_query($link, $query); 
    $custId = mysqli_insert_id($link);
     
    
    $query = "INSERT INTO custMaster (custId,custName,custType,planId,creationDate,custStatus,updatedBy) VALUES ('$custId','$_POST[name]','INDV','$plan',NOW(),'NEW','System')"; 
    
    
    mysqli_query($link, $query);  
      
   $query = "INSERT INTO addressMaster (email, addressOne,addressTwo,city,state,pin,phone,landmark,custId) VALUES ('$_POST[email]','$_POST[address1]','$_POST[address2]','$_POST[city]','$_POST[state]','$_POST[pin]','$_POST[phone]','$_POST[landmark]','$custId')";
  
     
    mysqli_query($link, $query); 
}

*/


/*
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}
*/

?> 

<html> 

    <head> 
        <style type="text/css"> 
            th, td {
    
                border: 2px solid gray;

            }
            .mainTitle{
                text-align: center;
                color: rebeccapurple;
                font-size: 20px; 
                
            }
 
        </style>
    </head>


</html>
