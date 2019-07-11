<?php
namespace AppBundle\EventListener;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\EventListener\AuthenticationListener as FOSAuthenticationListener;

class AuthenticationListener 
// extends FOSAuthenticationListener
{

    public static function getSubscribedEvents()
    {
        return array(
            // do not authenticate after registration
            // FOSUserEvents::REGISTRATION_COMPLETED => 'authenticate',
            // FOSUserEvents::REGISTRATION_CONFIRMED => 'authenticate'
            FOSUserEvents::RESETTING_RESET_COMPLETED => 'authenticate',
        );
    }
}