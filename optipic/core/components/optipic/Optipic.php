<?php

class Optipic
{
    private $modx;
    private $plugin;

    public function __construct($modx = null)
    {
        if ($modx != null){
            $this->modx = $modx;
        }else{
            require_once dirname(dirname(__DIR__)).'model/modx/modx.class.php';
            $this->modx= new modX();
            $this->modx->initialize('web');
        }

        $this->plugin = $this->modx->getObject('modPlugin', array('name' => 'optipic'));
    }

    public function getSettings(){

        return $this->plugin->getProperties();
    }

    public function changeImgUrl($content){

        $settings = $this->getSettings();

        if ($settings['autoreplace_active'] && $settings['site_id']!=''){

            require_once dirname(__FILE__).'/ImgUrlConverter.php';

            \optipic\cdn\ImgUrlConverter::loadConfig($settings);
            $content = \optipic\cdn\ImgUrlConverter::convertHtml($content);
        }

        return $content;
    }
}