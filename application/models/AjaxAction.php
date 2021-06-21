<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjaxAction
 *
 * @author Snosi
 */
class AjaxAction extends CI_Model{
    
    function FillSelectJS($Tbl,$SFldC,$VFldC,$SFld,$VFld,$ActionFldName,$ActionFldNameOn,$UseType){
        //var_dump('llllllllllllllllllllllllllllllllllllllllllllllll');
         $select="";
        if ($UseType=="byname"){
            $select="$('select[name=\"$ActionFldName\"]')";
        } elseif ($UseType=="byclass"){
             $select="$('#select2-".$ActionFldName."-container')";
        }elseif($UseType=="other"){
            $select="$('aria-labelledby=\"select2-".$ActionFldName."-container\"')";
        }
         
        echo "<script type=\"text/javascript\">

            $(document).ready(function() {
                $select.on('change', function() {
                    alert(1);
                    var stateID = $(this).val();
                    if(stateID) {
                        $.ajax({
                            url: '". base_url()."index.php/AjaxActionCon/FillSelectJS/$Tbl/$SFldC/'+stateID+'',
                            type: \"GET\",
                            dataType: \"json\",
                            success:function(data) {
                                var className = $('#".$ActionFldName."').attr('class');
                                alert(className);
                                $('select[name=\"$ActionFldNameOn\"]').empty();	
                                $('#$ActionFldNameOn').append('<option value=\"\">--- Select city ---</option>');

                                $.each(data, function(key, value) {

                                    $('#$ActionFldNameOn').append('<option value=\"'+ value.$VFld +'\">'+ value.$SFld +'</option>');

                                });

                            }

                        });

                    }else{

                        $('select[name=\"$ActionFldNameOn\"]').empty();

                    }

                });

            });

        </script>";
        
    }
    
    function FillMapWithSelect($Select,$tbl,$SFld,$VFld,$name,$Phone,$Email,$lat,$log,$lat_city,$lng_city){
        
        echo "<div class=\"panel-body\">
            <div class=\"map-container\">
                <div class=\"col-lg-12\">
                    <div class=\"box\">

                        <div id=\"map\" style=\" height: 600px;\" ></div>
                    </div>

                </div>
            </div>
        </div>";
        
        echo "<script type='text/javascript'>

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
            $('select[name=\"".$Select."\"]').on('change', function() {
            var CityID = $(this).val();
            if(CityID) {
                $.ajax({
                    url: '".base_url()."/index.php/AjaxActionCon/FillMapWithSelect/".$tbl."/".$SFld."/'+CityID+'/".$name."/".$Phone."/".$Email."/".$lat."/".$log."/".$lat_city."/".$lng_city."',
                    type: \"GET\",
                    dataType: \"json\",
                    success:function(data) {
                    if ($.trim(data)){ 
                        $.each(data, function(key, value) {
                            $(\"#map\").show();
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
                        //setTimeout( function ( ) { alert( \"No exists Clinic in this City\" ); }, 10000 );
                        $(\"#map\").hide();

                    }

                    }

                });
            }
            });
        });
        </script>





        <script async defer
        src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyDmVvT9gXq6OkLMj1QLooGogPTHBekZhSk\">
        
        </script>";
    }
    
}
