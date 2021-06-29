<?php

namespace Simtabi\Laratoast\Traits;

trait ToastBuilder
{

    public ?string $heading             = 'Note'; // Optional heading to be shown on the toast
    public ?string $showHideTransition  = 'fade'; // fade; slide or plain
    public bool    $allowToastClose     = true; // Boolean value true or false
    public int     $hideAfter           = 3000; // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
    public int     $stack               = 20; // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time

    public ?string $textAlign           = 'left';  // Text alignment i.e. left, right or center
    public bool    $loader              = true;  // Whether to show loader or not. True by default
    public ?string $loaderBg            = '#9EC600';  // Background color of the toast loader
    public ?string $beforeShow          = 'function () {}'; // will be triggered before the toast is shown
    public ?string $afterShown          = 'function () {}'; // will be triggered after the toat has been shown
    public ?string $beforeHide          = 'function () {}'; // will be triggered before the toast gets hidden
    public ?string $afterHidden         = 'function () {}'; // will be triggered after the toast has been hidden

    /**
     * @param string|null $heading
     * @return self
     */
    public function setHeading(?string $heading): self
    {
        $this->heading = $heading;
        return $this;
    }

    /**
     * @param string|null $showHideTransition
     * @return self
     */
    public function setShowHideTransition(?string $showHideTransition): self
    {
        $this->showHideTransition = $showHideTransition;
        return $this;
    }

    /**
     * @param bool $allowToastClose
     * @return self
     */
    public function setAllowToastClose(bool $allowToastClose): self
    {
        $this->allowToastClose = $allowToastClose;
        return $this;
    }

    /**
     * @param int $hideAfter
     * @return self
     */
    public function setHideAfter(int $hideAfter): self
    {
        $this->hideAfter = $hideAfter;
        return $this;
    }

    /**
     * @param int $stack
     * @return self
     */
    public function setStack(int $stack): self
    {
        $this->stack = $stack;
        return $this;
    }

    /**
     * @param string|null $textAlign
     * @return self
     */
    public function setTextAlign(?string $textAlign): self
    {
        $this->textAlign = $textAlign;
        return $this;
    }

    /**
     * @param bool $loader
     * @return self
     */
    public function setLoader(bool $loader): self
    {
        $this->loader = $loader;
        return $this;
    }

    /**
     * @param string|null $loaderBg
     * @return self
     */
    public function setLoaderBg(?string $loaderBg): self
    {
        $this->loaderBg = $loaderBg;
        return $this;
    }

    /**
     * @param string|null $beforeShow
     * @return self
     */
    public function setBeforeShow(?string $beforeShow): self
    {
        $this->beforeShow = $beforeShow;
        return $this;
    }

    /**
     * @param string|null $afterShown
     * @return self
     */
    public function setAfterShown(?string $afterShown): self
    {
        $this->afterShown = $afterShown;
        return $this;
    }

    /**
     * @param string|null $beforeHide
     * @return self
     */
    public function setBeforeHide(?string $beforeHide): self
    {
        $this->beforeHide = $beforeHide;
        return $this;
    }

    /**
     * @param string|null $afterHidden
     * @return self
     */
    public function setAfterHidden(?string $afterHidden): self
    {
        $this->afterHidden = $afterHidden;
        return $this;
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
