var $j = jQuery.noConflict();

$j(document).ready(function () {
    $j().UItoTop({easingType: 'easeOutQuart'});
    $j('#hotelid').selectpicker();

    //scroll
    var headerHeight = $j('header').height();
    var headerWidth = $j('header').width();
    $j(window).scroll(function() {
      if(headerWidth>768){
      if( $j(this).scrollTop() > headerHeight) {
        $j('#booking').addClass('fixed-form');
      } else {
        $j('#booking').removeClass('fixed-form');
      }
      }
    });


    $j(window).onload=changeBooking($j("#hotelid").val());

    /*var today = new Date();
    var today15 = new Date(today.getFullYear(), today.getMonth(), today.getDate()+15, 0,0,0,0);
    var today20 = new Date(today.getFullYear(), today.getMonth(), today.getDate()+20, 0,0,0,0);

    $("#datein").datepicker("setValue", today15);
    $("#dateout").datepicker("setValue", today20);
*/

    if(typeof(travel_window) != "undefined"){
      var temp = new Date();
      var hoy  = new Date(temp.getFullYear(), temp.getMonth(), temp.getDate(), 0, 0, 0, 0);
      temp = new Date('1950-01-01');
      var start = new Date(temp.getFullYear(), temp.getMonth(), temp.getDate(), 0, 0, 0, 0);
      temp = new Date('2100-12-31');
      var end   = new Date(temp.getFullYear(), temp.getMonth(), temp.getDate(), 0, 0, 0, 0);

      for(var i=0; i<travel_window.length; i++){
        temp= new Date(travel_window [i]['start_date']);
        eval('var endDate'+(i+1)+ '= new Date(temp.getFullYear(), temp.getMonth(), temp.getDate(), 0, 0, 0, 0)');  
        temp= new Date(travel_window [i]['end_date']);
        eval('var startDate'+(i+2)+ '= new Date(temp.getFullYear(), temp.getMonth(), temp.getDate(), 0, 0, 0, 0)');  
        if (hoy.valueOf() > endDate1.valueOf()){
          endDate1=hoy;
        }
      }
    }
    else{
      var nowTemp = new Date();
      var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    }

    /*for(var i=0; i<travel_window.length; i++){
      temp= new Date(travel_window [i]['start_date']);
      eval('var endDate'+(i+1)+ '= new Date(temp.getFullYear(), temp.getMonth(), temp.getDate(), 0, 0, 0, 0)');  
      temp= new Date(travel_window [i]['end_date']);
      eval('var startDate'+(i+2)+ '= new Date(temp.getFullYear(), temp.getMonth(), temp.getDate(), 0, 0, 0, 0)');  
      if (hoy.valueOf() > endDate1.valueOf()){
        endDate1=hoy;
      }
    }*/


    var checkin = $j('#datein').datepicker({

        onRender: function (date) {                

          if(typeof(travel_window) == "undefined"){
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }

          if(travel_window.length==1){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) { return  'disabled'; } 
            else if (date.valueOf() < end.valueOf() && date.valueOf() > startDate2.valueOf()) { return 'disabled';} else{ return false; }
          }
          if(travel_window.length==2){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) { return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) { return 'disabled'; }
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate3.valueOf()) { return 'disabled';}else{ return false;}
          }
          if(travel_window.length==3){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) { return 'disabled'; }
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate4.valueOf()) { return 'disabled'; }else{ return false;}
          }
          if(travel_window.length==4){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==5){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==6){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==7){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==8){if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate8.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate9.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==9){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate8.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate9.valueOf() && date.valueOf() > startDate9.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate10.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==10){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate8.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate9.valueOf() && date.valueOf() > startDate9.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate10.valueOf() && date.valueOf() > startDate10.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate11.valueOf()) {return 'disabled';}else{return false;}
          }
               
        }
    }).on('changeDate', function (ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
        validateBookingSingle();
        $j('#dateout')[0].focus();
    }).data('datepicker');
    var checkout = $j('#dateout').datepicker({
        onRender: function (date) {
          //return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';

          /*if (date.valueOf() <= checkin.date.valueOf()) {
            return  'disabled';
          } 
          else if (date.valueOf() < end.valueOf() && date.valueOf() > startDate2.valueOf()) {
            return 'disabled';
          } 
          else{
            return false;
          }*/

          if(typeof(travel_window) == "undefined"){
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }

          if(travel_window.length==1){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) { return  'disabled'; } 
            else if (date.valueOf() < end.valueOf() && date.valueOf() > startDate2.valueOf()) { return 'disabled';} else{ return false; }
          }
          if(travel_window.length==2){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) { return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) { return 'disabled'; }
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate3.valueOf()) { return 'disabled';}else{ return false;}
          }
          if(travel_window.length==3){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) { return 'disabled'; }
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate4.valueOf()) { return 'disabled'; }else{ return false;}
          }
          if(travel_window.length==4){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==5){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==6){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==7){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==8){if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate8.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate9.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==9){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate8.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate9.valueOf() && date.valueOf() > startDate9.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate10.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==10){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate8.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate9.valueOf() && date.valueOf() > startDate9.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate10.valueOf() && date.valueOf() > startDate10.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate11.valueOf()) {return 'disabled';}else{return false;}
          }

        }
    }).on('changeDate', function (ev) {
        checkout.hide();
        validateBookingSingle();
    }).data('datepicker');

    $j('#hotelid').bind('change', function() {
      var value = this.value;
      changeBooking(value);
  });
  /*$( "#btn-flight" ).click(function() {
    $("#bookingResort").hide();
    $("#bookingFlight").show();
  });*/
  /*$( "#btn-resort" ).click(function() {
    $("#bookingFlight").hide();
    $("#bookingResort").show();
  });*/

