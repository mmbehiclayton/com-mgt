<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\ComplaintResource\Pages;
use App\Filament\App\Resources\ComplaintResource\RelationManagers;
use App\Models\Complaint;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComplaintResource extends Resource
{
    protected static ?string $model = Complaint::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();

        // Admins see all complaints, others see only their complaints
        return $user->is_admin ? parent::getEloquentQuery() : parent::getEloquentQuery()->where('user_id', $user->id);
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
            Forms\Components\Textarea::make('description')->required(),
            Forms\Components\Select::make('status')
                ->options([
                    'Pending' => 'Pending',
                    'Processing' => 'Processing',
                    'Resolved' => 'Resolved',
                ])
                ->default('Pending')
                ->visible(fn () => auth()->user()?->is_admin), // Fixed potential null issue
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Complainant'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'warning' => 'Pending',
                        'info' => 'Processing',
                        'success' => 'Resolved',
                    ]),
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn () => auth()->user()->is_admin),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->visible(fn () => auth()->user()->is_admin), // Only admins can delete
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
            'index' => Pages\ListComplaints::route('/'),
            'create' => Pages\CreateComplaint::route('/create'),
            'edit' => Pages\EditComplaint::route('/{record}/edit'),
        ];
    }
}
