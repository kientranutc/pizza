<?php
namespace  App\Support;

class Helper
{
    public static  function getTime($created_time)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh'); //Change as per your default time
        $str = strtotime($created_time);
        $today = strtotime(date('Y-m-d H:i:s'));

        // It returns the time difference in Seconds...
        $time_differnce = $today-$str;

        // To Calculate the time difference in Years...
        $years = 60*60*24*365;

        // To Calculate the time difference in Months...
        $months = 60*60*24*30;

        // To Calculate the time difference in Days...
        $days = 60*60*24;

        // To Calculate the time difference in Hours...
        $hours = 60*60;

        // To Calculate the time difference in Minutes...
        $minutes = 60;

        if(intval($time_differnce/$years) > 1)
        {
            return intval($time_differnce/$years)." 1 năm trước";
        }else if(intval($time_differnce/$years) > 0)
        {
            return intval($time_differnce/$years)." năm trước";
        }else if(intval($time_differnce/$months) > 1)
        {
            return intval($time_differnce/$months). "tháng trước";
        }else if(intval(($time_differnce/$months)) > 0)
        {
            return intval(($time_differnce/$months))." tháng trước";
        }else if(intval(($time_differnce/$days)) > 1)
        {
            return intval(($time_differnce/$days))." ngày trước";
        }else if (intval(($time_differnce/$days)) > 0)
        {
            return intval(($time_differnce/$days))." ngày trước";
        }else if (intval(($time_differnce/$hours)) > 1)
        {
            return intval(($time_differnce/$hours))." tiếng trước";
        }else if (intval(($time_differnce/$hours)) > 0)
        {
            return intval(($time_differnce/$hours))." tiếng trước";
        }else if (intval(($time_differnce/$minutes)) > 1)
        {
            return intval(($time_differnce/$minutes))." phút trước";
        }else if (intval(($time_differnce/$minutes)) > 0)
        {
            return intval(($time_differnce/$minutes))." phút trước";
        }else if (intval(($time_differnce)) > 1)
        {
            return intval(($time_differnce))." phút trước";
        }else
        {
            return "một giây trước";
        }
    }
    public static function getTimeSearch($time, $defaultTime, $requestStartDate, $requestEndDate){
        if ($time == 1) {
            switch ($defaultTime)
            {
                case 'this_month':
                    $startDate = date('Y-m-d 00:00:00', strtotime('first day of this month'));
                    $endDate   = date('Y-m-d 23:59:59', strtotime('last day of this month'));
                    break;
                case 'last_month':
                    $startDate = date('Y-m-d 00:00:00', strtotime('first day of last month'));
                    $endDate   = date('Y-m-d 23:59:59', strtotime('last day of last month'));
                    break;
                case 'today':
                    $startDate = date('Y-m-d 00:00:00');
                    $endDate   = date('Y-m-d 23:59:59');
                    break;
                case 'yesterday':
                    $startDate = date('Y-m-d 00:00:00', time() - 86400);
                    $endDate   = date('Y-m-d 23:59:59', time() - 86400);
                    break;
                case 'this_week':
                    $startDate = date('Y-m-d 00:00:00', strtotime('monday this week'));
                    $endDate   = date('Y-m-d 23:59:59', strtotime('sunday this week'));
                    break;
                case 'last_week':
                    $startDate = date('Y-m-d 00:00:00', strtotime('monday last week'));
                    $endDate   = date('Y-m-d 23:59:59', strtotime('sunday last week'));
                    break;
                case 'this_year':
                    $startDate = date('Y-01-01 00:00:00');
                    $endDate   = date('Y-12-31 23:59:59');
                    break;
                case 'last_three_month':
                    $startmonth = date('Y-m-d 00:00:00',strtotime('first day of this month'));
                    $startDate = date('Y-m-d 00:00:00', strtotime('-3 month',strtotime($startmonth)));
                    $endDate   = date('Y-m-d 23:59:59');
                    break;
                case 'last_six_month':
                    $startmonth = date('Y-m-d 00:00:00',strtotime('first day of this month'));
                    $startDate = date('Y-m-d 00:00:00', strtotime('-6 month',strtotime($startmonth)));
                    $endDate   = date('Y-m-d 23:59:59');
                    break;
                case 'last_year':
                    $year = date('Y') - 1;
                    $start = "January 1st, {$year}";
                    $end = "December 31st, {$year}";
                    $startDate = date('Y-m-d 00:00:00', strtotime($start));
                    $endDate   = date('Y-m-d 00:00:00', strtotime($end));
                    break;
            }
        } elseif ($time == 2) {
            if (($requestStartDate == "")&&($requestEndDate == "")) {
                $startDate   = date('1970-01-01 00:00:00');
                $endDate     = date('9999-01-01 23:59:59');
            } elseif (($requestStartDate == "")&&(!$requestEndDate == "")) {
                $startDate   = date('1970-01-01 00:00:00');
                $eDate       = str_replace('/', '-', $requestEndDate);
                $endDate     = date('Y-m-d 23:59:59', strtotime($eDate));
            } elseif ((!$requestStartDate == "")&&($requestEndDate == "")) {
                $sDate       = str_replace('/', '-', $requestStartDate);
                $startDate   = date('Y-m-d 00:00:00', strtotime($sDate));
                $endDate     = date('Y-m-d 23:59:59');
            } else {
                $sDate       = str_replace('/', '-', $requestStartDate);
                $startDate   = date('Y-m-d 00:00:00', strtotime($sDate));
                $eDate       = str_replace('/', '-', $requestEndDate);
                $endDate     = date('Y-m-d 23:59:59', strtotime($eDate));
            }
        } else {
            $startDate  = date('Y-m-d 00:00:00', strtotime('first day of this month'));
            $endDate    = date('Y-m-d 23:59:59', strtotime('today'));
        }
        return ['start' => $startDate, 'end' => $endDate];
    }
}
?>