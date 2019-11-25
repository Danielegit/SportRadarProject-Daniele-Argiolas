<?php 
require 'app/core.php';
/*FILTER sport categories*/
if(isset($_POST['filter'])){
	if($_POST['category'] != 'default'){
		$where = ' where cat_id = '.$_POST['category'];
	}else{
		$where = '';
	}
}else{$where = '';}

/*Delete event*/
if(isset($_POST['delete'])){
	$action->delete('matches', ' id = '.$_POST['del']);
}

/*Create new Event*/
if(isset($_POST['sub'])){
	$table = 'matches';
	$columns = 'team_one, team_two, event_date, _SPORT';
	$t1 = $_POST['team_one'];
	$t2 = $_POST['team_two'];
	$dt = $_POST['date'];
	$ct = $_POST['category'];
	$push =	"'$t1', '$t2', '$dt', $ct";
	$action->create($table, $columns, $push);
	header('Location: index.php');
}
/*Add Scores to a Event, Only possible after the event date*/
if(isset($_POST['new_score'])){
	$table = 'scores';
	$columns = 'score_one, score_two, _MATCH';
	$s1 = $_POST['p1'];
	$s2 = $_POST['p2'];
	$mtc = $_POST['mtc'];
	$push =	"$s1,$s2,$mtc";
	$action->create($table, $columns, $push);
	header('Location: index.php');
}
/*In the page Show?id= , it adds a 'where' to the $res Query 
*for selecting only oe result
*/
if (isset($_GET['id'])) {
	$where = ' where matches.id = '.$_GET['id'].' LIMIT 1'; 
}
/*Select All Categories from the DB*/
$category = $action->read('sports');

/*Select All Events from Db joininig 'sports' and 'scores' table*/
$res = $action->read('matches','left join sports ON _SPORT = cat_id  left join scores ON _MATCH = matches.id ',$where);
/**/

$today = new DateTime();
?>