<?php
namespace App\Exports;
use App\Models\Aircraft_type;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Aircraft_type_Export implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Aircraft_type::select('id', 'name')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
        ];
    }
}
