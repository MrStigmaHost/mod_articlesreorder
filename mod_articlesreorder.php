<?php
/*------------------------------------------------------------------------
# mod_articlesordering - X Articles Ordering
# ------------------------------------------------------------------------
# author    George Chouliaras
# copyright Copyright (C) 2010 e-xtnd.it. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.e-xtnd.it
# Technical Support:   - http://www.e-xtnd.it.
-------------------------------------------------------------------------*/

defined('_JEXEC') or die('Restricted access');              // no direct access 
require_once(dirname(__FILE__) . DS . 'helper.php');        // Include the syndicate functions only once

$info = modArticlesRerderingHelper::info($params, $module);

if($info)
{
    if(!defined('ordmodule'))
    {
        define('ordmodule', 1);
        $document	= JFactory::getDocument();
        $document->addScript(JUri::base(true) . '/modules/mod_articlesreorder/js/default.js');
        $document->addStyleSheet(JUri::base(true) . '/modules/mod_articlesreorder/css/default.css');
    }
    
    require(JModuleHelper::getLayoutPath('mod_articlesreorder'));
}
?>
<span style="font-size: 70%; color: #000; margin: 0; padding: 0;">
    Greek <a href="http://www.stigmahost.com" title="Greek Web Hosting" style="text-decoration: none; font-size:70%; color: #000; margin: 0; padding: 0;" target="_blank">Web Hosting</a> services
</span>