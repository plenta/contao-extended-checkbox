<?php

/**
 * Extended checkbox
 * 
 * Copyright (C) 2009-2014 Christian Barkowsky
 * 
 * @package ExtendedCheckbox
 * @author  Christian Barkowsky <http://christianbarkowsky.de>
 * @license LGPL
 */


namespace Contao;


class FormCheckBoxExtended extends \Widget
{

	protected $blnSubmitInput = true;


	protected $strTemplate = 'form_widget';


	protected $arrOptions = array();


	/**
	 * Initialize the object
	 */
	public function __construct($arrAttributes=false)
	{
		$this->addAttributes($arrAttributes);
		
		if (TL_MODE == 'BE')
		{
			$this->strTemplate = 'be_widget';
		}
		else
		{
			$this->strTemplate = $this->checkbox_extended_tpl;
		}
				
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
		$evp_link_target = '';
		
		if ($this->mandatory)
		{
				$this->arrAttributes['required'] = 'required';
		}
	
		// Target
		if ($this->checkbox_extended_target)
		{
			$evp_link_target = LINK_NEW_WINDOW_BLUR;
		}
		
		// Embeded link
		$evp_link_embed = explode('%s', $this->checkbox_extended_embed);
		
		// Set link title
		if (!strlen($this->checkbox_extended_title))
		{
			$this->checkbox_extended_title = $this->checkbox_extended_url;
		}
			
		// Set href
		if (!strlen($this->checkbox_extended_url))
		{
			$href = $this->buildDownload($this->checkbox_extended_singleSRC);
		}
		else
		{
			$href = $this->checkbox_extended_url;
		}
		
		if (!strlen($this->checkbox_extended_url) && !strlen($this->checkbox_extended_singleSRC))
		{
			$strCheckboxLink = sprintf('%s%s%s', $evp_link_embed[0], $this->checkbox_extended_title, $evp_link_embed[1]);
		}
		else
		{
			$strCheckboxLink = sprintf('%s<a href="%s" title="%s"%s>%s</a>%s', $evp_link_embed[0], $href, $this->checkbox_extended_title, $evp_link_target, $this->checkbox_extended_title, $evp_link_embed[1]);
		}
		
		$strOptions = sprintf('<span><input type="checkbox" name="%s" id="opt_%s" class="checkbox" value="%s"%s%s /> <label id="lbl_%s" for="opt_%s">%s</label></span>',
								$this->strName,
								$this->strId . '_0',
								$this->checkbox_extended_value,
								(($this->varValue == $this->checkbox_extended_value) ? ' checked="checked"' : ''),
								$this->getAttributes(),
								$this->strId . '_0',
								$this->strId . '_0',
								$strCheckboxLink) . $this->addSubmit();

        return sprintf('<div id="ctrl_%s" class="checkbox_container%s">%s</div>', $this->strId, (strlen($this->strClass) ? ' ' . $this->strClass : ''), $strOptions) . $this->addSubmit();
	}
	
	
	/**
	 * Build download
	 */
	private function buildDownload($singleSRC)
	{
		if (!strlen($singleSRC))
		{
			return '';
		}
		
		$objFile = \FilesModel::findByUuid($singleSRC);

		if ($objFile === null)
		{
			if (!\Validator::isUuid($singleSRC))
			{
				return '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
			}

			return '';
		}

		return $objFile->path;
	}
}
