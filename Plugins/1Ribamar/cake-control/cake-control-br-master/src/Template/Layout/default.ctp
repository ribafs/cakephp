<?php
use Cake\Core\Configure;

if (!$this->fetch('html')) {
    $this->start('html');
    printf('<html lang="%s">', Configure::read('App.language'));
    $this->end();
}

if (!$this->fetch('title') && Configure::read('App.title')) {
    $this->start('title');
    echo Configure::read('App.title');
    $this->end();
}
// Always append App.title to current page title
elseif ($this->fetch('title') && Configure::read('App.title')) {
    $this->append('title', sprintf(' | %s', Configure::read('App.title')));
}

// Prepend some meta tags
$this->prepend('meta', $this->Html->meta('icon'));
$this->prepend('meta', $this->Html->meta('viewport', 'width=device-width, initial-scale=1'));
if (Configure::read('App.author')) {
    $this->prepend('meta', $this->Html->meta('author', null, [
        'name'    => 'author',
        'content' => Configure::read('App.author')
    ]));
}

?>
<!DOCTYPE html>
<?= $this->fetch('html'); ?>
<head>
    <?= $this->Html->charset(); ?>
    <title>
        <?= $this->fetch('title'); ?>
    </title>
    <?php
        // Meta
        echo $this->fetch('meta');

        // Styles
        echo $this->Less->less([
            'CakeControl.less/bootstrap.less'
        ]);
        echo $this->fetch('css');

		echo $this->Html->script('jquery',['block' => 'script']);
		echo $this->Html->script('tinymce/jquery.tinymce.min',['block' => 'script']);
		echo $this->Html->script('tinymce/tinymce.min',['block' => 'script']);
		echo $this->Html->script('custom',['block' => 'custom']);
    ?>
</head>
<body>
    <header role="banner" class="navbar navbar-inverse">
        <div class="container">
	<?php 
	if(isset($loguser)){
		echo $this->element('CakeControl.topmenu');
	}else{
		echo $this->element('CakeControl.topmenu-no');
	}
	?>
            <div class="navbar-header">
                <?php if ($this->fetch('navbar.top')): ?>
                <button data-target="#navbar-top" data-toggle="collapse" type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php endif; ?>
                <?= $this->Html->link(Configure::read('App.name'), '/', ['class' => 'navbar-brand']); ?>
            </div>
            <?php if ($this->fetch('navbar.top')): ?>
            <nav role="navigation" class="collapse navbar-collapse" id="navbar-top">
                <ul class="nav navbar-nav">
                    <?= $this->fetch('navbar.top'); ?>
                </ul>
            </nav>
            <?php endif; ?>
        </div>
    </header>
    <div class="container">
        <div id="content" class="row">
            <?= $this->Flash->render(); ?>
            <?= $this->fetch('content'); ?>
        </div>
    </div>
    <?= $this->fetch('script'); ?>
    <?= $this->fetch('custom'); ?>    
</body>
</html>
