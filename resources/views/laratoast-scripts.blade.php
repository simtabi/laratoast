@laratoastUIScripts

<script>

    function FireToast(data) {
        if ($.fn.toast) {
            $.toast({
                // Text that is to be shown in the toast
                text               : data.toastText               ?? "Don't forget to star the repository if you like it.",
                // Optional heading to be shown on the toast
                heading            : data.toastHeading            ?? 'Note',
                // Type of toast icon
                icon               : data.toastIcon               ?? 'warning',
                // fade, slide or plain
                showHideTransition : data.toastShowHideTransition ?? 'fade',
                // Boolean value true or false
                allowToastClose    : data.toastAllowToastClose    ?? true,
                // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                hideAfter          : data.toastHideAfter          ?? 3000,
                // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                stack              : data.toastStack              ?? 5,
                // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                position           : data.toastPosition           ?? 'bottom-right',


                // Text alignment i.e. left, right or center
                textAlign          : data.toastTextAlign          ?? 'left',
                // Whether to show loader or not. True by default
                loader             : data.toastLoader             ?? true,
                // Background color of the toast loader
                loaderBg           : data.toastLoaderBg           ?? '#9EC600',
                // will be triggered before the toast is shown
                beforeShow         : data.toastBeforeShow         ?? function () {},
                // will be triggered after the toast has been shown
                afterShown         : data.toastAfterShown         ?? function () {},
                // will be triggered before the toast gets hidden
                beforeHide         : data.toastBeforeHide         ?? function () {},
                // will be triggered after the toast has been hidden
                afterHidden        : data.toastAfterHidden        ?? function () {},
            });
        }
    }

    function SwalModal(data) {

        if (data.swalType === 'confirm'){
            Swal.fire({
                icon               : data.swalIcon,
                title              : data.swalTitle,
                html               : data.swalHtml,
                showCancelButton   : data.swalShowCancelButton ?? true,
                confirmButtonColor : data.swalShowCancelButton ?? '#3085d6',
                cancelButtonColor  : data.swalShowCancelButton ?? '#d33',
                confirmButtonText  : data.swalShowCancelButton ?? data.data,
                reverseButtons     : data.swalShowCancelButton ?? true,
            }).then((result) => {

                if (result.isConfirmed) {
                    return livewire.emit(data.method, data.params)
                } else if (result.isDenied) {
                    return livewire.emit(data.method, data.params)
                }else if (callback) {
                    return livewire.emit(data.callback)
                }
            });
        }else {
            Swal.fire({
                icon              : data.swalIcon,
                title             : data.swalTitle,
                text              : data.swalText,
                footer            : data.swalFooter,
                position          : data.swalPosition          ?? 'top-right',
                showConfirmButton : data.swalShowConfirmButton ?? false,
                timerProgressBar  : data.swalTimerProgressBar  ?? true,
                didOpen           : function(toast) {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
        }

    }

    document.addEventListener('DOMContentLoaded', function() {
        if (Livewire == undefined) return;
        Livewire.on('swal:fire', function(data) { SwalModal(data) });
        Livewire.on('toast:fire', function(data) { FireToast(data) });
    })

</script>
