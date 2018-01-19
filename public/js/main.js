if(document.getElementById("submit-property") != null){
  document.getElementById("submit-property").onkeypress = function(e) {
    var key = e.charCode || e.keyCode || 0;
    if (key == 13) {
      e.preventDefault();
    }
  }
}
else if(document.getElementById("submit-edit") != null){
  document.getElementById("submit-edit").onkeypress = function(e) {
    var key = e.charCode || e.keyCode || 0;
    if (key == 13) {
      e.preventDefault();
    }
  }
}
var rangeSlider = function(){
  var slider = $('.range-slider'),
      range = $('.range-slider__range'),
      value = $('.range-slider__value');

  slider.each(function(){

    value.each(function(){
      var value = $(this).prev().attr('value');
      $(this).html(value);
    });

    range.on('input', function(){
      $(this).next(value).html(this.value);
    });
  });
};
rangeSlider();

$(document).ready(function () {

    jQuery.fn.extend({
        size: function() {
            return $(this).length;
        }
    });

    //$('#171').mouseover(function(){
      //google.maps.event.trigger(markers.id, "click");
      //alert("hello");
    //});

    $(function () {
      $('#closingtime').datetimepicker({
        format: 'MM/DD/YYYY HH:mm',
      });
      $('#firstdate').datetimepicker({
        format: 'MM/DD/YYYY HH:mm',
      });
      $('#seconddate').datetimepicker({
        format: 'MM/DD/YYYY HH:mm',
      });
    });
    $('[data-countdown]').each(function() {
      var $this = $(this), finalDate = $(this).data('countdown');
      $this.countdown(finalDate, function(event) {
        $this.html(event.strftime('%D days %H:%M:%S'));
        if(event.strftime('%D days %H:%M:%S') == "00 days 00:00:00"){
          $this.html("Bidding is over, property owner will now select an offer");
        }
      });
      $this.on('finish.countdown', function(event){
        $this.html('Bidding is finished!');
        //year/month/day hour:minute:seconds
        //make $post['user_id'] equate to $post['currentbidderid']
      });
    });
    $('body').on('click', '.pagination a', function(e){

         e.preventDefault();
         var url = $(this).attr('href');
        // var url = "/paginateprop"

         //$.get(url, function(data){
          //   $('.properties').html(data);
         //});
         $.ajax({
              type: "GET",
              url: url,
              dataType: 'html',
              success: function(data) {
                  $('.properties').html(
                      $('<div />').html(data).find('.properties').html()
                  );
              }
          });

     });
 /*
     $(window).scroll(fetchProperties);

     function fetchProperties() {

         var page = $('.endless-pagination').data('next-page');

         if(page !== null) {

             clearTimeout( $.data( this, "scrollCheck" ) );

             $.data( this, "scrollCheck", setTimeout(function() {
                 var scroll_position_for_prop_load = $(window).height() + $(window).scrollTop() + 100;

                 if(scroll_position_for_prop_load >= $(document).height()) {
                     $.get(page, function(data){
                         $('.properties').append(data.properties);
                         $('.endless-pagination').data('next-page', data.next_page);
                     });
                 }
             }, 350))

         }
     }
 */
    //$('#datepicker').datepicker({
      //  startDate: '-180d',
        //endDate: '+1d',
        //autoclose: true
    //});
});
