<?php
namespace App\Exports;
use App\Models\Job_types;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Job_types_Export implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Job_types::select('id', 'name')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
        ];
    }
}
