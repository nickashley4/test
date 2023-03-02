<?php                
$conn = mysqli_connect('db.luddy.indiana.edu','i494f22_team48','my+sql=i494f22_team48','i494f22_team48');
if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());
}

$event_name = $_POST['event_name'];
$event_start_date = date("Y-m-d", strtotime($_POST['event_start_date'])); 
$event_end_date = date("Y-m-d", strtotime($_POST['event_end_date'])); 
			
$insert_query = "INSERT INTO calendar_event_master(event_name, event_start_date, event_end_date) VALUES ('".$event_name."','".$event_start_date."','".$event_end_date."')";             
if(mysqli_query($conn, $insert_query))
{
	$data = array(
                'status' => true,
                'msg' => 'Event added successfully!'
            );
}
else
{
	$data = array(
                'status' => false,
                'msg' => 'Sorry, event not added.'				
            );
}
echo json_encode($data);	
?>