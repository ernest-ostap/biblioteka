<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'client_id',
        'book_id',
        'reserved_from',
        'reserved_to',
        'is_approved',
    ];

    protected $casts = [
        'reserved_from' => 'date',
        'reserved_to' => 'date',
        'is_approved' => 'boolean',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
