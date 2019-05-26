<?php

namespace App\EventSubscriber;

use App\Events\AddressBookEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AddressBookSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
           AddressBookEvent::NAME
        ];
    }


}
