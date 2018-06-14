<?php
// check $available
global $language_data;

$seat_page = get_page('seat');

 ?>
<style>
.left_inform ul{
    padding-top: 70px;
}
</style>
<!--bilet-->
<div class="bilet_train">
  <div class="left_section">
    <div class="left_inform">
      <ul>
        <img src="../inc/images/<?php echo $page->get_page_setting('route_image_filename'); ?>" alt="Поезд">
        <li>
          <span><?php echo get_vehicle_output_id($v_id); ?></span>
        </li>
        <li><span><?php echo $m_name; ?></span>
        </li>
        <li></li>
      </ul>
      <div class="town">
        <div class="town_one">
          <h1><?php echo $from_s_name; ?></h1>
        </div>
        <div class="img_line">
          <img src="../inc/images/polosa.jpg" alt="Полоса">
        </div>
        <div class="town_two">
          <h1><?php echo $to_s_name; ?></h1>
        </div>
      </div>
      <ul>
        <li><?php echo $language_data['route_block']['Departure']; ?> <span><?php echo $departure; ?></span></li>
        <li> <?php echo $language_data['route_block']['Travel time']; ?> <span><?php echo $duration; ?></span></li>
        <li><?php echo $language_data['route_block']['Arrival']; ?> <span><?php echo $arrival; ?></span></li>
        <li></li>
      </ul>
    </div>
  </div>
  <div class="right_section">
    <div class="right_inform">
      <img src="../inc/images/line.png" alt="Линия раздел">
      <table>
        <tr>
          <th><?php echo $language_data['route_block']['Travel class']; ?></th>
          <th><?php echo $language_data['route_block']['Seats available']; ?></th>
          <th><?php echo $language_data['route_block']['Price']; ?></th>
        </tr>
        <?php foreach ($available as $class){ ?>
        <tr>
          <td><?php echo $class['tc_name']; ?></td>
          <td><?php echo $class['seats_available']; ?></td>
          <td><?php echo $class['ms_price_coef'] * $price; ?> ₴</td>
        </tr>
        <?php } ?>
        <?php $buy_url = $seat_page->get_url() . '?' . 'r_id='.$r_id . '&' . 'from_r_station_i='.$from_r_station_i . '&' . 'to_r_station_i='.$to_r_station_i; ?>
        <tr>
          <td colspan="3" style="text-align: center;"><a href="<?php echo $buy_url; ?>"><?php echo $language_data['route_block']['Buy']; ?></a></td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: center;"><a href="<?php echo $buy_url; ?>"><?php echo $language_data['route_block']['Make a reservation']; ?></a></td>
        </tr>
      </table>
    </div>
  </div>
</div>
<!--bilet end-->
