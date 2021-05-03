<?php
global $modx;
$_lang['autoreplace_active.desc'] = 'Автоматическая подмена URL изображений';
$_lang['site_id.desc'] = 'ID сайта в личном кабинете CDN OptiPic <a href="https://optipic.io/cdn/cp/site/add/?domain_url='.urlencode($modx->makeUrl(1, '', '', 'full')).'" target="_blank">[+]'.'</a>';
$_lang['domains.desc'] = 'Список доменов (если изображения грузятся через абсолютные URL)';
$_lang['exclusions_url.desc'] = 'Страницы сайта, на которых не включать автоподмену';
$_lang['whitelist_img_urls.desc'] = 'Подменять только URL изображений, начинающихся с маски';
$_lang['srcset_attrs.desc'] = 'Список \'srcset\' атрибутов';