<?php

namespace FondOfSpryker\Zed\SmtpMail;

use FondOfSpryker\Shared\SmtpMail\MailConfigConstants;
use Spryker\Zed\Mail\MailConfig as SprykerMailConfig;

class MailConfig extends SprykerMailConfig
{
    /**
     * @return string
     */
    public function getHost()
    {
        return $this->get(MailConfigConstants::MAILER_SMTP_HOST,'localhost');
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->get(MailConfigConstants::MAILER_SMTP_PORT, 25);
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->get(MailConfigConstants::MAILER_SMTP_USER, 'JohnDoe');
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->get(MailConfigConstants::MAILER_SMTP_PASSWORD, 'password');
    }

    /**
     * @return string
     */
    public function getEncryption()
    {
        return $this->get(MailConfigConstants::MAILER_SMTP_ENCRYPTION, '');
    }
}
