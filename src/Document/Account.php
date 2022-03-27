<?php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MDB;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;

/**
 * @package App\Document
 * @MDB\Document(collection="accounts" , repositoryClass= "App\Repository\AccountRepository")
 */
class Account
{

    /**
     * @var string $id
     * @MDB\Id()
     */
    protected $id;


    /**
     * @var string $id
     * @MDB\Field(type="string")
     */
    protected $accountId;

    /**
     * @var string $id
     * @MDB\Field(type="string")
     */
    protected $externalAccountId;

    /**
     * @var string $currencyCode
     * @MDB\Field(type="string")
     */
    protected $currencyCode;

    /**
     * @var string $status
     * @MDB\Field(type="string")
     */
    protected $status;


    /**
     * @var string $type
     * @MDB\Field(type="string")
     */
    protected $type;

    /**
     * @var string $accountName
     * @MDB\Field(type="string")
     */
    protected $accountName;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * @param string $accountId
     */
    public function setAccountId(string $accountId): void
    {
        $this->accountId = $accountId;
    }

    /**
     * @return string
     */
    public function getExternalAccountId(): string
    {
        return $this->externalAccountId;
    }

    /**
     * @param string $externalAccountId
     */
    public function setExternalAccountId(string $externalAccountId): void
    {
        $this->externalAccountId = $externalAccountId;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    /**
     * @param string $currencyCode
     */
    public function setCurrencyCode(string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getAccountName(): string
    {
        return $this->accountName;
    }

    /**
     * @param string $accountName
     */
    public function setAccountName(string $accountName): void
    {
        $this->accountName = $accountName;
    }


    public function toArray(): array
    {
        return [
            "id" => $this->getId(),
            "accountId"=>$this->getAccountId(),
            "externalAccountId"=>$this->getExternalAccountId(),
            "currencyCode"=>$this->getCurrencyCode(),
            "status"=>$this->getStatus(),
            "type"=>$this->getType(),
            "accountName"=>$this->getAccountName()
        ];
    }



}
