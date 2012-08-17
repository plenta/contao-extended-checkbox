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
 * Class FormCheckBoxExtended
 *
 * Form field "extended checkbox".
 * @copyright  Christian Barkowsky 2011
 * @author     Christian Barkowsky <http://www.christianbarkowsky.de>
 * @package    Controller
 */
class FormCheckBoxExtended extends Widget
{
	/**
	 * Submit user input
	 */
	protected $blnSubmitInput = true;


	/**
	 * Template
	 */
	protected $strTemplate = 'form_widget';


	/**
	 * Options
	 */
	protected $arrOptions = array();


	/**
	 * Initialize the object
	 */
	public function __construct($arrAttributes=false)
	{
		$this->addAttributes($arrAttributes);
		$this->strTemplate = $this->checkbox_extended_tpl;
		parent::__construct();
	}


	/**
	 * Add specific attributes
	 */
	public function __set($strKey, $varValue)
	{
		switch ($strKey)
		{
			case 'options':
				break;

			case 'mandatory':
				$this->arrConfiguration['mandatory'] = $varValue ? true : false;
				break;

			case 'rgxp':
				break;

			default:
				parent::__set($strKey, $varValue);
				break;
		}
	}


	/**
	 * Return a parameter
	 */
	public function __get($strKey)
	{
		switch ($strKey)
		{
			default:
				return parent::__get($strKey);
				break;
		}
	}


	/**
	 * Check options if the field is mandatory
	 */
	public function validate()
	{
		$mandatory = $this->mandatory;
		$options = $_POST[$this->strName];

		$varInput = $this->validator($options);

		if (!$this->hasErrors())
		{
			$this->varValue = $varInput;
		}

		// Reset the property
		if ($mandatory)
		{
			$this->mandatory = true;
		}

		// Clear result if nothing has been submitted
		if (!isset($_POST[$this->strName]))
		{
			$this->varValue = '';
		}
	}


	/**
	 * Generate the widget and return it as string
	 */
	public function generate()
	{
		// Target
		if($this->checkbox_extended_target)
			$evp_link_target = LINK_NEW_WINDOW_BLUR;
		else
			$evp_link_target = '';

		// Embeded link
		$evp_link_embed = explode('%s', $this->checkbox_extended_embed);

		// Set link title
		if (!strlen($this->checkbox_extended_title))
			$this->checkbox_extended_title = $this->checkbox_extended_url;

		// Set href
		if(!strlen($this->checkbox_extended_url))
			$href = $this->checkbox_extended_singleSRC;
		else
			$href = $this->checkbox_extended_url;

		$strOptions = sprintf('<span><input type="checkbox" name="%s" id="opt_%s" class="checkbox" value="%s"%s%s /> <label id="lbl_%s" for="opt_%s">%s</label></span>',
								$this->strName,
								$this->strId . '_0',
								$this->checkbox_extended_value,
								(($this->varValue == $this->checkbox_extended_value) ? ' checked="checked"' : ''),
								$this->getAttributes(),
								$this->strId . '_0',
								$this->strId . '_0',
								sprintf('%s<a href="%s" title="%s"%s>%s</a>%s',
								$evp_link_embed[0],
								$href,
								$this->checkbox_extended_title,
								$evp_link_target,
								$this->checkbox_extended_title,
								$evp_link_embed[1])) . $this->addSubmit();

        return sprintf('<div id="ctrl_%s" class="checkbox_container%s">%s</div>',
						$this->strId,
						(strlen($this->strClass) ? ' ' . $this->strClass : ''),
						$strOptions) . $this->addSubmit();
	}
}

?>