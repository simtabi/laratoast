<?php

namespace Simtabi\Laratoast\Traits;

trait HasLaratoasts
{
    use LaratoastBuilder;


    /**
     * Show toast error message if error bag has a thing
     *
     * @return false|mixed
     */
    public function fireToastForValidationError()
    {
        $errorBag = $this->getErrorBag()->all();

        if (count($errorBag) > 0){
            return $this->setText($errorBag[0])->fireToastNotification();
        }
        return false;
    }

    /**
     * Popup sweetalert modal
     *
     * @return mixed
     */
    public function fireSweetalertModal()
    {
       return $this->emit('swal:fire', [
            'icon'                   => $this->icon,
            'text'                   => $this->text,
            'position'               => $this->position,

            // defaults
            'title'                  => $this->title,
            'footer'                 => $this->footer,

            // with image
            'imageUrl'               => $this->imageUrl,
            'imageAlt'               => $this->imageAlt,
            'imageHeight'            => $this->imageHeight,
            'imageWidth'             => $this->imageWidth,

            // with html
            'html'                   => $this->html,
            'showCloseButton'        => $this->showCloseButton,
            'showCancelButton'       => $this->showCancelButton,
            'focusConfirm'           => $this->focusConfirm,
            'confirmButtonText'      => $this->confirmButtonText,
            'confirmButtonAriaLabel' => $this->confirmButtonAriaLabel,
            'cancelButtonText'       => $this->cancelButtonText,
            'cancelButtonAriaLabel'  => $this->cancelButtonAriaLabel,

            // dialog with 3 buttons
            'showDenyButton'         => $this->showDenyButton,
            'denyButtonText'         => $this->denyButtonText,

            // with custom position
            'showConfirmButton'      => $this->showConfirmButton,
            'timer'                  => $this->timer,

            // with animate css
            'showClass'              => $this->showClass,
            'hideClass'              => $this->hideClass,

            // confirm dialog
            'confirmButtonColor'     => $this->confirmButtonColor,
            'cancelButtonColor'      => $this->cancelButtonColor,

            // custom width/padding
            'width'                  => $this->width,
            'padding'                => $this->padding,
            'background'             => $this->background,
            'backdrop'               => $this->backdrop,

            // autoclose timer
            'timerProgressBar'      => $this->timerProgressBar,
            'didOpen'               => $this->didOpen,
            'willClose'             => $this->willClose,

            // with rtl
            'iconHtml'              => $this->iconHtml,
        ]);
    }

    /**
     * Popup toast notifications
     *
     * @return void
     */
    public function fireToastNotification()
    {
        return $this->emit('toast:fire', [
            'icon'               => $this->icon,
            'text'               => $this->text,
            'position'           => $this->position,

            'heading'            => $this->heading,
            'showHideTransition' => $this->showHideTransition,
            'allowToastClose'    => $this->allowToastClose,
            'hideAfter'          => $this->hideAfter,
            'stack'              => $this->stack,

            'textAlign'          => $this->textAlign,
            'loader'             => $this->loader,
            'loaderBg'           => $this->loaderBg,
            'beforeShow'         => $this->beforeShow,
            'afterShown'         => $this->afterShown,
            'beforeHide'         => $this->beforeHide,
            'afterHidden'        => $this->afterHidden,
        ]);
    }

}
