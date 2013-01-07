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

// no direct access
defined('_JEXEC') or die('Restricted access');

?>
<div class="artilesreorder<?php echo "-" . $params->get('moduleclass_sfx'); ?>">
    <form action="<?php echo $info['action']; ?>" method="post" id="orderingForm-<?php echo $module->id; ?>">
        <ul id="articles_reorder-<?php echo $module->id; ?>" class="articles_reorder">
            <?php
                if(isset($info['mostrecent']))
                {
            ?>
            <li>
                <?php
                    echo $info['mostrecent'];
                ?>
            </li>
            <?php
                }
                
                if(isset($info['title']))
                {
            ?>
            <li>
                <?php
                    echo $info['title'];
                ?>
            </li>
            <?php
                }
                
                if(isset($info['author']))
                {
            ?>
            <li>
                <?php
                    echo $info['author'];
                ?>
            </li>
            <?php
                }
                
                if(isset($info['hits']))
                {
            ?>
            <li>
                <?php
                    echo $info['hits'];
                ?>
            </li>
            <?php
                }
            ?>
        </ul>
        <input type="hidden" name="filter_order" value="" />
        <input type="hidden" name="filter_order_Dir" value="" />
    </form>
</div>