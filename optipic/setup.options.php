<?php
/**
 * Build the setup options form.
 *
 * @package optipic
 */

$output = '<label for="autoreplace_active">Enable auto-replace image URLs:</label>
<input type="checkbox" name="autoreplace_active" id="autoreplace_active" width="300" checked />
<br /><br />

<label for="site_id">Site ID in your CDN OptiPic account:</label>
<input type="text" name="site_id" id="site_id" width="300" />
<br /><br />

<label for="domains">Domain list (if images are loaded via absolute URLs):</label>
<textarea id="domains" name="domains" width="300" rows="3"></textarea>
<br /><br />

<label for="exclusions_url">Site pages that do not include auto-change:</label>
<textarea id="exclusions_url" name="exclusions_url" width="300" rows="3"></textarea>
<br /><br />

<label for="whitelist_img_urls">Replace only URLs of images starting with a mask:</label>
<textarea id="whitelist_img_urls" name="whitelist_img_urls" width="300" rows="3"></textarea>
<br /><br />

<label for="srcset_attrs">List of "srcset" attributes:</label>
<textarea id="srcset_attrs" name="srcset_attrs" width="300" rows="3"></textarea>';

return $output;
