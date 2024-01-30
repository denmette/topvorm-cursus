<?php

namespace App\Models;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'url',
        'start_date',
        'end_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'event_id' => 'integer',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public static function getForm(int $eventId = null): array
    {
        return [
            Select::make('event_id')
                ->hidden(function() use ($eventId) {
                    return $eventId !== null;
                })
                ->relationship('event', 'name')
                ->columnSpanFull()
                ->required(),
            TextInput::make('url')
                ->columnSpanFull()
                ->required()
                ->maxLength(300),
            DateTimePicker::make('start_date')
                ->native(false)
                ->required(),
            DateTimePicker::make('end_date')
                ->native(false)
                ->required(),
        ];
    }
}
