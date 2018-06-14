<?php 


if (  (isset($_POST['r_id']) && !empty($_POST['r_id'])) && (isset($_POST['from_r_station_i']) && !empty($_POST['from_r_station_i'])) && (isset($_POST['to_r_station_i']) && !empty($_POST['to_r_station_i'])) && (isset($_POST['seat_i']) && !empty($_POST['seat_i']))  ){
    $r_id = $_POST['r_id'];
    $from_r_station_i = $_POST['from_r_station_i'];
    $to_r_station_i = $_POST['to_r_station_i'];
    $seat_i = $_POST['seat_i'];
} else {
    die();
}




$route = myticket()->get_route_part($r_id, $from_r_station_i, $to_r_station_i);
$v_id = $route[1]['v_id'];

$base_price = 0;
foreach ($route as $station){
    $base_price += $station['r_price'];
}

$vehicle_seats = myticket()->get_vehicle_seats_by_vehicle_id($v_id);

foreach ($vehicle_seats as $vehicle_seat){
    if ($seat_i < $vehicle_seat['ms_seats_to']){
        $price = $base_price*$vehicle_seat['ms_price_coef'];
        break;
    }
}

$now = new DateTime();
$purchase_time = $now->format('Y.m.d H:i');


if (isset($_COOKIE['u_id']) && !empty($_COOKIE['u_id'])){
    $u_id = $_COOKIE['u_id'];
} else {
    $u_id = '0';
}



$pdf = NULL;
$filename = '';


if (myticket()->seat_is_available($r_id, $from_r_station_i, $to_r_station_i, $seat_i)){
    myticket()->add_ticket($r_id, $seat_i, $from_r_station_i, $to_r_station_i, $price, $purchase_time, $u_id) or die(myticket()->error());
    
    $pdf_text = 'Route: ' . get_route_output_id($r_id) . '  -  '.$route[$from_r_station_i]['s_name'].' => '.$route[$to_r_station_i]['s_name'].' ( '.get_vehicle_output_id($v_id).' )'."\n".
    'Date and time: ' . $purchase_time."\n".
    'Price: ' . $price . ' UAH'."\n".
    'Bank card: ' . $_POST['number']."\n".
    'Full name: ' . $_POST['name']."\n".
    'Passport: ' . $_POST['passport'];
    
    $filename = 'myticket.pdf';
    
}


if (isset($_POST['redirect_on_success']) && !empty($_POST['redirect_on_success'])){
    $redirect_url = $_POST['redirect_on_success'];
} else {
    $redirect_url = get_page('home')->get_url();
}

$thankyou_page = get_page('thank-you-purchased');



?>
<form id="redirect_form" action="<?php echo $thankyou_page->get_url(); ?>" method="post">
    
    <input type="hidden" name="pdf_text" value="<?php echo htmlentities($pdf_text); ?>">
    <input type="hidden" name="redirect_url" value="<?php echo htmlentities($redirect_url); ?>">
    <input type="hidden" name="filename" value="<?php echo htmlentities($filename); ?>">
    
</form>
<script type="text/javascript">
    document.getElementById('redirect_form').submit();
</script>
<?php




/**/
