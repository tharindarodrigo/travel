<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HotelCategoryResource\Pages;
use App\Models\HotelCategory;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class HotelCategoryResource extends Resource
{
    protected static ?string $model = HotelCategory::class;

    protected static ?string $navigationGroup = 'Hotel Configurations';

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('name')
                        ->rules(['required', 'max:255', 'string'])
                        ->unique(
                            'hotel_categories',
                            'name',
                            fn(?Model $record) => $record
                        )
                        ->placeholder('Name')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([Tables\Columns\TextColumn::make('name')->searchable()->limit(50)])
            ->filters([

            ]);
    }

    public static function getRelations(): array
    {
        return [
            HotelCategoryResource\RelationManagers\HotelsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHotelCategories::route('/'),
            'create' => Pages\CreateHotelCategory::route('/create'),
            'edit' => Pages\EditHotelCategory::route('/{record}/edit'),
        ];
    }
}
