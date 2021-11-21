<?php

namespace Simtabi\Laratoast\Services;


class ModalMessage extends Message
{
    /**
     * The title of the message.
     *
     * @var string
     */
    public $title = 'Notice';

    /**
     * Whether the message is an overlay.
     *
     * @var bool
     */
    public $modal = true;

}
