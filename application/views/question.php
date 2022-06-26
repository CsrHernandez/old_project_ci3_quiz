<div class="alert alert-dark">
	pregunta <?= $question->question_id ?> de <?= $count_p; ?>
</div>

<p class="font-weight-bolder"><?= $question->question_text; ?></p>

<form method="post" action="<?= site_url('quiz/process'); ?>">
	<?php foreach ($choices as $key => $choice): ?>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="choice_text" id="choice<?= $key+1; ?>" value="<?= $choice->id; ?>">
			<label class="form-check-label" for="choice<?= $key+1; ?>">
				<?= $choice->choice_text; ?>
			</label> 
		</div>
	<?php endforeach; ?>
	<input type="hidden" value="<?= $question->question_id; ?>" name="question_id">
	<div class="mt-3">
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</form>