<?php

class PrimeNumbers
{
    private $limit;
    private $primes = [];

    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }

    public function findPrimes(): array
    {
        // Инициализация массива, где индекс является числом, а значение - булево значение (true - простое число, false - составное)
        $sieve = array_fill(0, $this->limit + 1, true);
        $sieve[0] = $sieve[1] = false; // 0 и 1 не являются простыми числами

        for ($p = 2; $p * $p <= $this->limit; $p++) {
            if ($sieve[$p] === true) {
                // Обнуляем все кратные p, начиная с p^2
                for ($i = $p * $p; $i <= $this->limit; $i += $p) {
                    $sieve[$i] = false;
                }
            }
        }

        // Собираем все числа, оставшиеся простыми
        for ($p = 2; $p <= $this->limit; $p++) {
            if ($sieve[$p] === true) {
                $this->primes[] = $p;
            }
        }

        return $this->primes;
    }
}

// Пример использования
$limit = 1000000; // Задаем верхнюю границу для поиска простых чисел
$primeNumbers = new PrimeNumbers($limit);
$primes = $primeNumbers->findPrimes();

echo "Простые числа до $limit:\n";
foreach ($primes as $prime) {
    echo $prime . " ";
}