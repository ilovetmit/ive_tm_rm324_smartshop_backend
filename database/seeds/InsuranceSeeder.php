<?php

use App\Models\Insurance;
use Illuminate\Database\Seeder;

class InsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Insurance::create([
            "name" => "SIMPLY LOVE ENCORE 2",
            "description" => "Enables you to enjoy convenient wealth management with attractive returns.",
            "price" => serialize([
                'monthly' => 49,
                'quarterly' => 99,
                'yearly' => 139,
            ]),
            "image" => serialize(array('images/in/1.png')),
            "detail" => null,
        ]);
        Insurance::create([
            "name" => "ADMIRE LIFE 2",
            "description" => "Gives you a lifetime protection and stable returns to let you enjoy life with your loved ones.",
            "price" => serialize([
                'monthly' => 59,
                'quarterly' => 109,
                'yearly' => 149,
            ]),
            "image" => serialize(array('images/in/2.jpg')),
            "detail" => null,
        ]);
        Insurance::create([
            "name" => "FOREVER LOVE COUPON PLAN 5",
            "description" => "A wealth accumulation plan with guaranteed cash payments, to helps you make promises that endure.",
            "price" => serialize([
                'monthly' => 69,
                'quarterly' => 119,
                'yearly' => 159,
            ]),
            "image" => serialize(array('images/in/3.jpg')),
            "detail" => null,
        ]);
        Insurance::create([
            "name" => "DEFERRED ANNUITY PLAN",
            "description" => "Enjoy tax deduction of up to HK$60,000 per taxpayer each year and guaranteed Monthly Annuity Payment with flexible annuity arrangement for your retirement.",
            "price" => serialize([
                'monthly' => 39,
                'quarterly' => 89,
                'yearly' => 129,
            ]),
            "image" => serialize(array('images/in/4.jpg')),
            "detail" => null,
        ]);
        Insurance::create([
            "name" => "SPRING INCOME PLAN",
            "description" => "Not only does it guarantee a stable income, it lets you flexibly withdraw funds and change the length of your income period to suit your financial needs.",
            "price" => serialize([
                'monthly' => 199,
                'quarterly' => 299,
                'yearly' => 399,
            ]),
            "image" => serialize(array('images/in/5.jpg')),
            "detail" => null,
        ]);
        Insurance::create([
            "name" => "GOLDEN YEARS INCOME PLAN",
            "description" => "Offers guaranteed monthly income for your retirement.",
            "price" => serialize([
                'monthly' => 99,
                'quarterly' => 199,
                'yearly' => 299,
            ]),
            "image" => serialize(array('images/in/6.jpg')),
            "detail" => null,
        ]);
        Insurance::create([
            "name" => "EXECUTIVE LIFE",
            "description" => "Suits your budget while offering lifelong protection and wealth accumulation.",
            "price" => serialize([
                'monthly' => 89,
                'quarterly' => 159,
                'yearly' => 199,
            ]),
            "image" => serialize(array('images/in/7.jpg')),
            "detail" => null,
        ]);
        Insurance::create([
            "name" => "KISS KIDS EDUCATION PLAN",
            "description" => "Designed with a specific goal in mind – financing your child’s higher education.",
            "price" => serialize([
                'monthly' => 49,
                'quarterly' => 99,
                'yearly' => 139,
            ]),
            "image" => serialize(array('images/in/8.jpg')),
            "detail" => null,
        ]);
    }
}
