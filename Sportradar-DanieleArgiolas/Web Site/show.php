<?php require 'includes/head.php'; ?>	
<div class="flex">
<div class="events-container">
<?php foreach ($res as $s):
	$date = new DateTime($s['event_date']); 
	$score = $s['score_one'].'-'.$s['score_two'];
	if($s['sc_id'] == null and $today > $date):
		?>
			<div class="show scorepanel">
				<p class="big_text">This game was played on <?=$date->format('S., d/m/Y')?></p>
				<p class="">Do you like to write the scores?</p>
				<form action="show.php?id=<?= $_GET['id'] ?>" method="POST" accept-charset="utf-8">
					<div class="flex big_text ">
						<input type="hidden" name="mtc" value="<?= $s['id'] ?>">
						<div class="p">
							<p><?= $s['team_one'] ?></p>
							<input type="number" name="p1"  min="0">
						</div>
						<div class="p">
							<p><?= $s['team_two'] ?></p>
							<input type="number" name="p2"  min="0">
						</div>
					</div>
					<button type="submit" name="new_score" class="button">Save</button>
				</form>
			</div>
	<?php endif; ?>
			

	<div class="event p show">
		<?='<h2>'.$s['team_one'].' '.$score.' '.$s['team_two'].'</h2>';?>
		<h3>When: <?=$date->format('l, d/m/Y')?></h3>
		<h3>Time: <?=$date->format('H:i')?></h3>
		<h3>Category: <?=$s['sport_type']?>
		</h3>
	</div>

<?php endforeach?>
    </div>
</div>
<?php require 'includes/footer.php' ?>