<?php

use App\Customer_review;
use Illuminate\Database\Seeder;

class CustomerReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Customer_review::class, 4)->create()->each(function ($customerReview) {
            $customerReview->save();
        });
    }
}
