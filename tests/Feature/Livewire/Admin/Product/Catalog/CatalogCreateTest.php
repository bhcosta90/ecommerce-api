<?php

declare(strict_types = 1);

use App\Enums\Catalog\Situation;
use App\Enums\Product\Availability;
use App\Livewire\Admin\Product\Catalog\Create;
use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Livewire\livewire;

beforeEach(function (): void {
    Gate::shouldReceive('authorize')
        ->with('create', Catalog::class)
        ->andReturn(true)
        ->between(1, 2);
});

test('it can create a product', function (): void {
    livewire(Create::class)
        ->set('form', [
            'name'         => 'testing',
            'price_sale'   => 10.75,
            'price_cost'   => 7.75,
            'available_at' => Availability::EIGHT_DAYS->value,
            'situation'    => Situation::NEW->value,
        ])
        ->call('generateSku')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('form', function ($data): true {
            assertDatabaseCount(Catalog::class, 1);
            assertDatabaseHas(Catalog::class, [
                'name' => 'testing',
            ]);

            assertDatabaseCount(Product::class, 1);
            assertDatabaseHas(Product::class, [
                'id'         => $data->catalog->id,
                'price_sale' => 1075,
                'price_cost' => 775,
            ]);

            return true;
        })
        ->assertOk();
});