$j("#cerrar").on( "click", function() {
  var e = new Date();
  e.setTime(e.getTime()+(10*24*60*60*1000));
  var expira = "expires="+e.toUTCString();
  document.cookie="minimizado=1;"+expira+";path=/";

  $j('#cookie-law-info-bar').hide(1000);
  document.getElementById("cookie-law-info-bar").style.display = "none";
});

var allcookies = document.cookie;
if (allcookies.search(/minimizado/)!=-1){
  document.getElementById("cookie-law-info-bar").style.display = "none";
}
else{
  document.getElementById("cookie-law-info-bar").style.display = "block";
}

});

function changeBooking(value){
  var tag_adult = $j('#tag_adult').val();
  var tag_adult2 = $j('#tag_adult2').val();
  var tag_teen = $j('#tag_teen').val();
  var tag_children = $j('#tag_children').val();
  var tag_children2 = $j('#tag_children2').val();
    if(value == "95939"){
      $j("#select-childrens").val("0");
      $j("#select-childrens").hide();
      $j("#spChildren").hide();
      $j("#spAdult").text(tag_adult2);
      $j("#spTeen").text(tag_children);
  } else if(value == "86175" || value == "86182"){
      $j("#select-childrens").val("0");
      $j("#select-childrens").hide();
      $j("#spChildren").hide();
      $j("#spAdult").text(tag_adult);
      $j("#spTeen").text(tag_children2);
  }else{
    $j("#select-childrens").val("0");
    $j("#spAdult").text(tag_adult);
    $j("#spTeen").text(tag_teen);
    $j("#spChildren").text(tag_children);
    $j("#select-childrens").show();
    $j("#spChildren").show();
  }
  searchIhotelierRatePlan();
  searchIhotelierPackage();
}

function setClassActive(e) { $j("#" + e).addClass("active") }

function validateBooking(){
  var f_hoy = new Date();
  var f_mantto1 = new Date(2016,11,3, 20,00,00,00);
  var f_mantto2 = new Date(2016,11,3, 23,59,00,00);
  
  if((f_hoy>= f_mantto1) && (f_hoy<=f_mantto2)){
    $j('#mantenimiento').modal('show');
    return false;
  }

  if($j("#hotelid").val() == "0"){
    $j("#error-booking").show("slow");
    return false;
  }else{
    $j("#error-booking").hide();
    return true;
  }
}

function validateBookingSingle(){ 
  /*if($("#hotelid").val() == "0"){
    $("#error-booking").show("slow");
    return false;
  }else*/

  /*if ($("#datein").val() == '' && $("#dateout").val() == ''){
    $("#error-minimum").show("slow");
    return false;
  }*/

  var f_hoy = new Date();
  var f_mantto1 = new Date(2016,11,3, 20,00,00,00);
  var f_mantto2 = new Date(2016,11,3, 23,59,00,00);
  
  if((f_hoy>= f_mantto1) && (f_hoy<=f_mantto2)){
    $j('#mantenimiento').modal('show');
    return false;
  }
  
  var DateIn  = new Date($j("#datein").val());
  var DateOut = new Date($j("#dateout").val());

  if(((DateOut - DateIn) /1000/60/60/24) < $j("#minimum").val() ){
    $j("#error-minimum").show("slow");
    return false;
  }
  else{
    $j("#error-minimum").hide("slow");
    return true;
  }
}
  
function obtenerRatePlan(){
  if($j("#hotelid").val() == "86179"){ $j("#RatePlanID").val("2025619"); }
  if($j("#hotelid").val() == "86180"){ $j("#RatePlanID").val("2025588"); }
}

function searchIhotelierRatePlan(T){ var rate = $j('select option:selected').attr('id'); var minimum = $j('select option:selected').attr('name');$j("#RatePlanID").val(rate); $j("#minimum").val(minimum); }

function searchIhotelierPackage(T){ var rate = $j('select option:selected').attr('id'); var minimum = $j('select option:selected').attr('name');$j("#packageId").val(rate); $j("#minimum").val(minimum); }
  
function validateBookingTest(){
  var f_hoy = new Date();
  var f_mantto1 = new Date(2016,11,02, 14,00,00,00);
  var f_mantto2 = new Date(2016,11,02, 21,59,00,00);
  
  if((f_hoy>= f_mantto1) && (f_hoy<=f_mantto2)){
    $j('#mantenimiento').modal('show');
    return false;
  }

  if($j("#hotelid").val() == "0"){
    $j("#error-booking").show("slow");
    return false;
  }else{
    $j("#error-booking").hide();
    return true;
  }
}  