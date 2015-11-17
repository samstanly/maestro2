<?php
// source: /home/master/maestro2/apps/exemplos/public/themes/exemplos/index.html

class Templateb8c817a465e4a922214cd5b3acc63c0a extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('25db2e0218', 'html')
;
//
// main template
//
echo $page->fetch('header') ?>

<!-- basic preloader: -->
<div id="loader"><div id="loaderInner" style="direction:ltr;">Carregando.... </div></div>

<div id="appLayout" class="container-fluid"> 
    <div id="mainPane" class="easyui-panel container-fluid" title="Maestro 2.0 - Exemplos" width="100%">
        <div id="appLayoutInternal" class="easyui-layout container-fluid" style="height:100%;">
            <div id="leftPane" class="melement container-fluid col-md-2" data-options="region:'west',split:true" data-manager="href:'<?php echo Latte\Runtime\Filters::escapeHtml($manager->getURL('exemplos/mainmenu'), ENT_COMPAT) ?>'"></div>
            <div id="centerPane" class="col-md-10" data-options="region:'center',iconCls:'icon-ok'" width="100%">
                <?php echo $page->generate('content') ?>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
</script>

<?php echo $page->fetch('footer') ?>

<?php
}}