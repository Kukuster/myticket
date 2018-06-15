<?php

class myticket
{

    private $settings = array();

    private $db = NULL;
    
    
    
    
    private function do_sql_query($sql){
        return mysqli_query($this->db, $sql);
    }
    
    
    private function sql_query_from_station($station_name){
        return 'SELECT
    DISTINCT routes_with_station.r_id as from_r_id,
    routes_with_station.v_id as from_v_id,
    routes_with_station.vt_id as from_vt_id,
    routes_with_station.m_id as from_m_id,
    routes_with_station.m_name as from_m_name,
    routes_with_station.r_price as from_r_price,
    routes_with_station.r_time1 as from_r_time1,
    routes_with_station.r_time2 as from_r_time2,
    routes_with_station.r_station_i as from_r_station_i,
    routes_with_station.s_id as from_s_id,
    routes_with_station.s_name as from_s_name,
    routes_with_station.s_code as from_s_code,
    routes_with_station.c_id as from_c_id,
    routes_with_station.c_name as from_c_name,
    routes_with_station.c_country as from_c_country
FROM
    (
    SELECT
        DISTINCT myticket_route.r_id,
        myticket_route.r_station_i,
        CONCAT(myticket_route.r_id, ",", myticket_route.r_station_i) as route_n_station,
        myticket_vehicle.v_id,
        myticket_model.vt_id,
        myticket_model.m_id,
        myticket_model.m_name,
        myticket_route.r_price,
        myticket_route.r_time1,
        myticket_route.r_time2,
        myticket_station.s_id,
        myticket_station.s_name,
        myticket_station.s_code,
        myticket_city.c_id,
        myticket_city.c_name,
        myticket_city.c_country
    FROM
        myticket_route,
        myticket_vehicle,
        myticket_model,
        myticket_station,
        myticket_city
    WHERE
        myticket_route.s_id = myticket_station.s_id AND
        myticket_station.c_id = myticket_city.c_id AND
        myticket_route.v_id = myticket_vehicle.v_id AND
        myticket_vehicle.m_id = myticket_model.m_id AND
        myticket_station.s_name = "' . $station_name . '"
    GROUP BY
        myticket_route.r_id, myticket_route.r_station_i
    ) as routes_with_station
WHERE
    routes_with_station.route_n_station not in
    (
    SELECT
        CONCAT(last_stations_tmp.r_id, ",", last_stations_tmp.last_station_i) as route_n_station
    FROM 
        (
        SELECT
            DISTINCT myticket_route.r_id,
            MAX(myticket_route.r_station_i) as last_station_i
        FROM
            myticket_route
        GROUP BY
            myticket_route.r_id
        ) as last_stations_tmp
    )
GROUP BY routes_with_station.r_id, routes_with_station.r_station_i
';
    }
    
    private function sql_query_from_city($city_name){
        return 'SELECT
    DISTINCT routes_with_city.r_id as from_r_id,
    routes_with_city.v_id as from_v_id,
    routes_with_city.vt_id as from_vt_id,
    routes_with_city.m_id as from_m_id,
    routes_with_city.m_name as from_m_name,
    routes_with_city.r_price as from_r_price,
    routes_with_city.r_time1 as from_r_time1,
    routes_with_city.r_time2 as from_r_time2,
    routes_with_city.r_station_i as from_r_station_i,
    routes_with_city.s_id as from_s_id,
    routes_with_city.s_name as from_s_name,
    routes_with_city.s_code as from_s_code,
    routes_with_city.c_id as from_c_id,
    routes_with_city.c_name as from_c_name,
    routes_with_city.c_country as from_c_country
FROM
    (
    SELECT
        DISTINCT myticket_route.r_id,
        myticket_route.r_station_i,
        CONCAT(myticket_route.r_id, ",", myticket_route.r_station_i) as route_n_station,
        myticket_vehicle.v_id,
        myticket_model.vt_id,
        myticket_model.m_id,
        myticket_model.m_name,
        myticket_route.r_price,
        myticket_route.r_time1,
        myticket_route.r_time2,
        myticket_station.s_id,
        myticket_station.s_name,
        myticket_station.s_code,
        myticket_city.c_id,
        myticket_city.c_name,
        myticket_city.c_country
    FROM
        myticket_route,
        myticket_vehicle,
        myticket_model,
        myticket_station,
        myticket_city
    WHERE
        myticket_route.s_id = myticket_station.s_id AND
        myticket_station.c_id = myticket_city.c_id AND
        myticket_route.v_id = myticket_vehicle.v_id AND
        myticket_vehicle.m_id = myticket_model.m_id AND
        myticket_city.c_name = "' . $city_name . '"
    GROUP BY
        myticket_route.r_id, myticket_route.r_station_i
    ) as routes_with_city
WHERE
    routes_with_city.route_n_station not in
    (
    SELECT
        CONCAT(last_stations_tmp.r_id, ",", last_stations_tmp.last_station_i) as route_n_station
    FROM 
        (
        SELECT
            DISTINCT myticket_route.r_id,
            MAX(myticket_route.r_station_i) as last_station_i
        FROM
            myticket_route
        GROUP BY
            myticket_route.r_id
        ) as last_stations_tmp
    )
GROUP BY routes_with_city.r_id, routes_with_city.r_station_i
';
    }
    
