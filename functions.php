<?php 




function debug($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}


function adv_empty() {
	//// advanced empty v2.1
	////if multiple arguments, it will return true only if all arguments are empty

	$n = func_num_args();
	if ($n == 0) {return true;}

	$var_els_r_empty = true;

	for($i = 0; $i < $n; $i++)
	{
		$var = func_get_arg($i);

		$adv_empty_single = function ($var) use (&$adv_empty_single, &$var_els_r_empty) {

			if (!isset($var) || !$var || empty($var) || $var === ' ')
			{return true;}

			else if ( is_object($var) || is_array($var) )
			{
				if ( count((array) $var) == 0 )
				{return true;}

				else {

					foreach ($var as $var_el) {
						if ($adv_empty_single($var_el) === true) { }
						else
						{ $var_els_r_empty = false;}

					}

					if ($var_els_r_empty === true)
					{return true;}

				}
			}

			return false;
		};
		if ($adv_empty_single($var) === false)
		{return false;}
	}

	return true;
}




function append_if_absent(&$arr, $var, $nulls = false) {
	//// v1.0
	////does "$arr[] = $var" only if $var is not in $arr
	////if null-like values (false, empty array etc.) are not allowed, they won't be appended regardless of if they r present or not

	if ($var == NULL && $nulls == false) {return;}

	$present = false;
	foreach ($arr as $el) {
		if ($el == $var)
		{$present = true;}
	}

	if (!$present)
	{$arr[] = $var;}

}


function incr(&$i, $min, $max) {
	//// cyclical increment v2.1 (16.11.2016)
	//// performs cyclical increment (if $i equals $max, make $i equal to $min)

	if ($min>$max){ return false; }

	$i = ((($i-$min + 1) + ($max-$min + 1)) % ($max-$min + 1)) + $min;
	return $i;

}

function decr(&$i, $min, $max) {
	//// cyclical decrement v2.1 (16.11.2016)
	//// performs cyclical decrement (if $i equals $min, make $i equal to $max)

	if ($min>$max){ return false; }

	$i = ((($i-$min - 1) + ($max-$min + 1)) % ($max-$min + 1)) + $min;
	return $i;

}







function get_template($template, array $args = array()){
    extract($args);
    global $templates_dir;
    include $templates_dir.$template.'.php';
}


function get_template_part($template, array $args = array()){
    extract($args);
    global $template_parts_dir;
    include $template_parts_dir.$template.'.php';
}





function myticket_class_initialize(){

    include 'myticket.php';

    function myticket(){
        global $myticket;
        if (!isset($myticket)){
            $myticket = new myticket();
            $myticket->initialize();
        }
        return $myticket;
    }


    ////initialization
    myticket();

}




function get_route_output_id($route_id){
    $route_id = (int) $route_id;
    
    $output = (string) $route_id;
    $len = strlen($route_id);
    
    for ($i=$len; $i<6; $i++){
        $output = '0' . $output;
    }
    
    $output = 'R' . $output;
    
    return $output;
    
}




function get_vehicle_output_id($vehicle_id){
    $vehicle_id = (int) $vehicle_id;
    
    $output = (string) $vehicle_id;
    $len = strlen($vehicle_id);
    
    for ($i=$len; $i<6; $i++){
        $output = '0' . $output;
    }
    
    $output = 'V' . $output;
    
    return $output;
    
}







function datetime_difference(DateTime $datetime1, DateTime $datetime2){
    $interval = date_diff($datetime1, $datetime2);
    return $interval->format('%h:%i');
}



//$i_day = get_datetime($date, '-'.$i.' days');
function get_datetime(DateTime $datetime, $strtotime_string){

    $current_datetime_unix = mktime($datetime->format('H'),$datetime->format('i'),$datetime->format('s'),$datetime->format('n'),$datetime->format('j'),$datetime->format('Y'));
    $changed_datetime_unix = strtotime($strtotime_string, $current_datetime_unix);
    $changed_datetime = new DateTime();
    $changed_datetime->setTimestamp($changed_datetime_unix);
    return $changed_datetime;
}

function convert_date($date, $date_format, $convert_format){
    return DateTime::createFromFormat($date_format, $date)->format($convert_format);
}

function get_week_number(DateTime $datetime){
    return (int) $datetime->format('w');
}








