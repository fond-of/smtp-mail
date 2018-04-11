<?php

namespace FondOfSpryker\Zed\SmtpMail;

use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Mail\Dependency\Mailer\MailToMailerBridge;
use FondOfSpryker\Zed\SmtpMail\MailConfig;
use Spryker\Zed\Mail\MailDependencyProvider as SprykerMailDependencyProvider;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

/**
 * Class MailDependencyProvider
 * @package FondOfSpryker\Zed\SmtpMail
 */
class MailDependencyProvider extends SprykerMailDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addMailer(Container $container)
    {
        $container[static::MAILER] = function () {
            $config = new MailConfig();

            $message = Swift_Message::newInstance();
            $transport = (Swift_SmtpTransport::newInstance($config->getHost(), $config->getPort()))
                ->setUsername($config->getUser())
                ->setPassword($config->getPassword());

            $mailer = Swift_Mailer::newInstance($transport);

            $mailerBridge = new MailToMailerBridge($message, $mailer);

            return $mailerBridge;
        };

        return $container;
    }
}
