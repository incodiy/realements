<?php

namespace Incodiy\Realements;

class FormBuilder {
    protected $elements = [];
    protected $formConfig = [];
    protected $elementCount = 0;

    public function open(array $attributes = []) {
        $this->formConfig = [
            'method' => strtoupper($attributes['method'] ?? 'POST'),
            'action' => $attributes['action'] ?? '',
            'enctype' => $attributes['enctype'] ?? 'multipart/form-data',
            'attributes' => $attributes
        ];
        return $this;
    }

    public function select($name, $values, $attributes = []) {
        $elementId = $attributes['id'] ?? $this->generateId($name);
        $label = $this->generateLabel($name, $attributes);
        
        $this->elements[] = [
            'type' => 'select',
            'name' => strtolower(str_replace(' ', '-', $name)),
            'id' => $elementId,
            'values' => $values,
            'attributes' => $attributes,
            'label' => $label,
            'multiple' => $attributes['multiselect'] ?? false,
            'selected' => $attributes['selected'] ?? [],
            'addable' => $attributes['addable'] ?? false,
            'maxAdd' => $attributes['maxAdd'] ?? null,
            'buttonPosition' => $attributes['buttonPosition'] ?? 'right',
            'buttonClass' => $attributes['buttonClass'] ?? 'btn btn-primary'
        ];
        
        return $this;
    }

    public function close($submitButton = true, $buttonConfig = []) {
        $this->formConfig['submitButton'] = $submitButton;
        $this->formConfig['buttonConfig'] = $buttonConfig;
        return $this;
    }

    public function render() {
        return view('realements::form', [
            'elements' => $this->elements,
            'formConfig' => $this->formConfig
        ]);
    }

    private function generateId($name) {
        $this->elementCount++;
        return strtolower(str_replace(' ', '-', $name)) . '-' . $this->elementCount;
    }

    private function generateLabel($name, $attributes) {
        if (isset($attributes['label']) && $attributes['label'] === false) return null;
        
        return ucwords(str_replace('-', ' ', $name));
    }
}