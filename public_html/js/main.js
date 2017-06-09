var $j = jQuery.noConflict();
var gr=0; var trc=0; var rc=0; var rh=0; var ri=0; var sb=0; var sa=0; var vsb=0;

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

/*function loadScript(url, callback){ **Se retira temp**
    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = url;
    script.onreadystatechange = callback;
    script.onload = callback;
    head.appendChild(script);
}function MiArchivoCargado(){/*archivo agregado*/ /*}*/

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

    /*if(gr==0){ **se retira temp**
      gr=1;
      loadScript("https://royalreservations.com/js/gtm/grand-residences.js", MiArchivoCargado);
    }*/

  }
  if(value == "86175"){
    $j("#select-childrens").val("0");
    $j("#select-childrens").hide();
    $j("#spChildren").hide();
    $j("#spAdult").text(tag_adult);
    $j("#spTeen").text(tag_children2);

    /*$j("#select-childrens").val("0");
    $j("#spAdult").text(tag_adult);
    $j("#spTeen").text(tag_teen);
    $j("#spChildren").text(tag_children);
    $j("#select-childrens").show();
    $j("#spChildren").show();*/

    /*if(rc==0){ **se retira temp**
      rc=1;
      loadScript("https://royalreservations.com/js/gtm/the-royal-caribbean.js", MiArchivoCargado);
    }*/
  }
  if(value == "86182"){
    $j("#select-childrens").val("0");
    $j("#select-childrens").hide();
    $j("#spChildren").hide();
    $j("#spAdult").text(tag_adult);
    $j("#spTeen").text(tag_children2);

    /*$j("#select-childrens").val("0");
    $j("#spAdult").text(tag_adult);
    $j("#spTeen").text(tag_teen);
    $j("#spChildren").text(tag_children);
    $j("#select-childrens").show();
    $j("#spChildren").show();*/

    /*if(ri==0){  **se retira temp**
      ri=1;
      loadScript("https://royalreservations.com/js/gtm/the-royal-islander.js", MiArchivoCargado);
    }*/
  }
  if(value=="73601"){
    $j("#select-childrens").val("0");
    $j("#spAdult").text(tag_adult);
    $j("#spTeen").text(tag_teen);
    $j("#spChildren").text(tag_children);
    $j("#select-childrens").show();
    $j("#spChildren").show();

    /*if(trc==0){  **se retira temp**
      trc=1;
      loadScript("https://royalreservations.com/js/gtm/the-royal-cancun.js", MiArchivoCargado);
    }*/
  }
  if(value=="86169"){
    $j("#select-childrens").val("0");
    $j("#spAdult").text(tag_adult);
    $j("#spTeen").text(tag_teen);
    $j("#spChildren").text(tag_children);
    $j("#select-childrens").show();
    $j("#spChildren").show();

  }

  if(value=="86184"){
      $j("#select-childrens").val("0");
      $j("#spAdult").text(tag_adult);
      $j("#spTeen").text(tag_teen);
      $j("#spChildren").text(tag_children);
      $j("#select-childrens").show();
      $j("#spChildren").show();

    /*if(rh==0){  **se retira temp**
      rh=1;
      loadScript("https://royalreservations.com/js/gtm/the-royal-haciendas.js", MiArchivoCargado);
    }*/
  }
  if(value=="86179"){
      $j("#select-childrens").val("0");
      $j("#spAdult").text(tag_adult);
      $j("#spTeen").text(tag_teen);
      $j("#spChildren").text(tag_children);
      $j("#select-childrens").show();
      $j("#spChildren").show();

      /*if(sb==0){  **se rerira temp**
        sb=1;
        loadScript("https://royalreservations.com/js/gtm/simpson-bay.js", MiArchivoCargado);
      }*/
  }
  if(value=="86180"){
      $j("#select-childrens").val("0");
      $j("#spAdult").text(tag_adult);
      $j("#spTeen").text(tag_teen);
      $j("#spChildren").text(tag_children);
      $j("#select-childrens").show();
      $j("#spChildren").show();

    /*if(vsb==0){  **se retira temp**
      vsb=1;
      loadScript("https://royalreservations.com/js/gtm/the-villas.js", MiArchivoCargado);
    }*/
  }
  if(value=="86181"){
      $j("#select-childrens").val("0");
      $j("#spAdult").text(tag_adult);
      $j("#spTeen").text(tag_teen);
      $j("#spChildren").text(tag_children);
      $j("#select-childrens").show();
      $j("#spChildren").show();
      
      /*if(sa==0){  **se retira temp**
        sa=1;
        loadScript("https://royalreservations.com/js/gtm/the-royal-sea.js", MiArchivoCargado);
      }*/
  }


  searchIhotelierRatePlan();
  searchIhotelierPackage();
}

