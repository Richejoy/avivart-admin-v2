<?php
echo $this->Html->docType();
?>

<!--[if IE 9]><html class="lt-ie10" lang="<?= mb_substr($this->getRequest()->getSession()->read('locale'), 0, 2) ?>" > <![endif]-->
<html class="no-js" lang="<?= mb_substr($this->getRequest()->getSession()->read('locale'), 0, 2) ?>">
<head>
    <?= $this->Html->charset() ?>
	
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<title>PDF</title>

	<style type="text/css">
		table {
			width: 100%;
			border: 1px solid #222;
			border-collapse: collapse;
		}

		table tr th, table tr td {
			border: 1px solid #222;
			padding: 5px;
		}
	</style>
</head>
<body>

	<?= $this->fetch('content') ?>

</body>
</html>