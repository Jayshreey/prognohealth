<?php
namespace App\Exports;
use App\Models\Company_size;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Company_Size_Export implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Company_size::select('id', 'size')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Size',
        ];
    }
}
