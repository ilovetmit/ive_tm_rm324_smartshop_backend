<?php

use Illuminate\Database\Seeder;
use App\Models\InformationManagement\BankAccount;

class BankAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(BankAccount::class,2)->create();

        $bankAccount = [
            [
                'user_id'           =>  1,
                'current_account'   =>  100,
                'saving_account'    =>  100,
            ],
            [
                'user_id'           =>  2,
                'current_account'   =>  100,
                'saving_account'    =>  100,
            ],
        ];
        BankAccount::insert($bankAccount);
    }
}
