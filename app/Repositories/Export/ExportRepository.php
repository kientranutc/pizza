<?php
namespace App\Repositories\Export;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class  ExportRepository implements ExportRepositoryInterface
{
    public function  exportProductStar($data,$viewName)
    {
        $dateExport = Carbon::now()->toDateTimeString();
        \Excel::create($dateExport.'_product_star', function($excel) use($data, $viewName) {
            $excel->sheet('product-star', function($sheet) use($data, $viewName) {
                $sheet->loadView($viewName,[
                    'data'=>$data
                ]);
            });
        })->export('xls');
    }
}