    private function sql_query_to_station($station_name){
        return 'SELECT
    DISTINCT myticket_route.r_id as to_r_id,
    myticket_vehicle.v_id as to_v_id,
    myticket_model.vt_id as to_vt_id,
    myticket_model.m_id as to_m_id,
    myticket_model.m_name as to_m_name,
    myticket_route.r_price as to_r_price,
    myticket_route.r_time1 as to_r_time1,
    myticket_route.r_time2 as to_r_time2,
    myticket_route.r_station_i as to_r_station_i,
    myticket_station.s_id as to_s_id,
    myticket_station.s_name as to_s_name,
    myticket_station.s_code as to_s_code,
    myticket_city.c_id as to_c_id,
    myticket_city.c_name as to_c_name,
    myticket_city.c_country as to_c_country
FROM
    myticket_route,
    myticket_vehicle,
    myticket_model,
    myticket_station,
    myticket_city
WHERE
    myticket_route.r_station_i <> 1 AND
    myticket_route.v_id = myticket_vehicle.v_id AND
    myticket_vehicle.m_id = myticket_model.m_id AND
    myticket_route.s_id = myticket_station.s_id AND
    myticket_station.c_id = myticket_city.c_id AND
    myticket_station.s_name = "' . $station_name . '"
GROUP BY
    myticket_route.r_id, myticket_route.r_station_i
';
    }
    
    private function sql_query_to_city($city_name){
        return 'SELECT
    DISTINCT myticket_route.r_id as to_r_id,
    myticket_vehicle.v_id as to_v_id,
    myticket_model.vt_id as to_vt_id,
    myticket_model.m_id as to_m_id,
    myticket_model.m_name as to_m_name,
    myticket_route.r_price as to_r_price,
    myticket_route.r_time1 as to_r_time1,
    myticket_route.r_time2 as to_r_time2,
    myticket_route.r_station_i as to_r_station_i,
    myticket_station.s_id as to_s_id,
    myticket_station.s_name as to_s_name,
    myticket_station.s_code as to_s_code,
    myticket_city.c_id as to_c_id,
    myticket_city.c_name as to_c_name,
    myticket_city.c_country as to_c_country
FROM
    myticket_route,
    myticket_vehicle,
    myticket_model,
    myticket_station,
    myticket_city
WHERE
    myticket_route.r_station_i <> 1 AND
    myticket_route.v_id = myticket_vehicle.v_id AND
    myticket_vehicle.m_id = myticket_model.m_id AND
    myticket_route.s_id = myticket_station.s_id AND
    myticket_station.c_id = myticket_city.c_id AND
    myticket_city.c_name = "' . $city_name .'"
GROUP BY
    myticket_route.r_id, myticket_route.r_station_i
';
    }
    
    
    private function create_connection($servername, $username, $password, $database){
        $this->db = mysqli_connect($servername, $username, $password, $database);

        if (!$this->db) {
            die("Unable to connect to the MySQL server database: " . mysqli_connect_error());
        }
        
    }
    
    
    
    
    