function setClassActive(e) { $j("#" + e).addClass("active") }

function validateBooking(){
  /*var f_hoy = new Date();
  var f_mantto1 = new Date(2017,03,01, 07,58,00,00);
  var f_mantto2 = new Date(2017,03,01, 13,01,00,00);
  
  if((f_hoy>= f_mantto1) && (f_hoy<=f_mantto2)){
    $j('#mantenimiento').modal('show');
    return false;
  }*/

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

  /*var f_hoy = new Date();
  var f_mantto1 = new Date(2017,03,01, 07,58,00,00);
  var f_mantto2 = new Date(2017,03,01, 13,01,00,00);
  
  if((f_hoy>= f_mantto1) && (f_hoy<=f_mantto2)){
    $j('#mantenimiento').modal('show');
    return false;
  }*/
  
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
  
/*function validateBookingTest(){
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
}*/

/*JS Landing Offer*/

function validateEditForm(){
  if(document.formModalReservation.hotelid.value == "0"){
    if(document.formModalReservation.languageid.value=="1"){
      document.getElementById("msg").innerHTML = "Please select the Resort.";
    }
    if(document.formModalReservation.languageid.value=="2"){
      document.getElementById("msg").innerHTML = "Por favor seleccione el Resort de su Reservación.";
    }
    $j("#msg").show("slow");
      return false;
    }
    if ($j("#confirmId").val() == ''){
      if(document.formModalReservation.languageid.value=="1"){
      document.getElementById("msg").innerHTML = "Please enter your confirmation number.";
    }
    if(document.formModalReservation.languageid.value=="2"){
      document.getElementById("msg").innerHTML = "Por favor ingrese su número de confirmación.";
    }
      $j("#msg").show("slow");
      return false;
    }
    return true;
}

function validateBookingModal(){
  var minimumBB  =document.formModal.minimumB.value;

  var DateIn  = new Date(document.formModal.dateinB.value);
  var DateOut = new Date(document.formModal.dateoutB.value);

  if(((DateOut - DateIn) /1000/60/60/24) < minimumBB){
    $j("#error-minimum2").show("slow");
    return false;
  }
  else{
    $j("#error-minimum2").hide("slow");

    document.formModalSend.datein.value=document.formModal.dateinB.value;
    document.formModalSend.dateout.value=document.formModal.dateoutB.value;
    
    if(btnPlanC==1){
      document.formModalSend.hotelid.value=document.formModal.hotelidC.value;
    }
    if(btnPlanD==1){
      document.formModalSend.hotelid.value=document.formModal.hotelidD.value;
    }
    if(btnPlanE==1){
      document.formModalSend.hotelid.value=document.formModal.hotelidE.value;
    }

    if(document.formModal.RatePlanIDB) { document.formModalSend.RatePlanID.value=document.formModal.RatePlanIDB.value;}
    if(document.formModal.packageIdB) { document.formModalSend.packageId.value=document.formModal.packageIdB.value;}
    
    var adultsBB   =document.formModal.adultsB.value;
    var childrenBB =document.formModal.childrenB.value;
    var children2BB=document.formModal.children2B.value;
    
    $j("#adults").val(adultsBB);
    $j("#children").val(childrenBB);
    $j("#children2").val(children2BB);

    document.formModalSend.submit();
  }
  return false;
}
function asignaRatesC(T){ 
  var rate=$j('#hotelidC option:selected').attr('id');
  var min=$j('#hotelidC option:selected').attr('name');
  var resort=$j('#hotelidC option:selected').attr('value');

  if(document.formModal.RatePlanIDB) { document.formModal.RatePlanIDB.value=rate;}
  if(document.formModal.packageIdB) { document.formModal.packageIdB.value=rate;}
  document.formModal.minimumB.value=min;

  changeBooking2(resort);
}
function asignaRatesD(T){
  var rate=$j('#hotelidD option:selected').attr('id');
  var min=$j('#hotelidD option:selected').attr('name');
  var resort=$j('#hotelidD option:selected').attr('value');

  if(document.formModal.RatePlanIDB) { document.formModal.RatePlanIDB.value=rate;}
  if(document.formModal.packageIdB) { document.formModal.packageIdB.value=rate;}
  document.formModal.minimumB.value=min;

  changeBooking2(resort);
}
function asignaRatesE(T){
  var rate=$j('#hotelidE option:selected').attr('id');
  var min=$j('#hotelidE option:selected').attr('name');
  var resort=$j('#hotelidE option:selected').attr('value');

  if(document.formModal.RatePlanIDB) { document.formModal.RatePlanIDB.value=rate;}
  if(document.formModal.packageIdB) { document.formModal.packageIdB.value=rate;}
  document.formModal.minimumB.value=min;

  changeBooking2(resort);
}
function changeBooking2(resort_id){
  var tag_adultB = $j('#tag_adultB').val();
  var tag_adult2B = $j('#tag_adult2B').val();
  var tag_teenB = $j('#tag_teenB').val();
  var tag_childrenB = $j('#tag_childrenB').val();
  var tag_children2B = $j('#tag_children2B').val();

  if(resort_id == "95939"){
      $j("#children2B").val("0");
      $j("#children2B").hide();
      $j("#spChildrenB").hide();
      $j("#spAdultB").text(tag_adult2B);
      $j("#spTeenB").text(tag_childrenB);
  }
  if(resort_id == "86182" || resort_id == "86175"){
      $j("#children2B").val("0");
      $j("#children2B").hide();
      $j("#spChildrenB").hide();
      $j("#spAdultB").text(tag_adultB);
      $j("#spTeenB").text(tag_children2B);
  }
  if(resort_id != "86182" && resort_id != "86175" && resort_id != "95939"){
      $j("#childrensB").val("0");
      $j("#spAdultB").text(tag_adultB);
      $j("#spTeenB").text(tag_teenB);
      $j("#spChildrenB").text(tag_childrenB);
      $j("#children2B").show();
      $j("#spChildrenB").show();
  }

}
function getTimeRemaining(endtime) { 
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days':days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}
var deadline = new Date(varjs);
var btnPlanC=0; var btnPlanD=0; var btnPlanE=0;

initializeClock('clockdiv', deadline);
initializeClock('clockday', deadline);

$j(document).ready(function(){
  $j('#btn-73601').click(function(){ 
    document.getElementById('txHotel').style.display='none'; 
    $j('#hotelidC').selectpicker('hide'); $j('#hotelidD').selectpicker('hide'); $j('#hotelidE').selectpicker('hide');
    changeBooking2(73601);
    $j('#dates').modal('show'); 
    document.formModalSend.hotelid.value=73601;
    if(Jrate73601 !=1010){ document.formModal.RatePlanIDB.value=Jrate73601; }
    if(Jpackage73601 !=1010){ document.formModal.packageIdB.value=Jpackage73601; }
    document.formModal.minimumB.value=Jminimum73601;
  });
  $j('#btn-86175').click(function(){
    document.getElementById('txHotel').style.display='none'; 
    $j('#hotelidC').selectpicker('hide'); $j('#hotelidD').selectpicker('hide');$j('#hotelidE').selectpicker('hide');
    changeBooking2(86175);
    $j('#dates').modal('show');
    document.formModalSend.hotelid.value=86175;
    if(Jrate86175 !=1010){ document.formModal.RatePlanIDB.value=Jrate86175; }
    if(Jpackage86175 !=1010){ document.formModal.packageIdB.value=Jpackage86175; }
    document.formModal.minimumB.value=Jminimum86175;
  });
  $j('#btn-86182').click(function(){
    document.getElementById('txHotel').style.display='none';
    $j('#hotelidC').selectpicker('hide'); $j('#hotelidD').selectpicker('hide'); $j('#hotelidE').selectpicker('hide');
    changeBooking2(86182);
    $j('#dates').modal('show');
    document.formModalSend.hotelid.value=86182;
    if(Jrate86182 !=1010){ document.formModal.RatePlanIDB.value=Jrate86182; }
    if(Jpackage86182 !=1010){ document.formModal.packageIdB.value=Jpackage86182; }
    document.formModal.minimumB.value=Jminimum86182;
  });
  $j('#btn-86169').click(function(){
    document.getElementById('txHotel').style.display='none';
    $j('#hotelidC').selectpicker('hide'); $j('#hotelidD').selectpicker('hide'); $j('#hotelidE').selectpicker('hide');
    changeBooking2(86169);
    $j('#dates').modal('show');
    document.formModalSend.hotelid.value=86169;
    if(Jrate86169 !=1010){ document.formModal.RatePlanIDB.value=Jrate86169; }
    if(Jpackage86169 !=1010){ document.formModal.packageIdB.value=Jpackage86169; }
    document.formModal.minimumB.value=Jminimum86169;
  });
  $j('#btn-86184').click(function(){
    document.getElementById('txHotel').style.display='none';
    $j('#hotelidC').selectpicker('hide'); $j('#hotelidD').selectpicker('hide');$j('#hotelidE').selectpicker('hide');
    changeBooking2(86184);
    $j('#dates').modal('show');
    document.formModalSend.hotelid.value=86184;
    if(Jrate86184 !=1010){ document.formModal.RatePlanIDB.value=Jrate86184; }
    if(Jpackage86184 !=1010){ document.formModal.packageIdB.value=Jpackage86184; }
    document.formModal.minimumB.value=Jminimum86184;    
  });
  $j('#btn-95939').click(function(){
    document.getElementById('txHotel').style.display='none'; 
    $j('#hotelidC').selectpicker('hide'); $j('#hotelidD').selectpicker('hide');$j('#hotelidE').selectpicker('hide');
    changeBooking2(95939);
    $j('#dates').modal('show');
    document.formModalSend.hotelid.value=95939;
    if(Jrate95939 !=1010){ document.formModal.RatePlanIDB.value=Jrate95939; }
    if(Jpackage95939 !=1010){ document.formModal.packageIdB.value=Jpackage95939; }
    document.formModal.minimumB.value=Jminimum95939;
  });
  $j('#btn-86179').click(function(){
    document.getElementById('txHotel').style.display='none'; 
    $j('#hotelidC').selectpicker('hide'); $j('#hotelidD').selectpicker('hide');$j('#hotelidE').selectpicker('hide');
    changeBooking2(86179);
    $j('#dates').modal('show');
    document.formModalSend.hotelid.value=86179;
    if(Jrate86179 !=1010){ document.formModal.RatePlanIDB.value=Jrate86179; }
    if(Jpackage86179 !=1010){ document.formModal.packageIdB.value=Jpackage86179; }
    document.formModal.minimumB.value=Jminimum86179;
  });
  $j('#btn-86180').click(function(){
    document.getElementById('txHotel').style.display='none'; 
    $j('#hotelidC').selectpicker('hide'); $j('#hotelidD').selectpicker('hide');$j('#hotelidE').selectpicker('hide');
    changeBooking2(86180);
    $j('#dates').modal('show');
    document.formModalSend.hotelid.value=86180;
    if(Jrate86180 !=1010){ document.formModal.RatePlanIDB.value=Jrate86180; }
    if(Jpackage86180 !=1010){ document.formModal.packageIdB.value=Jpackage86180; }
    document.formModal.minimumB.value=Jminimum86180;
  });
  $j('#btn-86181').click(function(){
    document.getElementById('txHotel').style.display='none'; 
    $j('#hotelidC').selectpicker('hide'); $j('#hotelidD').selectpicker('hide');$j('#hotelidE').selectpicker('hide');
    changeBooking2(86181);
    $j('#dates').modal('show');
    document.formModalSend.hotelid.value=86181;
    if(Jrate86181 !=1010){ document.formModal.RatePlanIDB.value=Jrate86181; }
    if(Jpackage86181 !=1010){ document.formModal.packageIdB.value=Jpackage86181; }
    document.formModal.minimumB.value=Jminimum86181;
  });
  $j('#btn-plan1').click(function(){
    document.getElementById('txHotel').style.display='inline';
    $j('#hotelidC').selectpicker('show'); $j('#hotelidD').selectpicker('hide'); $j('#hotelidE').selectpicker('hide');
    btnPlanC=1; btnPlanD=0; btnPlanE=0;
    var r=$j('#hotelidC option:selected').attr('value');
    changeBooking2(r);
    $j('#dates').modal('show');
    var rate=$j('select option:selected').attr('id');
    var min=$j('select option:selected').attr('name');
    if(document.formModal.RatePlanIDB){ $j("#RatePlanID").val(rate); document.formModal.RatePlanIDB.value=rate;}
    if(document.formModal.packageIdB) { $j("#packageId").val(rate);  document.formModal.packageIdB.value=rate;}
    document.formModal.minimumB.value=min;
  });
  $j('#btn-plan2').click(function(){
    document.getElementById('txHotel').style.display='inline';  
    $j('#hotelidC').selectpicker('hide');$j('#hotelidD').selectpicker('show');$j('#hotelidE').selectpicker('hide');
    btnPlanC=0; btnPlanD=1; btnPlanE=0;
    var r=$j('#hotelidD option:selected').attr('value');
    changeBooking2(r);
    $j('#dates').modal('show');
    var rate=$j('select option:selected').attr('id');
    var min=$j('select option:selected').attr('name');
    if(document.formModal.RatePlanIDB){ $j("#RatePlanID").val(rate); document.formModal.RatePlanIDB.value=rate;}
    if(document.formModal.packageIdB) { $j("#packageId").val(rate);  document.formModal.packageIdB.value=rate;}
    document.formModal.minimumB.value=min;
  });
  $j('#btn-plan3').click(function(){
    document.getElementById('txHotel').style.display='inline';
    btnPlanC=0; btnPlanD=0; btnPlanE=1;
    $j('#hotelidC').selectpicker('hide'); $j('#hotelidD').selectpicker('hide');$j('#hotelidE').selectpicker('show');
    var r=$j('#hotelidE option:selected').attr('value');
    changeBooking2(r);
    $j('#dates').modal('show');
    var rate=$j('select option:selected').attr('id');
    var min=$j('select option:selected').attr('name');
    if(document.formModal.RatePlanIDB){ $j("#RatePlanID").val(rate); document.formModal.RatePlanIDB.value=rate;}
    if(document.formModal.packageIdB) { $j("#packageId").val(rate);  document.formModal.packageIdB.value=rate;}
    document.formModal.minimumB.value=min;
  });

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

    var checkin = $j('#dateinB').datepicker({

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
        $j('#dateoutB')[0].focus();
    }).data('datepicker');
    var checkout = $j('#dateoutB').datepicker({
        onRender: function (date) {

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

});