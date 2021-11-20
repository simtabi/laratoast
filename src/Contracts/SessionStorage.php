<?php

namespace Simtabi\Laratoast\Contracts;

interface SessionStorage
{
    /**
     * Flash a message to the session.
     *
     * @param string $name
     * @param array  $data
     */
    public function flash($name, $data);
}
