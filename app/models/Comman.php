<?php
class Comman extends Eloquent {

	public static function get_date($date)
	{
		$dt_end = new DateTime($date);
		$remain = $dt_end->diff(new DateTime());

		if($remain->d > 1) $r = $remain->d.' days';
		else if($remain->h > 1) $r = $remain->h.' hours';
		else $r = $remain->m.' minutes';

		echo $r;

		//var_dump($dt_end);
		//echo Config::get('application.regos-open-date');
	}

	public static function elapsedTime ( $start, $end = false) {
		$returntime = array();
		
		// set defaults
		if ($end == false) { $end = time(); }

		$diff = $end - $start;
		$days = floor($diff/86400); 
		$diff = $diff - ($days*86400); 

		$hours = floor ($diff/3600); 
		$diff = $diff - ($hours*3600); 

		$mins = floor ($diff/60); 
		$diff = $diff - ($mins*60); 

		$secs = $diff;

		if ($secs > 0) {$returntime['secs'] = $secs;} else {$returntime['secs'] = 0;}
		if ($mins > 0) {$returntime['mins'] = $mins;} else {$returntime['mins'] = 0;}
		if ($hours > 0) {$returntime['hours'] = $hours;} else {$returntime['hours'] = 0;}
		if ($days > 0) {$returntime['days'] = $days;} else {$returntime['days'] = 0;}

		if ($returntime['days'] == 0) { if ($returntime['hours'] == 0) { return $returntime['mins'] . " minute" . (($returntime['mins']>1) ? "s":"") . " ago"; } else { return $returntime['hours'] . " hour" . (($returntime['hours']>1) ? "s":"") . " ago"; } } else { return $returntime['days'] . " day" . (($returntime['days']>1) ? "s":"") . " ago"; }
	}
	
	public static function elapsedTimeString($elapsedtime) {
		if ($elapsedtime['days'] == 0) {
			if ($elapsedtime['hours'] == 0) {
					// show minutes
				return $elapsedtime['mins'] . " minute" . (($elapsedtime['mins']>1) ? "s":"") . " ago";
			}
			else {
					// show hours
				return $elapsedtime['hours'] . " hour" . (($elapsedtime['hours']>1) ? "s":"") . " ago";
			}
		}
		else {
				// show days
			return $elapsedtime['days'] . " day" . (($elapsedtime['days']>1) ? "s":"") . " ago";
		}
	}
}