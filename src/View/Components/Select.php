<?php

namespace WireUi\View\Components;

class Select extends NativeSelect
{
    public string $rightIcon;

    public string $optionComponent;

    public bool $searchable;

    public bool $multiselect;

    public ?string $icon;

    /** @param Collection|array|null $options */
    public function __construct(
        string $rightIcon = 'selector',
        string $optionComponent = 'select.option',
        bool $searchable = true,
        bool $multiselect = false,
        ?string $label = null,
        ?string $placeholder = null,
        ?string $optionValue = null,
        ?string $optionLabel = null,
        ?string $icon = null,
        $options = null
    ) {
        parent::__construct($label, $placeholder, $optionValue, $optionLabel, $options);

        $this->rightIcon       = $rightIcon;
        $this->optionComponent = $optionComponent;
        $this->searchable      = $searchable;
        $this->multiselect     = $multiselect;
        $this->icon            = $icon;
    }

    protected function getView(): string
    {
        return 'wireui::components.select';
    }
}
