<?php
namespace PFBC\View;

class SideBySide extends \PFBC\View {
	protected $class = "form-horizontal";

	public function render() {
		$this->_form->appendAttribute("class", $this->class);

		echo '<form', $this->_form->getAttributes(), '><fieldset>';
		$this->_form->getErrorView()->render();

		$elements = $this->_form->getElements();
		$elementSize = sizeof($elements);
		$elementCount = 0;
		for($e = 0; $e < $elementSize; ++$e) {
			$element = $elements[$e];

			if($element instanceof \PFBC\Element\Hidden || $element instanceof \PFBC\Element\HTML)
				$element->render();
            elseif($element instanceof \PFBC\Element\Button) {
                if($e == 0 || !$elements[($e - 1)] instanceof \PFBC\Element\Button)
					echo '<div class="form-actions">';
				else
					echo ' ';
				
				$element->render();

                if(($e + 1) == $elementSize || !$elements[($e + 1)] instanceof \PFBC\Element\Button)
                    echo '</div>';
            }
            else {
				// echo '<div class="control-group" id="element_', $element->getAttribute('id'), '">', $this->renderLabel($element), '<div class="controls">', $element->render(), $this->renderDescriptions($element), '</div></div>';
				// echo '<div class="form-group"><label class="control-label col-lg-2" id="element_', $element->getAttribute('id'), '">', $this->renderLabel($element), '</label><div class="col-lg-10">', $element->render(), $this->renderDescriptions($element), '</div></div>';
				echo '<div class="form-group" id="for_' . $element->getAttribute('name') . '"><label class="control-label col-lg-2" id="element_', $element->getAttribute('id'), '">', $this->renderLabel($element), '</label><div class="col-lg-10">', $element->render(), $this->renderDescriptions($element), '</div></div>';
				++$elementCount;
			}
		}

		echo '</fieldset></form>';
    }

	protected function renderLabel(\PFBC\Element $element) {
        $label = $element->getLabel();
        if(!empty($label)) {
			// echo '<label class="control-label col-lg-2" for="', $element->getAttribute("id"), '">';
			if($element->isRequired())
				echo '<span class="required">* </span>';
			echo $label; 
			// echo $label, '</label>'; 
        }
    }
}
