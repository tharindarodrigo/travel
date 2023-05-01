<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RateResource\Pages;
use App\Models\Rate;
use App\Rules\RateRule;
use Filament\Forms;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RateResource extends Resource
{
    protected static ?string $model = Rate::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $recordTitleAttribute = 'from';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
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
                        ->rules(['required'])
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
                        ->rules(['required', 'date', new RateRule])
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

                    BelongsToSelect::make('room_id')
                        ->rules(['required', 'exists:rooms,id'])
                        ->relationship('room', 'name')
                        ->searchable()
                        ->placeholder('Room')
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
                Tables\Filters\Filter::make('available')
                    ->form([
                        Forms\Components\DatePicker::make('from'),
                        Forms\Components\DatePicker::make('to'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn (
                                    Builder $query,
                                    $date
                                ): Builder => $query
                                    ->whereDate('from', '<=', $date)
                                    ->whereDate('to', '>=', $date)
                            )
                            ->when(
                                $data['to'],
                                fn (
                                    Builder $query,
                                    $date
                                ): Builder => $query
                                    ->orWhereDate('to', '>=', $date)
                                    ->whereDate('from', '<=', $date)

                            );
                    }),

                SelectFilter::make('hotel_id')->relationship(
                    'hotel',
                    'name',
                    function () {
                        return \App\Models\Hotel::whereHas('rooms');
                    }
                )->searchable(),

                SelectFilter::make('room_id')->relationship(
                    'room',
                    'name'
                ),
            ])
            ->bulkActions([
                BulkAction::make('Reserve')
                    ->form([
                        //Add form fields for from and To
                        Forms\Components\DatePicker::make('from'),
                        Forms\Components\DatePicker::make('to'),
                    ])->action(function (Collection $records, array $data) {
                        $records->each(function (Rate $rate) use ($data) {
                            $rate->room->reserve($data['from'], $data['to']);
                        });
                    })
                    ->deselectRecordsAfterCompletion(),

            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRates::route('/'),
            'create' => Pages\CreateRate::route('/create'),
            'edit' => Pages\EditRate::route('/{record}/edit'),
        ];
    }
}
