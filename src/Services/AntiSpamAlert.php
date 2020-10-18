<?php

namespace App\Services;

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class AntiSpamAlert
{
    private $mailer;
    private $mailFrom;
    private $mailSubject;
    private $mailTo;
    private $mailMessage;
    private $maxError;

    public function __construct(Mailer $mailer, $mailFrom, $mailSubject, $mailTo, $mailMessage, $maxError)
    {
        $this->mailer = $mailer;
        $this->mailFrom = $mailFrom;
        $this->mailSubject = $mailSubject;
        $this->mailTo = $mailTo;
        $this->mailMessage = $mailMessage;
        $this->maxError = $maxError;
    }

    private function countLinks($text)
    {
        preg_match_all(
            '#(http|https|ftp)://([A-Z0-9][A-Z0-9_-]*(?:.[A-Z0-9][A-Z0-9_-]*)+):?(d+)?/?#i',
            $text,
            $matches
        );

        return count($matches[0]);
    }

    private function countMails($text)
    {
        preg_match_all(
            '#[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}#i',
            $text,
            $matches
        );

        return count($matches[0]);
    }

    public function isSpam($text)
    {
        return ($this->countLinks($text) + $this->countMails($text)) >= $this->maxError;
    }

    public function alert($text)
    {
        $email = (new Email())
            ->from($this->mailFrom)
            ->to($this->mailTo)
            ->subject($this->mailSubject)
            ->text($this->mailMessage . ' : ' . $text)
            ->html($this->mailMessage . ' : ' . $text);

        $this->mailer->send($email);
    }
}
