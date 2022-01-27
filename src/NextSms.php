<?php
namespace Filbertmsaki\Nextsms;
class NextSms {
    public $base_url;
    public $authorization;
    public function __construct(){

        $this->authorization= base64_encode(config('nextsms.username') . ":" . config('nextsms.password'));
        $this->base_url ='https://messaging-service.co.tz';
    }
    
    public function sendSingleSms($to,$message){
       
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $this->base_url.'/api/sms/v1/text/single',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"from":"'.config('nextsms.sender_id').'", "to":"'.$to.'",  "text": "'. $message.'"}',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic ' . $this->authorization,
                'Content-Type: application/json',
                'Accept: application/json'
            ),
            ));
            $response = curl_exec($curl);
            $error    = curl_error( $curl );
            $datafile= json_decode($response, true, JSON_UNESCAPED_SLASHES);;
            curl_close($curl);

            return $datafile;
    
    }
    
    public function sendMultipleSms($toArray,$message){
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->base_url.'/api/sms/v1/text/single',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{"from":"'.config('nextsms.sender_id').'", "to":'.json_encode($toArray).',  "text": "'. $message.'"}',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic ' . $this->authorization,
            'Content-Type: application/json',
            'Accept: application/json'
         ),
        ));
        $response = curl_exec($curl);
        $error    = curl_error( $curl );
        $datafile= json_decode($response, true, JSON_UNESCAPED_SLASHES);;
        curl_close($curl);

        return $datafile;
    }

    public function getSmsBalance(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->base_url.'/api/sms/v1/balance',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic ' . $this->authorization,
            'Content-Type: application/json',
            'Accept: application/json'
        ),
        ));
        $response = curl_exec($curl);
        $error    = curl_error( $curl );
        $datafile= json_decode($response, true, JSON_UNESCAPED_SLASHES);;
        curl_close($curl);
        return $datafile;
    }

    public function getSingleSmsDeliveryReport($messageId){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->base_url.'/api/sms/v1/reports?messageId=' . $messageId,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic ' . $this->authorization,
            'Content-Type: application/json',
            'Accept: application/json'
        ),
        ));
        $response = curl_exec($curl);
        $error    = curl_error( $curl );
        $datafile= json_decode($response, true, JSON_UNESCAPED_SLASHES);;
        curl_close($curl);
        return $datafile;
    }

    public function getAllSmsDeliveryreports(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->base_url.'/api/sms/v1/reports',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic ' . $this->authorization,
            'Content-Type: application/json',
            'Accept: application/json'
        ),
        ));
        $response = curl_exec($curl);
        $error    = curl_error( $curl );
        $datafile= json_decode($response, true, JSON_UNESCAPED_SLASHES);;
        curl_close($curl);

        return $datafile;
    }

    public function getSmsDeliveryreportsByDateRange($startDate,$endDate){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->base_url.'/api/sms/v1/reports?sentSince='.$startDate.'&sentUntil='.$endDate.'',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic ' . $this->authorization,
            'Content-Type: application/json',
            'Accept: application/json'
        ),
        ));
        $response = curl_exec($curl);
        $error    = curl_error( $curl );
        $datafile= json_decode($response, true, JSON_UNESCAPED_SLASHES);;
        curl_close($curl);

        return $datafile;
    }

}