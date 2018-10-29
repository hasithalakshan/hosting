<?php

use Illuminate\Database\Seeder;

class SharedHostingPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shared_hosting_plans')->insert(array([
            'price' => '60',
            'SSH' => '200',
            'type' => 'personal',
            'storage' => '4',
            'bandwidth' => '200',
            'no_of_email_account' => '100',
            'cron_job' => '1',
        ],

            [
            'price' => '80',
            'SSH' => '300',
            'type' => 'professional',
            'storage' => '8',
            'bandwidth' => '400',
            'no_of_email_account' => '200',
            'cron_job' => '2',
        ],
            [
            'price' => '99',
            'SSH' => '500',
            'type' => 'business',
            'storage' => '8',
            'bandwidth' => '800',
            'no_of_email_account' => '500',
            'cron_job' => '2',
            ]

        ));
    }
}
