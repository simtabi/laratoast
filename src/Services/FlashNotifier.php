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
    protected $messages;

    /**
     * The message type
     *
     * @var ?string
     */
    protected $type = null;

    /**
     * The message
     *
     * @var mixed
     */
    protected $message;

    /**
     * @return $this
     */
    public function isPrimary()
    {
        $this->type = 'primary';

        return $this;
    }

    /**
     * @return $this
     */
    public function isSecondary()
    {
        $this->type = 'secondary';

        return $this;
    }

    /**
     * @return $this
     */
    public function isSuccess()
    {
        $this->type = 'success';

        return $this;
    }

    /**
     * @return $this
     */
    public function isDanger()
    {
        $this->type = 'danger';

        return $this;
    }

    /**
     * @return $this
     */
    public function isWarning()
    {
        $this->type = 'warning';

        return $this;
    }

    /**
     * @return $this
     */
    public function isLight()
    {
        $this->type = 'light';

        return $this;
    }

    /**
     * @return $this
     */
    public function isDark()
    {
        $this->type = 'dark';

        return $this;
    }


    /**
     * Create a new FlashNotifier instance.
     *
     * @param SessionStorage $session
     */
    public function __construct(SessionStorage $session)
    {
        $this->session = $session;
        $this->messages = collect();
    }

    /**
     * @param mixed $message
     * @return FlashNotifier
     */
    public function setMessage(mixed $message)
    {
        $this->message = $message;

        return $this;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Flash a general message.
     *
     * @return $this
     */
    public function flash()
    {
        $message = $this->message;
        $type    = $this->type;

        // If no message was provided, we should update
        // the most recently added message.
        if (! $message) {
            return $this->updateLastMessage(compact('type'));
        }

        if (! $message instanceof Message) {
            $message = new Message(compact('message', 'type'));
        }

        $this->messages->push($message);

        return $this->flashToSession();
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
     * @param string $title
     * @return $this
     */
    public function flashModal($title = 'Notice')
    {
        $message = $this->message;

        if (! $message) {
            return $this->updateLastMessage([
                'title' => $title,
                'modal' => true,
            ]);
        }

        return $this->setMessage(new ModalMessage(compact('title', 'message')))->flash();
    }

    /**
     * Add an "important" flash to the session.
     *
     * @return $this
     */
    public function isImportant()
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
    protected function flashToSession()
    {
        $this->session->flash(LaratoastHelper::LARATOAST_FLASH_SESSION_NAME, $this->messages);

        return $this;
    }
}
