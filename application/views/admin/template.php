<?php $l = substr(I18n::$lang, 0, 2) ?><!DOCTYPE html>
<html lang="<?php echo $l ?>">
<head>
    <meta charset="utf-8" />
    <title><?php echo $title ?> | <?php echo 'TimeTable Manager'; ?></title>
</head>  
<body>
    <header>
        <h1>Page title</h1>  
        <?php foreach ($styles as $style => $media) echo HTML::style($style, array('media' => $media), NULL, TRUE), "\n" ?>
        <?php foreach ($scripts as $script) echo HTML::script($script, NULL, NULL, TRUE), "\n" ?>
        <nav>
            <ul>
                <?php ?>
                <li class="active"><?php echo html::anchor('admin', 'Orari educatori') ?></li>
                <li><?php echo html::anchor('admin/timings_table', 'Tabellone') ?></li>
                <li><?php echo html::anchor('admin/timings_table', 'Orario Ragazzi') ?></li>
                <li><a href="#">logout</a></li>
            </ul>
        </nav>  
    </header>
    
    <?php echo $content ?>
    
    <footer>
        <p>footer</p>
    </footer>  
  
</body>  
</html>