<?php 
global $today;
$cities = myticket()->get_all_cities();
$city_stations = myticket()->get_all_stations();


get_template_part('header');
?>
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
      <article class="col1">
        <div class="box1">
          <h2 class="top">Hot Offers of the Week</h2>
          <div class="pad"> <strong>Birmingham</strong><br>
            <ul class="pad_bot1 list1">
              <li><span class="right color1">from GBP 143.-</span><a href="book2.html">Zurich</a></li>
            </ul>
            <strong>London (LCY)</strong><br>
            <ul class="pad_bot1 list1">
              <li><span class="right color1">from GBP 176.-</span><a href="book2.html">Geneva</a></li>
              <li><span class="right color1">from GBP 109.-</span><a href="book2.html">Zurich</a></li>
            </ul>
            <strong>London (LHR)</strong><br>
            <ul class="pad_bot2 list1">
              <li><span class="right color1">from GBP 100.-</span><a href="book2.html">Geneva</a></li>
              <li><span class="right color1">from GBP 112.-</span><a href="book2.html">Zurich</a></li>
              <li><span class="right color1">from GBP 88.-</span><a href="book2.html">Basel</a></li>
            </ul>
            <strong>Manchester</strong><br>
            <ul class="pad_bot2 list1">
              <li><span class="right color1">from GBP 97.-</span><a href="book2.html">Basel</a></li>
              <li><span class="right color1">from GBP 103.-</span><a href="book2.html">Zurich</a></li>
            </ul>
            <strong>Edinburgh</strong><br>
            <ul class="pad_bot2 list1">
              <li><span class="right color1">from GBP 165.-</span><a href="book2.html">Zurich</a></li>
            </ul>
            <strong>Birmingham</strong><br>
            <ul class="pad_bot1 list1">
              <li><span class="right color1">from GBP 143.-</span><a href="book2.html">Zurich</a></li>
            </ul>
            <strong>London (LCY)</strong><br>
            <ul class="pad_bot1 list1">
              <li><span class="right color1">from GBP 176.-</span><a href="book2.html">Geneva</a></li>
              <li><span class="right color1">from GBP 109.-</span><a href="book2.html">Zurich</a></li>
            </ul>
            <strong>London (LHR)</strong><br>
            <ul class="pad_bot2 list1">
              <li><span class="right color1">from GBP 100.-</span><a href="book2.html">Geneva</a></li>
              <li><span class="right color1">from GBP 112.-</span><a href="book2.html">Zurich</a></li>
              <li><span class="right color1">from GBP 88.-</span><a href="book2.html">Basel</a></li>
            </ul>
          </div>
        </div>
      </article>
      
      <article class="col2">
        <div class="tabs2">

          <div class="content">
            <div class="tab-content" id="Flight">
              <form id="form_5" action="/book/" class="form_5" method="get">
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
                          <?php /* ?><a href="#" class="help"></a><?php ///**/ ?>
                        </div>
                        <div class="row">
                          <span class="left">To (city)</span>
                          <select name="to_city" class="">
                            <option value=""></option>
                            <?php foreach ($cities as $city){ ?>
                              <option value="<?php echo $city['c_name']; ?>"><?php echo $city['c_name']; ?></option>
                            <?php } ?>
                          </select>
                          <?php /* ?><a href="#" class="help"></a><?php ///**/ ?>
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
                          <?php /* ?><a href="#" class="help"></a><?php ///**/ ?>
                        </div>
                        <div class="row">
                          <span class="left">To (station)</span>
                          <select name="to_station" class="">
                            <option value=""></option>
                            <?php foreach ($city_stations as $city_station){ ?>
                              <option data-city="<?php echo $city_station['c_name']; ?>" value="<?php echo $city_station['s_name']; ?>"><?php echo $city_station['s_name']; ?></option>
                            <?php } ?>
                          </select>
                          <?php /* ?><a href="#" class="help"></a><?php ///**/ ?>
                        </div>
                      </div>
                      <?php /* ?>
                      <div class="check_box">
                        <input type="checkbox">
                        <span>One way</span> <a href="#" class="help"></a>
                      </div>
                      <?php ///**/ ?>
                    </div>
                    <div class="wrapper under">
                      <span class="left">Trains</span>
                      <div class="cols marg_right1">
                        <h6>Outbound routes</h6>
                        <?php /* ?>
                        <div class="row">
                          <input type="text" class="input1" value="03.05.2011"  onblur="if(this.value=='') this.value='03.05.2011'" onFocus="if(this.value =='03.05.2011' ) this.value=''">
                          <input type="text" class="input1" value="+/- 0 Days"  onblur="if(this.value=='') this.value='+/- 0 Days'" onFocus="if(this.value =='+/- 0 Days' ) this.value=''">
                        </div>
                        <div class="marg_top1">
                          <div class="select1"> <a href="#" class="marker_left"></a>
                            <select>
                              <option>May 11</option>
                              <option>June 11</option>
                              <option>July 11</option>
                            </select>
                            <a href="#" class="marker_right"></a> </div>
                        </div>
                        <?php ///**/ ?>
                        <div class="calendar" style="padding-top: 5px">
                          <p>Date: <input type="text" id="datepicker2"></p>
                        </div>
                      </div>
                      <?php /* ?>
                      <div class="cols">
                        <h5>Outbound routes</h5>
                        <div class="row">
                          <input type="text" class="input1" value="03.05.2011"  onblur="if(this.value=='') this.value='03.05.2011'" onFocus="if(this.value =='03.05.2011' ) this.value=''">
                          <input type="text" class="input1" value="+/- 0 Days"  onblur="if(this.value=='') this.value='+/- 0 Days'" onFocus="if(this.value =='+/- 0 Days' ) this.value=''">
                        </div>
                        <div class="marg_top1">
                          <div class="select1"> <a href="#" class="marker_left"></a>
                            <select>
                              <option>May 11</option>
                              <option>June 11</option>
                              <option>July 11</option>
                            </select>
                            <a href="#" class="marker_right"></a> </div>
                        </div>
                        <div class="calendar"style="padding-top: 5px">
                          <p>Date: <input type="text" id="datepicker"></p>
                        </div>
                      </div>
                      <?php ///**/ ?>
                    </div>
                    <div class="wrapper under">
                        <div class="cols marg_right1">
                            <h6>Minimum and Maximum price</h6>
                            <div class="row">
                              <span class="left">Minimum</span>
                              <input name="price_min" type="text" class="input">
                              <?php /* ?><a href="#" class="help"></a><?php ///**/ ?>
                            </div>
                            <div class="row">
                              <span class="left">Maximum</span>
                              <input name="price_max" type="text" class="input">
                              <?php /* ?><a href="#" class="help"></a><?php ///**/ ?>
                            </div>
                        </div>

                    </div>
                    <div class="wrapper pad_bot1">
                      <span style="display:none;" class="left">Passengers</span>
                      <?php /* ?>
                      <div class="cols marg_right1">
                        <div class="row">
                          <input type="text" class="input2" value="2"  onblur="if(this.value=='') this.value='2'" onFocus="if(this.value =='2' ) this.value=''">
                          <span class="left">Adults</span> <a href="#" class="help"></a> </div>
                        <div class="row">
                          <input type="text" class="input2" value="0"  onblur="if(this.value=='') this.value='0'" onFocus="if(this.value =='0' ) this.value=''">
                          <span class="left">Children</span> <a href="#" class="help"></a> </div>
                      </div>
                      <?php ///**/ ?>
                      <?php /* ?>
                      <div class="cols">
                        <div class="select1"><span class="left">Class</span>
                          <select>
                            <option>Economy</option>
                          </select>
                        </div>
                      </div>
                      <?php ///**/ ?>
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




$routes = myticket()->get_routes_from_to($from, $to, $search_by, 1);


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
            'v_id'=>$route['from']['v_id'],
            'm_name'=>$route['from']['m_name'],
            
            'from_s_name'=>$route['from']['s_name'],
            'to_s_name'=>$route['to']['s_name'],
            
            'departure'=>$route['from']['r_time2'],
            'duration'=>$duration,
            'arrival'=>$route['to']['r_time1'],
            
            'available'=>$available,
            'price'=>$route_part_price
            
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
