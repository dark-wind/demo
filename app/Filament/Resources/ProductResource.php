<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Actions;
use App\Filament\Roles;
use App\Models;
use Filament\Resource;
use Filament\Resources\Columns;
use Filament\Resources\Fields;

class ProductResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static $model = Models\Product::class;

    public static function authorization()
    {
        return [
            //
        ];
    }

    public static function columns()
    {
        return [
            Columns\Text::make('name')
                ->searchable()
                ->sortable()
                ->primary(),
            Columns\Text::make('price')
                ->searchable()
                ->sortable()
                ->currency(),
        ];
    }

    public static function fields()
    {
        return [
            Fields\Fieldset::make()->fields([
                Fields\Text::make('name')
                    ->placeholder('Name')
                    ->autofocus()
                    ->required(),
                Fields\Text::make('price')
                    ->placeholder('Price')
                    ->type('number')
                    ->min(0)
                    ->required(),
            ]),
            Fields\RichEditor::make('description')
                ->placeholder('Description')
                ->attachmentDirectory('product-attachments'),
            Fields\Tags::make('tags')
                ->placeholder('Tags'),
            Fields\Fieldset::make()->fields([
                Fields\File::make('image')->image(),
            ]),
        ];
    }

    public static function routes()
    {
        return [
            Actions\ListProducts::route('/', 'index'),
            Actions\CreateProduct::route('/create', 'create'),
            Actions\EditProduct::route('/{record}/edit', 'edit'),
        ];
    }
}
