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

use Contao\DataContainer;

/**
 * Load tl_content
 */
Controller::loadDataContainer('tl_content');

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['checkbox_extended'] = '{type_legend},type,name,label;{options_legend},checkbox_extended_value;{extended_checkbox_legend},checkbox_extended_url,checkbox_extended_target,checkbox_extended_singleSRC,checkbox_extended_title,checkbox_extended_embed;{fconfig_legend:hide},mandatory;{template_legend:hide},checkbox_extended_tpl;{expert_legend:hide},class;{submit_legend:hide},addSubmit';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkbox_extended_value'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_value'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true, 'maxlength'=>32, 'tl_class'=>'w50'),
    'sql'                     => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkbox_extended_url'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_url'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>false, 'rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard'),
    'wizard' => array
    (
        array('tl_content', 'pagePicker')
    ),
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkbox_extended_target'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_target'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('tl_class'=>'w50 m12'),
    'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkbox_extended_singleSRC'] = array
(
    'label'                   =>&$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_singleSRC'],
    'exclude'                 => true,
    'inputType'               => 'fileTree',
    'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'mandatory'=>false, 'tl_class'=>'clr'),
    'sql'                     => "binary(16) NULL"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkbox_extended_title'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_title'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkbox_extended_embed'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_embed'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkbox_extended_tpl'] = [
    'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_tpl'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'default'                 => 'form_widget_extended_checkbox_without_label',
    'options_callback'        => static function ()
    {
        return Controller::getTemplateGroup('form_widget');
    },
    'sql'                     => "varchar(64) NOT NULL default ''"
];
