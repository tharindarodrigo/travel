<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HotelResource\Pages;
use App\Models\Hotel;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class HotelResource extends Resource
{
    protected static ?string $model = Hotel::class;

    protected static ?string $navigationGroup = 'Hotel Management';

    protected static ?string $navigationIcon = 'heroicon-o-office-building';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('name')
                        ->rules(['required', 'max:255', 'string'])
                        ->unique(
                            'hotels',
                            'name',
                            fn (?Model $record) => $record
                        )
                        ->placeholder('Name')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('address_line_1')
                        ->rules(['required', 'max:255', 'string'])
                        ->placeholder('Address Line 1')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('address_line_2')
                        ->rules(['nullable', 'max:255', 'string'])
                        ->placeholder('Address Line 2')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('city')
                        ->rules(['required', 'max:255', 'string'])
                        ->placeholder('City')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 6,
                        ]),

                    TextInput::make('country')
                        ->rules(['required', 'max:255', 'string'])
                        ->placeholder('Country')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 6,
                        ]),

                    TextInput::make('longitude')
                        ->rules(['required', 'numeric'])
                        ->numeric()
                        ->placeholder('Longitude')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 6,
                        ]),

                    TextInput::make('latitude')
                        ->rules(['required', 'numeric'])
                        ->numeric()
                        ->placeholder('Latitude')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 6,
                            'lg' => 6,
                        ]),

                    RichEditor::make('description')
                        ->rules(['nullable', 'max:255', 'string'])
                        ->placeholder('Description')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    RichEditor::make('long_description')
                        ->rules(['nullable', 'max:255', 'string'])
                        ->placeholder('Long Description')
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
                Tables\Columns\TextColumn::make('city')->searchable()->limit(50),
                Tables\Columns\TextColumn::make('country')->limit(50),
                Tables\Columns\TextColumn::make('longitude'),
                Tables\Columns\TextColumn::make('latitude'),
                Tables\Columns\BooleanColumn::make('active'),
            ])
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                        Forms\Components\Select::make('active')
                            ->options([
                                '1' => 'Active',
                                '0' => 'Inactive',
                            ]),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['active'],
                                fn (
                                    Builder $query,
                                    $active
                                ): Builder => $query->where(
                                    'active',
                                    $active
                                )
                            )
                            ->when(
                                $data['created_from'],
                                fn (
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '>=',
                                    $date
                                )
                            )
                            ->when(
                                $data['created_until'],
                                fn (
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '<=',
                                    $date
                                )
                            );
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            HotelResource\RelationManagers\RatesRelationManager::class,
            HotelResource\RelationManagers\RoomsRelationManager::class,
            HotelResource\RelationManagers\HotelServicesRelationManager::class,
            HotelResource\RelationManagers\HotelCategoriesRelationManager::class,
            HotelResource\RelationManagers\HotelAmenitiesRelationManager::class,
            HotelResource\RelationManagers\ImagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHotels::route('/'),
            'create' => Pages\CreateHotel::route('/create'),
            'edit' => Pages\EditHotel::route('/{record}/edit'),
        ];
    }
}
