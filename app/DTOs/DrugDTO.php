<?php

namespace App\DTOs;

class DrugDTO
{
    public string $name;
    public int $count;
    public string $disease;
    public float $price;
    public int $pharmacy_id;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->count = (int) $data['count'];
        $this->disease = $data['disease'];
        $this->price = (float) $data['price'];
        $this->pharmacy_id = (int) $data['pharmacy_id'];
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'count' => $this->count,
            'disease' => $this->disease,
            'price' => $this->price,
            'pharmacy_id' => $this->pharmacy_id,
        ];
    }
}