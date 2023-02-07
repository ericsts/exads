<?php

require_once "config.php";

class Series
{
	private $_db;

	public function __construct(){
		$this->_db = ConnectionDB::getInstance();
	}

	public function sql($sql){
		$query = $this->_db->query($sql);
		if ($query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
					$data[] = $row;
			}
			return $data;
		} else {
			print mysqli_error($this->_db);
			return false;
		}
	}
}

class Tv
{
	private $series;

	public function __construct(){
		$this->series = new Series();
	}

	public function getAll(){
		return $this->series->sql("select * from tv_series");
	}

	public function getAllDetailed(){
		return $this->series->sql("select * from tv_series s INNER JOIN tv_series_intervals i ON s.id=i.id_tv_series");
	}

	public function getNext($time='now',$titleFilter=''){// Y-m-d H:i:s
		$date = strtotime($time);

		$week = date('N', $date);
		$time = date('H:i:s', $date);

		// print("\nshow_time = $time ");
		// print("\nweek = $week");

		return $this->series->sql("select * from tv_series s INNER JOIN tv_series_intervals i ON s.id=i.id_tv_series WHERE week_day=$week AND show_time > '$time' AND title LIKE '%$titleFilter%'");
	}
}


$tv = new Tv();

print("--------- ALL \n");
$tvs1 = $tv->getAllDetailed();
if($tvs1)
foreach ($tvs1 as $t) {
  print(" Title: ".$t['title']);
  print(" Week Day: ". $t['week_day']);
  print(" Time: ". $t['show_time']);
  print("\n");
}

print("--------- NEXT \n");
$tvs2 = $tv->getNext();
if($tvs2)
foreach ($tvs2 as $t) {
  print(" Title: ".$t['title']);
  print(" Week Day: ". $t['week_day']);
  print(" Time: ". $t['show_time']);
  print("\n");
}

print("--------- NEXT WITH FILTER\n");
$tvs2 = $tv->getNext('2023-01-31 15:00:00','Viking');
if($tvs2)
foreach ($tvs2 as $t) {
  print(" Title: ".$t['title']);
  print(" Week Day: ". $t['week_day']);
  print(" Time: ". $t['show_time']);
  print("\n");
}

