<?php

namespace Simtabi\Laratoast\Traits;

trait SweetalertBuilder
{
    
    // defaults
    public ?string $title                  = 'Oops...';
    public ?string $footer                 = '<a href="">Why do I have this issue?</a>';

    // with image
    public ?string $imageUrl               = '#';
    public ?string $imageAlt               = 'A tall image';
    public int     $imageHeight            = 1500;
    public int     $imageWidth             = 400;

    // with html
    public ?string $html                   = 'You can use <b>bold text</b>, <a href="//sweetalert2.github.io">links</a> and other HTML tags';
    public bool    $showCloseButton        = true;
    public bool    $showCancelButton       = true;
    public bool    $focusConfirm           = false;
    public ?string $confirmButtonText      = '<i class="fa fa-thumbs-up"></i> Great!';
    public ?string $confirmButtonAriaLabel = 'Thumbs up, great!';
    public ?string $cancelButtonText       = '<i class="fa fa-thumbs-down"></i>';
    public ?string $cancelButtonAriaLabel  = 'Thumbs down';

    // dialog with 3 buttons
    public bool    $showDenyButton         = true;
    public ?string $denyButtonText         = 'Don\'t save';

    // with custom position
    public bool    $showConfirmButton      = false;
    public int     $timer                  = 1500;

    // with animate css
    public ?string $showClass              = 'animate__animated animate__fadeInDown';
    public ?string $hideClass              = 'animate__animated animate__fadeOutUp';

    // confirm dialog
    public ?string $confirmButtonColor     = '#3085d6';
    public ?string $cancelButtonColor      = '#d33';

    // custom width/padding
    public int     $width                  = 600;
    public ?string $padding                = '3em';
    public ?string $background             = '#fff';
    public ?string $backdrop               = null;
    
    // autoclose timer
    public bool    $timerProgressBar      = true;
    public ?string $didOpen               = null; // call back
    public ?string $willClose             = null; // timer

    // with rtl
    public ?string $iconHtml              = '؟';

    


    /**
     * @param string|null $title
     * @return SweetalertBuilder
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string|null $footer
     * @return self
     */
    public function setFooter(?string $footer): self
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * @param string|null $imageUrl
     * @return self
     */
    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    /**
     * @param string|null $imageAlt
     * @return self
     */
    public function setImageAlt(?string $imageAlt): self
    {
        $this->imageAlt = $imageAlt;
        return $this;
    }

    /**
     * @param int $imageHeight
     * @return self
     */
    public function setImageHeight(int $imageHeight): self
    {
        $this->imageHeight = $imageHeight;
        return $this;
    }

    /**
     * @param int $imageWidth
     * @return self
     */
    public function setImageWidth(int $imageWidth): self
    {
        $this->imageWidth = $imageWidth;
        return $this;
    }

    /**
     * @param string|null $html
     * @return self
     */
    public function setHtml(?string $html): self
    {
        $this->html = $html;
        return $this;
    }

    /**
     * @param bool $showCloseButton
     * @return self
     */
    public function setShowCloseButton(bool $showCloseButton): self
    {
        $this->showCloseButton = $showCloseButton;
        return $this;
    }

    /**
     * @param bool $showCancelButton
     * @return self
     */
    public function setShowCancelButton(bool $showCancelButton): self
    {
        $this->showCancelButton = $showCancelButton;
        return $this;
    }

    /**
     * @param bool $focusConfirm
     * @return self
     */
    public function setFocusConfirm(bool $focusConfirm): self
    {
        $this->focusConfirm = $focusConfirm;
        return $this;
    }

    /**
     * @param string|null $confirmButtonText
     * @return self
     */
    public function setConfirmButtonText(?string $confirmButtonText): self
    {
        $this->confirmButtonText = $confirmButtonText;
        return $this;
    }

    /**
     * @param string|null $confirmButtonAriaLabel
     * @return self
     */
    public function setConfirmButtonAriaLabel(?string $confirmButtonAriaLabel): self
    {
        $this->confirmButtonAriaLabel = $confirmButtonAriaLabel;
        return $this;
    }

    /**
     * @param string|null $cancelButtonText
     * @return self
     */
    public function setCancelButtonText(?string $cancelButtonText): self
    {
        $this->cancelButtonText = $cancelButtonText;
        return $this;
    }

    /**
     * @param string|null $cancelButtonAriaLabel
     * @return self
     */
    public function setCancelButtonAriaLabel(?string $cancelButtonAriaLabel): self
    {
        $this->cancelButtonAriaLabel = $cancelButtonAriaLabel;
        return $this;
    }

    /**
     * @param bool $showDenyButton
     * @return self
     */
    public function setShowDenyButton(bool $showDenyButton): self
    {
        $this->showDenyButton = $showDenyButton;
        return $this;
    }

    /**
     * @param string|null $denyButtonText
     * @return self
     */
    public function setDenyButtonText(?string $denyButtonText): self
    {
        $this->denyButtonText = $denyButtonText;
        return $this;
    }

    /**
     * @param bool $showConfirmButton
     * @return self
     */
    public function setShowConfirmButton(bool $showConfirmButton): self
    {
        $this->showConfirmButton = $showConfirmButton;
        return $this;
    }

    /**
     * @param int $timer
     * @return self
     */
    public function setTimer(int $timer): self
    {
        $this->timer = $timer;
        return $this;
    }

