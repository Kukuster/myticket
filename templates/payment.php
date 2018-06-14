<?php 


if (  (isset($_GET['r_id']) && !empty($_GET['r_id'])) && (isset($_GET['from_r_station_i']) && !empty($_GET['from_r_station_i'])) && (isset($_GET['to_r_station_i']) && !empty($_GET['to_r_station_i'])) && (isset($_GET['seat_i']) && !empty($_GET['seat_i']))  ){
    $r_id = $_GET['r_id'];
    $from_r_station_i = $_GET['from_r_station_i'];
    $to_r_station_i = $_GET['to_r_station_i'];
    $seat_i = $_GET['seat_i'];
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

$changed_datetime = new DateTime();
$purchase_time = $changed_datetime->format('%Y.%m.%d %H:%i');


if (isset($_COOKIE['u_id']) && !empty($_COOKIE['u_id'])){
    $u_id = $_COOKIE['u_id'];
} else {
    $u_id = '0';
}







$payment_page = get_page('payment_post');
$payment_url = $payment_page->get_url();


$redirect_url = $_GET['redirect_on_success'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pay</title>
	<link href="../inc/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<style>
	.content{
		margin-top: 50px;
	}
	.card-wrapper{
		margin-bottom: 20px;
	}
	</style>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

<div class="container content">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-8 col-md-offset-4">
					<div class="card-wrapper"></div>
				</div>
			</div>
			<form class="form-horizontal" action="<?php echo $payment_url; ?>" class="choose_seat_form" method="post">
                <input type="hidden" id="r_id" name="r_id" value="<?php echo $r_id; ?>">
                <input type="hidden" id="from_r_station_i" name="from_r_station_i" value="<?php echo $from_r_station_i; ?>">
                <input type="hidden" id="to_r_station_i" name="to_r_station_i" value="<?php echo $to_r_station_i; ?>">
                <input type="hidden" id="seat_i" name="seat_i" value="<?php echo $seat_i; ?>">
                <input type="hidden" id="price" name="price" value="<?php echo $price; ?>">
                <input type="hidden" id="purchase_time" name="purchase_time" value="<?php echo $purchase_time; ?>">
                <input type="hidden" id="u_id" name="u_id" value="<?php echo $u_id; ?>">
                <input type="hidden" id="redirect_on_success" name="redirect_on_success" value="<?php echo $redirect_url; ?>">
                
				<div class="form-group">
					<label for="number" class="col-sm-4 control-label"><?php echo $language_data['payment']['Card Number']; ?></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="number" placeholder="<?php echo $language_data['payment']['Card Number']; ?>" name="number">
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-4 control-label"><?php echo $language_data['payment']['Full Name']; ?></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="name" placeholder="<?php echo $language_data['payment']['Full Name']; ?>" name="name">
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-4 control-label"><?php echo $language_data['payment']['Passport ID']; ?></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="passpoptId" placeholder="<?php echo $language_data['payment']['Passport ID']; ?>" name="passport">
					</div>
				</div>
				<div class="form-group">
					<label for="month" class="col-sm-4 control-label"><?php echo $language_data['payment']['Expiry date']; ?></label>
					<div class="col-sm-8">
						<select name="Month" id="idMonth" class="col-sm-4 control-label">
                            <?php for ($i=1; $i<=12; $i++) { ?>
                                <option value="<?php echo leading_zeros($i, 2); ?>"><?php echo leading_zeros($i, 2); ?></option>
                            <?php } ?>
                        </select>
						<select name="Year" id="idYear" class="col-sm-4 control-label">
                            <?php for ($i=2018; $i<=2030; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
					</div>
				</div>
				<div class="form-group">
					<label for="cvc" class="col-sm-4 control-label"><?php echo $language_data['payment']['CVC']; ?></label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="cvc" placeholder="<?php echo $language_data['payment']['CVC']; ?>" name="cvc">
					</div>
				</div>
				<div class="form-group" style="float: right;margin-right: 2px">
                    <input type="submit" name="buy" class="btn btn-success" value="<?php echo $language_data['payment']['Submit']; ?>">
				</div>
			</form>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../inc/js/jquery.card.js"></script>
<script src="../inc/js/card.js"> </script>

<script>
$(function(){
	$('form').card({
		container: '.card-wrapper'
	});
});
</script>

</body>
</html>