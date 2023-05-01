<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\MultiSelectFilter;
use Illuminate\Database\Eloquent\Builder;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationGroup = 'Hotel Management';

    protected static ?string $navigationIcon = 'heroicon-o-view-grid';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
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

                    TextInput::make('name')
                        ->rules(['required', 'max:255', 'string'])
                        ->placeholder('Name')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('count')
                        ->rules(['required', 'numeric'])
                        ->numeric()
                        ->placeholder('Count')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 6,
                        ]),

                    Toggle::make('is_active')
                        ->rules(['required', 'boolean'])
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 6,
                        ]),

                    RichEditor::make('description')
                        ->rules(['required', 'max:255', 'string'])
                        ->placeholder('Description')
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
                Tables\Columns\TextColumn::make('hotel.name')->limit(50),
                Tables\Columns\TextColumn::make('name')->limit(50),
                Tables\Columns\TextColumn::make('count'),
                Tables\Columns\BooleanColumn::make('is_active'),
                Tables\Columns\TextColumn::make('description')->limit(50),
            ])
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('from'),
                        Forms\Components\DatePicker::make('to'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return
                            $query->when(
                                $data['from'],
                                fn (Builder $query, $from) => $query->whereHas('rates',
                                    fn (Builder $query) => $query->whereDate('from', '<=', $from))
                            )->when(
                                $data['to'],
                                fn (Builder $query, $to) => $query->whereHas('rates',
                                    fn (Builder $query) => $query->whereDate('to', '>=', $to))
                            );

                    }),

                MultiSelectFilter::make('hotel_id')->relationship(
                    'hotel',
                    'name'
                ),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RoomResource\RelationManagers\RatesRelationManager::class,
            RoomResource\RelationManagers\ImagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
