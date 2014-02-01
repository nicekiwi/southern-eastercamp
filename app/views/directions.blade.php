<div class="row">
	<div class="small-12 columns">

	    <h1><i class="fa fa-map-marker"></i> Get Directions</h1>

	    <form id="calculate-route" name="calculate-route" action="#" method="get">
			<div class="row collapse">
				<div class="small-12 columns">
					<label for="from">Enter your address below and hit enter or click the <i class="fa fa-location-arrow"></i> to detect your location:</label>
				</div>
				<div class="small-10 medium-11 columns">
					<input class="error" type="text" id="startAddress" name="startAddress" required="required" placeholder="45a Example Street, Suburb, Christchurch">
					<!-- <small class="error address-error"></small> -->
				</div>
				<div class="small-2 medium-1 columns">
					<a href="#" id="geo-detect-link" class="button success postfix"><i class="fa fa-location-arrow fa-lg"></i></a>
				</div>
			</div>
	    </form>
		
		<div style="width:100%" class="th">
		    	<div id="map-canvas"></div>
		</div>
		

	    <div id="directions-panel"></div>

	</div>
</div>