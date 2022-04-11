<?php

namespace Foggyline\Office\Controller\Test;

class Crud extends \Foggyline\Office\Controller\Test
{
    protected $employeeFactory;
    protected $departmentFactory;
    protected $resultPageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Foggyline\Office\Model\EmployeeFactory $employeeFactory,
        \Foggyline\Office\Model\DepartmentFactory $departmentFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->employeeFactory = $employeeFactory;
        $this->departmentFactory = $departmentFactory;
        $this->resultPageFactory = $resultPageFactory;

        return parent::__construct($context);
    }

    public function execute()
    {
        // crud 코드

        // 새로운 entity를 생성하는 단순 모델
        // $department1 = $this->departmentFactory->create();
        // $department1->setName('Finance')->save();

        // // 새로운 entity를 생성하는 EAV 모델
        // $employee1 = $this->employeeFactory->create();
        // $employee1->setData([
        //     'department_id' => $department1->getId(),
        //     'email' => 'ivan@mail.loc',
        //     'first_name' => 'Ivan',
        //     'last_name' => 'Telebar',
        //     'service_years' => 2,
        //     'dob' => '1986-08-22',
        //     'salary' => 2400.00,
        //     'vat_number' => 'GB123454321',
        //     'note' => 'Note #1'
        // ]);
        // $employee1->save();

        $resultPage = $this->resultPageFactoy->create();
        $this->messageManager->addSuccess('Success-1');
        $this->messageManager->addSuccess('Success-2');
        $this->messageManager->addNotice('Notice-1');
        $this->messageManager->addNotice('Notice-2');
        $this->messageManager->addWarning('Warning-1');
        $this->messageManager->addWarning('Warning-2');
        $this->messageManager->addError('Error-1');
        $this->messageManager->addError('Error-2');
        return $resultPage;
    }
}