    /**
     * @param string|null $showClass
     * @return self
     */
    public function setShowClass(?string $showClass): self
    {
        $this->showClass = $showClass;
        return $this;
    }

    /**
     * @param string|null $hideClass
     * @return self
     */
    public function setHideClass(?string $hideClass): self
    {
        $this->hideClass = $hideClass;
        return $this;
    }

    /**
     * @param string|null $confirmButtonColor
     * @return self
     */
    public function setConfirmButtonColor(?string $confirmButtonColor): self
    {
        $this->confirmButtonColor = $confirmButtonColor;
        return $this;
    }

    /**
     * @param string|null $cancelButtonColor
     * @return self
     */
    public function setCancelButtonColor(?string $cancelButtonColor): self
    {
        $this->cancelButtonColor = $cancelButtonColor;
        return $this;
    }

    /**
     * @param int $width
     * @return self
     */
    public function setWidth(int $width): self
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param string|null $padding
     * @return self
     */
    public function setPadding(?string $padding): self
    {
        $this->padding = $padding;
        return $this;
    }

    /**
     * @param string|null $background
     * @return self
     */
    public function setBackground(?string $background): self
    {
        $this->background = $background;
        return $this;
    }

    /**
     * @param string|null $backdrop
     * @return self
     */
    public function setBackdrop(?string $backdrop): self
    {
        $this->backdrop = $backdrop;
        return $this;
    }

    /**
     * @param bool $timerProgressBar
     * @return self
     */
    public function setTimerProgressBar(bool $timerProgressBar): self
    {
        $this->timerProgressBar = $timerProgressBar;
        return $this;
    }

    /**
     * @param string|null $didOpen
     * @return self
     */
    public function setDidOpen(?string $didOpen): self
    {
        $this->didOpen = $didOpen;
        return $this;
    }

    /**
     * @param string|null $willClose
     * @return self
     */
    public function setWillClose(?string $willClose): self
    {
        $this->willClose = $willClose;
        return $this;
    }

    /**
     * @param string|null $iconHtml
     * @return self
     */
    public function setIconHtml(?string $iconHtml): self
    {
        $this->iconHtml = $iconHtml;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getFooter(): ?string
    {
        return $this->footer;
    }

    /**
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    /**
     * @return string|null
     */
    public function getImageAlt(): ?string
    {
        return $this->imageAlt;
    }

    /**
     * @return int
     */
    public function getImageHeight(): int
    {
        return $this->imageHeight;
    }

    /**
     * @return int
     */
    public function getImageWidth(): int
    {
        return $this->imageWidth;
    }

    /**
     * @return string|null
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }

    /**
     * @return bool
     */
    public function isShowCloseButton(): bool
    {
        return $this->showCloseButton;
    }

    /**
     * @return bool
     */
    public function isShowCancelButton(): bool
    {
        return $this->showCancelButton;
    }

    /**
     * @return bool
     */
    public function isFocusConfirm(): bool
    {
        return $this->focusConfirm;
    }

    /**
     * @return string|null
     */
    public function getConfirmButtonText(): ?string
    {
        return $this->confirmButtonText;
    }

    /**
     * @return string|null
     */
    public function getConfirmButtonAriaLabel(): ?string
    {
        return $this->confirmButtonAriaLabel;
    }

    /**
     * @return string|null
     */
    public function getCancelButtonText(): ?string
    {
        return $this->cancelButtonText;
    }

    /**
     * @return string|null
     */
    public function getCancelButtonAriaLabel(): ?string
    {
        return $this->cancelButtonAriaLabel;
    }

    /**
     * @return bool
     */
    public function isShowDenyButton(): bool
    {
        return $this->showDenyButton;
    }

    /**
     * @return string|null
     */
    public function getDenyButtonText(): ?string
    {
        return $this->denyButtonText;
    }

    /**
     * @return bool
     */
    public function isShowConfirmButton(): bool
    {
        return $this->showConfirmButton;
    }

    /**
     * @return int
     */
    public function getTimer(): int
    {
        return $this->timer;
    }

    /**
     * @return string|null
     */
    public function getShowClass(): ?string
    {
        return $this->showClass;
    }

    /**
     * @return string|null
     */
    public function getHideClass(): ?string
    {
        return $this->hideClass;
    }

    /**
     * @return string|null
     */
    public function getConfirmButtonColor(): ?string
    {
        return $this->confirmButtonColor;
    }

    /**
     * @return string|null
     */
    public function getCancelButtonColor(): ?string
    {
        return $this->cancelButtonColor;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return string|null
     */
    public function getPadding(): ?string
    {
        return $this->padding;
    }

    /**
     * @return string|null
     */
    public function getBackground(): ?string
    {
        return $this->background;
    }

    /**
     * @return string|null
     */
    public function getBackdrop(): ?string
    {
        return $this->backdrop;
    }

    /**
     * @return bool
     */
    public function isTimerProgressBar(): bool
    {
        return $this->timerProgressBar;
    }

    /**
     * @return string|null
     */
    public function getDidOpen(): ?string
    {
        return $this->didOpen;
    }

    /**
     * @return string|null
     */
    public function getWillClose(): ?string
    {
        return $this->willClose;
    }

    /**
     * @return string|null
     */
    public function getIconHtml(): ?string
    {
        return $this->iconHtml;
    }
    
}
