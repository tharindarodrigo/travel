<?php

Blade::extend(function($view, $compiler){
    $pattern = $compiler->createPlainMatcher('breadcrumb');

    return preg_replace($pattern, '<?php echo Breadcrumb::render();?>', $view);
});