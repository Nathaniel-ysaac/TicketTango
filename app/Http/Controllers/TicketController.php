<?php

namespace App\Http\Controllers;

use App\Models\TicketModel;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $json_body = $request->json()->all();
        TicketModel::create([
            "TicketType" => $json_body["tickettype"],
            "Price" => $json_body["price"],
            "ReservationID" => $json_body["ReservationID"], // Make sure you include the ReservationID
        ]);
        return response("Successfully Created.", 201); // Return 201 for created response
    }

    // Display the specified resource.
    public function show(Request $request, string $id)
    {
        $json_body = $request->json()->all();

        // Find the ticket by ReservationID
        $ticket = TicketModel::where("ReservationID", $json_body["ReservationID"])->first();

        // Check if the ticket exists
        if (!$ticket) {
            return response("Ticket does not exist.", 404);
        }

        // Check if the ticket type and price match
        if ($json_body["tickettype"] === $ticket->TicketType && $json_body["price"] === $ticket->Price) {
            return response()->json([
                'ReservationID' => $ticket->ReservationID,
                'TicketType' => $ticket->TicketType,
                'Price' => $ticket->Price,
            ], 200);
        }

        return response("Ticket data does not match.", 401);
    }

    // Update the specified resource in storage.
    public function update(Request $request, string $id)
    {
        $json_body = $request->json()->all();

        $ticket = TicketModel::find($id);

        // Check if the ticket exists
        if (!$ticket) {
            return response("Ticket does not exist.", 404);
        }

        // Check if the current ticket matches
        if ($ticket->ticketid === $json_body["ticketid"]) {
            // Update the ticket
            $ticket->TicketType = $json_body["new_tickettype"]; // Make sure to include the new ticket type
            $ticket->Price = $json_body["new_price"]; // Include new price if applicable
            $ticket->save();

            return response("Ticket successfully updated.", 200);
        }

        return response("Ticket ID mismatch.", 401);
    }

    // Remove the specified resource from storage.
    public function destroy(Request $request, string $id)
    {
        $json_body = $request->json()->all();

        // Find the ticket by ID
        $ticket = TicketModel::find($id);

        // Check if the ticket exists
        if (!$ticket) {
            return response("Ticket does not exist.", 404);
        }

        // Check if the ticket ID matches the one provided in the request
        if ($ticket->ticketid === $json_body["ticketid"]) {
            // Delete the ticket
            $ticket->delete();

            return response("Ticket deleted successfully.", 200);
        }

        return response("Ticket ID mismatch.", 401);
    }
}
