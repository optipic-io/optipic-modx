<?php
/**
 * Optipic build script
 *
 * @package optipic
 * @subpackage build
 */
$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;
set_time_limit(0); /* makes sure our script doesnt timeout */

$root = dirname(__FILE__).DIRECTORY_SEPARATOR;
$sources= array (
    'root' => $root,
    'source_core' => $root.'core/components/optipic/',
    'lexicon' => $root . 'core/components/optipic/lexicon/',
);
unset($root); /* save memory */

require_once dirname(__FILE__) . '/config.php';

require_once MODX_CORE_PATH . 'model/modx/modx.class.php';

$modx= new modX();

$modx->initialize('mgr');

$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');

$modx->loadClass('transport.modPackageBuilder','',false, true);
$builder = new modPackageBuilder($modx);
$builder->createPackage('optipic','1.15.0');
$builder->registerNamespace('optipic',false,true,'{core_path}components/optipic/');

$plugin = $modx->newObject('modPlugin');
$plugin->set('name', 'optipic');
$plugin->set('description', "Automatic optimize images on your site according to the recommendations of Google PageSpeed Insights. Automatic convert all site images to WebP if visitor's browser supports WebP format.");
$plugin->set('plugincode', file_get_contents($sources['source_core'].'plugins/optipic.php'));

$pluginEvent = $modx->newObject('modPluginEvent');
$pluginEvent->fromArray([
    'event' => 'OnWebPagePrerender',
    'priority' => 0,
    'propertyset' => 0,
], '', true, true);
$plugin->addMany($pluginEvent);

$pluginEvent = $modx->newObject('modPluginEvent');
$pluginEvent->fromArray([
    'event' => 'OnPluginFormPrerender',
    'priority' => 0,
    'propertyset' => 0,
], '', true, true);
$plugin->addMany($pluginEvent);

$vehicle = $builder->createVehicle($plugin, array(
    xPDOTransport::UNIQUE_KEY => 'name',
    xPDOTransport::UPDATE_OBJECT => true,
    xPDOTransport::PRESERVE_KEYS => false,
    xPDOTransport::RELATED_OBJECTS => true,
    xPDOTransport::RELATED_OBJECT_ATTRIBUTES => array(
        'PluginEvents' => array(
            xPDOTransport::PRESERVE_KEYS => true,
            xPDOTransport::UPDATE_OBJECT => false,
            xPDOTransport::UNIQUE_KEY => array('pluginid', 'event')
        )
    )
));

$vehicle->resolve('file',array(
    'source' => $sources['source_core'],
    'target' => "return MODX_CORE_PATH . 'components/';",
));
$vehicle->resolve('php',array(
    'source' => $sources['root'] . 'setupoptions.resolver.php',
));


$builder->putVehicle($vehicle);

/*$builder->setPackageAttributes(array(
    'license' => file_get_contents($sources['root'] . 'license.txt'),
    'readme' => file_get_contents($sources['root'] . 'readme.txt'),
    'setup-options' => array(
        'source' => $sources['root'] . 'setup.options.php',
    ),
));*/

$builder->pack();

$mtime= microtime();
$mtime= explode(" ", $mtime);
$mtime= $mtime[1] + $mtime[0];
$tend= $mtime;
$totalTime= ($tend - $tstart);
$totalTime= sprintf("%2.4f s", $totalTime);

echo "\nPackage Built.\nExecution time: {$totalTime}\n";

session_write_close();

exit();