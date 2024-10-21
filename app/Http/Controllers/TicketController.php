<?php

namespace App\Http\Controllers;

use App\Models\TicketModel;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the tickets.
     */
    public function index()
    {
        $tickets = TicketModel::with(['user', 'seat'])->get(); // Eager load relationships
        return response()->json($tickets, 200);
    }

    /**
     * Store a newly created ticket in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'seat_model_id' => 'required|exists:seat_models,id',
            'price' => 'required|numeric|min:0',
        ]);

        $ticket = TicketModel::create($request->all());
        return response()->json([
            'message' => 'Ticket created successfully!',
            'ticket' => $ticket
        ], 201);
    }

    /**
     * Display the specified ticket.
     */
    public function show($id)
    {
        $ticket = TicketModel::with(['user', 'seat'])->find($id);

        if (!$ticket) {
            return response()->json(['message' => 'Ticket not found!'], 404);
        }

        return response()->json($ticket, 200);
    }

    /**
     * Update the specified ticket in storage.
     */
    public function update(Request $request, $id)
    {
        $ticket = TicketModel::find($id);

        if (!$ticket) {
            return response()->json(['message' => 'Ticket not found!'], 404);
        }

        $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'seat_model_id' => 'sometimes|required|exists:seat_models,id',
            'price' => 'sometimes|required|numeric|min:0',
        ]);

        $ticket->update($request->all());
        return response()->json([
            'message' => 'Ticket updated successfully!',
            'ticket' => $ticket
        ], 200);
    }

    /**
     * Remove the specified ticket from storage.
     */
    public function destroy($id)
    {
        $ticket = TicketModel::find($id);

        if (!$ticket) {
            return response()->json(['message' => 'Ticket not found!'], 404);
        }

        $ticket->delete();
        return response()->json(['message' => 'Ticket deleted successfully!'], 200);
    }
}