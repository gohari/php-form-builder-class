<?php
namespace PFBC\Element;

class PersianDate extends Textbox {
	protected $_attributes = array(
		// "type" => "date",
		// "pattern" => "\d{4}-\d{2}-\d{2}"
	);

	public function __construct($label, $name, array $properties = null) {
		$this->_attributes["data-mddatetimepicker"] = "true";
		$this->_attributes["data-trigger"] = "click";
		$this->_attributes["data-enabletimepicker"] = "false";
		$this->_attributes["data-placement"] = "right";

		parent::__construct($label, $name, $properties);
    }

	public function render() {
		$this->_attributes["data-targetselector"] = '#' . $this->_attributes["id"];
		$attr = "";
		if(array_key_exists("data-fromdate",$this->_attributes)){$attr .= " data-fromdate=\"" . $this->_attributes["data-fromdate"] . "\"";}
		if(array_key_exists("data-todate",$this->_attributes)){$attr .= " data-todate=\"" . $this->_attributes["data-todate"] . "\"";}
		if($this->_attributes["data-enabletimepicker"]){$attr .= " data-enabletimepicker=\"" . $this->_attributes["data-enabletimepicker"] . "\"";}
		// echo $attr;
		// die();
		echo '<div class="input-group" style="width: 100%;">
                <div class="input-group-addon" ' . $attr . ' data-mddatetimepicker="true" data-trigger="click" data-targetselector="#' . $this->_attributes["id"] .'" data-groupid="group1" data-placement="left">
                    <span class="glyphicon glyphicon-calendar"></span>
                </div>
		';
		parent::render();
		echo '</div>';
	}
}
