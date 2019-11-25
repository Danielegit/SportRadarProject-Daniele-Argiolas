<?php require 'includes/head.php'; ?>	
<div class="flex">
<div class="events-container">
<?php 
	if($res != 'No result'){
	foreach ($res as $res):
	$date = new DateTime($res['event_date']); 
	$id = $res['id'];
	$score = $res['score_one'].'-'.$res['score_two'];	
?>
	<div class="event p">
		<form action="index.php" method="POST" accept-charset="utf-8">
			<input type="hidden" name="del" value="<?= $res['id'] ?>">	
			<button type="submit" name="delete" class="delete_btn">X</button>
		</form>
		<a href="show.php?id=<?= $id ?>" class="alinks">
			<?='<h2>'.$res['team_one'].' '.$score.' '.$res['team_two'].'</h2>';?>
		</a>
		<?='<p class="dates">'.$date->format('S., d/m/Y, H:i').' Uhr, <strong>'.$res['sport_type'].'</strong></p>'?>
	</div>
<?php 
	endforeach;
	}else{  //if($res != 'No result')
		echo '<h2 class="big_text p">No Results for the selected category.</h2>';
	}
 ?>	

</div>
<div class="right-box">
	<h2>Filter</h2>
	<div id="filter">
		<form action="index.php" method="POST" accept-charset="utf-8">
			<select name="category">
				<option value="default">All Categories</option>
				<?php foreach ($category as $key => $value): ?>
					<option class="opt" value="<?=$value['cat_id']?>"><?=$value['sport_type']?></option>
				<?php endforeach ?>
			</select>
			<button type="submit" class="button" name="filter">Filter</button>
		</form>
	</div>
</div>
</div>
<?php require 'includes/footer.php' ?>