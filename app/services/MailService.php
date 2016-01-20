<?php

namespace App\Services;

use GuzzleHttp\Client;

class MailerService
{
    /**
    * Guzzle Client.
    */
    protected $client;

    /**
    * API URL.
    */
    protected $url;

    /**
    * Config from app/config/optivo.php
    */
    protected $mailingListConfig;

    /**
    * Contructor.
    *
    * @param Client $client Guzzle Client
    */
    public function __construct(Client $client)
    {
        $this->client = $client;
	$this->url = config('optivo.domain');
	$this->mailingListConfig = config('optivo.mailingList');
    }

    /**
    * Send Event Mail
    *
    * @param  string $mailingListName Mailing list name.
    * @param  array $recipients      Recipients array.
    *
    * @return array                  Sent status of each recipient.
    */
    public function send($mailingListName, $recipients) : array
    {
        $response = [];

        $apiUrl = $this->buildUrl('form', 'sendeventmail', $mailingListName);

        foreach ($recipients as $recipient) {
            $apiResponse = $this->client->get($apiUrl . '&bmRecipientId=' . $recipient);
            $response   += [
                $recipient => [
                    'message' => $apiResponse->getBody()->read(1024),
                ],
            ];
        }

        return $response;
    }

    /**
    * Build url based on serviceType, operation, mailingListName.
    *
    * @param string $serviceType     for eg: mail, form
    * @param string $operation       for eg: sendeventmail, remove, sendtransactionmail, subscribe ...
    * @param string $mailingListName use this to get bmMailingId and authorisationCode
    *
    * @throws Exception
    *
    * @return string Returns API URL.
    */
    protected function buildUrl($serviceType, $operation, $mailingListName) : string
    {
        $apiUrl = $this->url . $serviceType;

        switch ($operation) {
            case 'sendeventmail':
                $mailConfig    = $this->mailingListConfig[$mailingListName];
                $bmMailingId       = $mailConfig['id'];
                $authorisationCode = $mailConfig['recipient-list']['authorisation-code'];
                $apiUrl .= '/' . $authorisationCode . '/' . $operation . '?bmMailingId=' . $bmMailingId;
                break;
            default:
                throw new Exception($operation . ' is not a valid email operation');
        }

        return $apiUrl;
    }
}
