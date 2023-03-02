<?php
$conn = mysqli_connect('db.luddy.indiana.edu','i494f22_team48','my+sql=i494f22_team48','i494f22_team48');
if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());
}

$display_query = "SELECT event_id, event_name, event_start_date, event_end_date FROM calendar_event_master";             
$results = mysqli_query($conn,$display_query);   
$count = mysqli_num_rows($results);  
if($count > 0) 
{
    $data_arr = array();
    $i = 1;
    while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
    {   
        $data_arr[$i]['event_id'] = $data_row['event_id'];
        $data_arr[$i]['title'] = $data_row['event_name'];
        $data_arr[$i]['start'] = date("Y-m-d", strtotime($data_row['event_start_date']));
        $data_arr[$i]['end'] = date("Y-m-d", strtotime($data_row['event_end_date']));
        $data_arr[$i]['color'] = '#87CEEB';
        $i++;
    }
    
    $data = array(
        'status' => true,
        'msg' => 'successfully!',
        'data' => $data_arr
    );
}
else
{
    $data = array(
        'status' => true,
        'msg' => 'No events to display.',
        'data' => array()
    );
}
echo json_encode($data);
?>
