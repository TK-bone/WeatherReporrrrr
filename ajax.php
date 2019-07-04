<?php

//// debug
// $_POST = "";
// $url = "test.json";
// $_POST = file_get_contents($url);
// $json = json_decode($_POST,true);

if(!isset($_POST["json"])){
    echo 'データが正常に送信されていません。';
    exit;
}

$json = $_POST["json"];

/**
 * Weather_Report
 *
 * 受け取ったJSONデータを整形する
 *
 */

class Weather_Report
{
    public $json;
    public $list;
    public function __construct( array $json,int $max_num)
    {
        $this->json = $json;
        $dt_txt = $this->Json_Shaping_dt_txt($this->json["list"],$max_num);
        $temperature = $this->Json_Shaping_temperature($this->json["list"],$max_num);

        $output_array =array(
            'dt_txt'=>$dt_txt,
            'temperature'=>$temperature,
        );

        $this->list = $output_array;
    }

    public function Json_Shaping_dt_txt( array $json_list ,$max_num)
    {
        $dt_txt_array = array();
        $i = 0;
        $replace_array = array(
            '-'=>'/',
            ':00:00'=>'時'
        );
        foreach ($json_list as $key => $value) {
            if($i < $max_num){
                $replace_keys = array_keys( $replace_array);
                $replace_array_values = array_values( $replace_array);
                $json_list[$key]["dt_txt"] = str_replace($replace_keys,$replace_array_values,$json_list[$key]["dt_txt"]);
                $dt_txt_array[] = $json_list[$key]["dt_txt"];
            }
            $i++;
        }
        return $dt_txt_array;
    }

    public function Json_Shaping_temperature( array $json_list ,$max_num)
    {
        $temperature_array = array();
        $i = 0;
        foreach ($json_list as $key => $value) {
            if($i < $max_num){
                $temperature_array[] = $json_list[$key]["main"]["temp"];
            }
            $i++;
        }
        return $temperature_array;
    }
}

$out = new Weather_Report($json,10);
echo json_encode($out->list);
?>