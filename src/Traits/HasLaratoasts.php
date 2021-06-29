<?php

namespace Simtabi\Laratoast\Traits;

trait HasLaratoasts
{

    use ToastBuilder;

    /**
     * Popup sweetalert modal
     *
     * @param string $titleText fire message
     * @param string|null $icon info|warning|success|error
     * @param string|null $html html text as subtitle
     * @param array $options extra sweetalert options
     * @return void
     */
    public function fireSweetalertModal(string $titleText, string $icon = null, ?string $html = null, array $options = [])
    {
        $this->emit('swal:fire', array_merge(compact('titleText', 'icon', 'html'), $options));
    }

    /**
     * Popup toast notifications
     *
     * @param string $titleText     toast message
     * @param string $icon          info|warning|success|error
     * @param integer $timeout      duration to hide
     * @return void
     */
    public function fireToastNotification(string $titleText, string $icon = 'info', int $timeout = 5000, array $options = [])
    {
        $this->emit('toast:fire', array_merge(compact('titleText', 'icon', 'timeout'), $options));
    }

}
