<?php

namespace App\Services\Brevo;

use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Configuration;
use GuzzleHttp\Client;

class BrevoService
{
    protected $apiInstance;

    public function __construct()
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', config('services.brevo.key'));
        $this->apiInstance = new TransactionalEmailsApi(new Client(), $config);
    }

    public function sendReviewEmail($customer, $business_name, $business_email, $email_body)
    {
        $sendSmtpEmail = new \Brevo\Client\Model\SendSmtpEmail([
			'subject'     => "Regarding your recent visit to ".$business_name.".",
			'sender'  => ['name' => $business_name, 'email' => config('appsettings.contact_email')],
			'replyTo' => ['name' => $business_name, 'email' => config('appsettings.contact_email')],
            'to'      => [['name' => $customer->name, 'email' => $customer->email]],
			'htmlContent' => $email_body,
			'headers' => [
				'X-Mailin-custom_track_clicks' => '0',
				'X-Mailin-Tag' => 'PersonalFollowUp'
			]

        ]);

        try {
            return $this->apiInstance->sendTransacEmail($sendSmtpEmail);
        } catch (\Exception $e) {
            \Log::error("Brevo Error: " . $e->getMessage());
            return false;
        }
    }

	public function sendContactEmail($from_name, $from_email, $finalMessage)
    {
        $sendSmtpEmail = new \Brevo\Client\Model\SendSmtpEmail([
            'subject' => "New Contact Request from ReviewBoost.",
			'sender'  => ['name' => $from_name, 'email' => config('appsettings.contact_email')],
			'replyTo' => ['name' => $from_name, 'email' => $from_email],
            'to'      => ['name' => 'ReviewBoost', 'email' => config('appsettings.contact_email')],
            'htmlContent' => nl2br($finalMessage),
        ]);

        try {
            return $this->apiInstance->sendTransacEmail($sendSmtpEmail);
        } catch (\Exception $e) {
            \Log::error("Brevo Error: " . $e->getMessage());
            return false;
        }
    }



}