<?php
namespace App\Repositories;


class StatusRepository
{
    public static function getInstitutionStatus($state){
        $statuses = [
            'inactive'=>0,
            'active'=>1,
            'rejected'=>2
        ];
        return self::returnState($state,$statuses);
    }

    public static function getMemberPaymentStatus($state){
        $statuses = [
            'processing'=>1,
            'paid'=>2,
            'failed'=>3
        ];
        return self::returnState($state,$statuses);
    }

    public static function getMemberPackageStatus($state){
        $statuses = [
            'inactive'=>0,
            'active'=>1,
        ];
        return self::returnState($state,$statuses);
    }

    public static function getReferralStatus($state){
        $statuses = [
            'inactive'=>0,//where client has not paid
            'active'=>1,//one where he can view or request withdrawal
            'paid'=>2,// Referrer has been paid
        ];

        return self::returnState($state,$statuses);
    }

    public static function getUserStatus($state){
        $statuses = [
            'inactive'=>0,
            'active'=>1,
            'suspended'=>2,
            'deactivated'=>3
        ];
        return self::returnState($state,$statuses);
    }

    public static function getSubscriptionStatus($state){
        $statuses = [
            'expired'=>0,
            'active'=>1
        ];
        return self::returnState($state,$statuses);
    }
    public static function getInvoiceStatus($state){
        $statuses = [
            'pending'=>0,
            'send'=>1
        ];
        return self::returnState($state,$statuses);
    }
    public static function getQuotationStatus($state){
        $statuses = [
            'pending'=>0,
            'send'=>1,
            'invoice_generated'=>2,
        ];
        return self::returnState($state,$statuses);

    }
    public static function returnState($state,$statuses){
        if(is_numeric($state))
            $statuses = array_flip($statuses);
        if(is_array($state)){
            $states  = [];
            foreach($state as $st){
                $states[] = $statuses[$st];
            }
            return $states;
        }
        return $statuses[$state];
    }
}
