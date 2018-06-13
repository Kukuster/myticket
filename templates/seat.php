<?php 
if (  (isset($_GET['r_id']) && !empty($_GET['r_id'])) && (isset($_GET['from_r_station_i']) && !empty($_GET['from_r_station_i'])) && (isset($_GET['to_r_station_i']) && !empty($_GET['to_r_station_i']))  ){
    $r_id = $_GET['r_id'];
    $from_r_station_i = $_GET['from_r_station_i'];
    $to_r_station_i = $_GET['to_r_station_i'];
} else {
    die();
}

get_template_part('header');


$route = myticket()->get_route_by_id($r_id);
$v_id = $route[0]['v_id'];

$vehicle_seats = myticket()->get_vehicle_seats_by_vehicle_id($v_id);



?>
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
                <div class="business_nam">
                    <h1><?php echo $vehicle_seat['tc_name']; ?></h1>
                </div>
                <ul>
                    <?php for ($i=$last_seat+1; $i<=$vehicle_seat['ms_seats_to']; $i++){ ?>
                        <li><i class="fa fa-ticket" aria-hidden="true"></i><a href="javascript:void(0)"><?php echo $i; ?></a></li>
                    <?php } ?>
                    <?php $last_seat = $vehicle_seat['ms_seats_to']; ?>
                </ul>
            </div>
        <?php } /// endforeach ?>
       
    </div>
    
    <div>
        <form id="choose_seat_form" action="<?php //echo $page->get_url(); ?>" class="choose_seat_form" method="get">
            <input type="hidden" id="r_id" name="r_id" value="">
            <input type="hidden" id="from_r_station_i" name="from_r_station_i" value="">
            <input type="hidden" id="to_r_station_i" name="to_r_station_i" value="">
            <input type="hidden" id="seat_n" name="seat_n" value="">
            
            <p>Seat #: <span class="hint seat_n"></span></p>
            <p>Seat class: <span class="hint seat_class"></span></p>
            <p>Price: <span class="hint price"></span>₴</p>
            
            <input type="submit" name="buy" class="buy" value="Buy">
            <input type="submit" name="reservation" class="reservation" value="Make a reservation">
            
        </form>
    </div>
    
</section>
<?php 
get_template_part('footer');
