<?php
global $modx;
$_lang['autoreplace_active.desc'] = 'Enable auto-replace image URLs';
$_lang['site_id.desc'] = 'Site ID in your CDN OptiPic account <a href="https://optipic.io/cdn/cp/site/add/?domain_url='.urlencode($modx->makeUrl(1, '', '', 'full')).'" target="_blank">[+]'.'</a>';
$_lang['domains.desc'] = 'Domain list (if images are loaded via absolute URLs)';
$_lang['exclusions_url.desc'] = 'Site pages that do not include auto-change';
$_lang['whitelist_img_urls.desc'] = 'Replace only URLs of images starting with a mask';
$_lang['srcset_attrs.desc'] = 'List of \'srcset\' attributes';