<?php
namespace App\Exports;
use App\Models\Height;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Height_Export implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Height::select('id', 'height')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Height',
        ];
    }
}
