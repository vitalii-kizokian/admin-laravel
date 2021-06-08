<?php

namespace WireUi\View\Components;

class ModalCard extends Modal
{
    public string $shadow;

    public string $divider;

    public string $padding;

    public string $rounded;

    public ?string $title;

    public ?string $header;

    public ?string $footer;

    public bool $squared;

    public bool $fullscreen;

    public function __construct(
        string $zIndex = 'z-50',
        string $maxWidth = '2xl',
        string $spacing = 'p-4',
        string $padding = 'px-2 py-5 md:px-4',
        string $rounded = 'rounded-xl',
        string $shadow = 'shadow-md',
        string $divider = 'divide-y divide-gray-200',
        ?string $title = null,
        ?string $header = null,
        ?string $footer = null,
        bool $fullscreen = false,
        bool $squared = false,
        $blur = false
    ) {
        if ($fullscreen) {
            $maxWidth = '';
        }

        parent::__construct($zIndex, $maxWidth, $spacing, $blur);

        $this->padding    = $padding;
        $this->rounded    = $rounded;
        $this->shadow     = $shadow;
        $this->divider    = $divider;
        $this->title      = $title;
        $this->header     = $header;
        $this->footer     = $footer;
        $this->fullscreen = $fullscreen;
        $this->squared    = $squared;
    }

    public function render()
    {
        return view('wireui::components.modal-card');
    }
}