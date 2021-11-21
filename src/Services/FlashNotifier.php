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
    protected $type;

    /**
     * The message collection.
     *
     * @var Collection
     */
    protected $messages;

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

    public function typeIsInfo()
    {
        $this->type = LaratoastHelper::MESSAGE_TYPE_INFO;

        return $this;
    }

    public function typeIsSuccess()
    {
        $this->type = LaratoastHelper::MESSAGE_TYPE_SUCCESS;

        return $this;
    }

    public function typeIsDanger()
    {
        $this->type = LaratoastHelper::MESSAGE_TYPE_DANGER;

        return $this;
    }

    public function typeIsWarning()
    {
        $this->type = LaratoastHelper::MESSAGE_TYPE_WARNING;

        return $this;
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
     * Flash an information message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function flashInfo($message = null)
    {
        $this->generateFlash($message, $this->typeIsInfo());
    }

    /**
     * Flash a success message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function flashSuccess($message = null)
    {
        $this->generateFlash($message, $this->typeIsSuccess());
    }

    /**
     * Flash an error message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function flashErrorMessage($message = null)
    {
        $this->generateFlash($message, $this->typeIsDanger());
    }

    /**
     * Flash a warning message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function flashWarningMessage($message = null)
    {
        $this->generateFlash($message, $this->typeIsWarning());
    }

    /**
     * Flash a warning message.
     *
     * @param  string|null $message
     * @return $this
     */
    public function flashGeneralMessage($message = null, $type = null)
    {
        $this->generateFlash($message, $type);
    }

    /**
     * Flash a modal message.
     *
     * @param  string|null $message
     * @param  string      $title
     * @return $this
     */
    public function flashModal($message = null, $title = 'Notice')
    {
        if (! $message) {
            return $this->updateLastMessage(['title' => $title, 'modal' => true]);
        }

        return $this->generateFlash(
            new ModalMessage(compact('title', 'message'))
        );
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

    /**
     * Flash a general message.
     *
     * @param  string|null $message
     * @param  string|null $type
     * @return $this
     */
    protected function generateFlash($message = null, $type = null)
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

}
