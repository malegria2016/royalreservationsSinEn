$(document).ready(function () {
    $().UItoTop({easingType: 'easeOutQuart'});
    $('#hotelid').selectpicker();

    
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
    
    var checkin = $('#datein').datepicker({
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
        $('#dateout')[0].focus();
    }).data('datepicker');
    var checkout = $('#dateout').datepicker({
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
    }).data('datepicker');


    $('#hotelid').bind('change', function() {
      var value = this.value;
  		changeBooking(value);
	});
  $( "#btn-flight" ).click(function() {
    $("#bookingResort").hide();
    $("#bookingFlight").show();
});
$( "#btn-resort" ).click(function() {
  $("#bookingFlight").hide();
  $("#bookingResort").show();
});

$("#cerrar").on( "click", function() {
  var e = new Date();
  e.setTime(e.getTime()+(10*24*60*60*1000));
  var expira = "expires="+e.toUTCString();
  document.cookie="minimizado=1;"+expira+";path=/";

  $('#cookie-law-info-bar').hide(1000);
  document.getElementById("cookie-law-info-bar").style.display = "none";

});





});

function changeBooking(value){
  var tag_adult = $('#tag_adult').val();
  var tag_adult2 = $('#tag_adult2').val();
  var tag_teen = $('#tag_teen').val();
  var tag_children = $('#tag_children').val();
  var tag_children2 = $('#tag_children2').val();
    if(value == "95939"){
      $("#select-childrens").val("0");
      $("#select-childrens").hide();
      $('#select-adults option:eq(0)').text(tag_adult2);
      $('#select-teens option:eq(0)').text(tag_children);
  }	else if(value == "86175" || value == "86182"){
      $("#select-childrens").val("0");
      $("#select-childrens").hide();
      $('#select-adults option:eq(0)').text(tag_adult);
      $('#select-teens option:eq(0)').text(tag_children2);
  }else{
    $("#select-childrens").val("0");
    $('#select-adults option:eq(0)').text(tag_adult);
    $('#select-teens option:eq(0)').text(tag_teen);
    $('#select-childrens option:eq(0)').text(tag_children);
    $("#select-childrens").show();
  }
}

function setClassActive(e) { $("#" + e).addClass("active") }

function validateBooking(){
  if($("#hotelid").val() == "0"){
    $("#error-booking").show("slow");
    return false;
  }else{
    $("#error-booking").hide();
    return true;
  }
}

function validateBookingSingle(){	
  if($("#hotelid").val() == "0"){
    $("#error-booking").show("slow");
    return false;
  }else

  if ($("#datein").val() == '' && $("#dateout").val() == ''){
    $("#error-minimum").show("slow");
    return false;
  }
  
  var DateIn  = new Date($("#datein").val());
  var DateOut = new Date($("#dateout").val());

  if(((DateOut - DateIn) /1000/60/60/24) < $("#minimum").val() ){
    $("#error-minimum").show("slow");
    return false;

  }else{
    $("#error-booking").hide();
    $("#error-minimun").hide();
    return true;
  }
}
  
function obtenerRatePlan(){
  if($("#hotelid").val() == "86179"){ $("#RatePlanID").val("2025619"); }
  if($("#hotelid").val() == "86180"){ $("#RatePlanID").val("2025588"); }
}

function searchIhotelierRatePlan(T){ var rate = T.options[T.selectedIndex].id; var minimum = T.options[T.selectedIndex].title; $("#RatePlanID").val(rate); $("#minimum").val(minimum);}

function searchIhotelierPackage(T){ var rate = T.options[T.selectedIndex].id; var minimum = T.options[T.selectedIndex].title; $("#packageId").val(rate); $("#minimum").val(minimum);}


