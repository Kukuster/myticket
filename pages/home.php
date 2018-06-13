<?php 
get_template_part('header');
?>
  <!--content -->
  <section id="content">
    <div class="for_banners">
      <article class="col1">
        <div class="tabs">
          <ul class="nav">
            <li class="selected"><a href="#Flight">Flight</a></li>
            <li><a href="#Hotel">Train</a></li>
          </ul>
          <div class="content">
            <div class="tab-content" id="Flight">
              <form id="form_1" action="#" method="post">
                <div>
                  <div class="radio">
                    <div class="wrapper">
                      <input type="radio" name="name1" checked>
                      <span class="left">Standard</span>
                      <input type="radio" name="name1">
                      <span class="left">World Map</span> </div>
                  </div>
                  <div class="row"> <span class="left">From</span>
                    <input type="text" class="input">
                  </div>
                  <div class="row"> <span class="left">To</span>
                    <input type="text" class="input">
                  </div>
                  <div class="wrapper">
                    <div class="col1">
                      <div class="row"> <span class="left">Outbound</span>
                        <input type="text" class="input1" value="03.05.2011"  onblur="if(this.value=='') this.value='03.05.2011'" onFocus="if(this.value =='03.05.2011' ) this.value=''">
                      </div>
                      <div class="row"> <span class="left">Return</span>
                        <input type="text" class="input1" value="10.05.2011"  onblur="if(this.value=='') this.value='10.05.2011'" onFocus="if(this.value =='10.05.2011' ) this.value=''">
                      </div>
                    </div>
                    <input type="text" class="input1 marg_top1" value="+/- 0 Days"  onblur="if(this.value=='') this.value='+/- 0 Days'" onFocus="if(this.value =='+/- 0 Days' ) this.value=''">
                  </div>
                  <div class="row"> <span class="left">Adults</span>
                    <input type="text" class="input2" value="2"  onblur="if(this.value=='') this.value='2'" onFocus="if(this.value =='2' ) this.value=''">
                  </div>
                  <div class="row"> <span class="left">Children</span>
                    <input type="text" class="input2" value="0"  onblur="if(this.value=='') this.value='0'" onFocus="if(this.value =='0' ) this.value=''">
                    <span class="pad_left1">(0-11 years)</span> </div>
                  <div class="wrapper"> <span class="right relative"><a href="#" class="button1"><strong>Search</strong></a></span> <a href="#" class="link1">More Options</a> </div>
                </div>
              </form>
            </div>
