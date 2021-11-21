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
     * The message type.
     *
     * @var static
     */
    public $type;

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
        $this->messages = collect();
        $this->session  = $session;
    }

    public function isInfo()
    {
        $this->type = LaratoastHelper::MESSAGE_TYPE_INFO;

        return $this;
    }

    public function isSuccess()
    {
        $this->type = LaratoastHelper::MESSAGE_TYPE_SUCCESS;

        return $this;
    }

    public function isDanger()
    {
        $this->type = LaratoastHelper::MESSAGE_TYPE_DANGER;

        return $this;
    }

    public function isWarning()
    {
        $this->type = LaratoastHelper::MESSAGE_TYPE_WARNING;

        return $this;
    }

    /**
     * Flash an information message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function info($message = null)
    {
        return $this->flash($message, $this->isInfo());
    }

    /**
     * Flash a success message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function success($message = null)
    {
        return $this->flash($message, $this->isSuccess());
    }

    /**
     * Flash an error message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function error($message = null)
    {
        return $this->flash($message, $this->isDanger());
    }

    /**
     * Flash a warning message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function warning($message = null)
    {
        return $this->flash($message, $this->isWarning());
    }

    /**
     * Flash a general message.
     *
     * @param  string|null $message
     * @param  string|null $type
     * @return $this
     */
    public function flash($message = null, $type = null)
    {
        // If no message was provided, we should update
        // the most recently added message.
        if (! $message) {
            return $this->updateLastMessage(compact('type'));
        }

        if (! $message instanceof Message) {
            $message = new Message(compact('message', 'type'));
        }

        $this->messages->push($message);

        // flash all messages to session
        $this->session->flash(LaratoastHelper::getFlashSessionName(), $this->messages);

        return $this;
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

        return $this->flash(
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
    public function resetMessages()
    {
        $this->messages = collect();

        return $this;
    }

}
