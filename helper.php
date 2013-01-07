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

defined( '_JEXEC' ) or die( 'Restricted access' );          // no direct access 

class modArticlesRerderingHelper
{
    public static function info(&$params, &$module)
    {
        $uri        =   JFactory::getURI();
        $option     =   JRequest::getCmd('option');
        $mainframe  =   JFactory::getApplication();
        
        $app        =   JFactory::getApplication();
        $menu       =   $app->getMenu();
        
        $active     =   $menu->getActive();
        
        if(!modArticlesRerderingHelper::check($active))
        {
            return;
        }
        
        $itemid     =   $active->query['id'] . ':' . $active->id;
        
        $filter_order       =   $mainframe->getUserStateFromRequest(
            'com_content.' . $active->query['view'] . '.list.' . $itemid . '.filter_order', 
            'filter_order', 
            '', 
            'cmd'
        );
        
        $filter_order_Dir 	=    $mainframe->getUserStateFromRequest(
            'com_content.' . $active->query['view'] . '.list.' . $itemid . '.filter_order_Dir',
            'filter_order_Dir',
            '',
            'cmd'
        );
        
        $info['mostrecent']   =   modArticlesRerderingHelper::getOption($params->get('ord_mostrecent'),   'a.created',JText::_('MOD_ARTICLESREORDER_DATE'),    $filter_order,  $filter_order_Dir,  $module);
        $info['title']        =   modArticlesRerderingHelper::getOption($params->get('ord_title'),        'a.title',  JText::_('MOD_ARTICLESREORDER_TITLE_FRONT'),      $filter_order,  $filter_order_Dir,  $module);
        $info['author']       =   modArticlesRerderingHelper::getOption($params->get('ord_author'),       'author',   JText::_('MOD_ARTICLESREORDER_AUTHOR_FRONT'),     $filter_order,  $filter_order_Dir,  $module);
        $info['hits']         =   modArticlesRerderingHelper::getOption($params->get('ord_hits'),         'a.hits',   JText::_('MOD_ARTICLESREORDER_HITS_FRONT'),       $filter_order,  $filter_order_Dir,  $module);
        
        $info['action']       =   str_replace('&', '&amp;', $uri->toString());
        
        return $info;
    }

    public static function check(&$active)
    {
        if($active->type != "component")
        {
            return false;
        }
    
        if($active->query['option'] != 'com_content')
        {
            return false;
        }
        
        if(!in_array($active->query['view'], array('category', 'section')))
        {
            return false;
        }
        
        return true;
    }

    public static function getOption($param, $filter, $text, $filter_order, $filter_order_Dir, $module)
    {
        if(!$param)
        {
            return;
        }
        
        $img    =   null;
        $newDir =   ($filter_order_Dir == 'DESC') ? 'ASC' : 'DESC';
        
        if($filter_order == $filter)
        {
            $img = ($filter_order_Dir == 'DESC') ? '&#x25BC;' : '&#x25B2;';
        }
        
        return '<a href="#" rel="orderingForm-' . $module->id . '" class="orderlink" title="' . $filter . ':' . $newDir . '">' . $text . '</a> ' . $img;
    }
}