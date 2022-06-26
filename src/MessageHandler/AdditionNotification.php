<?php

namespace App\MessageHandler;

use App\Message\AdditionNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

//creation du worker qui se charge du traitement

class AdditionNotificationHandler implements MessageHandlerInterface
{
    public function __invoke(AdditionNotification $message)
    {
        return $message->getAddition();
    }
}
