<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function create($store_id)
    {
        return view('reservation.create', ['store_id' => $store_id]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'reservation_date' => 'required',
            'number_pf_people' => 'required',
            'store_id' => 'required|integer',
        ]);

        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        $reservation->store_id = $request->input('store_id');
        $reservation->reservation_date = $request->input('reseravtion_date');
        $reservation->number_of_people = $request->input('number_of_people');
        $reservation->status = 'tentative'; //仮予約というステータス
        $reservation->save();

        //return redirect()->back()->with('success', '仮予約が完了致しました。予約確定メールをお待ちください。');

        return redirect()->route('reservation.create', ['store_id' => $reservation->store_id])
            ->with('success', '予約が完了しました.');
    }
}