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
      $(this).html(commafy(value));
    });

    range.on('input', function(){
      $(this).next(value).html(commafy(this.value));
    });
  });
};
rangeSlider();

function commafy( num ) {
    var str = num.toString().split('.');
    if (str[0].length >= 5) {
        str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
    }
    if (str[1] && str[1].length >= 5) {
        str[1] = str[1].replace(/(\d{3})/g, '$1 ');
    }
    return str.join('.');
}

$(document).ready(function () {

    jQuery.fn.extend({
        size: function() {
            return $(this).length;
        }
    });
    jQuery.fn.load = function(callback){ $(window).on("load", callback) };

    $(document).on('click', '#advsearch .dropdown-menu', function (e) {
      e.stopPropagation();
    });
    if (document.getElementById('pricenum') == ""){
      //var pricenum = parseFloat(document.getElementById("pricenum").innerHTML);
      //document.getElementById('pricenum').innerHTML = '$' + commafy(pricenum);
    }
    setTimeout(function(){
      $(".alert-success").fadeOut().empty();
      $(".danger-notification").fadeOut().empty();
      $(".loginattempt").fadeOut().empty();
    },4000);

    window.onscroll = function() {sticknav()};
    //var sticky = header.offsetTop;
    //header.classList.add("sticky");
    function sticknav() {
      if (window.pageYOffset > 30) {
        $(".stickynav").addClass("sticky");
        $(".stickysecond").appendTo($(".stickynav"));
      } else {
        $(".stickynav").removeClass("sticky");
      }
    }
    $(function () {
      /*
      if(document.getElementById('#openfirstdate') != null){
        curr = moment($('#openfirstdate').data("date"), 'MM/DD/YYYY HH:mm');
        currsecond =  moment($('#openseconddate').data("date"), 'MM/DD/YYYY HH:mm');
        //console.log( moment($('#openfirstdate').data("date"), 'MM/DD/YYYY HH:mm').format('HH:mm'))
        $('#openfirstdate').datetimepicker({
          inline: true,
          sideBySide: true,
          defaultDate: curr,
          enabledDates: [curr],
        });
        $('#openfirstdate').data("DateTimePicker").minDate(curr).maxDate(curr).disabledTimeIntervals([curr]);
        $('#openfirstdate .timepicker-minute').removeAttr('data-action');
        $('#openfirstdate .timepicker-hour').removeAttr('data-action');
        //$('#openfirstdate').data("DateTimePicker").enabledDates([$('#openfirstdate').data("date")]);
        $('#openseconddate').datetimepicker({
          inline: true,
          sideBySide: true,
          defaultDate: moment(currsecond, 'MM/DD/YYYY HH:mm'),
          enabledDates: [moment(currsecond, 'MM/DD/YYYY HH:mm')],
        });
        $('#openseconddate').data("DateTimePicker").minDate(currsecond).maxDate(currsecond).disabledTimeIntervals([currsecond]);
        $('#openseconddate .timepicker-minute').removeAttr('data-action');
        $('#openseconddate .timepicker-hour').removeAttr('data-action');
      }
      */
      $('#closingtime').datetimepicker({
        format: 'MM/DD/YYYY HH:mm',
      });
      $('#firstdate').datetimepicker({
        format: 'MM/DD/YYYY HH:mm',
      });
      $('#seconddate').datetimepicker({
        format: 'MM/DD/YYYY HH:mm',
      });
      $('#openfirst').datetimepicker({
        format: 'MM/DD/YYYY HH:mm',
      });
      $('#opensecond').datetimepicker({
        format: 'MM/DD/YYYY HH:mm',
      });
    });
    $('[data-countdown]').each(function() {
      var $this = $(this), finalDate = $(this).data('countdown');
      $this.countdown(finalDate, function(event) {
        $this.html(event.strftime('%D days %H:%M:%S'));
        if(event.strftime('%D days %H:%M:%S') == "00 days 00:00:00"){
          $this.html("Bidding Is Over. <br>");
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
$(window).on('load', function() {
    $(".wrap").fadeOut();
    $("body").css("overflow-x","initial");
    $("body").css("overflow-y","initial");
    //var linkNode = document.querySelector('link[href*="widget.css"]');
    //var stylesheet = linkNode.sheet || linkNode.styleSheet || linkNode.styleDeclaration;
    //stylesheet.disabled = false;
    //console.log($("#mylogin .fade .in"));
    //$(".fade.in").css('opacity', '0')
});
function Anim(x) {
  $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + x + '  animated');
};
$('#mylogin').on('show.bs.modal', function (e) {
  var anim = 'bounceinDown';
      Anim(anim);
});
$('#mylogin').on('hide.bs.modal', function (e) {
  var anim = 'flipOutX';
      Anim(anim);
});
$('#myreg').on('show.bs.modal', function (e) {
  var anim = 'bounceinDown';
      Anim(anim);
});
$('#myreg').on('hide.bs.modal', function (e) {
  var anim = 'flipOutX';
      Anim(anim);
});

//stylesheet.disabled = true;
