<?php

declare(strict_types = 1);

namespace Costa\Package\Model\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait ActionTrait
{
    public function actions(): Attribute
    {
        return Attribute::get(fn () => (object) $this->setActions());
    }

    protected static function bootActionTrait(): void
    {
        parent::deleting(function ($model) {
            if (!property_exists($model->actions, 'can_delete')) {
                return;
            }

            abort_unless(
                $model->actions->can_delete,
                403,
                __('It is not possible to delete')
            );
        });
    }

    protected function setActions(): array
    {
        return [];
    }
}
