<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HotelAmenityResource\Pages;
use App\Models\HotelAmenity;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class HotelAmenityResource extends Resource
{
    protected static ?string $model = HotelAmenity::class;

    protected static ?string $navigationGroup = 'Hotel Configurations';

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('name')
                        ->rules(['required', 'max:255', 'string'])
                        ->unique(
                            'hotel_amenities',
                            'name',
                            fn(?Model $record) => $record
                        )
                        ->placeholder('Name')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    Toggle::make('active')
                        ->rules(['required', 'boolean'])
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
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->limit(50),
                Tables\Columns\BooleanColumn::make('active'),
            ])
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\Select::make('active')
                            ->options([
                                '1' => 'Active',
                                'o' => 'Inactive',
                            ])
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        $query->when(
                            $data['active'],
                            fn(
                                Builder $query,
                                        $active
                            ): Builder => $query->where(
                                'active',
                                $active
                            )
                        );

                        return $query;
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            HotelAmenityResource\RelationManagers\HotelsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHotelAmenities::route('/'),
            'create' => Pages\CreateHotelAmenity::route('/create'),
            'edit' => Pages\EditHotelAmenity::route('/{record}/edit'),
        ];
    }
}
