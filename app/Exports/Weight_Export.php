<?php
namespace App\Exports;
use App\Models\Weight;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Weight_Export implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Weight::select('id', 'Weight')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Weight',
        ];
    }
}
