<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Actions;
use App\Filament\Roles;
use App\Models;
use Filament\Resource;
use Filament\Resources\Columns;
use Filament\Resources\Fields;

class OrderResource extends Resource
{
    public static $icon = 'heroicon-o-currency-dollar';

    public static $model = Models\Order::class;

    public static function authorization()
    {
        return [
            //
        ];
    }

    public static function columns()
    {
        return [
            Columns\Text::make('customer.name')->searchable()->sortable(),
        ];
    }

    public static function fields()
    {
        return [
            Fields\RichEditor::make('notes')
                ->placeholder('Notes'),
        ];
    }

    public static function routes()
    {
        return [
            Actions\ListOrders::route('/', 'index'),
            Actions\CreateOrder::route('/create', 'create'),
            Actions\EditOrder::route('/{record}/edit', 'edit'),
        ];
    }
}
