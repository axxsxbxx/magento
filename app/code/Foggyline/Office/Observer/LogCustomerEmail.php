<?php

namespace Foggyline\Office\Observer;

use Magento\Framework\Event\ObserverInterface;

class LogCustomerEmail implements ObserverInterface
{
    protected $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        // $password = $observer->getEvent()->getPassword();
        $customer = $observer->getEvent()->getModel();
        $this->logger->info('Foggyline\Office: ' . $customer->getEmail());
        return $this;
    }
}