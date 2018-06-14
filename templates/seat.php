<?php 
if (  (isset($_GET['r_id']) && !empty($_GET['r_id'])) && (isset($_GET['from_r_station_i']) && !empty($_GET['from_r_station_i'])) && (isset($_GET['to_r_station_i']) && !empty($_GET['to_r_station_i']))  ){
    $r_id = $_GET['r_id'];
    $from_r_station_i = $_GET['from_r_station_i'];
    $to_r_station_i = $_GET['to_r_station_i'];
} else {
    die();
}

get_template_part('header');


$route = myticket()->get_route_part($r_id, $from_r_station_i, $to_r_station_i);
$v_id = $route[1]['v_id'];

$base_price = 0;
foreach ($route as $station){
    $base_price += $station['r_price'];
}

$vehicle_seats = myticket()->get_vehicle_seats_by_vehicle_id($v_id);



$max_seat = 0;
foreach ($vehicle_seats as $vehicle_seat){
    if ($vehicle_seat['ms_seats_to'] > $max_seat){
        $max_seat = $vehicle_seat['ms_seats_to'];
    }
}





?>
<style>
    .train_plane a.seat.inactive{
        background-color: #7f7f7f;
    }
</style>
<section>
    <div class="train_plane">
        
        <?php $last_seat = 0; ?>
        
        <?php $class_n=0; foreach ($vehicle_seats as $vehicle_seat){ $class_n++; ?>
            <?php if ($class_n!=1){ ?>
            <div class="place_line">
                <hr>
            </div>
            <?php } ?>
            
            <div class="class_business">
                <div class="business_nam" style="border: 1px solid #000;">
                    <h1><?php echo $vehicle_seat['tc_name']; ?></h1>
                </div>
                <ul style="
                        column-count: 2;
                        list-style-type: decimal;
                        height: 70px;
                        width: 750px;
                        display: flex;
                        flex-direction: row;
                        padding-top: 27px;
                        padding-left: 21px;
                        margin-bottom: 10px;
                        overflow-x: auto;
                        padding-bottom: 23px;
                        list-style-position: inside;
                        -moz-column-count: 2; /* Firefox */
                        -webkit-column-count: 2;">
                    <?php for ($i=$last_seat+1; $i<=$vehicle_seat['ms_seats_to']; $i++){ ?>
                        <li><i class="fa fa-ticket" aria-hidden="true"></i>
                            <?php $available = myticket()->seat_is_available($r_id, $from_r_station_i, $to_r_station_i, $i, $max_seat); ?>
                            <a  class="seat<?php echo ($available) ? '' : ' inactive' ; ?>"
                                data-i="<?php echo $i; ?>" 
                                data-tcname="<?php echo $vehicle_seat['tc_name']; ?>" 
                                data-price="<?php echo $base_price*$vehicle_seat['ms_price_coef']; ?>" 
                                href="javascript:void(0)">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php } ?>
                    <?php $last_seat = $vehicle_seat['ms_seats_to']; ?>
                </ul>
            </div>
        <?php } /// endforeach ?>
       
    </div>
    
    <?php 
    $payment_page = get_page('payment');
    $payment_url = $payment_page->get_url() . '?' . 'r_id='.$r_id . '&' . 'from_r_station_i='.$from_r_station_i . '&' . 'to_r_station_i='.$to_r_station_i . '&' . 'seat_i='.$seat_i;
    $this_url = $page->get_url() . '?' . 'r_id='.$r_id . '&' . 'from_r_station_i='.$from_r_station_i . '&' . 'to_r_station_i='.$to_r_station_i;
    ?>
    
    <div style="display:none;border: 1px solid #000000 " class="choose_seat">
        <form id="choose_seat_form" action="<?php echo $payment_url; ?>" class="choose_seat_form" method="get">
            <input type="hidden" id="r_id" name="r_id" value="<?php echo $r_id; ?>">
            <input type="hidden" id="from_r_station_i" name="from_r_station_i" value="<?php echo $from_r_station_i; ?>">
            <input type="hidden" id="to_r_station_i" name="to_r_station_i" value="<?php echo $to_r_station_i; ?>">
            <input type="hidden" id="seat_i" name="seat_i" value="">
            <input type="hidden" id="redirect_on_success" name="redirect_on_success" value="<?php echo $this_url; ?>">
            
            <p><?php echo $language_data['seat']['Seat #:']; ?> <span class="hint seat_i"></span></p>
            <p> <span class="hint seat_class"></span></p>
            <p> <span class="hint price"></span> ₴</p>
            
            <input type="submit" name="buy" class="buy" value="<?php echo $language_data['seat']['Buy']; ?>" style="margin-bottom: 12px; border-radius: 5px;">
            <input type="submit" name="reservation" class="reservation" value="<?php echo $language_data['seat']['Make a reservation']; ?>">
            
        </form>
    </div>
    
</section>
<?php 
get_template_part('footer');
