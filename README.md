
# Next Sms Laravel Package

With this package you can send sms, check sms balance and get delivery report of single or all sms.

## Installation

You can install the package via composer:
```bash
  composer require filbertmsaki/nextsms
```
    
## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`NEXT_SMS_USERNAME=filbertmsaki`

`NEXT_SMS_PASSWORD=******`

`NEXT_SMS_SENDER_ID=N-SMS`


## Usage

use the below dependancy in your controller
```bash
  use Filbertmsaki\Nextsms\NextSms;

```
    
## Send sms to single number
```bash
     public function send_single_sms(){
            $message= 'Test Message';
        //Call the Next Sms Class
            $sms = new NextSms();
        //Send sms to single number
            $phonenumber= '255**********';
            $data= $sms->sendSingleSms( $phonenumber,$message);
        return  $data;
    }


```
## Send to multiple number
```bash
     public function send_single_sms(){
            $message= 'Test Message';
        //Call the Next Sms Class
            $sms = new NextSms();
        //Send sms to single number
            $arraynumber= ["2557*********","255**********","255**********","255**********","255**********"];
            $data= $sms->sendMultipleSms( $arraynumber,$message);
        return  $data;

    }

```
## Sms Balance
```bash
    
    public function sms_balance(){
        //Get the remein balance of the sms from the dashboard
            $sms = new NextSms();
            $delivery_report= $sms->getSmsBalance();
            return $delivery_report;
    }

```
## All Sms Delivery report
```bash
    
    public function all_sms_delivery_report(){
        //Get delivery report of all sms
            $sms = new NextSms();
            $delivery_report= $sms->getAllSmsDeliveryreports();
            return $delivery_report;
    }

```
## Single Sms Delivery Report
```bash
    
    public function single_sms_delivery_report(){
        //Get delivery report of single sms
            $messageId = '34329702767301630304';
            $sms = new NextSms();
            $delivery_report= $sms->getSingleSmsDeliveryReport($messageId);
            return $delivery_report;
    }


```
## Delivery Report By Date Range

```bash
    
     public function delivery_report_by_date_range(){
        //Get delivery report by using date range
        //Date format is yyyy-mm-dd
        $startDate='2022-01-26';
        $endDate='2022-01-27';
        $sms = new NextSms();
        $delivery_report= $sms->getSmsDeliveryreportsByDateRange($startDate,$endDate);
        return $delivery_report;
    }

```
## Authors

- [@filbertmsaki](https://github.com/filbertmsaki)
