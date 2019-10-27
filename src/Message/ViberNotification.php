<?php

namespace App\Message;

/**
 * Class ViberNotification
 * @package App\Message
 */
class ViberNotification
{
    private $content;

    /**
     * ViberNotification constructor.
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->content = $message;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}