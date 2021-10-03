<?php

namespace Database\Factories;

use App\Constants\RequestConstants;
use App\Models\Request;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Request::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = RequestConstants::$REQUEST_STATUSES;
        $type   = RequestConstants::$type;

        $randomStatus = $status[(rand(0, count($status) - 1))];

        $paid_at = '';
        if ($randomStatus == RequestConstants::REQUEST_STATUS_ACCEPTED) {
            $paid_at = Carbon::now();
        } else {
            $paid_at = null;
        }

        return [
            'amount'       => rand(9999, 99999),
            'type'         => $type[rand(0, 1)],
            'status'       => $randomStatus,
            'paid_at'      => $paid_at,
            'description'  => $this->faker->text,
            'reference_id' => rand(11111111, 99999999),
            'wallet_id'    => Wallet::all()->random(1)->first()->id,
        ];
    }
}
