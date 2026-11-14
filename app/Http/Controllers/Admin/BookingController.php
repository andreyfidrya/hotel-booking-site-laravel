<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\House;
use App\Models\User;
use App\Services\BookingPriceCalculator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Booking\Save as SaveRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();               
        
        return view('admin.bookings.index', compact('bookings'));
    }

     public function create(House $house)
    {
        $houses = House::all();        
        
        return view('admin.bookings.create', [
            'houses' => $houses,
            'selectedHouse' => $house,
        ]);
    }

    public function calculatePrice(Request $request,BookingPriceCalculator $calculator)
    {
        try {
        $house = House::with('housetype')->findOrFail($request->house_id);

        $result = $calculator->calculate(
            $house,
            $request->arrival_date,
            $request->departure_date,
            $request->adults,
            $request->children,
            $request->boolean('pets')
        );

        return response()->json($result);

        } catch (\InvalidArgumentException $e) {

        return response()->json([
            'error' => $e->getMessage()
        ], 422);

        }
    }

    public function store(
        SaveRequest $request,
        BookingPriceCalculator $calculator
    )
    {
        $validated = $request->validated();

        $validated['arrival_date'] = Carbon::createFromFormat(
            'm/d/Y',
            $validated['arrival_date']
        )->format('Y-m-d');

        $validated['departure_date'] = Carbon::createFromFormat(
            'm/d/Y',
            $validated['departure_date']
        )->format('Y-m-d');

        $house = House::with('housetype')->findOrFail($validated['house_id']);
        
        $result = $calculator->calculate(
            $house,
            $validated['arrival_date'],
            $validated['departure_date'],
            $validated['adults'],
            $validated['children'],
            $request->boolean('pets')
        );        

        $user_email = $validated['email'];         

        $user = User::where('email', $user_email)->first();        

        if ($user) {
            $userId = $user->id;
        }

        $booking = Booking::create([
            'house_id' => $validated['house_id'],
            'user_id' => $userId,
            'arrival_date' => $validated['arrival_date'],
            'departure_date' => $validated['departure_date'],
            'adults' => $validated['adults'],
            'children' => $validated['children'],
            'pets' => $request->boolean('pets'),

            'coupon_id' => null,

            'amount' => $result['total_price'],

            'full_name' => $validated['full_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],

            'status' => 'неоплаченный',
        ]);

        return redirect()->route('admin.bookings.index');
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);         

        return view('admin.bookings.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id); 
        
        $statuses = [ 'неоплаченный', 'оплачен'];

        return view('admin.bookings.edit', compact('booking', 'statuses'));
    }

    public function update(SaveRequest $request, Booking $booking)
    {
        $data = $request->only(['full_name','phone', 'email', 'status']);

        $booking->update($data);

        return redirect()
        ->route('admin.bookings.index')
        ->with('success', 'Бронирование успешно обновлено');
    }

    public function updateStatus($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = 'отменен';
        $booking->save();

        return redirect()->route('admin.bookings.index'); 
    }

    public function destroy(string $id)
    {
        //
    }
}
