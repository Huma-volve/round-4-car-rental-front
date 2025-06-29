<?php
namespace App\Helpers;
class CarLogic
{
    // index(): Get all cars (logic only)
    public static function getAllCars(array $cars): array
    {
        return $cars;
    }

    // filterByCategory(): Filter cars by category
    public static function filterByCategory(array $cars, string $category): array
    {
        return array_values(array_filter($cars, fn($car) => $car['TypeCar'] === $category));
    }

    // show(): Get car details by ID
    public static function getCarById(array $cars, int $id): ?array
    {
        foreach ($cars as $car) {
            if ($car['id'] === $id) {
                $car['favourites_count'] = $car['favourites_count'] ?? 0;
                return $car;
            }
        }
        return null;
    }
    // recent(): Get 3 most recent cars
    public static function getRecentCars(array $cars): array
    {
        usort($cars, fn($a, $b) => strtotime($b['created_at']) <=> strtotime($a['created_at']));
        return array_slice($cars, 0, 3);
    }
    // recommended(): Cars with rating >= 4
    public static function getRecommendedCars(array $cars): array
    {
        return array_values(array_filter($cars, function ($car) {
            if (!isset($car['reviews']) || !is_array($car['reviews'])) return false;
            foreach ($car['reviews'] as $review) {
                if ($review['rating'] >= 4) return true;
            }
            return false;
        }));
    }
    // rentalDetails(): Get latest 5 rentals
    public static function getLatestRentals(array $rentals): array
    {
        usort($rentals, fn($a, $b) => strtotime($b['created_at']) <=> strtotime($a['created_at']));
        return array_slice($rentals, 0, 5);
    }
    // topRentedCars(): Top 5 cars by booking count
    public static function getTopRentedCars(array $bookings): array
    {
        $carCounts = [];
        foreach ($bookings as $booking) {
            $carId = $booking['car_id'];
            $carCounts[$carId] = ($carCounts[$carId] ?? 0) + 1;
        }

        arsort($carCounts);
        $topCarIds = array_slice(array_keys($carCounts), 0, 5);

        $cars = [];
        foreach ($bookings as $booking) {
            if (in_array($booking['car_id'], $topCarIds)) {
                $cars[$booking['car_id']] = $booking['car'];
            }
        }

        return array_values($cars);
    }
    // recentTransactions(): Last 5 unique cars from bookings
    public static function getRecentTransactionCars(array $bookings): array
    {
        usort($bookings, fn($a, $b) => strtotime($b['created_at']) <=> strtotime($a['created_at']));
        $unique = [];
        foreach ($bookings as $booking) {
            $car = $booking['car'];
            if (!isset($unique[$car['id']])) {
                $unique[$car['id']] = $car;
                if (count($unique) >= 5) break;
            }
        }
        return array_values($unique);
    }
}
