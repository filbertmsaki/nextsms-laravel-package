<?php
namespace  Filbertmsaki\Nextsms\Http\Controllers;

use App\Http\Controllers\Controller;

use Filbertmsaki\Nextsms\NextSms;


class NextSmsController extends Controller{
   
    public function send_single_sms(){
        $message= 'Test Message';

        //Call the Next Sms Class
        $sms = new NextSms();

        //Send sms to single number
            $phonenumber= '255**********';
            $data= $sms->sendSingleSms( $phonenumber,$message);

        //Send sms to multiple number
            // $arraynumber= ["2557*********","255**********","255**********","255**********","255**********"];
            // $data= $sms->sendMultipleSms( $arraynumber,$message);
            
        return  $data;

    }
    public function sms_balance(){
        //Get the remein balance of the sms from the dashboard
        $sms = new NextSms();
        $delivery_report= $sms->getSmsBalance();
        return $delivery_report;
    }
    public function single_sms_delivery_report(){
        //Get delivery report of single sms
        $messageId = '34329702767301630304';
        $sms = new NextSms();
        $delivery_report= $sms->getSingleSmsDeliveryReport($messageId);
        return $delivery_report;
    }

    public function all_sms_delivery_report(){
        //Get delivery report of all sms
        $sms = new NextSms();
        $delivery_report= $sms->getAllSmsDeliveryreports();
        return $delivery_report;
    }
    public function delivery_report_by_date_range(){
        //Get delivery report by using date range
        //Date format is yyyy-mm-dd
        $startDate='2022-01-26';
        $endDate='2022-01-27';
        $sms = new NextSms();
        $delivery_report= $sms->getSmsDeliveryreportsByDateRange($startDate,$endDate);
        return $delivery_report;
    }
}