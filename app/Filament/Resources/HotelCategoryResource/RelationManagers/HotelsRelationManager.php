<?php

namespace App\Filament\Resources\HotelCategoryResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class HotelsRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'hotels';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([
                TextInput::make('name')
                    ->rules(['required', 'max:255', 'string'])
                    ->unique('hotels', 'name', fn (?Model $record) => $record)
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
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('country')
                    ->rules(['required', 'max:255', 'string'])
                    ->placeholder('Country')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('longitude')
                    ->rules(['required', 'numeric'])
                    ->numeric()
                    ->placeholder('Longitude')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('latitude')
                    ->rules(['required', 'numeric'])
                    ->numeric()
                    ->placeholder('Latitude')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
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
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->limit(50),
                Tables\Columns\TextColumn::make('address_line_1')->limit(50),
                Tables\Columns\TextColumn::make('address_line_2')->limit(50),
                Tables\Columns\TextColumn::make('city')->limit(50),
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
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
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
}
