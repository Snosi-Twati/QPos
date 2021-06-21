<section class="content">
<div class="box">
            <div class="box-header">
                <h3 class="box-title">قائمة المصحات</h3>
            </div>  
     <div class="box-body">

<!--<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>-->
<!--<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">-->




<?php
$attributes = array('method' => 'GET');
echo form_open('map/Maps', $attributes);
?>
<div class="panel-body">

    <div class="form-group">
        <label for="title">اختر الدولة:</label>
            <select id="f_state" name="f_state" class="form-control" style="width:350px">
                <option value="">--- Select Country Name ---</option>
                <?php
                foreach ($countries as $key => $value) {
                    echo "<option value='".$value->CountryID."'>".$value->CountryName."</option>";
                }
                ?>
            </select>
    </div>

    <div class="form-group">
        <label for="title">اختر المدينة :</label>
            <select name="city"  id ="city" class="form-control" style="width:350px">

            </select>


        <div class="panel-body">
            <div class="map-container">
                <div class="col-lg-12">
                    <div class="box">

                        <div id="map" style=" height: 600px;" ></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
</div>
</section> 

<script type="text/javascript">

$(document).ready(function() {
$('select[name="f_state"]').on('change', function() {
var stateID = $(this).val();
if(stateID) {
$.ajax({
url: '<?PHP echo base_url(); ?>/index.php/AllClinics/get_city/'+stateID,
type: "GET",
dataType: "json",
success:function(data) {

$('select[name="city"]').empty();	
$('#city').append('<option value="">--- Select city ---</option>');

$.each(data, function(key, value) {

$('#city').append('<option value="'+ value.CityID +'">'+ value.CityName +'</option>');
});
}
});
}else{
$('select[name="city"]').empty();
}
});
});

</script>

<script type='text/javascript'>


var map;	
var latlng ;
var myOptions ;
function initMap(lat_city,lng_city) {

latlng = new google.maps.LatLng(lat_city, lng_city); // default location
myOptions = {
zoom: 10,
center: latlng,
mapTypeId: google.maps.MapTypeId.ROADMAP,
mapTypeControl: false
};
map = new google.maps.Map(document.getElementById('map'),myOptions);



}



$(document).ready(function() {
$('select[name="city"]').on('change', function() {
var CityID = $(this).val();
if(CityID) {
$.ajax({
url: '<?PHP echo base_url(); ?>/index.php/AllClinics/get_companies/'+CityID,
type: "GET",
dataType: "json",
success:function(data) {
if ($.trim(data)) 

{ 
$.each(data, function(key, value) {
$("#map").show();
initMap(value.lat_city,value.lng_city);

});

$.each(data, function(key, value) {



var infowindow = new google.maps.InfoWindow(), marker, lat, lng;

//var json=JSON.parse( value );
//	


lat = value.lat;
lng=value.lng;
name=value.name;

marker = new google.maps.Marker({
position: new google.maps.LatLng(lat,lng),
name:name,
map: map
}); 
google.maps.event.addListener( marker, 'click', function(e){
infowindow.setContent(
'<div><strong>' + this.name + '</strong><br>' 
+'PHONE: ' + value.Phone + '<br>' + 'Email: ' + value.Email + '</div>');
infowindow.open( map, this );
}.bind( marker ) );



});

}else {


//alert('No exists Clinic in this City');
//setTimeout( function ( ) { alert( "No exists Clinic in this City" ); }, 10000 );
$("#map").hide();

}





}

});
}
});
});
</script>





<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmVvT9gXq6OkLMj1QLooGogPTHBekZhSk">
</script>


