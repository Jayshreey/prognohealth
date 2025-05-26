<?php
namespace App\Exports;
use App\Models\Nationality;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Nationality_Export implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Nationality::select('id', 'name')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
        ];
    }
}
