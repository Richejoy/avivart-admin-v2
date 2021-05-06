<?php

?>
<section>

	<div class="container">

		<div class="row">
			<article class="columns large-8 text-center section-left">
				<img src="https://cdn.pixabay.com/photo/2014/12/22/00/07/tree-576847__340.png" alt="Photo">
			</article>

			<article class="columns large-4 section-right">

				<p class="text-center">
					<img src="http://avivart.net/v2/public/img/logo.png" alt="Logo">
				</p>

				<h6 class="text-center"><?= __('Login with your credentials.') ?></h6>

				<div class="">
					<?= $this->Form->create($user) ?>

					<?= $this->Form->control('email', ['placeholder' => __('Email'), 'required' => true]) ?>

					<?= $this->Form->control('password', ['placeholder' => __('Password'), 'required' => true]) ?>

					<div class="text-right">
						<?= $this->Form->button(__('Login'), ['class' => 'tiny info']) ?>
					</div>

					<?= $this->Form->end() ?>

					<p class="text-center">
						<?= $this->Html->link(__('French'), ['controller' => 'Pages', 'action' => 'locale', 'fr_FR']) ?> -
						<?= $this->Html->link(__('English'), ['controller' => 'Pages', 'action' => 'locale', 'en_US']) ?>
					</p>

					<p class="text-center">
						&copy; 2021 - <?= date('Y') ?> <?= env('APP_NAME') ?>
					</p>
				</div>

			</article>
		</div>

	</div>

</section>