<?php 
global $today;
$cities = myticket()->get_all_cities();
$city_stations = myticket()->get_all_stations();


get_template_part('header');
?>
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
    
      <?php get_template_part('hot_offers_side_column'); ?>
      
      <article class="col2">
        <div class="tabs2">

          <div class="content">
            <div class="tab-content" id="Flight">
              <form id="form_5" action="<?php echo $page->get_url(); ?>" class="form_5" method="get">
                <div>
                  <div class="pad">
                    <div class="wrapper under">
                      <div class="col1">
                        <div class="row">
                          <span class="left">From (city)</span>
                          <select name="from_city" class="">
                            <option value=""></option>
                            <?php foreach ($cities as $city){ ?>
                              <option value="<?php echo $city['c_name']; ?>"><?php echo $city['c_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="row">
                          <span class="left">To (city)</span>
                          <select name="to_city" class="">
                            <option value=""></option>
                            <?php foreach ($cities as $city){ ?>
                              <option value="<?php echo $city['c_name']; ?>"><?php echo $city['c_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col1">
                        <div class="row">
                          <span class="left">From (station)</span>
                          <select name="from_station" class="">
                            <option value=""></option>
                            <?php foreach ($city_stations as $city_station){ ?>
                              <option data-city="<?php echo $city_station['c_name']; ?>" value="<?php echo $city_station['s_name']; ?>"><?php echo $city_station['s_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="row">
                          <span class="left">To (station)</span>
                          <select name="to_station" class="">
                            <option value=""></option>
                            <?php foreach ($city_stations as $city_station){ ?>
                              <option data-city="<?php echo $city_station['c_name']; ?>" value="<?php echo $city_station['s_name']; ?>"><?php echo $city_station['s_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="wrapper under">
                      <span class="left"><?php echo $page->get_page_setting('filter_title'); ?></span>
                      <div class="cols marg_right1">
                        <h6><?php echo $page->get_page_setting('filter_subtitle'); ?></h6>
                        <div class="calendar" style="padding-top: 5px">
                          <p>Date: <input type="text" id="datepicker2"></p>
                        </div>
                      </div>
                    </div>
                    <div class="wrapper under">
                        <div class="cols marg_right1">
                            <h6>Minimum and Maximum price</h6>
                            <div class="row">
                              <span class="left">Minimum</span>
                              <input name="price_min" type="text" class="input">
                            </div>
                            <div class="row">
                              <span class="left">Maximum</span>
                              <input name="price_max" type="text" class="input">
                            </div>
                        </div>
                    </div>
                    <div class="wrapper pad_bot1">
                      <span style="display:none;" class="left">Passengers</span>
                      <span class="right relative">
                        <p href="#" class="button1">
                          <input type="submit" value="Search">
                        </p>
                      </span>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </article>
    </div>
  </section>
  <!--content end-->

<?php



if (  (isset($_GET['from_city']) && !empty($_GET['from_city'])) || (isset($_GET['from_station']) && !empty($_GET['from_station'])) ||
  (isset($_GET['to_city']) && !empty($_GET['to_city'])) || (isset($_GET['to_station']) && !empty($_GET['to_station']))   ):


$search_by = array(
    'from'=>'',
    'to'=>''
);

if (isset($_GET['from_city']) && !empty($_GET['from_city'])){
    $from = $_GET['from_city'];
    $search_by['from'] = 'city';
}
if (isset($_GET['from_station']) && !empty($_GET['from_station'])){
    $from = $_GET['from_station'];
    $search_by['from'] = 'station';
}
if (isset($_GET['to_city']) && !empty($_GET['to_city'])){
    $to = $_GET['to_city'];
    $search_by['to'] = 'city';
}
if (isset($_GET['to_station']) && !empty($_GET['to_station'])){
    $to = $_GET['to_station'];
    $search_by['to'] = 'station';
}



if (isset($_GET['date']) && !empty($_GET['date'])){
    $date = $_GET['date'];
}


if (isset($_GET['price_min']) && !empty($_GET['price_min']) && isset($_GET['price_max']) && !empty($_GET['price_max'])){
    $price_min = (int) $_GET['price_min'];
    $price_max = (int) $_GET['price_max'];
    
    if ($price_max < $price_min){
        $swap = $price_max;
        $price_max = $price_min;
        $price_min = $swap;
    }
}






if (isset($date) && !empty($date)){
    $datetime_unix = mktime(0, 0, 0, substr($date,5,2), substr($date,8,2), substr($date,0,4));
    $datetime = new DateTime();
    $datetime->setTimestamp($datetime_unix);
}




$routes = myticket()->get_routes_from_to($from, $to, $search_by, $page->get_page_setting('vt_id'));


$output_n = 0;

foreach ($routes as $route){
    
    $departure_datetime = myticket()->create_datetime($route['from']['r_time2']);
    $arrival_datetime = myticket()->create_datetime($route['to']['r_time1']);
    
    
    $duration = datetime_difference(
        $departure_datetime,
        $arrival_datetime
    );
    
    $vehicle_seats = myticket()->get_vehicle_seats_by_vehicle_id($route['from']['v_id']);
    
    $available = array();
    $seats_to_i = 0;
    
    foreach ($vehicle_seats as $seat_set){
        $seats_available = $seat_set['ms_seats_to'] - $seats_to_i;
        $seats_to_i = $seat_set['ms_seats_to'];
        
        $available[] = array(
            'seats_available' => $seats_available,
            'tc_id' => $seat_set['tc_id'],
            'tc_name' => $seat_set['tc_name'],
            'ms_price_coef' => $seat_set['ms_price_coef']
        );
    }
    
    
    $route_part = myticket()->get_route_part($route['from']['r_id'], $route['from']['r_station_i'], $route['to']['r_station_i']);
    
    $route_part_price = 0;
    foreach ($route_part as $station){
        $route_part_price += $station['r_price'];
    }
    
    
    
    $price_satisfy=false;
    foreach ($available as $class){
        
        $price=$route_part_price*$class['ms_price_coef'];
        
        if ( ( empty($price_min) || $price >= $price_min )  &&
             ( empty($price_max) || $price <= $price_max )  ){
            $price_satisfy=true;
        }
        
    }
    
    $date_satisfy=false;
    if ( (  empty($date) || ( $datetime->format('Y-m-d')==$departure_datetime->format('Y-m-d') || $datetime->format('Y-m-d')==$arrival_datetime->format('Y-m-d') ) ) &&
        ( $departure_datetime->format('U') > $today->format('U') )  ){
        
        $date_satisfy=true;
    }
    
    
    
    if ( $price_satisfy  &&  $date_satisfy ){
        
        
        get_template_part('route-block', array(
            'r_id'=>$route['from']['r_id'],
            'v_id'=>$route['from']['v_id'],
            'm_name'=>$route['from']['m_name'],
            
            'from_s_name'=>$route['from']['s_name'],
            'to_s_name'=>$route['to']['s_name'],
            
            'from_r_station_i'=>$route['from']['r_station_i'],
            'to_r_station_i'=>$route['to']['r_station_i'],
            
            'departure'=>$route['from']['r_time2'],
            'duration'=>$duration,
            'arrival'=>$route['to']['r_time1'],
            
            'available'=>$available,
            'price'=>$route_part_price,
            
            'route_image_filename'=>$route_image_filename,
            
        ));
        
        
        $output_n++;
        
    }
    

    
} /// endforeach


if (!$output_n){
    ?><h3>We are sorry, there is no route that satisfy your requirements</h3><?php
}


endif;

?>

<?php 

get_template_part('footer');
