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

namespace Plenta\ExtendedCheckbox\Form;

use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\FilesModel;
use Contao\System;
use Contao\Validator;
use Contao\Widget;

/**
 * Class FormCheckBoxExtended.
 */
class FormCheckBoxExtended extends Widget
{
    /**
     * Submit user input.
     *
     * @var bool
     */
    protected $blnSubmitInput = true;

    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'form_widget';

    /**
     * Error message.
     *
     * @var string
     */
    protected $strError = '';

    /**
     * The CSS class prefix.
     *
     * @var string
     */
    protected $strPrefix = 'widget widget-checkbox widget-extended-checkbox';

    /**
     * @var array
     */
    protected $arrOptions = [];

    /**
     * Initialize the object.
     *
     * @param array $arrAttributes An optional attributes array
     */
    public function __construct($arrAttributes = null)
    {
        /** @var ScopeMatcher $scopeMatcher */
        $scopeMatcher = System::getContainer()->get('contao.routing.scope_matcher');
        $requestStack = System::getContainer()->get('request_stack');

        $this->addAttributes($arrAttributes);

        if ($scopeMatcher->isBackendRequest($requestStack->getCurrentRequest())) {
            $this->strTemplate = 'be_widget';
        } else {
            $this->strTemplate = $this->checkbox_extended_tpl;
        }

        parent::__construct();
    }

    /**
     * Add specific attributes.
     *
     * @param mixed $strKey
     * @param mixed $varValue
     */
    public function __set($strKey, $varValue): void
    {
        switch ($strKey) {
            case 'options':
            case 'rgxp':
                break;

            case 'mandatory':
                $this->arrConfiguration['mandatory'] = $varValue ? true : false;
                break;

            default:
                parent::__set($strKey, $varValue);
                break;
        }
    }

    /**
     * Return a parameter.
     *
     * @param mixed $strKey
     */
    public function __get($strKey)
    {
        return parent::__get($strKey);
    }

    /**
     * Check options if the field is mandatory.
     */
    public function validate(): void
    {
        $mandatory = $this->mandatory;
        $options = System::getContainer()->get('request_stack')->getCurrentRequest()->request->get($this->strName);

        $varInput = $this->validator($options);

        if (!$this->hasErrors()) {
            $this->varValue = $varInput;
        }

        // Reset the property
        if ($mandatory) {
            $this->mandatory = true;
        }

        // Clear result if nothing has been submitted
        if (!$options) {
            $this->varValue = '';
        }
    }

    /**
     * Generate the widget and return it as string.
     */
    public function generate()
    {
        $evp_link_target = '';

        if ($this->mandatory) {
            $this->arrAttributes['required'] = 'required';
        }

        // Target
        if ($this->checkbox_extended_target) {
            $evp_link_target = 'target="_blank"';
        }

        // Embeded link
        $evp_link_embed = explode('%s', $this->checkbox_extended_embed);

        // Set link title
        if (empty($this->checkbox_extended_title)) {
            $this->checkbox_extended_title = $this->checkbox_extended_url;
        }

        // Set href
        if (empty($this->checkbox_extended_url)) {
            $href = $this->buildDownload($this->checkbox_extended_singleSRC);
        } else {
            $href = $this->checkbox_extended_url;
        }

        if (empty($this->checkbox_extended_url) && empty($this->checkbox_extended_singleSRC)) {
            $strCheckboxLink = sprintf('%s%s%s%s%s', $this->mandatory ? '<span class="invisible">'.$GLOBALS['TL_LANG']['MSC']['mandatory'].' </span>' : '', $evp_link_embed[0], $this->checkbox_extended_title, $evp_link_embed[1], $this->mandatory ? '<span class="mandatory">*</span>' : '');
        } else {
            $strCheckboxLink = sprintf('%s%s<a href="%s" title="%s"%s>%s</a>%s%s', $this->mandatory ? '<span class="invisible">'.$GLOBALS['TL_LANG']['MSC']['mandatory'].' </span>' : '', $evp_link_embed[0], $href, $this->checkbox_extended_title, $evp_link_target, $this->checkbox_extended_title, $evp_link_embed[1], $this->mandatory ? '<span class="mandatory">*</span>' : '');
        }

        $strOptions = sprintf(
            '<span><input type="checkbox" name="%s" id="opt_%s" class="checkbox" value="%s"%s%s /> <label id="lbl_%s" for="opt_%s">%s</label></span>',
            $this->strName,
            $this->strId.'_0',
            $this->checkbox_extended_value,
            ($this->varValue == $this->checkbox_extended_value) ? ' checked="checked"' : '',
            $this->getAttributes(),
            $this->strId.'_0',
            $this->strId.'_0',
            $strCheckboxLink
        );

        return sprintf('<div id="ctrl_%s" class="checkbox_container%s">%s</div>', $this->strId, !empty($this->strClass) ? ' '.$this->strClass : '', $strOptions);
    }

    /**
     * Build download.
     *
     * @param mixed $singleSRC
     */
    private function buildDownload($singleSRC)
    {
        if (empty($singleSRC)) {
            return '';
        }

        $objFile = FilesModel::findByUuid($singleSRC);

        if (null === $objFile) {
            if (!Validator::isUuid($singleSRC)) {
                return '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
            }

            return '';
        }

        return $objFile->path;
    }
}
