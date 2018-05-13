<?php
namespace App\Repositories\Export;

interface ExportRepositoryInterface
{
    public function  exportProductStar($data,$viewName);
    public function  exportProductNoOrder($time, $data, $viewName);
    public function  exportSummaryOrder($time, $data, $viewName);
    public function  exportOrder($time, $data, $viewName);


}