<?php

namespace Simtabi\Laratoast\Traits;


trait LaratoastBuilder
{

    use SweetalertBuilder,
        ToastBuilder;
    
    public ?string $icon     = 'warning'; // Type of toast icon
    public ?string $text     = "Don't forget to star the repository if you like it."; // Text that is to be shown in the toast
    public ?string $position = 'bottom-left'; // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values


    /**
     * @param string|null $icon
     * @return self
     */
    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @param string|null $text
     * @return self
     */
    public function setText(?string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param string|null $position
     * @return self
     */
    public function setPosition(?string $position): self
    {
        $this->position = $position;
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @return string|null
     */
    public function getPosition(): ?string
    {
        return $this->position;
    }
    
    
    
    
    
}