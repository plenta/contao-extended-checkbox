<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Christian Barkowsky 2011
 * @author     Christian Barkowsky <http://www.christianbarkowsky.de>
 * @package    Extended Checkbox
 * @license    EULA
 * @filesource
 */


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_value'] = array('Value', 'Please enter the value');
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_title'] = array('Link title', 'The link title will be displayed instead of the target URL.');
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_embed'] = array('Embed the link', 'Use the wildcard "%s" to embed the link in a phrase (e.g. <em>For more information please visit %s</em>).');
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_url']    = array('Link target', 'Please enter a web address (http://…), an e-mail address (mailto:…) or an insert tag.');
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_target'] = array('In neuem Fenster öffnen', 'Den Link in einem neuen Browserfenster öffnen.');
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_singleSRC']    = array('Source file', 'Please select a file or folder from the files directory.');
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_tpl']= array('Checkbox template', 'Here you can select the form template.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_legend'] = 'Hyperlink-Settings';
$GLOBALS['TL_LANG']['tl_form_field']['template_legend'] = 'Template settings';

?>