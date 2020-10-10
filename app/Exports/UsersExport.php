<?php
namespace App\Exports;

use App\Models\auth\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;

class UsersExport implements
    FromQuery,
    Responsable,
    WithMapping,
    WithHeadings,
    WithColumnFormatting,
    WithTitle,
    WithStrictNullComparison,
    WithEvents
    /*FromCollection,
    ShouldAutoSize
   */
{

  /*  public function collection()   {
        $users = user::orderBy('name','ASC')
            ->select('id','nickname','name','email','role','active','created_at')
            ->get();
       return  $users;
    }*/

    use Exportable;

    private $fileName = 'user.xlsx';

    private $year;

    public function __construct()
    {
        $this->year = Carbon::now()->year;
    }

    public function forYear(int $year = null)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        return [
           $row->id,
            $row->nickname,
            $row->name,
            $row->email,
            $row->role,
            $row->active,
            Date::dateTimeToExcel($row->created_at)
        ];
    }

    /**
     * @return Builder
     */
    public function query()
    {
      // return User::whereActive(true)->whereYear('created_at', $this->year)->take(10);
      //  return User::whereActive(true);
        return User::query();
    }


    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'Nombre Corto',
            'Nombre',
            'Email',
            'Rol usuario',
            'Activo',
            'Creado',
        ];
    }

    public function columnFormats(): array
    {
        return [
//            'A' => ,
            'B' => NumberFormat::FORMAT_GENERAL,
            'C' => NumberFormat::FORMAT_GENERAL,
            'D' => NumberFormat::FORMAT_GENERAL,
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,

        ];
    }


    /**
     * @return string
     */
    public function title(): string
    {
        return 'Reporte de usuarios';
    }

    public function registerEvents(): array
    {
        $datos = [
            AfterSheet::class => function (AfterSheet $event) {
                $event->getSheet()->autoSize();
                $event->getSheet()->getDelegate()->getStyle('A1:G763')  // All headers
                ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            },
            BeforeExport::class => function (BeforeExport $event) {
                $event->getWriter()->getDelegate()
                    ->getProperties()
                    ->setCreator("Hermann Berkhoff")
                    ->setLastModifiedBy("Hermann Berkhoff")
                    ->setTitle("Office 365 XLSX User Report")
                    ->setSubject("Office 365 XLSX User Report")
                    ->setDescription("Un comentario Huevon." );
                 }
                ];
        $hay = count($datos);
        return $datos;

         //  $worksheet->getStyle('B2:G8')->applyFromArray($styleArray);
     }



}

