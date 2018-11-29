<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CenterStudentExport implements FromQuery, WithMapping, WithHeadings
{

    public function query()
    {
        return Student::where('type_id', 2)->orderBy('classroom_id', 'asc');
    }

    /**
     * @param $student
     * @return array
     */
    public $index = 0;
    public function map($student): array
    {
        return[
            $this->index = $this->index + 1,
            $student->first_name.' '. $student->middle_name.' '.$student->last_name,
            $student->phone,
            $student->classroom->name,
            $student->stage->name,
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'الرقم',
            'الأسم',
            'التليفون',
            'الفصل',
            'المرحلة',
            'السبت',
            'الأحد',
            'الأتنين',
            'الثلاثاء',
            'الأربعاء',
            'الخميس',
            'الجمعه',
        ];
    }
}
