<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GuruExport implements FromCollection, WithHeadings,WithMapping,WithStyles,WithCustomStartCell,ShouldAutoSize,WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $guru;
    public function __construct($guru)
    {
        $this->guru = $guru;
    }
    public function collection()
    {
        // ini make from collection
        return collect($this->guru);
    }

    public function headings(): array
    {
        return [
            '#',
            'nik',
            'nama',
            'jabatan',
            'jurusan',
            'no_telp',
        ];
    }
    public function map($guru): array
    {
        return [
            '#',
            $guru->nik,
            $guru->name,
            $guru->jabatan,
            $guru->jurusan->singkatan_jurusan,
            $guru->no_telp,
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $count = [
            count($this->guru),
        ];

        // array A -> BZ
        $columnindex = array(
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ',
            'BA', 'BB', 'BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR', 'BS', 'BT', 'BU', 'BV', 'BW', 'BX', 'BY', 'BZ'
        );
        // row paling tinggi dan colum paling lebar
        $highestRow = $sheet->getHighestRow();
        $highestCol = $sheet->getHighestColumn();

        // ini text-align: center
        // param Ex =  B7:J7
        $sheet->getStyle('B7:' . $highestCol . $highestRow)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('B7:' . $highestCol . $highestRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // merge cels di title
        $sheet->mergeCells('B3:' . $highestCol . '3')->setCellValue('B3', 'SMK TARUNA BHAKTI DEPOK');
        $sheet->mergeCells('B4:' . $highestCol . '4')->setCellValue('B4', 'Data Guru');

        // border di table dari header sampe lembar panjang column
        $sheet->getStyle('B7:' . $highestCol . $highestRow)->applyFromArray(array('borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000'],
                )
            )
        ));

        // header table
        $sheet->getStyle('B7:' . $highestCol . '7')->applyFromArray(array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                    'width' => 10
                )
            ),
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ),
            'fill' => array(
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => array(
                    'rgb' => '87CEEB',
                )
            ),
            'font' => array(
                'bold' => true,
                // 'color' => ['argb' => 'FFFFFFF'],
            ),

        ));

        // tittle unduk di tengah
        $sheet->getStyle('B3:F5')->applyFromArray(array(
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ),
            'font' => array(
                'bold' => true,
            ),

        ));

        // tinggi table 30
        $sheet->getRowDimension(7)->setRowHeight(30);
        for ($i = 0; $i < $count[0]; $i++) {
            $sheet->getRowDimension($i + 8)->setRowHeight(30);
        }

        // ini incremnet dari di index B8
        for ($i = 0; $i < $count[0]; $i++) {
            $sheet->setCellValue('B' . ($i + 8), $i + 1);
        };
    }
    public function startCell(): string
    {
        return 'B7';
    }

    public function columnWidths(): array
    {
        return [
            'B' => '10'
        ];

    }
}
