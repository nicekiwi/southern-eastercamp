@extends('layouts.master')

@section('title','Southern Eastercamp 2014')
@section('desc','')

@section('content')

<style type="text/css">

	.parallax-section {
		color: white;
		overflow: hidden;
		padding: 0;

		background-image: none;
		background-color: #000;
		background-position: 50% 0;
		background-attachment: fixed;
		background-repeat: no-repeat;

		position: relative;
	}
	
	/* Medium Screens */
	@media only screen and (min-width: 40.063em) {
		#fmx-rider {
			background-image: url(/img/parallax/fmx-bg-medium.jpg);
			height: 300px;
		}
	}

 	/* Large Screens */
	@media only screen and (min-width: 64.063em) { 
		#fmx-rider{
			background-image: url(/img/parallax/fmx-bg-large.jpg);
			height: 500px;
		}
	}

	#third{
		background: url(/img/parallax/thirdBG.jpg) 50% 0 no-repeat fixed;
		color: white;
		height: 650px;
		padding: 100px 0 0 0;	
	}

	#fifth{
		background: #ccc;
		height: 400px;
		margin: 0 auto;
		padding: 40px 0 0 0;
	}
</style>

<div class="row" style="margin-top: 30px;">
	<div class="small-1 medium-3 columns">&nbsp;</div>
	<div id="logo-box" class="small-10 medium-6 columns">
		
		<img class="logo-layer" src="/img/logo-ab/9_logo.svg">
		<img class="logo-layer" src="/img/logo-ab/8_logo.svg">
		<img class="logo-layer" src="/img/logo-ab/7_logo.svg">
		<img class="logo-layer" src="/img/logo-ab/6_logo.svg">
		<img class="logo-layer" src="/img/logo-ab/5_logo.svg">
		<img class="logo-layer" src="/img/logo-ab/4_logo.svg">
		<img class="logo-layer" src="/img/logo-ab/3_logo.svg">
		<img class="logo-layer" src="/img/logo-ab/2_logo.svg">
		<img class="logo-layer" src="/img/logo-ab/1_logo.svg">
		
	</div>
	<div class="small-1 medium-3 columns">&nbsp;</div>
</div>

<section class="parallax-section">
	<div class="row">
		<div class="small-2 columns"></div>
    	<div class="small-8 columns" style="text-align:center;">
			<h3>April 17th - 21st, Spencer Park - Christchurch</h3>
		</div>
		<div class="small-2 columns"></div>
    </div>
</section>

<section id="fmx-rider" class="parallax-section">
	<div class="row">
    	<div class="small-12 medium-6 columns">
            <h1 id="ec-countdown"></h1>
        </div>

        <div class="small-12 medium-6 columns">
            <img id="rider" src="/img/parallax/fmx-rider.png">
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