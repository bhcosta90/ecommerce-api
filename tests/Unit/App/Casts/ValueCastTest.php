<?php

declare(strict_types = 1);

use App\Casts\ValueCast;
use Illuminate\Database\Eloquent\Model;

it('returns null when value is not set in get method', function (): void {
    $cast  = new ValueCast(2);
    $model = Mockery::mock(Model::class);
    expect($cast->get($model, 'key', null, []))->toBeNull();
});

it('returns correct value in get method', function (): void {
    $cast  = new ValueCast(2);
    $model = Mockery::mock(Model::class);
    expect($cast->get($model, 'key', 123, []))->toBe(1.23);
});

it('returns correct value in get method with 3 decimal house', function (): void {
    $cast  = new ValueCast(3);
    $model = Mockery::mock(Model::class);
    expect($cast->get($model, 'key', 1256, []))->toBe(1.256);
});

it('returns null when value is not set in set method', function (): void {
    $cast  = new ValueCast(2);
    $model = Mockery::mock(Model::class);
    expect($cast->set($model, 'key', null, []))->toBeNull();
});

it('returns correct value in set method', function (): void {
    $cast  = new ValueCast(2);
    $model = Mockery::mock(Model::class);
    expect($cast->set($model, 'key', 102.98, []))->toBe(10298);
});

it('returns correct value in set method with 3 decimal house', function (): void {
    $cast  = new ValueCast(3);
    $model = Mockery::mock(Model::class);
    expect($cast->set($model, 'key', 102.988, []))->toBe(102988);
});
