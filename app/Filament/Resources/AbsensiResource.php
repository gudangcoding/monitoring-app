<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbsensiResource\Pages;
use App\Filament\Resources\AbsensiResource\RelationManagers;
use App\Models\Absensi;
use App\Models\Siswa;
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
                    ->label('Pilih Kelas')
                    ->relationship('kelas', 'nama')
                    ->required()
                    ->preload()
                    ->createOptionForm(fn(Form $form) => KelasResource::form($form) ?? [])
                    ->editOptionForm(fn(Form $form) => KelasResource::form($form) ?? [])
                    ->reactive() // Menjadikan kelas_id dinamis
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('siswa_list', Siswa::where('kelas_id', $state)->get());
                    }),

                Forms\Components\View::make('components.siswa-table')
                    ->label('Detail Absensi')
                    ->visible(fn($get) => $get('kelas_id')) // Tampilkan jika kelas_id sudah dipilih
                    ->statePath('siswa_list')
                    ->dehydrated(false),
            ]);
    }

    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * Override the table definition for the resource.
     *
     * @param \Filament\Tables\Table $table
     * @return \Filament\Tables\Table
     */
    /******  11c9515c-e79f-40e3-bcfe-737bf9eae8d1  *******/
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal')->label('Tanggal'),
                Tables\Columns\TextColumn::make('kelas.nama')->label('Kelas'),
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
