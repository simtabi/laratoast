<?php

namespace Simtabi\Laratoast\Services;

use Illuminate\Session\Store;
use Simtabi\Laratoast\Contracts\SessionStorage as SessionStorageContract;

class SessionStorage implements SessionStorageContract
{
    /**
     * @var Store
     */
    private $session;

    /**
     * Create a new session store instance.
     *
     * @param Store $session
     */
    function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Flash a message to the session.
     *
     * @param string $name
     * @param array  $data
     */
    public function flash($name, $data)
    {
        $this->session->flash($name, $data);
    }
}
