<?php
/**
 * Resolves setup-options settings by setting email options.
 *
 * @package optipic
 */

$properties = array(
    'autoreplace_active' => array(
        'name' => 'autoreplace_active',
        'desc' => 'autoreplace_active.desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => false,
        'lexicon' => 'optipic:properties',
    ),
    'site_id' => array(
        'name' => 'site_id',
        'desc' => 'site_id.desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'optipic:properties',
    ),
    'domains' => array(
        'name' => 'domains',
        'desc' => 'domains.desc',
        'type' => 'textarea',
        'options' => '',
        'value' => '',
        'lexicon' => 'optipic:properties',
    ),
    'exclusions_url' => array(
        'name' => 'exclusions_url',
        'desc' => 'exclusions_url.desc',
        'type' => 'textarea',
        'options' => '',
        'value' => '',
        'lexicon' => 'optipic:properties',
    ),
    'whitelist_img_urls' => array(
        'name' => 'whitelist_img_urls',
        'desc' => 'whitelist_img_urls.desc',
        'type' => 'textarea',
        'options' => '',
        'value' => '',
        'lexicon' => 'optipic:properties',
    ),
    'srcset_attrs' => array(
        'name' => 'srcset_attrs',
        'desc' => 'srcset_attrs.desc',
        'type' => 'textarea',
        'options' => '',
        'value' => '',
        'lexicon' => 'optipic:properties',
    ),
);

$success= false;
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

        $plugin = $object->xpdo->getObject('modPlugin', array('name'=>'optipic'));

        /*if ($options['autoreplace_active'] == 'on'){
            $properties['autoreplace_active']['value'] = true;
        }
        $properties['site_id']['value'] = $options['site_id'];
        $properties['domains']['value'] = $options['domains'];
        $properties['exclusions_url']['value'] = $options['exclusions_url'];
        $properties['whitelist_img_urls']['value'] = $options['whitelist_img_urls'];
        $properties['srcset_attrs']['value'] = $options['srcset_attrs'];*/
        
        //$propsSet = $plugin->addPropertySet("optipic");
        //$propsSet->setProperties($properties);
        //$propsSet->save();
        
        //require_once dirname(__FILE__).'/ImgUrlConverter.php';
        require_once __DIR__ .'/../../../components/optipic/ImgUrlConverter.php';
        $defaultSettings = \optipic\cdn\ImgUrlConverter::getDefaultSettings();
        foreach($defaultSettings as $key=>$val) {
            if(isset($properties[$key])) {
                if(is_array($val)) {
                    $val = implode(PHP_EOL, $val);
                }
                $properties[$key]['value'] = $val;
            }
        }
        //file_put_contents(__DIR__ . '/log.txt', var_export($plugin, true)); 
        
        $plugin->setProperties($properties);
        $plugin->save();
        $success= true;
        break;
    case xPDOTransport::ACTION_UNINSTALL:
        $success= true;
        break;
}
return $success;
