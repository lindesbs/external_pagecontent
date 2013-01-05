<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

$GLOBALS['TL_PTY']['external_content_root']   = 'PageExternalContent';
$GLOBALS['TL_HOOKS']['getSearchablePages'][] = array('PageExternal', 'myGetSearchablePages'); 