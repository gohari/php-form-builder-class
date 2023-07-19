<?php
namespace PFBC\Element;

class SelectWithAttribute extends \PFBC\OptionElement {
	protected $_attributes = array();

	public function render() { 
		if(isset($this->_attributes["value"])) {
			if(!is_array($this->_attributes["value"]))
				$this->_attributes["value"] = array($this->_attributes["value"]);
		}
		else
			$this->_attributes["value"] = array();

		if(!empty($this->_attributes["multiple"]) && substr($this->_attributes["name"], -2) != "[]")
			$this->_attributes["name"] .= "[]";

		echo '<select', $this->getAttributes(array("value", "selected")), '>';
		$selected = false;
		foreach($this->options as $value => $text) {
			$value = $this->getOptionValue($value);
			echo '<option value="', $this->filter($value), '"';
			foreach($text as $attr_val=>$attr_text){
				if($attr_val!="text"){
					echo " data_" . str_ireplace(' ',"_",str_ireplace('"',"&#34;",$attr_val)) . '="' . str_ireplace('"',"&#34;",$attr_text) . '"';
				}
			}
			if(!$selected && in_array($value, $this->_attributes["value"])) {
				echo ' selected="selected"';
				// $selected = true;
			}	
			echo '>', $text["text"], '</option>';
		}	
		echo '</select>';
	}
}
