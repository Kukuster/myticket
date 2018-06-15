(function ($, window, document) {
    'use strict';

    var page = {
        docReady: function(){
            
            var $Seats = $('a.seat:not(.inactive)'),
                
                $form_wrapper = $('.choose_seat'),
                $form = $('#choose_seat_form'),
                $input_r_id = $form.find('input[name="r_id"]'),
                $input_from_r_station_i = $form.find('input[name="from_r_station_i"]'),
                $input_to_r_station_i = $form.find('input[name="to_r_station_i"]'),
                $input_seat_i = $form.find('input[name="seat_i"]'),
                
                $span_seat_i = $form.find('span.hint.seat_i'),
                $span_seat_class = $form.find('span.hint.seat_class'),
                $span_price = $form.find('span.hint.price');
            
            
            $Seats.on('click',function(){
                $input_seat_i.val($(this).attr('data-i'));
                $span_seat_i.text($(this).attr('data-i'));
                $span_seat_class.text($(this).attr('data-tcname'));
                $span_price.text($(this).attr('data-price'));
                
                $form_wrapper.css('display','block');
                
            });
            
            
            
            
            var $Stations = $("svg.route > .station");
            
            $Stations.on("click", function() {
                
            });
            
            
            
        },
        winLoad: function(){

        }
    };


    $(document).ready(page.docReady);
    $(window).on({
        'load': page.winLoad()
        //'scroll': page.scroll()
    });

})(jQuery, window, document);
