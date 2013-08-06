<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Faq
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Forms
	'Contao\FormCheckBoxExtended' => 'system/modules/extended_checkbox/forms/FormCheckBoxExtended.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'form_widget_extended_checkbox_without_label' => 'system/modules/extended_checkbox/templates/modules',
	'form_widget_extended_checkbox' => 'system/modules/extended_checkbox/templates/modules',
));
