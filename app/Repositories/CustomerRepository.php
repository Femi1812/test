<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository{

    public function all(){

        return Customer::orderby('name')
            //->where('active',1)
            ->get()
            ->map(function ($customer) {
               $this->format($customer);
            });
    }

    public function findById($customerid){
        $customer =  Customer::where('id', $customerid)
        ->where('active', 0)
        ->firstOrFail();

        return $this->format($customer);
    }

    //use this to reference from inside this repo
    protected function format($customer){
        return [
            'name' => $customer->name,
            'address' => $customer->address,
            'email' => $customer->email,
            'status' => $customer->active,
            'date' => $customer->updated_at->diffForHumans()
        ];

    }
}