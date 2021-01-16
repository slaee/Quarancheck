<?php

class Outbreak
{
	// this is if there is any outbreak
	public static $dataPoints;

	// public static function add($token, $outbreakDisease, $comments, $location, $measures)
	// {
	// 	if ($token == "") {
	// 		$time = time();
	// 		$token = md5(uniqid() . time() . unixtojd());
	// 		Db::insert(
	// 			"outbreaks",
	// 			array("outBreak", "comments", "location", "cTime", "measures", "token"),
	// 			array($outbreakDisease, $comments, $location, $time,  $measures, $token)
	// 		);

	// 		Messages::success("Outbreak has been added doctors will be able to see it and take necessary measures");
	// 	} else {
	// 		self::edit($token, $outbreakDisease, $comments, $location, $measures);
	// 		Messages::success("Outbreak has been edited. <strong><a href='outbreaks.php'>View edited record</a></strong>");
	// 	}
	// }

	public static function load()
	{
		$query = Db::fetch("patients", "", "diagnosis = ? ", "Positive", "", "", "");
		if (!Db::count($query)) {
			Messages::info("There is no outbreaks recorded in the moment");
			return;
		}

		echo "<div class='form-holder'>";
		Table::start();
		$header = array("Number of Cases", "Municipality");
		$body = array();
		Table::header($header);

		$arr = array();
		while ($all = Db::assoc($query)) {
			// printf("%s\n", $all["municipality"]);
			$data = array();
			$data[] = $all["municipality"];
			foreach ($data as $val) {
				$arr[] = $val;
				break;
			}
		}

		$municipality = array_count_values($arr);
		
		$x = 0;
		foreach ($municipality as $municipal => $cases) {	
			self::$dataPoints[] = array("y" => $cases, "label" =>  ucfirst($municipal));
			// self::$dataPoints[] = array("x" => $x, "y" => $cases, "indexLabel" => ucfirst($municipal));
			Table::body(array($cases, ucfirst($municipal)));
			$x++;
		}

		//Table::create($header, $body);
		Table::close();
		echo "</div>";
	}

	// public static function delete($token){
	// 	Db::delete("outbreaks", " token = ? ", $token); 
	// }

	// public static function get($token, $field){
	// 	$query = Db::fetch("outbreaks", "$field", "token = ? ", "$token", "id DESC","", "");
	// 	$data = Db::num($query); 
	// 	return $data[0];
	// }

	// public static function edit($token, $outbreakDisease, $comments, $location, $measures){
	// 	Db::update("outbreaks", 
	// 		array("outBreak", "comments", "location",  "measures"), 
	// 		array($outbreakDisease, $comments, $location, $measures),
	// 		"token = ? ", $token);
	// }

}
