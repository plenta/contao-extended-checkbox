<?php

declare(strict_types=1);

/**
 * Plenta Extended Checkbox Bundle for Contao Open Source CMS
 *
 * @copyright     Copyright (c) 2023, Plenta.io
 * @author        Plenta.io <https://plenta.io>
 * @license       http://opensource.org/licenses/lgpl-3.0.html
 * @link          https://github.com/plenta/
 */

use Contao\Controller;

/*
 * Load tl_content
 */

Controller::loadDataContainer('tl_content');

/*
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['checkbox_extended'] = '{type_legend},type,name,label;{options_legend},checkbox_extended_value;{extended_checkbox_legend},checkbox_extended_url,checkbox_extended_target,checkbox_extended_singleSRC,checkbox_extended_title,checkbox_extended_embed;{fconfig_legend:hide},mandatory;{template_legend:hide},checkbox_extended_tpl;{expert_legend:hide},class;{submit_legend:hide},addSubmit';

/*
 * Fields
 */
$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkbox_extended_value'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_value'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => ['mandatory' => true, 'maxlength' => 32, 'tl_class' => 'w50'],
    'sql' => "varchar(32) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkbox_extended_url'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_url'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => ['mandatory' => false, 'rgxp' => 'url', 'decodeEntities' => true, 'maxlength' => 255, 'tl_class' => 'w50 wizard', 'dcaPicker' => true],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkbox_extended_target'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_target'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50 m12'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkbox_extended_singleSRC'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_singleSRC'],
    'exclude' => true,
    'inputType' => 'fileTree',
    'eval' => ['fieldType' => 'radio', 'files' => true, 'mandatory' => false, 'tl_class' => 'clr'],
    'sql' => 'binary(16) NULL',
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkbox_extended_title'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_title'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 255, 'tl_class' => 'w50'],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkbox_extended_embed'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_embed'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 255, 'tl_class' => 'w50'],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_form_field']['fields']['checkbox_extended_tpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['checkbox_extended_tpl'],
    'exclude' => true,
    'inputType' => 'select',
    'default' => 'form_widget_extended_checkbox_without_label',
    'options_callback' => static fn () => Controller::getTemplateGroup('form_widget'),
    'sql' => "varchar(64) NOT NULL default ''",
];
