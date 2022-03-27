<?php

namespace App;

use App\Document\Account;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;

class AccountRepository extends DocumentRepository
{

    public function __construct(DocumentManager $dm)
    {
        parent::__construct($dm, $dm->getUnitOfWork(), $dm->getClassMetadata(Account::class));
    }

    public function getAll()
    {
        $dm = $this->getDocumentManager();
        $builder = $dm->createAggregationBuilder(Account::class);
        $builder
            ->lookup('Metrics')
            ->localField('_id')
            ->foreignField('accountId')
            ->alias('metrics')
            ->unwind('$metrics')
                ->preserveNullAndEmptyArrays(true)
            ->match()
                ->field('status')->equals('ACTIVE')
            ->group()
                ->field('_id')
                ->expression('$_id')
                ->field('accountName')
                ->first('$accountName')
                ->field('accountId')
                ->first('$accountId')
                ->field('spend')
                ->sum('$metrics.spend')
                ->field('clicks')
                ->sum('$metrics.clicks')
                ->field('impressions')
                ->sum('$metrics.impressions')
            ->addFields()
                ->field('costPerClick')
                    ->cond(
                        $builder->expr()->eq('$clicks', 0),
                        0,
                        ['$divide' => ['$spend', '$clicks' ] ]
                    )
            ->sort(['_id' => 1]);

        $aggregation = $builder->getAggregation();
        $aggregation->getIterator()->toArray();

        return $aggregation;

    }

    public function findOne($accountId = null)
    {
        $dm = $this->getDocumentManager();
        $builder = $dm->createAggregationBuilder(Account::class);
        $builder
            ->lookup('metrics')
            ->localField('_id')
            ->foreignField('accountId')
            ->alias('metrics')
            ->unwind('$metrics')// dejando en un objeto (No en un arreglo)
                ->preserveNullAndEmptyArrays(true)
            ->match()
                ->field('status')->equals('ACTIVE')
                ->field('accountId')->equals($accountId)
            ->group()
                ->field('_id')
                ->expression('$_id')
                ->field('accountName')
                ->first('$accountName')
                ->field('accountId')
                ->first('$accountId')
                ->field('spend')
                ->sum('$metrics.spend')
                ->field('clicks')
                ->sum('$metrics.clicks')
                ->field('impressions')
                ->sum('$metrics.impressions')
            ->addFields()
                ->field('costPerClick')
                    ->cond(
                        $builder->expr()->eq('$clicks', 0),
                        0,
                        ['$divide' => ['$spend', '$clicks' ] ]
                    )
            ->sort(['_id' => 1]);

        $aggregation = $builder->getAggregation();
        $aggregation->getIterator()->toArray();

        return $aggregation;
    }

}
