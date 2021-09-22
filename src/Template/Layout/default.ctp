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
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?= $this->Html->css('normalize') ?>
    <?= $this->Html->css('foundation') ?>
    <?= $this->Html->css('base') ?>
    <?= $this->Html->css('style') ?>
    <?= $this->Html->css('avivart') ?>
    <?= $this->fetch('css') ?>

    <title><?= getEnv('APP_NAME') ?> : <?= $this->fetch('title') ?></title>

    <?= $this->Html->script('vendor/modernizr') ?>
</head>
<body class="<?= ($this->getRequest()->getParam('action') == 'login') ? 'login-body' : 'body' ?>">

    <?php if ($this->getRequest()->getParam('action') != 'login'): ?>

        <?= $this->element('Partials/_header') ?>

        <?= $this->fetch('banner') ?>

        <?= $this->Flash->render() ?>

        <div class="container clearfix">

            <?= $this->fetch('content') ?>

        </div>

        <?= $this->element('Partials/_footer') ?>
        
    <?php else: ?>

        <?= $this->Flash->render() ?>
        
        <?= $this->fetch('content') ?>

    <?php endif ?>

    <?= $this->Html->script('vendor/jquery') ?>
    <?= $this->Html->script('foundation.min') ?>
    <?= $this->Html->script('jQuery.resizableColumns.min') ?>

    <?= $this->Html->script('plugins/emojione/lib/js/emojione') ?>
    <script src="//cdn.ckeditor.com/4.16.2/basic/ckeditor.js" defer></script>
    
    <?php $this->Html->script('plugins/ckeditor/ckeditor'); ?>
    <!--
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js" defer></script>
    <script src="//cdn.ckeditor.com/4.16.2/basic/ckeditor.js" defer></script>
    <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js" defer></script>
    -->

    <?= $this->Html->script('avivart') ?>
    <?= $this->fetch('script') ?>

    <script>
        //CKEDITOR.plugins.addExternal('emojione', "https://avivart.net/admin/js/plugins/ckeditor-emojione/", 'plugin.js');
        
        CKEDITOR.replace('#content', {
            language: 'fr',
            //uiColor: '#428BCA',
            toolbarLocation: 'bottom',
            //extraPlugins: 'emojione'
        });
    </script>
</body>
</html>
