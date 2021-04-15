<?php 

namespace App;

interface StorageInterface
{
    public function add(array $item, $quantity = 1): void;

    public function remove(int $id): void;

    public function update(int $id, int $quantity): void;

    public function all(): array;

    public function clear(): void;

    public function sum(): float;

    public function count(): int;
}