    public function initialize(){
        global $db_settings;
        $this->create_connection($db_settings['servername'],$db_settings['username'],$db_settings['password'],$db_settings['database']);
    }
    
    
    public function error(){
        return mysqli_error($this->db);
    }
    
    
    public function get_route_by_id($route_id){
        $sql = 'SELECT
    myticket_route.r_id,
    myticket_vehicle.v_id,
    myticket_model.m_id,
    myticket_model.m_name,
    myticket_route.r_price,
    myticket_route.r_time1,
    myticket_route.r_time2,
    myticket_route.r_station_i,
    myticket_station.s_id,
    myticket_station.s_name,
    myticket_station.s_code,
    myticket_city.c_id,
    myticket_city.c_name,
    myticket_city.c_country
FROM
    myticket_route,
    myticket_vehicle,
    myticket_model,
    myticket_station,
    myticket_city
WHERE
    myticket_route.v_id = myticket_vehicle.v_id AND
    myticket_vehicle.m_id = myticket_model.m_id AND
    myticket_route.s_id = myticket_station.s_id AND
    myticket_station.c_id = myticket_city.c_id AND
    myticket_route.r_id = ' . $route_id . '
';
        
        $result = $this->do_sql_query($sql);
        
        $rows = array();
        while($row = $result->fetch_assoc()){
            $rows[$row['r_station_i']] = $row;
        }
        
        return $rows;
        
    }
    
    
    
    
    public function get_route_station($route_id, $r_station_i){
        $sql = 'SELECT
    myticket_route.r_id,
    myticket_vehicle.v_id,
    myticket_model.m_id,
    myticket_model.m_name,
    myticket_route.r_price,
    myticket_route.r_time1,
    myticket_route.r_time2,
    myticket_route.r_station_i,
    myticket_station.s_id,
    myticket_station.s_name,
    myticket_station.s_code,
    myticket_city.c_id,
    myticket_city.c_name,
    myticket_city.c_country
FROM
    myticket_route,
    myticket_vehicle,
    myticket_model,
    myticket_station,
    myticket_city
WHERE
    myticket_route.v_id = myticket_vehicle.v_id AND
    myticket_vehicle.m_id = myticket_model.m_id AND
    myticket_route.s_id = myticket_station.s_id AND
    myticket_station.c_id = myticket_city.c_id AND
    myticket_route.r_id = ' . $route_id . ' AND
    myticket_route.r_station_i = ' . $r_station_i . '
';
        
        $result = $this->do_sql_query($sql);
        
        $rows = array();
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        
        return $rows[0];
    }
    
    
    
    
    public function get_route_part($route_id, $from_r_station_i, $to_r_station_i){
        $rows = array();
        
        $rows[1] = $this->get_route_station($route_id, 1);
        
        for ($i=$from_r_station_i+1; $i<=$to_r_station_i; $i++){
            $rows[$i] = $this->get_route_station($route_id, $i);
        }
        
        return $rows;
    }
    
    
    
    
    public function get_vehicle_seats_by_vehicle_id($vehicle_id){
        $sql = 'SELECT
    myticket_vehicle.v_id,
    myticket_vehicle_type.vt_id,
    myticket_vehicle_type.vt_name,
    myticket_model.m_id,
    myticket_model.m_name,
    myticket_model_seats.ms_seats_to,
    myticket_travel_class.tc_id,
    myticket_travel_class.tc_name,
    myticket_model_seats.ms_price_coef
    
FROM
    myticket_vehicle,
    myticket_vehicle_type,
    myticket_model,
    myticket_model_seats,
    myticket_travel_class
    
WHERE
    myticket_vehicle.m_id = myticket_model.m_id AND
    myticket_model.vt_id = myticket_vehicle_type.vt_id AND
    myticket_model.m_id = myticket_model_seats.m_id AND
    myticket_model_seats.tc_id = myticket_travel_class.tc_id AND
    myticket_vehicle.v_id = '. $vehicle_id .'

';
        
        $result = $this->do_sql_query($sql);
        
        $rows = array();
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        
        return $rows;
    }
    
    
    
    public function get_routes_from_to($from, $to, array $search_by = array(), $vehicle_type){
        
        if ($search_by['from']=='city'){
            $routes_from = $this->sql_query_from_city($from);
        } elseif ($search_by['from']=='station'){
            $routes_from = $this->sql_query_from_station($from);
        } else {
            $routes_from = $this->sql_query_from_station($from);
        }
        
        if ($search_by['to']=='city'){
            $routes_to = $this->sql_query_to_city($to);
        } elseif ($search_by['to']=='station'){
            $routes_to = $this->sql_query_to_station($to);
        } else {
            $routes_to = $this->sql_query_to_station($to);
        }
        
        
        $sql = 'SELECT
    *
FROM
    (
    '. $routes_from .'
    ) as routes_from
    INNER JOIN
    (
    '. $routes_to .'
    ) as routes_to
    ON (routes_from.from_r_id = routes_to.to_r_id AND routes_from.from_r_station_i < routes_to.to_r_station_i)
WHERE
    routes_from.from_vt_id = '. $vehicle_type .'
';      
        
        $result = $this->do_sql_query($sql);
        
        $rows = array();
        while($row = $result->fetch_assoc()){
            $count = count($row);
            
            $array_from = array_slice($row, 0, $count/2, true);
            $array_to = array_slice($row, $count/2, $count/2, true);
            
            $row = array('from'=>array(), 'to'=>array());
            
            foreach ($array_from as $key=>$value){
                $row['from'][str_replace('from_','',$key)] = $value;
            }
            foreach ($array_to as $key=>$value){
                $row['to'][str_replace('to_','',$key)] = $value;
            }
            
            $rows[] = $row;
        }
        
        return $rows;
        
    }
    
    
    
