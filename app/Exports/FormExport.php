<?php

namespace App\Exports;

use App\Form_Field;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FormExport implements FromArray,ShouldAutoSize,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;
    protected $header;

    public function __construct(array $data,array $header)
    {
        $this->data = $data;
        $this->header = $header;
    }
    public function array(): array
    {
        return $this->data;
    }
    public function headings(): array
    {
        return $this->header;
    }
}
