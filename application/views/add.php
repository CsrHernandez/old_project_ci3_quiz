<div class="alert alert-primary">
	Agregar una nueva pregunta
</div>
<?php if($this->session->flashdata('msg')): ?>
	<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
		<?= $this->session->flashdata(msg) ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif ?>
<?php if(validation_errors()){ ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?php echo validation_errors('<li>', '</li>'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php } ?>
<form method="post" action="<?= site_url('quiz/add'); ?>">
	<div class="form-row">
		<div class="form-group col-md-4">
			<label for="question_id">Número de pregunta</label>
			<input type="number" min="1" class="form-control" id="question_id" name="question_id" value="<?= set_value('question_id', $count_p+1); ?>">
		</div>
		<div class="form-group col-md-8">
			<label for="question">Pregunta</label>
			<input type="text" class="form-control" id="question_text" name="question_text" value="<?= set_value('question_text'); ?>">
		</div>
		<div class="form-gorup col-md-6">
			<label for="choice1">Alternativa 1</label>
			<input type="text" class="form-control" id="choice1" name="choices[]" value="<?= set_value('choices[]'); ?>" >
		</div>
		<div class="form-gorup col-md-6">
			<label for="choice2">Alternativa 2</label>
			<input type="text" class="form-control" id="choice2" name="choices[]" value="<?= set_value('choices[]'); ?>" >
		</div>
		<div class="form-gorup col-md-6">
			<label for="choice3">Alternativa 3</label>
			<input type="text" class="form-control" id="choice3" name="choices[]" value="<?= set_value('choices[]'); ?>" >
		</div>
		<div class="form-gorup col-md-6">
			<label for="choice4">Alternativa 4</label>
			<input type="text" class="form-control" id="choice4" name="choices[]" value="<?= set_value('choices[]'); ?>" >
		</div>
		<div class="form-gorup col-md-6">
			<label for="choice5">Alternativa 5</label>
			<input type="text" class="form-control" id="choice5" name="choices[]" value="<?= set_value('choices[]'); ?>" >
		</div>
		<div class="form-group col-md-6">
			<label for="is_correct">Número de la respusta correcta</label>
			<input type="number" min="1" max="5" class="form-control" id="is_correct" name="is_correct" value="<?= set_value('is_correct'); ?>" >
		</div>
	</div>
	<div class="form-group">
		<button class="btn btn-primary" type="submit">Registrar pregunta</button>
	</div>
</form>