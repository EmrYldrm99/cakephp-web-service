<?php

declare(strict_types=1);

namespace App\Mailer;

use Cake\Mailer\Mailer;

class RequestMailer extends Mailer
{
    public function sendTestEmail($toEmail)
    {
        $this
            ->setTo($toEmail)
            ->setSubject('Test E-Mail von CakePHP')
            ->deliver('Dies ist eine Testnachricht, die lokal gesendet wurde.');
    }
}
