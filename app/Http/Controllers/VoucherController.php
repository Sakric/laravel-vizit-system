<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VoucherController extends Controller
{
    public function createVoucher()
    {
        $attributes = request()->validate([
            'doctor_id' => ['required', Rule::exists('doctors', 'id')],
            'day' => 'required',
            'time' => 'required|date_format:H:i',
        ]);


        Voucher::create($attributes);

        return redirect('/dashboard/doctors/vouchers/'. $attributes['doctor_id']);
    }
}
