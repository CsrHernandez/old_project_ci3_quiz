<h2>Muy bien, terminaste!</h2>
<p>Felicitaciones! has completa el examen</p>
<p>Puntaje Final: <?= $this->session->userdata('score'); ?></p>
<a href="<?= site_url('quiz/question/1'); ?>" class="btn btn-outline-primary">Empezar de nuevo</a>