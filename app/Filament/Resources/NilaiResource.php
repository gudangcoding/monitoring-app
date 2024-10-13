<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NilaiResource\Pages;
use App\Filament\Resources\NilaiResource\RelationManagers;
use App\Models\Nilai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NilaiResource extends Resource
{
    protected static ?string $model = Nilai::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('siswa_id')
                    ->relationship('siswa', 'id')
                    ->required(),
                Forms\Components\Select::make('mata_pelajaran_id')
                    ->relationship('mataPelajaran', 'id')
                    ->required(),
                Forms\Components\TextInput::make('nilai_tugas')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nilai_uts')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nilai_uas')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('tahun_ajaran_id')
                    ->relationship('tahunAjaran', 'id')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('siswa.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mataPelajaran.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nilai_tugas')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nilai_uts')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nilai_uas')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahunAjaran.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNilais::route('/'),
            'create' => Pages\CreateNilai::route('/create'),
            'edit' => Pages\EditNilai::route('/{record}/edit'),
        ];
    }
}
