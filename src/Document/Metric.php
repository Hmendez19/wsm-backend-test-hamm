<?php

namespace App\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MDB;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;
use DateTime;

/**
 * @package App\Document
 * @MDB\Document(collection="metrics")
 */
class Metric
{

    /**
     * @var string $id
     * @MDB\Id()
     */
    protected $id;

    /**
     * @var DateTime|null $id
     * @MDB\Field(type="date")
     */
    protected $date;

    /**
     * @var string $id
     * @MDB\Field(type="string")
     */
    protected $accountId;

    /**
     * @var double | null $impressions
     * @MDB\Field(type="float")
     */
    protected $impressions;

    /**
     * @var double | null $clicks
     * @MDB\Field(type="float")
     */
    protected $clicks;

    /**
     * @var double | null $ctr
     * @MDB\Field(type="float")
     */
    protected $ctr;

    /**
     * @var double | null $conversions
     * @MDB\Field(type="float")
     */
    protected $conversions;

    /**
     * @var double | null $costPerClick
     * @MDB\Field(type="float")
     */
    protected $costPerClick;

    /**
     * @var double | null $spend
     * @MDB\Field(type="float")
     */
    protected $spend;

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
     * @return DateTime|null
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime|null $date
     */
    public function setDate(?DateTime $date): void
    {
        $this->date = $date;
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
     * @return float|null
     */
    public function getImpressions(): ?float
    {
        return $this->impressions;
    }

    /**
     * @param float|null $impressions
     */
    public function setImpressions(?float $impressions): void
    {
        $this->impressions = $impressions;
    }

    /**
     * @return float|null
     */
    public function getClicks(): ?float
    {
        return $this->clicks;
    }

    /**
     * @param float|null $clicks
     */
    public function setClicks(?float $clicks): void
    {
        $this->clicks = $clicks;
    }

    /**
     * @return float|null
     */
    public function getCtr(): ?float
    {
        return $this->ctr;
    }

    /**
     * @param float|null $ctr
     */
    public function setCtr(?float $ctr): void
    {
        $this->ctr = $ctr;
    }

    /**
     * @return float|null
     */
    public function getConversions(): ?float
    {
        return $this->conversions;
    }

    /**
     * @param float|null $conversions
     */
    public function setConversions(?float $conversions): void
    {
        $this->conversions = $conversions;
    }

    /**
     * @return float|null
     */
    public function getCostPerClick(): ?float
    {
        return $this->costPerClick;
    }

    /**
     * @param float|null $costPerClick
     */
    public function setCostPerClick(?float $costPerClick): void
    {
        $this->costPerClick = $costPerClick;
    }

    /**
     * @return float|null
     */
    public function getSpend(): ?float
    {
        return $this->spend;
    }

    /**
     * @param float|null $spend
     */
    public function setSpend(?float $spend): void
    {
        $this->spend = $spend;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'date' => $this->getDate(),
            'accountId' => $this->getAccountId(),
            'impressions' => $this->getImpressions(),
            'clicks' => $this->getClicks(),
            'ctr' => $this->getCtr(),
            'conversions' => $this->getConversions(),
            'costPerClick' => $this->getCostPerClick(),
            'spend' => $this->getSpend()
        ];
    }

}
