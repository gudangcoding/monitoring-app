<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbsensiResource\Pages;
use App\Filament\Resources\AbsensiResource\RelationManagers;
use App\Models\Absensi;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AbsensiResource extends Resource
{
    protected static ?string $model = Absensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Absensi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('tanggal')
                    ->required()
                    ->label('Tanggal'),
                Forms\Components\Select::make('kelas_id')
                    ->relationship('kelas', 'nama')
                    ->required()
                    ->label('Kelas'),
                Forms\Components\Repeater::make('absensi_details')
                    ->relationship('absensiDetails') // relationship to AbsensiDetail
                    ->schema([
                        Forms\Components\Select::make('siswa_id')
                            ->label('Siswa')
                            ->relationship('siswa', 'nama')
                            ->required(),
                        Forms\Components\Checkbox::make('hadir')
                            ->label('Hadir')
                            ->default(false),
                        Forms\Components\Checkbox::make('alfa')
                            ->label('Alfa')
                            ->default(false),
                        Forms\Components\Checkbox::make('sakit')
                            ->label('Sakit')
                            ->default(false),
                        Forms\Components\Checkbox::make('izin')
                            ->label('Izin')
                            ->default(false),
                        Forms\Components\Textarea::make('keterangan')
                            ->label('Keterangan')
                            ->nullable(),
                    ])
                    ->columns(12)
                    ->label('Detail Absensi')
                    ->minItems(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                TextColumn::make('kelas.id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('siswa.id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('hadir'),
                TextColumn::make('alfa'),
                TextColumn::make('sakit'),
                TextColumn::make('izin'),
                TextColumn::make('keterangan')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
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
            'index' => Pages\ListAbsensis::route('/'),
            'create' => Pages\CreateAbsensi::route('/create'),
            'edit' => Pages\EditAbsensi::route('/{record}/edit'),
        ];
    }
}
