<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Helpers\CarLogic;

class CarLogicTest extends TestCase
{
    public function test_getAllCars()
    {
        $cars = [['id' => 1], ['id' => 2]];
        $this->assertEquals($cars, CarLogic::getAllCars($cars));
    }

   public function test_filterByCategory()
    {
        $cars = [
            ['id' => 1, 'TypeCar' => 'SUV'],
            ['id' => 2, 'TypeCar' => 'Sedan'],
            ['id' => 3, 'TypeCar' => 'SUV'],
        ];

        $result = CarLogic::filterByCategory($cars, 'SUV');

        $this->assertCount(2, $result);
        $this->assertEquals(1, $result[0]['id']);
        $this->assertEquals(3, $result[1]['id']);
    }

    public function test_getCarById()
    {
        $cars = [
            ['id' => 1, 'favourites_count' => 5],
            ['id' => 2],
        ];

        $car = CarLogic::getCarById($cars, 1);
        $this->assertNotNull($car);
        $this->assertEquals(1, $car['id']);

        $this->assertNull(CarLogic::getCarById($cars, 99));
    }

    public function test_getRecentCars()
    {
        $cars = [
            ['id' => 1, 'created_at' => '2024-01-01'],
            ['id' => 2, 'created_at' => '2024-05-01'],
            ['id' => 3, 'created_at' => '2024-03-01'],
            ['id' => 4, 'created_at' => '2024-06-01'],
        ];

        $result = CarLogic::getRecentCars($cars);
        $this->assertCount(3, $result);
        $this->assertEquals(4, $result[0]['id']);
    }

    public function test_getRecommendedCars()
    {
        $cars = [
            ['id' => 1, 'reviews' => [['rating' => 5]]],
            ['id' => 2, 'reviews' => [['rating' => 3]]],
            ['id' => 3, 'reviews' => []],
        ];

        $result = CarLogic::getRecommendedCars($cars);
        $this->assertCount(1, $result);
        $this->assertEquals(1, $result[0]['id']);
    }

    public function test_get_latestRentalCars()
    {
        $rentals = [];
        foreach (range(1, 10) as $i) {
        $rentals[] = ['id' => $i, 'created_at' => "2024-01-" . str_pad($i, 2, '0', STR_PAD_LEFT)];
}
        $result = CarLogic::getLatestRentals($rentals);
        $this->assertCount(5, $result);
        $this->assertEquals(10, $result[0]['id']);
    }

    public function test_get_topRentedCars()
    {
        $bookings = [];
        foreach ([1, 1, 2, 2, 2, 3, 3, 4, 5, 6] as $carId) {
            $bookings[] = ['car_id' => $carId, 'car' => ['id' => $carId]];
        }

        $result = CarLogic::getTopRentedCars($bookings);
        $this->assertCount(5, $result);
    }

   public function test_getRecentTransaction()
{
    $carIds = [6, 5, 4, 3, 2, 1, 1];
    $bookings = [];

    foreach ($carIds as $i => $carId) {
        // نبدأ من التاريخ الأخير وننقص
        $bookings[] = [
            'car' => ['id' => $carId],
            'created_at' => "2024-06-" . str_pad(30 - $i, 2, '0', STR_PAD_LEFT),
        ];
    }
    $result = CarLogic::getRecentTransactionCars($bookings);
    $this->assertCount(5, $result);
    $this->assertEquals(6, $result[0]['id']); // أحدث عربية
}


}
