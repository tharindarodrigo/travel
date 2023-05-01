<?php

namespace App\Filament\Resources\HotelResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\MorphManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class ImagesRelationManager extends MorphManyRelationManager
{
    protected static string $relationship = 'images';

    protected static ?string $recordTitleAttribute = 'image';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 0])->schema([
                TextInput::make('imageable_id')
                    ->rules(['required', 'max:255'])
                    ->placeholder('Imageable Id')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                TextInput::make('imageable_type')
                    ->rules(['required', 'max:255', 'string'])
                    ->placeholder('Imageable Type')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                FileUpload::make('image')
                    ->rules(['image', 'max:1024', 'required'])
                    ->image()
                    ->placeholder('Image')
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
                Tables\Columns\TextColumn::make('imageable_id')->limit(50),
                Tables\Columns\TextColumn::make('imageable_type')->limit(50),
                Tables\Columns\ImageColumn::make('image')->rounded(),
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
