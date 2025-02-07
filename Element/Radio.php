<?php
namespace PFBC\Element;

class Radio extends \PFBC\OptionElement {
	protected $_attributes = array("type" => "radio");
	protected $inline;

	public function render() { 
		$labelClass = $this->_attributes["type"];
		$divClass = "";
		if(!empty($this->inline))
		{
			$labelClass .= " inline";
			$divClass = " radio-inline";
		}
		$count = 0;
		foreach($this->options as $value => $text) {
			$value = $this->getOptionValue($value);

			echo '<div class="radio ', $divClass . '"><label class="', $labelClass . '"> <input id="', $this->_attributes["id"], '-', $count, '"', $this->getAttributes(array("id", "value", "checked")), ' value="', $this->filter($value), '"';
			if(isset($this->_attributes["value"]) && $this->_attributes["value"] == $value)
				echo ' checked="checked"';
			echo '/> ', $text, ' </label></div> ';
			++$count;
		}	
	}
}
