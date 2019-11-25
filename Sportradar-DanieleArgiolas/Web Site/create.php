<?php require 'includes/head.php'; ?>	
<div id="newmatch">
	<h1>Add a new Match</h1>
</div>
<div id="create_form">
	<form action="create.php" method="POST" accept-charset="utf-8">
		<div>
			<p>Category</p>
			<select name="category" required>
			<?php foreach ($category as $key => $value): ?>
				<option class="opt" value="<?=$value['cat_id']?>"><?=$value['sport_type']?></option>
			<?php endforeach ?>
		    </select>
		</div>
		<div>
			<p>Team One</p>
			<input type="text" name="team_one" required>
		</div>
		<div>
			<p>Team Two</p>
			<input type="text" name="team_two" required>
		</div>
		<div>
			<p>Event Date</p>
			<input type="datetime-local" name="date" required>

		</div>
		<div>
			<button type="submit" class="button" name="sub">Create</button>
		</div>
		
	</form>
</div>
<?php require 'includes/footer.php' ?>