<!--            <div class="tab-content" id="Hotel">-->
<!--              <form id="form_2" action="#" method="post">-->
<!--                <div>-->
<!--                  <div class="radio">-->
<!--                    <div class="wrapper">-->
<!--                      <input type="checkbox" checked>-->
<!--                      Our Partners </div>-->
<!--                  </div>-->
<!--                  <div class="row"> <span class="left">Location</span>-->
<!--                    <input type="text" class="input">-->
<!--                  </div>-->
<!--                  <div class="row"> <span class="left">Check-in </span>-->
<!--                    <input type="text" class="input1" value="03.05.2011"  onblur="if(this.value=='') this.value='03.05.2011'" onFocus="if(this.value =='03.05.2011' ) this.value=''">-->
<!--                    <a href="#" class="help"></a> </div>-->
<!--                  <div class="row"> <span class="left">Check-out </span>-->
<!--                    <input type="text" class="input1" value="10.05.2011"  onblur="if(this.value=='') this.value='10.05.2011'" onFocus="if(this.value =='10.05.2011' ) this.value=''">-->
<!--                    <a href="#" class="help"></a> </div>-->
<!--                  <div class="row"> <span class="left">Rooms</span>-->
<!--                    <input type="text" class="input2" value="1"  onblur="if(this.value=='') this.value='1'" onFocus="if(this.value =='1' ) this.value=''">-->
<!--                    <a href="#" class="help"></a> </div>-->
<!--                  <div class="row"> <span class="left">Adults</span>-->
<!--                    <input type="text" class="input2" value="2"  onblur="if(this.value=='') this.value='2'" onFocus="if(this.value =='2' ) this.value=''">-->
<!--                  </div>-->
<!--                  <div class="row"> <span class="left">Children</span>-->
<!--                    <input type="text" class="input2" value="0"  onblur="if(this.value=='') this.value='0'" onFocus="if(this.value =='0' ) this.value=''">-->
<!--                    <span class="pad_left1">(0-11 years)</span> </div>-->
<!--                  <div class="wrapper"> <span class="right relative"><a href="#" class="button1"><strong>Search</strong></a></span> <a href="#" class="link1">More Options</a> </div>-->
<!--                </div>-->
<!--              </form>-->
<!--            </div>-->
<!--            <div class="tab-content" id="Rental">-->
<!--              <form id="form_3" action="#" method="post">-->
<!--                <div>-->
<!--                  <div class="radio">-->
<!--                    <div class="wrapper">-->
<!--                      <input type="radio" name="name2" checked>-->
<!--                      <span class="left">Avis</span>-->
<!--                      <input type="radio" name="name2">-->
<!--                      <span class="left">Europcar</span> </div>-->
<!--                  </div>-->
<!--                  <div class="row"> <span class="left">Rental location</span>-->
<!--                    <input type="text" class="input">-->
<!--                  </div>-->
<!--                  <div class="row"> <span class="left">Pick-up</span>-->
<!--                    <input type="text" class="input1" value="03.05.2011"  onblur="if(this.value=='') this.value='03.05.2011'" onFocus="if(this.value =='03.05.2011' ) this.value=''">-->
<!--                    <input type="text" class="input2" value="12:00"  onblur="if(this.value=='') this.value='12:00'" onFocus="if(this.value =='12:00' ) this.value=''">-->
<!--                  </div>-->
<!--                  <div class="row"> <span class="left">Return</span>-->
<!--                    <input type="text" class="input1" value="10.05.2011"  onblur="if(this.value=='') this.value='10.05.2011'" onFocus="if(this.value =='10.05.2011' ) this.value=''">-->
<!--                    <input type="text" class="input2" value="12:00"  onblur="if(this.value=='') this.value='12:00'" onFocus="if(this.value =='12:00' ) this.value=''">-->
<!--                  </div>-->
<!--                  <div class="row_select"> <span class="left">Miles &amp; More</span>-->
<!--                    <select>-->
<!--                      <option>no membership</option>-->
<!--                    </select>-->
<!--                  </div>-->
<!--                  <div class="row_select">-->
<!--                    <div class="pad_left1"> Country of residence<br>-->
<!--                      <div class="select1">-->
<!--                        <select>-->
<!--                          <option>&nbsp;</option>-->
<!--                        </select>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <div class="wrapper"> <span class="right relative"><a href="#" class="button1"><strong>Search</strong></a></span> </div>-->
<!--                </div>-->
<!--              </form>-->
<!--            </div>-->
          </div>
        </div>
      </article>
      <!--Form search tickets-2018->
      <!---->
      <div class="wrapper_search">
        <div class="wrapper_text_h1">
        <h1>Quick Travel Search</h1>
        </div>
        <div class="class_search_town">
          <div class="text_search">
            <p>Choose a route</p>
          </div>
          <input type="text" placeholder="From(sity)">
          <input type="text" placeholder="To(sity)">
        </div>
        <div class="class_search_price">
          <div class="text_price">
            <p>Enter the amount for which you want to travel</p>
          </div>
          <input type="text"placeholder="min">
          <input type="text" placeholder="max">
        </div>
        <div class="wrappers_search_btn">
          <button  type="button" class="btn btn-primary active">Search </button>
        </div>
      </div>
      <!--<div id="slider"> <img src="../inc/images/banner1.jpg" alt=""> <img src="../inc/images/banner2.jpg" alt=""> <img src="../inc/images/banner3.jpg" alt=""> </div>-->
    </div>
    <div class="wrapper pad1">
      <article class="col1">
        <div class="box1">
          <h2 class="top">Offers of the Week from UK</h2>
          <div class="pad"> <strong>From Birmingham</strong><br>
            <ul class="pad_bot1 list1">
              <li> <span class="right color1">from GBP 143.-</span> <a href="book2.html">Zurich</a> </li>
            </ul>
            <strong>From London City</strong><br>
            <ul class="pad_bot1 list1">
              <li> <span class="right color1">from GBP 176.-</span> <a href="book2.html">Basel</a> </li>
              <li> <span class="right color1">from GBP 109.-</span> <a href="book2.html">Geneva</a> </li>
            </ul>
            <strong>From London Heathrow</strong><br>
            <ul class="pad_bot2 list1">
              <li> <span class="right color1">from GBP 100.-</span> <a href="book2.html">Geneva</a> </li>
              <li> <span class="right color1">from GBP 112.-</span> <a href="book2.html">Zurich</a> </li>
              <li> <span class="right color1">from GBP 88.-</span> <a href="book2.html">Basel</a> </li>
            </ul>
          </div>
          <h2>From Ireland To Switzerland</h2>
          <div class="pad"> <strong>From Dublin</strong><br>
            <ul class="pad_bot2 list1">
              <li class="pad_bot1"> <span class="right color1">from EUR 122.-</span> <a href="book2.html">Zurich</a> </li>
            </ul>
          </div>
        </div>
      </article>
      <article class="col2">
        <h3>About Our Airlines and Train</h3>
        <div class="wrapper">
          <article class="cols">
            <figure><img src="../inc/images/page1_img1.jpg" alt="" class="pad_bot2"></figure>
            <p class="pad_bot1"><strong>Airlines is one of free website templates created by TemplateMonster.com team.</strong></p>
            <p>This website template is optimized for 1024X768 screen resolution. It is also XHTML &amp; CSS valid. This website template has several pages: <a href="index.html">About</a>, <a href="offers.html">Offers</a>, <a href="book.html">Book</a>, <a href="services.html">Services</a>, <a href="safety.html">Safety</a>, <a href="contacts.html">Contacts</a>.</p>
          </article>
          <article class="cols pad_left1">
            <figure><img src="../inc/images/page1_img2.jpg" alt="" class="pad_bot2"></figure>
            <p class="pad_bot1"><strong>This Airlines Template goes with two packages.</strong></p>
            <p>With PSD source files and without them. PSD source files are available for free for the registered members of Templates.com. The basic package (without PSD source files) is available for anyone without registration).</p>
          </article>
        </div>
        <a href="#" class="button1"><strong>Read More</strong></a> </article>
    </div>

  </section>
  <!--content end-->
  
<?php 
get_template_part('footer');
