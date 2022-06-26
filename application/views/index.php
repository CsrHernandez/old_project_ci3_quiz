<h2>Exámen de conocimientos en PHP</h2>
<p>Es un test de elecciones multiples.</p>
<ul>
	<li><b>Número de preguntas:</b> <?= $count_p; ?></li>
	<li><b>Tipo: </b>Elecciones multiples</li>
	<li><b>Tiempo estimado: </b><?= $count_p * .5 ?> Minuto(s) por pregunta.</li>
</ul>
<a href="<?= site_url('quiz/question/1'); ?>" class="btn btn-outline-primary">Empezar</a>