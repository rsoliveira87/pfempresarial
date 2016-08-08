(function($) {
	"use strict";	

	$(document).ready(function() {

		$( "ul.nav-menu > li.menu-item > a" ).addClass( "scroll" );

		$( ".scroll" ).click(function(event){
			event.preventDefault();
			$( "html, body" ).animate({
				scrollTop:jQuery(this.hash).offset().top
			}, 1000);
		});

		$( "#active-search-form" ).click(function(event) {
			$( ".search-form" ).toggleClass( "hide" );
			event.stopPropagation();
		});

		if ( $( ".homepage-form" ).length > 0 ) {
			// Estados e Cidades carregados dinamicamente no Formulário de captura de Leads da Home
		    $.getJSON('wp-content/themes/pfempresarial/assets/json/states_citys_brazil.json', function (data) {
		    	var options = '<option value="">Estado</option>';	
		        $.each(data, function (key, val) {
		            options += '<option value="' + val.nome + '">' + val.nome + '</option>';
		        });					
		        
		        $( "#lead_estado" ).html(options);				

		        $( "#lead_estado" ).change(function () {				

		            var options_cidades = '<option value="">Cidade</option>';
		            var str = "";					

		            $( "#lead_estado option:selected" ).each(function () {
		                str += $( this ).text();
		            });

		            $.each(data, function (key, val) {
		                if( val.nome == str ) {	
		                    options_cidades = '';						
		                    $.each(val.cidades, function (key_city, val_city) {
		                        options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
		                    });							
		                }
		            });

		            $( "#lead_cidade" ).html(options_cidades);

		        }).change();		

		    });
		    // End script states and cities
		}		

		$( ".team-content .team-more-info a" ).click(function(){
			$( ".team-info" ).removeClass( "in" );
		});

		$( "div.activities-box:first-child" ).addClass( "in" );

		$( "ul.activities-list-areas li a" ).click(function() {
			$( ".activities-box" ).removeClass( "in" );
		});

		$( ".carousel .carousel-inner div.item:first-child" ).addClass( "active" );

		$( "#back-to-top, .back-to-top" ).click(function() {
	        $( "html, body" ).animate({ 
	        	scrollTop: 0 
	        }, 800);
	        return false;
	    });

	});

	$(window).scroll(function(){

		if ( $(window).scrollTop() > 200 ) {
            $( "#back-to-top" ).fadeIn( 200 );
        } else {
            $( "#back-to-top" ).fadeOut( 200 );
        }
	});

})(jQuery);

function initMap() {
	// Create a map object and specify the DOM element for display.
    var map = new google.maps.Map(document.getElementById( 'contactmap' ), {
       	center: {lat: -23.579335, lng: -46.686874},
       	scrollwheel: false,
       	zoom: 16
    });

    var marker = new google.maps.Marker({
    	map: map,
    	position: {lat: -23.579335, lng: -46.686874},
    	title: "Aleah Brasil"
    });
}