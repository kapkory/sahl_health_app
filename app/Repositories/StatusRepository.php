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

    public static function getUserStatus($state){
        $statuses = [
            'inactive'=>0,
            'active'=>1,
            'suspended'=>2,
            'deactivated'=>3
        ];
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

    public static function getSubscriptionStatus($state){
        $statuses = [
            'expired'=>0,
            'active'=>1
        ];
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
    public static function getInvoiceStatus($state){
        $statuses = [
            'pending'=>0,
            'send'=>1
        ];
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
    public static function getQuotationStatus($state){
        $statuses = [
            'pending'=>0,
            'send'=>1,
            'invoice_generated'=>2,
        ];
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
