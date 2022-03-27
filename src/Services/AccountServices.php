<?php

namespace App\Services;
use App\AccountRepository;

class AccountServices
{
    private $parameters;
    public function __construct($dm)
    {
        $this->accountRepository = new AccountRepository($dm);
    }

    private function getAllAccounts()
    {
        return $this->accountRepository->getAll();
    }

    private function findOne($accountId = null)
    {
        return $this->accountRepository->findOne($accountId);
    }

    public function setParameters($request)
    {
        $params=[];
        $params['account_id']=  $request->request->get('account_id') ?? '';
        $params['show_all']= $request->request->get('show_all') ?? '';
        $this->parameters = $params;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function getData()
    {
       $params=$this->getParameters();
       return (!empty($params['account_id']) && empty($params['show_all']))? $this->findOne($params['account_id']):$this->accountRepository->getAll();
    }

    public function getStaticData()
    {
        return [
            "title" => "Hello ReportsController!",
            "titleAccountInput" => "Please enter the Account ID you'd like to display:",
            "HeaderOfTheTable" => ["Account name", "Account ID", "Spend", "Clicks", "Impressions", "cost per click"],
            "buttons" => [
                "textBtnGetData" => "GET DATA",
                "textBtnShowAll" => "SHOW ALL"
            ],
            "errorMessage" => "No data available for the supplied Account Id."
        ];
    }
}
