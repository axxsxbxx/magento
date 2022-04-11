<?php

namespace Foggyline\Office\Controller\Test;

class Crud extends \Foggyline\Office\Controller\Test
{
    protected $employeeFactory;
    protected $departmentFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Foggyline\Office\Model\EmployeeFactory $employeeFactory,
        \Foggyline\Office\Model\DepartmentFactory $departmentFactory
    )
    {
        $this->employeeFactory = $employeeFactory;
        $this->departmentFactory = $departmentFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        // crud 코드

        // 새로운 entity를 생성하는 단순 모델
        $department1 = $this->departmentFactory->create();
        $department1->setName('Finance')->save();

        // 새로운 entity를 생성하는 EAV 모델
        $employee1 = $this->employeeFactory->create();
        $employee1->setData([
            'department_id' => $department1->getId(),
            'email' => 'ivan@mail.loc',
            'first_name' => 'Ivan',
            'last_name' => 'Telebar',
            'service_years' => 2,
            'dob' => '1986-08-22',
            'salary' => 2400.00,
            'vat_number' => 'GB123454321',
            'note' => 'Note #1'
        ]);
        $employee1->save();
    }
}