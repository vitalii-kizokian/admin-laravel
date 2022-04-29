<?php

namespace WireUi\View\Components;

use Illuminate\Support\Collection;

class Select extends NativeSelect
{
    public function __construct(
        public string $rightIcon = 'selector',
        public bool $clearable = true,
        public bool $searchable = true,
        public bool $multiselect = false,
        public ?string $icon = null,
        public ?string $label = null,
        public ?string $placeholder = null,
        public ?string $optionValue = null,
        public ?string $optionLabel = null,
        public ?string $optionTemplate = null,
        public bool $flipOptions = false,
        public bool $optionKeyValue = false,
        Collection|array|null $options = null,
    ) {
        parent::__construct(
            $label,
            $placeholder,
            $optionValue,
            $optionLabel,
            $flipOptions,
            $optionKeyValue,
            $options,
        );
    }

    protected function getView(): string
    {
        return 'wireui::components.select';
    }

    public function optionsToJson(): string
    {
        return $this->options
            ->map(fn (mixed $rawOption, int $index) => array_filter([
                ...$rawOption,
                'label'    => $this->getOptionLabel($rawOption),
                'value'    => $this->getOptionValue($index, $rawOption),
                'template' => data_get($rawOption, 'template'),
                'disabled' => data_get($rawOption, 'disabled'),
                'readonly' => data_get($rawOption, 'readonly') || data_get($rawOption, 'disabled'),
            ]))
            ->values()
            ->toJson();
    }
}
