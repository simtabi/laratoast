<?php

namespace Simtabi\Laratoast\Traits;

trait HasLaratoasts
{
    use SweetalertBuilder,
        ToastBuilder;


    /**
     * Show toast error message if error bag has a thing
     *
     * @return false|mixed
     */
    public function fireToastForValidationError()
    {
        $errorBag = $this->getErrorBag()->all();

        if (count($errorBag) > 0){
            return $this->setToastText($errorBag[0])->fireToastNotification();
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
            'icon'                   => $this->swalIcon,
            'text'                   => $this->swalText,
            'position'               => $this->swalPosition,

            // defaults
            'title'                  => $this->swalTitle,
            'footer'                 => $this->swalFooter,

            // with image
            'imageUrl'               => $this->swalImageUrl,
            'imageAlt'               => $this->swalImageAlt,
            'imageHeight'            => $this->swalImageHeight,
            'imageWidth'             => $this->swalImageWidth,

            // with html
            'html'                   => $this->swalHtml,
            'showCloseButton'        => $this->swalShowCloseButton,
            'showCancelButton'       => $this->swalShowCancelButton,
            'focusConfirm'           => $this->swalFocusConfirm,
            'confirmButtonText'      => $this->swalConfirmButtonText,
            'confirmButtonAriaLabel' => $this->swalConfirmButtonAriaLabel,
            'cancelButtonText'       => $this->swalCancelButtonText,
            'cancelButtonAriaLabel'  => $this->swalCancelButtonAriaLabel,

            // dialog with 3 buttons
            'showDenyButton'         => $this->swalShowDenyButton,
            'denyButtonText'         => $this->swalDenyButtonText,

            // with custom position
            'showConfirmButton'      => $this->swalShowConfirmButton,
            'timer'                  => $this->swalTimer,

            // with animate css
            'showClass'              => $this->swalShowClass,
            'hideClass'              => $this->swalHideClass,

            // confirm dialog
            'confirmButtonColor'     => $this->swalConfirmButtonColor,
            'cancelButtonColor'      => $this->swalCancelButtonColor,

            // custom width/padding
            'width'                  => $this->swalWidth,
            'padding'                => $this->swalPadding,
            'background'             => $this->swalBackground,
            'backdrop'               => $this->swalBackdrop,

            // autoclose timer
            'timerProgressBar'      => $this->swalTimerProgressBar,
            'didOpen'               => $this->swalDidOpen,
            'willClose'             => $this->swalWillClose,

            // with rtl
            'iconHtml'              => $this->swalIconHtml,
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
            'icon'               => $this->toastIcon,
            'text'               => $this->toastText,
            'position'           => $this->toastPosition,

            'heading'            => $this->toastHeading,
            'showHideTransition' => $this->toastShowHideTransition,
            'allowToastClose'    => $this->toastAllowToastClose,
            'hideAfter'          => $this->toastHideAfter,
            'stack'              => $this->toastStack,

            'textAlign'          => $this->toastTextAlign,
            'loader'             => $this->toastLoader,
            'loaderBg'           => $this->toastLoaderBg,
            'beforeShow'         => $this->toastBeforeShow,
            'afterShown'         => $this->toastAfterShown,
            'beforeHide'         => $this->toastBeforeHide,
            'afterHidden'        => $this->toastAfterHidden,
        ]);
    }

}
