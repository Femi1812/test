<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository{

    public function all(){

        return Customer::orderby('name')
            //->where('active',1)
            ->get()
            ->map(function ($customer) {
                return [
                    'name' => $customer->name,
                    'address' => $customer->address,
                    'email' => $customer->email,
                    'status' => $customer->active,
                    'date' => $customer->updated_at->diffForHumans()
                ];
            });
    }

    public function findById($customerid){
        return Customer::where('id', $customerid)
        ->where('active', 0)
        ->firstOrFail();

    }
}