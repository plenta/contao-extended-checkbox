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
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_value'] = array('Wert', 'Hier können Sie einen Wert eingeben.');
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_title'] = array('Link-Text', 'Der Link-Text wird anstelle der Link-Adresse angezeigt.');
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_embed'] = array('Den Link einbetten', 'Verwenden Sie den Platzhalter "%s", um den Link in einen Text einzubetten (z.B. <em>Für mehr Informationen besuchen Sie %s</em>).');
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_url'] = array('Link-Adresse', 'Geben Sie eine Web-Adresse (http://…), eine E-Mail-Adresse (mailto:…) oder ein Insert-Tag ein.');
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_target'] = array('In neuem Fenster öffnen', 'Den Link in einem neuen Browserfenster öffnen.');
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_singleSRC'] = array('Quelldatei', 'Bitte wählen Sie eine Datei oder einen Ordner aus der Dateiübersicht.');
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_tpl']= array('Checkbox-Template', 'Hier können Sie das Checkbox-Template auswählen.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_form_field']['extended_checkbox_legend'] = 'Erweiterte-Checkbox-Einstellungen';
$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_legend'] = 'Hyperlink-Einstellungen';
$GLOBALS['TL_LANG']['tl_form_field']['template_legend'] = 'Template-Einstellungen';

?>