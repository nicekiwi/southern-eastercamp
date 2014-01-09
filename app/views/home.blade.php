@extends('layouts.master')

@section('title','Southern Eastercamp 2014')
@section('desc','')

@section('content')

<section class="parallax-section ec-triangles">
	<div class="row">
		<div class="small-1 medium-2 columns">&nbsp;</div>
    	<div class="small-10 medium-8 columns">
			<img src="/img/parallax/ec-logo.svg" style="max-height: 300px !important; margin: 0 auto; display: block;">
		</div>
		<div class="small-1 medium-2 columns">&nbsp;</div>
    </div>
</section>

<section class="parallax-section">
	<div class="row">
		<div class="small-12 medium-6 columns">
            <h2>The Best 5 days you'll ever have!</h2>
            <p></p>
        </div>

        <div class="small-12 medium-6 columns">
            <iframe width='100%' height='500px' frameBorder='0' src='https://a.tiles.mapbox.com/v3/nicekiwi.gp63a2a9/mm/zoompan,zoomwheel,geocoder,share.html?secure=1#11/-43.5125/172.6762'></iframe>
        </div>
    </div>
</section>

<section class="parallax-section fmx-rider">
	<div class="row">
    	<div class="small-12 medium-6 columns">
            <h1 id="ec-countdown"></h1>
        </div>

        <div class="small-12 medium-6 columns">
            <img src="/img/parallax/fmx-rider.png">
        </div>
    </div>
    
</section>

<section class="parallax-section">
	<div class="row">
    	<div class="float-left">
        	<h2>What Happens When JavaScript is Disabled?</h2>
            <p>The user gets a slap! Actually, all that jQuery does is moves the backgrounds relative to the position of the scrollbar. Without it, the backgrounds simply stay put and the user would never know they are missing out on the awesome! CSS2 does a good enough job to still make the effect look cool.</p>
        </div>
    </div> 
</section> 

<section class="parallax-section">
	<div class="row">
	    <h2>Registration!</h2>
    </div> 
</section>

@stop