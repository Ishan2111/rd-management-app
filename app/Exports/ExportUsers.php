<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUsers implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $users = User::select(
            'id',
            'account_number',
            'acc_holder_name_1',
            'acc_holder_cif_1',
            'acc_holder_name_2',
            'acc_holder_cif_2',
            'amount',
            'mobile',
            'open_date',
            'matu_date',
            'family_id',
            'payment_reciver_name',
            'payment_date',
            'payment_type',
            'address'
        )->get();

        // Calculate total amount
        $totalAmount = $users->sum('amount');

        // Append total amount to the collection
        $users->push(['Total Amount', '', '', '', '', '', $totalAmount]);

        return $users;
    }

    public function headings(): array
    {
        return [
            'Serial Number',
            'Account Number',
            'First Account Holder Name',
            'First Account Holder CIF',
            'Second Account Holder Name',
            'Second Account Holder CIF',
            'Amount',
            'Mobile Number',
            'Open Date',
            'Maturity Date',
            'Family ID',
            'Payment Recived By',
            'Payment Date',
            'Payment Type',
            'Address'
        ];
    }
}
