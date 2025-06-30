<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Client;
use App\Models\Book;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['client', 'book'])->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $clients = Client::all();
        $books = Book::all();
        return view('reservations.create', compact('clients', 'books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'book_id' => 'required|exists:books,id',
            'reserved_from' => 'required|date',
            'reserved_to' => 'required|date|after_or_equal:reserved_from',
            'is_approved' => 'boolean',
        ]);
        Reservation::create($validated);
        return redirect()->route('reservations.index')->with('success', 'Rezerwacja dodana pomyślnie.');
    }

    public function show(Reservation $reservation)
    {
        $reservation->load(['client', 'book']);
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $clients = Client::all();
        $books = Book::all();
        return view('reservations.edit', compact('reservation', 'clients', 'books'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'book_id' => 'required|exists:books,id',
            'reserved_from' => 'required|date',
            'reserved_to' => 'required|date|after_or_equal:reserved_from',
            'is_approved' => 'boolean',
        ]);
        $reservation->update($validated);
        return redirect()->route('reservations.index')->with('success', 'Rezerwacja zaktualizowana pomyślnie.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Rezerwacja usunięta.');
    }
} 