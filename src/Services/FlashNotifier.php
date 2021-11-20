<?php

namespace Simtabi\Laratoast\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Traits\Macroable;
use Simtabi\Laratoast\Contracts\SessionStorage;
use Simtabi\Laratoast\Helpers\LaratoastHelper;

class FlashNotifier
{
    use Macroable;

    /**
     * The session store.
     *
     * @var SessionStorage
     */
    protected $session;

    /**
     * The message collection.
     *
     * @var Collection
     */
    public $messages;

    /**
     * Create a new FlashNotifier instance.
     *
     * @param SessionStorage $session
     */
    function __construct(SessionStorage $session)
    {
        $this->session = $session;
        $this->messages = collect();
    }

    /**
     * Flash an information message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function info($message = null)
    {
        return $this->message($message, 'info');
    }

    /**
     * Flash a success message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function success($message = null)
    {
        return $this->message($message, 'success');
    }

    /**
     * Flash an error message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function error($message = null)
    {
        return $this->message($message, 'danger');
    }

    /**
     * Flash a warning message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function warning($message = null)
    {
        return $this->message($message, 'warning');
    }

    /**
     * Flash a general message.
     *
     * @param  string|null $message
     * @param  string|null $level
     * @return $this
     */
    public function message($message = null, $level = null)
    {
        // If no message was provided, we should update
        // the most recently added message.
        if (! $message) {
            return $this->updateLastMessage(compact('level'));
        }

        if (! $message instanceof Message) {
            $message = new Message(compact('message', 'level'));
        }

        $this->messages->push($message);

        return $this->flash();
    }

    /**
     * Modify the most recently added message.
     *
     * @param  array $overrides
     * @return $this
     */
    protected function updateLastMessage($overrides = [])
    {
        $this->messages->last()->update($overrides);

        return $this;
    }

    /**
     * Flash an modal modal.
     *
     * @param  string|null $message
     * @param  string      $title
     * @return $this
     */
    public function modal($message = null, $title = 'Notice')
    {
        if (! $message) {
            return $this->updateLastMessage(['title' => $title, 'modal' => true]);
        }

        return $this->message(
            new ModalMessage(compact('title', 'message'))
        );
    }

    /**
     * Add an "important" flash to the session.
     *
     * @return $this
     */
    public function important()
    {
        return $this->updateLastMessage(['important' => true]);
    }

    /**
     * Clear all registered messages.
     *
     * @return $this
     */
    public function clear()
    {
        $this->messages = collect();

        return $this;
    }

    /**
     * Flash all messages to the session.
     */
    protected function flash()
    {
        $this->session->flash(LaratoastHelper::LARATOAST_FLASH_SESSION_NAME, $this->messages);

        return $this;
    }
}