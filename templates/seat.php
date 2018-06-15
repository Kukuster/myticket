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
$route_part = myticket()->get_route_part($r_id, $from_r_station_i, $to_r_station_i);
$v_id = $route_part[1]['v_id'];

$base_price = 0;
foreach ($route_part as $station){
    $base_price += $station['r_price'];
}

$vehicle_seats = myticket()->get_vehicle_seats_by_vehicle_id($v_id);



$max_seat = 0;
foreach ($vehicle_seats as $vehicle_seat){
    if ($vehicle_seat['ms_seats_to'] > $max_seat){
        $max_seat = $vehicle_seat['ms_seats_to'];
    }
}





$route_total_stations = count($route);



$dots_margin = 30;

$svg_height=40;

/*
>7 - 750
7   - 750
6   - 700
5   - 650
4   - 600
3   - 550
2   - 500
*/
$svg_width=0;
if ($route_total_stations < 7){
    $svg_width = 400 + $route_total_stations*50;
} else {
    $svg_width = 750;
}


$distance_between_stations = (($svg_width - ($dots_margin*2)) / ($route_total_stations-1));


 ?>

<style>
    .train_plane a.seat.inactive{
        background-color: #7f7f7f;
    }
    
    .kukh2 {
        display: block;
        font-size: 1.5em;
        margin-top: 0.83em;
        margin-bottom: 0.83em;
        margin-left: 0;
        margin-right: 0;
        font-weight: bold;
    }
    
    .route_graph_wrapper {
        padding-top: 100px;
        padding-bottom: 100px;
    }
    
    .route_graph {
        margin: auto;
        width: 80%;
    }
    
    .station-dot-wrapper {
        
    }
    
    svg.route {
        display: block;
        margin: auto;
    }
    
    svg.route > .station {
        fill: #000000;
        r: 10;
    }
    svg.route > .station:hover {
        fill: #00003f;
        r: 12;
    }
    svg.route > .station.inactive {
        fill: #7f7f7f;
        r: 10;
    }
    svg.route > .station.inactive:hover {
        fill: #7f7fbf;
        r: 12;
    }
    
    svg.route > .path {
        stroke: #000000;
    }
    
    svg.route > .path.inactive {
        stroke: #7f7f7f;
    }
    
    
    
    .route_captions {
        margin: auto;
        display: table;
        table-layout: fixed;
        width: <?php echo (($distance_between_stations*$route_total_stations)); ?>px;
    }
    
    .station_captions {
        display: table-cell;
        text-align: center; 
    }
    
    .station_captions.inactive {
        color: #7f7f7f;
    }
    
    
</style>


<section>
    <div class="train_plane route_graph_wrapper">
        
        <div class="route_graph">
            <div class="station-dot-wrapper">
                <svg class="route" width="<?php echo $svg_width; ?>" height="<?php echo $svg_height; ?>">
                  <?php foreach ($route as $station_i=>$station){ ?>
                  <?php if ($station_i == $route_total_stations){ break; } ?>
                  <line x1="<?php echo $dots_margin + ($distance_between_stations*($station_i-1)); ?>" y1="<?php echo $svg_height/2; ?>" 
                        x2="<?php echo $dots_margin + ($distance_between_stations*($station_i)); ?>" y2="<?php echo $svg_height/2; ?>" 
                        stroke="#000000"
                        style="stroke-width:3"
                        class="path <?php if ($station_i<$from_r_station_i || $station_i>=$to_r_station_i){ echo 'inactive'; } ?>" />
                  <?php } ?>
                  
                  <?php foreach ($route as $station_i=>$station){ ?>
                    <?php
                    if (false){
                    $link_from_r_station_i = '';
                    $buy_url = $seat_page->get_url() . '?' . 'r_id='.$r_id . '&' . 'from_r_station_i='.$from_r_station_i . '&' . 'to_r_station_i='.$to_r_station_i;
                    }
                    ?>
                    <circle data-href=""
                            cx="<?php echo $dots_margin + ($distance_between_stations*($station_i-1)); ?>" cy="<?php echo $svg_height/2; ?>" r="10"
                            class="station <?php if ($station_i<$from_r_station_i || $station_i>$to_r_station_i){ echo 'inactive'; } ?>" />
                  <?php } ?>
                 
                </svg>
            </div>
            <div class="route_captions">
                <?php foreach ($route as $station_i=>$station){ ?>
                <p class="station_captions <?php if ($station_i<$from_r_station_i || $station_i>$to_r_station_i){ echo 'inactive'; } ?>">
                    <?php echo $station['s_name']; ?>
                </p>
                <?php } ?>
            </div>
        </div>


        
    </div>
</section>


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
