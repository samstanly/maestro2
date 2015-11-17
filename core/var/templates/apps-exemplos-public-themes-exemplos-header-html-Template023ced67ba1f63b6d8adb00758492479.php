<?php
// source: /home/master/maestro2/apps/exemplos/public/themes/exemplos/header.html

class Template023ced67ba1f63b6d8adb00758492479 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('c05b8b2fbb', 'html')
;
//
// main template
//
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta name="Generator" content="Manager 2.0; http://maestro.org.br">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title><?php echo Latte\Runtime\Filters::escapeHtml($page->title, ENT_NOQUOTES) ?></title>
        <meta name="description" content="Maestro 2.0 Exemplos">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Carrega o icone da aplicação -->
        <link rel="icon" type="image/x-icon" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($manager->getThemeURL()), ENT_COMPAT) ?>favicon.ico">
        
        <!-- Carrega estilos específicos da aplicação -->
        <link rel="stylesheet" type="text/css" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($manager->getStaticURL($manager->getApp(), 'css/style.css')), ENT_COMPAT) ?>">
        
        <!-- Carrega o jQuery - obrigatório em todos os temas -->
        <script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($manager->getBaseURL()), ENT_COMPAT) ?>/public/scripts/jquery-2.1.1.min.js"></script>
        
        <!-- Carrega o script manager e suas dependências -->
        <script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($manager->getBaseURL()), ENT_COMPAT) ?>/public/scripts/jquery.manager.core.js"></script>
        
        <!-- Carrega o tema e suas dependências -->
        <script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($manager->getThemeURL()), ENT_COMPAT) ?>theme.js"></script>
    </head>
    <body>
<?php
}}