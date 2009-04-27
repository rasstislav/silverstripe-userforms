<?php
/**
 * EditableCheckboxGroup
 *
 * Represents a set of selectable radio buttons
 * 
 * @package userforms
 */
class EditableCheckboxGroupField extends EditableMultipleOptionField {

	static $singular_name = "Checkbox group";
	
	static $plural_name = "Checkbox groups";
	
	function getFormField() {
		$optionSet = $this->Options();
		$options = array();
		
		$optionMap = ($optionSet) ? $optionSet->map('Title', 'Title') : array();
		
		return new CheckboxSetField($this->Name, $this->Title, $optionMap);
	}
	
	function getValueFromData($data) {
		$result = '';
		$entries = $data[$this->Name];
		
		if(!is_array($data[$this->Name])) {
			$entries = array($data[$this->Name]);
		}
		if($entries) {
			foreach($entries as $selected => $value) {
				if(!$result) {
					$result = $value;
				} else {
					$result .= ", " . $value;
				}
			}
		}
		return $result;
	}
}

?>