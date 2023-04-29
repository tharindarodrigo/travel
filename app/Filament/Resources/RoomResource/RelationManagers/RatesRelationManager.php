<?php

namespace App\Filament\Resources\RoomResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\{Form, Table};
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Tables\Filters\MultiSelectFilter;
use Filament\Resources\RelationManagers\HasManyRelationManager;

class RatesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'rates';

    protected static ?string $recordTitleAttribute = 'from';


    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([
                TextInput::make('adults')
                    ->rules(['required', 'max:255'])
                    ->placeholder('Adults')
                    ->default('1')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 4,
                    ]),

                TextInput::make('children')
                    ->rules(['required', 'max:255'])
                    ->placeholder('Children')
                    ->default('0')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 4,
                    ]),

                Select::make('basis')
                    ->rules(['required', 'in:ro,bb,hb,fb,ai'])
                    ->searchable()
                    ->options([
                        'RO' => 'RO',
                        'BB' => 'BB',
                        'HB' => 'HB',
                        'FB' => 'FB',
                        'Ai' => 'AI',
                    ])
                    ->placeholder('Basis')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 4,
                    ]),

                DatePicker::make('from')
                    ->rules(['required', 'date'])
                    ->placeholder('From')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 6,
                    ]),

                DatePicker::make('to')
                    ->rules(['required', 'date'])
                    ->placeholder('To')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 6,
                    ]),

                TextInput::make('price')
                    ->rules(['required', 'numeric'])
                    ->numeric()
                    ->placeholder('Price')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                BelongsToSelect::make('hotel_id')
                    ->rules(['required', 'exists:hotels,id'])
                    ->relationship('hotel', 'name')
                    ->searchable()
                    ->placeholder('Hotel')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('adults')->limit(50),
                Tables\Columns\TextColumn::make('children')->limit(50),
                Tables\Columns\TextColumn::make('basis')->enum([
                    'RO' => 'RO',
                    'BB' => 'BB',
                    'HB' => 'HB',
                    'FB' => 'FB',
                    'Ai' => 'AI',
                ]),
                Tables\Columns\TextColumn::make('from')->date(),
                Tables\Columns\TextColumn::make('to')->date(),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('hotel.name')->limit(50),
                Tables\Columns\TextColumn::make('room.name')->limit(50),
            ])
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(
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
                                fn(
                                    Builder $query,
                                    $date
                                ): Builder => $query->whereDate(
                                    'created_at',
                                    '<=',
                                    $date
                                )
                            );
                    }),

                MultiSelectFilter::make('hotel_id')->relationship(
                    'hotel',
                    'name'
                ),

                MultiSelectFilter::make('room_id')->relationship(
                    'room',
                    'name'
                ),
            ]);
    }
}
