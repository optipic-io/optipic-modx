<?php

require_once $modx->getOption('core_path').'components/optipic/Optipic.php';

/** @var modX $modx */
switch ($modx->event->name) {
    case 'OnWebPagePrerender':
        if ($modx->context->key != 'mgr'){
            // получаем доступ к содержанию страницы
            $output = &$modx->resource->_output;
            // заменяем url
            $optipic = new Optipic($modx);
            $output = $optipic->changeImgUrl($output);
        }
        break;
    case 'OnPluginFormPrerender':
        if($modx->event->activePlugin=='optipic') {
            //file_put_contents(__DIR__ . '/log.txt', var_export($modx->event->plugin->getProperties(), true)); 
            
            $optipic = new Optipic($modx);
            
            require_once $modx->getOption('core_path').'components/optipic/ImgUrlConverter.php';
            $currentHost = \optipic\cdn\ImgUrlConverter::getCurrentDomain();
            
            $settings = $optipic->getSettings();
            
            if ($currentHost) {
                $srcJs = 'https://optipic.io/api/cp/stat?domain='.$currentHost.'&sid='.$settings['site_id'].'&cms=modx&stype=cdn&append_to=%23modx-panel-element-properties&version=1.14.0'; 
                /*$modx->regClientStartupHTMLBlock('<script src="https://optipic.io/api/cp/stat?domain='.$currentHost.'&sid='.$settings['site_id'].'&cms=modx&stype=cdn&append_to=%23modx-header&version=1.14.0"></script>');*/
                $modx->regClientStartupHTMLBlock('<script>
window.setTimeout(function() {
    var s = document.createElement("script");
    s.type = "text/javascript";
    s.src = "'.$srcJs.'";
    document.head.appendChild(s);
}, 5000);

</script>');
            }
            
            //$modx->regClientStartupHTMLBlock("<script>alert('aaa');</script>"); 
        }
        break;
}