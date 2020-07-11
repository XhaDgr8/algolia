<?php

namespace App\Http\Controllers;

use App\Data;
use Illuminate\Http\Request;

class ScrappersController extends Controller
{
    // Index Function
    public function index()
    {
        return view('scrappers.allscrapper');
    }

    // Scrape Project Function
    public function scrapper($name, $authToken, $projectToken)
    {
        $project = $this->getProject($projectToken, $authToken);

        return view('scrappers.scrapper', compact('name', 'project', 'authToken'));
    }

    // Scrape Function
    public function Brabys($name, $authToken, $runToken)
    {
        $scrapped = $this->getRun($runToken, $authToken);

        // dd($scrapped);

        foreach ($scrapped as $scrapped1){
            $upResults = [];
            if ($scrapped1 == "South Africa") {
                echo $scrapped['Area'];
            } else {
                // Check if String is Email
                function v_email($email) {
                    $find1 = strpos($email, '@');
                    $find2 = strpos($email, '.');
                    return($find1 !== false && $find2 !== false && $find2 > $find1);
                 }               

        
                // Loop the array
                foreach ($scrapped1 as $key => $scrapped2) {
                    foreach ($scrapped2 as $key => $scrapped3) {
                        foreach ($scrapped3 as $key => $scrapped4) {
                            $r_catogary = $scrapped4['b_catogary'];
                            if (isset($scrapped4['b_name'])) {
                                foreach ($scrapped4['b_name'] as $key => $bName) {
                                    // $r_ means Refined

                                    $r_name = $bName['b_name'];

                                    $r_email = array_key_exists('b_email', $bName) ? 
                                                v_email($bName['b_email']) == true ? $bName['b_email'] : "Not a valid Email" : 'N/A' ;

                                                
                                    $r_address = array_key_exists('b_address', $bName) ? $bName['b_address'] : "N/A";
                                    $r_number_1 = array_key_exists('b_number_1', $bName) ? $bName['b_number_1'] : "N/A";

                                    $r_number_2 = array_key_exists('b_number_2', $bName) ? 
                                                    v_email($bName['b_number_2']) == false ? $bName['b_number_2'] : $r_email = $bName['b_number_2'] & 'N/a' : 'N/A' ;
                                    
                                    $r_image = array_key_exists('b_image', $bName) ? 
                                                $bName['b_image'] == 'https://www.brabys.com/images/logo-placeholder.jpg' ?
                                                    "Storage/siteAssets/logo.png" : $bName['b_image'] : "N/A";

                                    $refined = array(
                                        'b_area' => $scrapped['Area'],
                                        'b_catogary' => $r_catogary,
                                        'b_name' => $r_name,
                                        'b_email' => $r_email,
                                        'b_address' => $r_address,
                                        'b_number_1' => $r_number_1,
                                        'b_number_2' => $r_number_2,
                                        'b_image' => $r_image
                                    );
                                    $DB = Data::where('b_name', '=', $refined['b_name'])->first();
                                    if ($DB === null) {
                                        if ($add = Data::create($refined)) {
                                            array_push($refined, 'success');
                                            array_push($upResults, $refined);
                                        } else {
                                            array_push($refined, 'danger');
                                            array_push($upResults, $refined);
                                        }
                                    } else {
                                        array_push($refined, 'warning');
                                        array_push($upResults, $refined);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        
        }
        return view('scrappers.db_scrapes', compact('upResults'));
    }

    public function upload ($refined)
    {
        $db_results = null;
        
    }

    public function getProject ($projectToken, $authToken)
    {
        $params = http_build_query(array(
            "api_key" => $authToken
        ));

        $getProject = 'https://www.parsehub.com/api/v2/projects/'.$projectToken.'?'.$params;

        $result = file_get_contents(
            $getProject,
            false,
            stream_context_create(array(
                'http' => array(
                    'method' => 'GET'
                )
            ))
        );

        $data = json_decode($result, true);

        return $data['run_list'];
    }

    public function getRun($id, $authToken)
    {

        $params = http_build_query(array(
            "api_key" => $authToken
        ));

        $getLastReadyRun = 'https://www.parsehub.com/api/v2/runs/'.$id.'/data?'.$params;


        $result = file_get_contents(
            $getLastReadyRun,
            false,
            stream_context_create(array(
                'http' => array(
                    'method' => 'GET'
                )
            ))
        );

        $gz = gzdecode($result);

        return json_decode($gz, true);
    }

    public function projectRun ($projectToken, $authToken)
    {
        $params = array(
            "api_key" => $authToken,
            "send_email" => "1"
        );

        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
                'content' => http_build_query($params)
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents('https://www.parsehub.com/api/v2/projects/'.$projectToken.'/run', false, $context);
        return back();
    }
}
