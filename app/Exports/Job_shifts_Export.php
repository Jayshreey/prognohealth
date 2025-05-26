<?php
namespace App\Exports;
use App\Models\Job_shifts;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Job_shifts_Export implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Job_shifts::select('id', 'name')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
        ];
    }
}