    public function create_datetime($datetime_string){
        //'2018.06.09 08:00';
        $datetime_unix = mktime(substr($datetime_string,11,2), substr($datetime_string,14,2), 0, substr($datetime_string,5,2), substr($datetime_string,8,2), substr($datetime_string,0,4));
        $datetime = new DateTime();
        $datetime->setTimestamp($datetime_unix);
        
        return $datetime;
        
    }
    
    
    
    public function get_all_cities(){
        $sql = 'SELECT
    myticket_city.c_name
FROM
    myticket_city
';
        $result = $this->do_sql_query($sql);
        
        $rows = array();
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        
        return $rows;
    }

    
    
    
    public function get_all_stations(){
        $sql = 'SELECT
    myticket_city.c_name,
    myticket_station.s_name
FROM
    myticket_city,
    myticket_station
WHERE
    myticket_station.c_id = myticket_city.c_id
';
        $result = $this->do_sql_query($sql);
        
        $rows = array();
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        
        return $rows;
    }
    
    
    
    
    public function seat_is_available($r_id, $from_r_station_i, $to_r_station_i, $seat_i, $max_seat = NULL){
        
        if (!$max_seat){
            $route = $this->get_route_part($r_id, $from_r_station_i, $to_r_station_i);
            $v_id = $route[1]['v_id'];

            $vehicle_seats = $this->get_vehicle_seats_by_vehicle_id($v_id);
            
            $max_seat = 0;
            foreach ($vehicle_seats as $vehicle_seat){
                if ($vehicle_seat['ms_seats_to'] > $max_seat){
                    $max_seat = $vehicle_seat['ms_seats_to'];
                }
            }
        }
        
        if ($seat_i > $max_seat){
            //echo 'false because more than max_seat';
            return false;
        }
        
        $tickets_on_seat = $this->get_tickets_on_seat($r_id, $seat_i);
        
        
        
        foreach ($tickets_on_seat as $ticket){
            
            if (
                ( $ticket['t_to_station_i'] > $from_r_station_i && $ticket['t_to_station_i'] <= $to_r_station_i ) ||
                ( $ticket['t_from_station_i'] >= $from_r_station_i && $ticket['t_from_station_i'] < $to_r_station_i ) ||
                ( $ticket['t_from_station_i'] < $from_r_station_i && $ticket['t_to_station_i'] >= $to_r_station_i )
            ){
                //echo 'false because seat is booked';
                return false;
            }
            
            
            
        }
        
        return true;
        
    }
    
    
    
    
    
    
    
    
    public function get_tickets_on_seat($r_id, $seat_i){
        $sql = 'SELECT
    *
FROM
    myticket_ticket
WHERE
    myticket_ticket.r_id = ' . $r_id . ' AND
    myticket_ticket.t_seat_i = ' . $seat_i . '

';
        
        $result = $this->do_sql_query($sql);
        
        $rows = array();
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        
        return $rows;
        
        
    }
    
    
    
    
    
    public function add_ticket($r_id, $t_seat_i, $t_from_station_i, $t_to_station_i, $t_price, $t_purchase_time, $u_id){
        $sql = 'INSERT INTO `myticket_ticket` (`t_id`, `r_id`, `t_seat_i`, `t_from_station_i`, `t_to_station_i`, `t_price`, `t_purchase_time`, `u_id`) VALUES
  (NULL, "'.$r_id.'", "'.$t_seat_i.'", "'.$t_from_station_i.'", "'.$t_to_station_i.'", "'.$t_price.'", "'.$t_purchase_time.'", "'.$u_id.'");

';
        
        $result = $this->do_sql_query($sql);
        
        return $result;
        
    }
    
    
    
    
    
    public function get_station_by_id($s_id){
        $sql = 'SELECT
    *
FROM
    myticket_station
WHERE
    myticket_station.s_id = '.$s_id.'
';
        
        $result = $this->do_sql_query($sql);
        
        $rows = array();
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        
        return $rows[0];
        
    }
    
    
    



}