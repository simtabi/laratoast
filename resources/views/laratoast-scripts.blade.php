
@laratoastUIScripts

<script>

    function FireToast(data) {
        if ($.fn.toast) {
            $.toast({
                // Text that is to be shown in the toast
                text               : data.text               ?? "Don't forget to star the repository if you like it.",
                // Optional heading to be shown on the toast
                heading            : data.heading            ?? 'Note',
                // Type of toast icon
                icon               : data.icon               ?? 'warning',
                // fade, slide or plain
                showHideTransition : data.showHideTransition ?? 'fade',
                // Boolean value true or false
                allowToastClose    : data.allowToastClose    ?? true,
                // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                hideAfter          : data.hideAfter          ?? 3000,
                // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                stack              : data.stack              ?? 5,
                // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                position           : data.position           ?? 'bottom-right',


                // Text alignment i.e. left, right or center
                textAlign          : data.textAlign          ?? 'left',
                // Whether to show loader or not. True by default
                loader             : data.loader             ?? true,
                // Background color of the toast loader
                loaderBg           : data.loaderBg           ?? '#9EC600',
                // will be triggered before the toast is shown
                beforeShow         : function () {},
                // will be triggered after the toast has been shown
                afterShown         : function () {},
                // will be triggered before the toast gets hidden
                beforeHide         : function () {},
                // will be triggered after the toast has been hidden
                afterHidden        : function () {}
            });
        }
    }

    function SwalModal(data) {

        if (data.swalType === 'confirm'){
            Swal.fire({
                icon               : data.icon,
                title              : data.title,
                html               : data.html,
                showCancelButton   : data.showCancelButton ?? true,
                confirmButtonColor : data.showCancelButton ?? '#3085d6',
                cancelButtonColor  : data.showCancelButton ?? '#d33',
                confirmButtonText  : data.showCancelButton ?? data.data,
                reverseButtons     : data.showCancelButton ?? true,
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
                icon              : data.icon,
                title             : data.title,
                text              : data.text,
                footer            : data.footer,
                position          : data.footer ?? 'top-right',
                showConfirmButton : data.footer ?? false,
                timerProgressBar  : data.footer ?? true,
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
