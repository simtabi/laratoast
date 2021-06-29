<?php

namespace Simtabi\Laratoast\Traits;

trait ToastBuilder
{

    public ?string $text                = "Don't forget to star the repository if you like it."; // Text that is to be shown in the toast
    public ?string $heading             = 'Note'; // Optional heading to be shown on the toast
    public ?string $icon                = 'warning'; // Type of toast icon
    public ?string $showHideTransition  = 'fade'; // fade; slide or plain
    public bool    $allowToastClose     = true; // Boolean value true or false
    public int     $hideAfter           = 3000; // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
    public int     $stack               = 20; // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
    public ?string $position            = 'bottom-left'; // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values

    public ?string $textAlign           = 'left';  // Text alignment i.e. left, right or center
    public bool    $loader              = true;  // Whether to show loader or not. True by default
    public ?string $loaderBg            = '#9EC600';  // Background color of the toast loader
    public ?string $beforeShow          = 'function () {}'; // will be triggered before the toast is shown
    public ?string $afterShown          = 'function () {}'; // will be triggered after the toat has been shown
    public ?string $beforeHide          = 'function () {}'; // will be triggered before the toast gets hidden
    public ?string $afterHidden         = 'function () {}'; // will be triggered after the toast has been hidden

    /**
     * @param string|null $text
     * @return ToastBuilder
     */
    public function setText(?string $text): ToastBuilder
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param string|null $heading
     * @return ToastBuilder
     */
    public function setHeading(?string $heading): ToastBuilder
    {
        $this->heading = $heading;
        return $this;
    }

    /**
     * @param string|null $icon
     * @return ToastBuilder
     */
    public function setIcon(?string $icon): ToastBuilder
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @param string|null $showHideTransition
     * @return ToastBuilder
     */
    public function setShowHideTransition(?string $showHideTransition): ToastBuilder
    {
        $this->showHideTransition = $showHideTransition;
        return $this;
    }

    /**
     * @param bool $allowToastClose
     * @return ToastBuilder
     */
    public function setAllowToastClose(bool $allowToastClose): ToastBuilder
    {
        $this->allowToastClose = $allowToastClose;
        return $this;
    }

    /**
     * @param int $hideAfter
     * @return ToastBuilder
     */
    public function setHideAfter(int $hideAfter): ToastBuilder
    {
        $this->hideAfter = $hideAfter;
        return $this;
    }

    /**
     * @param int $stack
     * @return ToastBuilder
     */
    public function setStack(int $stack): ToastBuilder
    {
        $this->stack = $stack;
        return $this;
    }

    /**
     * @param string|null $position
     * @return ToastBuilder
     */
    public function setPosition(?string $position): ToastBuilder
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @param string|null $textAlign
     * @return ToastBuilder
     */
    public function setTextAlign(?string $textAlign): ToastBuilder
    {
        $this->textAlign = $textAlign;
        return $this;
    }

    /**
     * @param bool $loader
     * @return ToastBuilder
     */
    public function setLoader(bool $loader): ToastBuilder
    {
        $this->loader = $loader;
        return $this;
    }

    /**
     * @param string|null $loaderBg
     * @return ToastBuilder
     */
    public function setLoaderBg(?string $loaderBg): ToastBuilder
    {
        $this->loaderBg = $loaderBg;
        return $this;
    }

    /**
     * @param string|null $beforeShow
     * @return ToastBuilder
     */
    public function setBeforeShow(?string $beforeShow): ToastBuilder
    {
        $this->beforeShow = $beforeShow;
        return $this;
    }

    /**
     * @param string|null $afterShown
     * @return ToastBuilder
     */
    public function setAfterShown(?string $afterShown): ToastBuilder
    {
        $this->afterShown = $afterShown;
        return $this;
    }

    /**
     * @param string|null $beforeHide
     * @return ToastBuilder
     */
    public function setBeforeHide(?string $beforeHide): ToastBuilder
    {
        $this->beforeHide = $beforeHide;
        return $this;
    }

    /**
     * @param string|null $afterHidden
     * @return ToastBuilder
     */
    public function setAfterHidden(?string $afterHidden): ToastBuilder
    {
        $this->afterHidden = $afterHidden;
        return $this;
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
    public function getHeading(): ?string
    {
        return $this->heading;
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
    public function getShowHideTransition(): ?string
    {
        return $this->showHideTransition;
    }

    /**
     * @return bool
     */
    public function isAllowToastClose(): bool
    {
        return $this->allowToastClose;
    }

    /**
     * @return int
     */
    public function getHideAfter(): int
    {
        return $this->hideAfter;
    }

    /**
     * @return int
     */
    public function getStack(): int
    {
        return $this->stack;
    }

    /**
     * @return string|null
     */
    public function getPosition(): ?string
    {
        return $this->position;
    }

    /**
     * @return string|null
     */
    public function getTextAlign(): ?string
    {
        return $this->textAlign;
    }

    /**
     * @return bool
     */
    public function isLoader(): bool
    {
        return $this->loader;
    }

    /**
     * @return string|null
     */
    public function getLoaderBg(): ?string
    {
        return $this->loaderBg;
    }

    /**
     * @return string|null
     */
    public function getBeforeShow(): ?string
    {
        return $this->beforeShow;
    }

    /**
     * @return string|null
     */
    public function getAfterShown(): ?string
    {
        return $this->afterShown;
    }

    /**
     * @return string|null
     */
    public function getBeforeHide(): ?string
    {
        return $this->beforeHide;
    }

    /**
     * @return string|null
     */
    public function getAfterHidden(): ?string
    {
        return $this->afterHidden;
    } 
    
}
