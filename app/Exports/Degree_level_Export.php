<?php
namespace App\Exports;
use App\Models\Degree_level;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Degree_level_Export implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Degree_level::select('id', 'name')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
        ];
    }
}
