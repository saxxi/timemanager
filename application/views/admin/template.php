<?php $l = substr(I18n::$lang, 0, 2) ?><!DOCTYPE html>
<html lang="<?php echo $l ?>">
<head>
    <meta charset="utf-8" />
    <title><?php echo $title ?> | <?php echo 'TimeTable Manager'; ?></title>
</head>  
<body>
    <header>
        <?php foreach ($styles as $style => $media) echo HTML::style($style, array('media' => $media), NULL, TRUE), "\n" ?>
        <?php foreach ($scripts as $script) echo HTML::script($script, NULL, NULL, TRUE), "\n" ?>
        <nav>
            <ul>
                <?php foreach($main_menu as $keymenu => $menu){
                    $li_class = '';
                    $li_class = $keymenu==$activepage ? 'active' : $keymenu;
                    ?>
                    <li class="<?php echo $li_class ?>"><?php echo html::anchor($menu['url'], $menu['title']) ?></li>
                <?php } ?>
            </ul>
        </nav>  
        <h1><?php echo $title ?></h1>
    </header>
    
    <?php echo $content ?>
    
    <footer>
        <p>footer</p>
    </footer>  
  
</body>  
</html>