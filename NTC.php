<?php


/* NTC- Naveen's Time Converter

main rule: 
time stamp must be generated only as date("d-m-Y-h-i-s-a"); for the ntc to completely work

open source plugin
created to reduce the work in converting time stamps

#####MODULES- till date #######
1.NTC_ZOMBIE: the default module i use in my projects.
2.NTC_FB: it converts time stamps as such fb does.

########HOW TO USE############
include("NTC.php") //include the ntc file
$ntc = new ntc; //INTIALIZE THE CLASS
$date = "27-09-2016-09-00-01-am"; //give a input
echo $ntc->NTC_FB($date); //print the converted output, NTC_FB is a module, you can try NTC_ZOMBIE for the different time output

####DOCS####
docs coming soon



*/ 
/* created by naveen for his laziness*/



class ntc {

public $days_input;
public $months_input;
public $years_input;
public $hours_input;
public $minutes_input;
public $seconds_input;
public $month_word;
public $meridian;



public $days_output;
public $months_output;
public $years_output;
public $hours_output;
public $minutes_output;
public $seconds_output;


/*function to get number of days*/
public function ntc_days ($input) {
$this->days_input = substr($input, 0,2);
return $this->days_output = date("d") - $this->days_input;	
}
/*functiuon to get number of months*/
public function ntc_months ($input) {
$this->months_input = substr($input, -19, 2);
return $this->months_output = date("m") - $this->months_input;
}
/*function to get the number of years */
public function ntc_years($input) {
$this->years_input = substr($input, -16, 4);
return $this->years_output = date("Y") - $this->years_input;
}

/*function to get the hours */
public function ntc_hours($input) {
$this->hours_input = substr($input, -11, 2);
return $this->hours_output = date("h") - $this->hours_input;
}
/* function to get the minutes */
public function ntc_minutes($input) {
$this->minutes_input = substr($input, -8, 2);
return $this->minutes_output = date("i") - $this->minutes_input;
}
/* function to get the seconds */
public function ntc_seconds($input) {
$this->seconds_input = substr(-5, 2);
return $this->seconds_output = date("s") - $this->seconds_input;
}
public function meridian($input) {
$this->meridian = substr($input, -2);
}
public function get_months($ip) {
switch ($ip) {
	case '01':
	return $this->month_word = "january";
		break;
	
	case '02':
	return $this->month_word = "February";
		break;

		case '03':
	return $this->month_word = "March";
		break;

		case '04':
	return $this->month_word = "April";
		break;

		case '05':
	return $this->month_word = "May";
		break;

		case '06':
	return $this->month_word = "June";
		break;

		case '07':
	return $this->month_word = "July";
		break;

		case '08':
	return $this->month_word = "August";
		break;

		case '09':
	return $this->month_word = "September";
		break;

		case '10':
	return $this->month_word = "October";
		break;

		case '11':
	return $this->month_word = "November";
		break;

		case '12':
	return $this->month_word = "December";
		break;

}




}


/* MODULE-1 NTC_ZOMBIE */
public function NTC_ZOMBIE($input) {
if ($this->ntc_years($input) > 0) {
$string = " years ago";
return $this->years_output.$string;
}
elseif ($this->ntc_months($input) > 0) {
$string = " months ago";
return $this->months_output.$string;
}
elseif ($this->ntc_days($input)) {
$string = " days ago";
return $this->days_output.$string; 
}
elseif ($this->ntc_hours($input) > 0) {
$string = " hours ago";
return $this->hours_output.$string;
}
elseif ($this->ntc_minutes($input) > 0) {
$string = " minutes ago";
return $this->minutes_output.$string;
}
	

}

/*MODULE-2 NTC_FB */
public function NTC_FB($input) {
$this->ntc_months($input);
$this->ntc_days($input);
$this->ntc_hours($input);
$this->ntc_minutes($input);
$this->meridian($input);
$month_word = $this->get_months($this->months_input);
$space = " ";
$days = $this->days_input;
$at = "at";
$colon = ":";
$hours = $this->hours_input;
$minutes = $this->minutes_input;
$meridian = $this->meridian;
if ($this->ntc_years($input) > 0 OR $this->ntc_months($input) > 0) {
return $string = $month_word.$space.$days.$space.$at.$space.$hours.$colon.$minutes.$space.$meridian;
}
elseif ($this->ntc_days($input) > 0) {

if ($this->ntc_days($input) == 1) {
$yesterday = "yesterday";;
return $string = $yesterday.$space.$at.$space.$hours.$colon.$minutes.$space.$meridian;	

}
else{
	return $string = $month_word.$space.$days.$space.$at.$space.$hours.$colon.$minutes.$space.$meridian;
}


}

elseif ($this->ntc_hours($input) > 0) {

	if ($this->ntc_hours($input) == 1) {
	$hours_ago = "hr";
return $string = $this->hours_output.$space.$hours_ago;
}
else {
	$hours_ago = "hrs";
return $string = $this->hours_output.$space.$hours_ago;


}

}

elseif ($this->ntc_minutes($input) > 0) {

if ($this->ntc_minutes($input) == 1) {
$minutes_ago = "min";
return $string = $this->minutes_output.$space.$minutes_ago;
}
else {
$minutes_ago = "mins";
return $string = $this->minutes_output.$space.$minutes_ago;

}



}







}





}





















?>
