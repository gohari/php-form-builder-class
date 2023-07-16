<?php
namespace PFBC;

abstract class OptionElement extends Element {
	protected $options;

	public function __construct($label, $name, array $options, array $properties = null) {
		$this->options = $options;
		// if(!array_key_exists("do_not_duplicat",$properties))
		if(!isset($properties)){
			if(!empty($this->options) && array_values($this->options) === $this->options)
				$this->options = array_combine($this->options, $this->options);
		}
		else if(!array_key_exists("do_not_duplicat",$properties))
		{
			if(!empty($this->options) && array_values($this->options) === $this->options)
				$this->options = array_combine($this->options, $this->options);
		}
		parent::__construct($label, $name, $properties);
	}

	protected function getOptionValue($value) {
        $position = strpos($value, ":pfbc");
        if($position !== false) {
            if($position == 0)
                $value = "";
            else
                $value = substr($value, 0, $position);
        }
        return $value;
    }
}
