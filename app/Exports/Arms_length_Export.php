<?php
namespace App\Exports;
use App\Models\Arms;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Arms_length_Export implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Arms::select('id', 'arms')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Arms Length',
        ];
    }
}
