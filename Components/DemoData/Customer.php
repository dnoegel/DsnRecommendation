<?php

namespace Shopware\Plugins\DsnRecommendation\Components\DemoData;

use Doctrine\DBAL\Connection;
use Shopware\Components\Api\Resource;

class Customer
{
    /**
     * @var Resource\Customer
     */
    private $customer;

    /**
     * @var array
     */
    private $customerTemplate = [
        "paymentId" => 1,
        "groupKey" => "EK",
        "shopId" => 1,
        "password" => "shopware",
        "active" => true,
        "email" => "test@example.org",
        "accountMode" => 0,
        "languageId" => "1",
        "billing" => [
            "company" => "Muster GmbH",
            "department" => "",
            "salutation" => "mr",
            "number" => "20001",
            "firstName" => "Max",
            "lastName" => "Mustermann",
            "street" => "Musterstr.",
            "streetNumber" => "55",
            "zipCode" => "55555",
            "city" => "Musterhausen",
        ]
    ];

    private $customers = [
        ['Kathrin', 'Knickrig', 'knickrig@example.org'],
        ['Max', 'Müller', 'mueller@example.org'],
        ['Felix', 'Frechmann', 'frechmann@example.org'],
        ['Gustav', 'Glowfish', 'glowfish@example.org'],
        ['Sylvia', 'Snowman', 'snow@example.org'],
        ['Maria', 'Mastercard', 'mastercard@example.org'],
        ['Johannes', 'Johanson', 'johanson@example.org'],
        ['Jimmy', 'Jellyfish', 'jellyfish@example.org'],
        ['Werner', 'Wurstfinger', 'wurstfinger@example.org'],
    ];

    public function __construct(Resource\Customer $customer)
    {
        $this->customer = $customer;
    }

    public function create()
    {
        $this->deleteDemoCustomers();

        foreach ($this->customers as $customerArray) {
            list($firsName, $lastName, $email) = $customerArray;
            $currentCustomer = $this->customerTemplate;
            $currentCustomer['billing']['firstName'] = $firsName;
            $currentCustomer['billing']['lastName'] = $lastName;
            $currentCustomer['email'] = $email;
            $this->customer->create($currentCustomer);
        }
    }

    private function deleteDemoCustomers()
    {
        $emails = array_column($this->customers, 2);
        $builder = Shopware()->Models()->getConnection()->createQueryBuilder()
            ->delete('s_user')
            ->where('email IN (:mail)')
            ->setParameter('mail', $emails, Connection::PARAM_STR_ARRAY);
        $builder->execute();
    }
}
