<?php 
get_template_part('header');
?>
  <!--content -->
  <section id="content">
    <div class="for_banners">
      <article class="col1">
        <div class="tabs">
          <ul class="nav">
            <li class="selected"><a href="#Flight"><?php echo $language_data['home']['Flight']; ?></a></li>
            <li><a href="#Hotel"><?php echo $language_data['home']['Train']; ?></a></li>
          </ul>
          <div class="content">
            <div class="tab-content" id="Flight">
              <form id="form_1" action="#" method="post">
                <div>
                  <div class="radio">
                    <div class="wrapper">
                      <input type="radio" name="name1" checked>
                      <span class="left"><?php echo $language_data['home']['Standard']; ?></span>
                      <input type="radio" name="name1">
                      <span class="left"><?php echo $language_data['home']['World Map']; ?></span> </div>
                  </div>
                  <div class="row"> <span class="left"><?php echo $language_data['home']['From']; ?></span>
                    <input type="text" class="input">
                  </div>
                  <div class="row"> <span class="left"><?php echo $language_data['home']['To']; ?></span>
                    <input type="text" class="input">
                  </div>
                  <div class="wrapper">
                    <div class="col1">
                      <div class="row"> <span class="left"><?php echo $language_data['home']['Outbound']; ?></span>
                        <input type="text" class="input1" value="03.05.2011"  onblur="if(this.value=='') this.value='03.05.2011'" onFocus="if(this.value =='03.05.2011' ) this.value=''">
                      </div>
                      <div class="row"> <span class="left"><?php echo $language_data['home']['Return']; ?></span>
                        <input type="text" class="input1" value="10.05.2011"  onblur="if(this.value=='') this.value='10.05.2011'" onFocus="if(this.value =='10.05.2011' ) this.value=''">
                      </div>
                    </div>
                    <input type="text" class="input1 marg_top1" value="+/- 0 Days"  onblur="if(this.value=='') this.value='+/- 0 Days'" onFocus="if(this.value =='+/- 0 Days' ) this.value=''">
                  </div>
                  <div class="row"> <span class="left"><?php echo $language_data['home']['Adults']; ?></span>
                    <input type="text" class="input2" value="2"  onblur="if(this.value=='') this.value='2'" onFocus="if(this.value =='2' ) this.value=''">
                  </div>
                  <div class="row"> <span class="left"><?php echo $language_data['home']['Children']; ?></span>
                    <input type="text" class="input2" value="0"  onblur="if(this.value=='') this.value='0'" onFocus="if(this.value =='0' ) this.value=''">
                    <span class="pad_left1"><?php echo $language_data['home']['(0-11 years)']; ?></span> </div>
                  <div class="wrapper"> <span class="right relative"><a href="#" class="button1"><strong>Search</strong></a></span> <a href="#" class="link1"><?php echo $language_data['home']['More Options']; ?></a> </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </article>
      <!--Form search tickets-2018->
      <!---->
      <div class="wrapper_search">
        <div class="wrapper_text_h1">
        <h1><?php echo $language_data['home']['Fast Travel Search']; ?></h1>
        </div>
        <div class="class_search_town">
          <div class="text_search">
            <p><?php echo $language_data['home']['Choose route']; ?></p>
          </div>
          <input type="text" placeholder="<?php echo $language_data['home']['From (city)']; ?>">
          <input type="text" placeholder="<?php echo $language_data['home']['To (city)']; ?>">
        </div>
        <div class="class_search_price">
          <div class="text_price">
            <p><?php echo $language_data['home']['Enter the boundaries of your budget']; ?></p>
          </div>
          <input type="text"placeholder="min">
          <input type="text" placeholder="max">
        </div>
          <div class="button_vibor_trans">
              <input type="checkbox" name="bilet" value="Train"><?php echo $language_data['home']['Train']; ?><br>
              <input type="checkbox" name="bilet" value="Plane"><?php echo $language_data['home']['Plane']; ?><br>
          </div>
        <div class="wrappers_search_btn">
          <button  type="button" class="btn btn-primary active"><?php echo $language_data['home']['Search']; ?> </button>
        </div>
      </div>
      <!--<div id="slider"> <img src="../inc/images/banner1.jpg" alt=""> <img src="../inc/images/banner2.jpg" alt=""> <img src="../inc/images/banner3.jpg" alt=""> </div>-->
    </div>
    <div class="wrapper pad1">
      <article class="col1">
        <div class="box1">
          <h2 class="top">Offers of the Week from UK</h2>
          <div class="pad"> <strong><?php echo $language_data['home']['From Birmingham']; ?></strong><br>
            <ul class="pad_bot1 list1">
              <li> <span class="right color1"><?php echo $language_data['home']['from GBP 143.-']; ?></span> <a href="book2.html"><?php echo $language_data['home']['Zurich']; ?></a> </li>
            </ul>
            <strong><?php echo $language_data['home']['From London City']; ?></strong><br>
            <ul class="pad_bot1 list1">
              <li> <span class="right color1"><?php echo $language_data['home']['from GBP 176.-']; ?></span> <a href="book2.html"><?php echo $language_data['home']['Basel']; ?></a> </li>
              <li> <span class="right color1"><?php echo $language_data['home']['from GBP 109.-']; ?></span> <a href="book2.html"><?php echo $language_data['home']['Geneva']; ?></a> </li>
            </ul>
            <strong><?php echo $language_data['home']['From London Heathrow']; ?></strong><br>
            <ul class="pad_bot2 list1">
              <li> <span class="right color1"><?php echo $language_data['home']['from GBP 100.-']; ?></span> <a href="book2.html"><?php echo $language_data['home']['Geneva']; ?></a> </li>
              <li> <span class="right color1"><?php echo $language_data['home']['from GBP 112.-']; ?></span> <a href="book2.html"><?php echo $language_data['home']['Zurich']; ?></a> </li>
              <li> <span class="right color1"><?php echo $language_data['home']['from GBP 88.-']; ?></span> <a href="book2.html"><?php echo $language_data['home']['Basel']; ?></a> </li>
            </ul>
          </div>
          <h2><?php echo $language_data['home']['From Ireland To Switzerland']; ?></h2>
          <div class="pad"> <strong><?php echo $language_data['home']['From Dublin']; ?></strong><br>
            <ul class="pad_bot2 list1">
              <li class="pad_bot1"> <span class="right color1"><?php echo $language_data['home']['from EUR 122.-']; ?></span> <a href="book2.html"><?php echo $language_data['home']['Zurich']; ?></a> </li>
            </ul>
          </div>
        </div>
      </article>
      <article class="col2">
        <h3><?php echo $language_data['home']['About Our Airlines and Train']; ?></h3>
          <div class="wrapper">
              <article class="cols">
                <figure><img src="../inc/images/page1_img1.jpg" alt="" class="pad_bot2"></figure>
                <?php echo $language_data['home']['content_block_1_description']; ?>
              </article>
              <article class="cols pad_left1">
                  <figure><img src="../inc/images/page1_img2.jpg" alt="" class="pad_bot2"></figure>
                <?php echo $language_data['home']['content_block_2_description']; ?>
              </article>
          </div>
        <a href="#" class="button1"><strong><?php echo $language_data['home']['Read More']; ?></strong></a> </article>
    </div>

  </section>
  <!--content end-->
  
<?php 
get_template_part('footer');
