<?php

/**
 * ExtendedCheckbox
 *
 * Copyright (C) 2009-2019 Christian Barkowsky
 *
 * @package ExtendedCheckbox
 * @author  Christian Barkowsky <https://christianbarkowsky.de>
 * @license LGPL
 */

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
    'Contao\FormCheckBoxExtended' => 'system/modules/extended_checkbox/forms/FormCheckBoxExtended.php',
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    'form_widget_extended_checkbox'               => 'system/modules/extended_checkbox/templates',
    'form_widget_extended_checkbox_without_label' => 'system/modules/extended_checkbox/templates',
));
