<?php

class RockCalendar extends CWidget
{
	public function run()
	{
		$day 	=  date('d');
		$monday =  date('m');
		$year	=  date('Y');
		
		$Calendar = RCalendar::model()->findAll(
			array("condition"=>"DATE_FORMAT(date, '%m %d') = DATE_FORMAT('$year-$monday-$day', '%m %d')")
		);

		foreach ($Calendar as $item) {
			list($y,$m,$d) = explode('-',$item['date']);
			$range = ($year - $y);

			$range = abs($range);
			$time1 = $range % 10;
			$time2 = $range % 100;
			$when = ($time1 == 1 && $time2 != 11 ? "год" : ($time1 >= 2 && $time1 <= 4 && ($time2 < 10 || $time2 >= 20) ? "года" : "лет"));

			if ( $range > 0 ) {
				print  "Сегодня $item[date], $range $when назад $item[description]<br />";
			} else {
				print  "Сегодня $item[date], $item[description]<br />";
			}

		}
	}
}