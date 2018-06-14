<?php 
get_template_part('header');
?>
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
      <article class="col1">
        <div class="box1">
          <h2 class="top"><?php echo $language_data['contact_us']['Contact Us']; ?></h2>
          <div class="pad">
            <div class="wrapper pad_bot1">
              <p class="cols pad_bot2"><strong><?php echo $language_data['contact_us']['Country:']; ?><br>
                <?php echo $language_data['contact_us']['City:']; ?><br>
                <?php echo $language_data['contact_us']['Address:']; ?><br>
                <?php echo $language_data['contact_us']['Email:']; ?></strong></p>
              <p class="color1 pad_bot2"><?php echo $language_data['contact_us']['Ukraine']; ?><br>
                <?php echo $language_data['contact_us']['Kharkov']; ?><br>
                <?php echo $language_data['contact_us']['Lenina st. 54']; ?><br>
                <a href="#">a_t_tickets@mail.com</a></p>
            </div>
          </div>
          <h2>Miscellaneous Info</h2>
          <div class="pad pad_bot1">
            <p class="pad_bot2"><?php echo $language_data['contact_us']['pad_bot2_description']; ?></p>
          </div>
        </div>
      </article>
      <article class="col2">
        <h3 class="pad_top1"><?php echo $language_data['contact_us']['Contact Form']; ?></h3>
        <form id="ContactForm" action="#">
          <div>
            <div  class="wrapper"> <span><?php echo $language_data['contact_us']['Name:']; ?></span>
              <input type="text" class="input" >
            </div>
            <div  class="wrapper"> <span><?php echo $language_data['contact_us']['Email:']; ?></span>
              <input type="text" class="input" >
            </div>
            <div  class="textarea_box"> <span><?php echo $language_data['contact_us']['Message:']; ?></span>
              <textarea name="textarea" cols="1" rows="1"></textarea>
            </div>
            <a href="#" class="button1"><strong><?php echo $language_data['contact_us']['Send']; ?></strong></a> <a href="#" class="button1"><strong><?php echo $language_data['contact_us']['Clear']; ?></strong></a> </div>
        </form>
      </article>
    </div>
  </section>
  <!--content end-->

<?php 
get_template_part('footer');
