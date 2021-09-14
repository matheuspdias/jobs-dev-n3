<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReportResource;
use App\Report;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class ReportController
 * @package App\Http\Controllers
 */
class ReportController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listReports(Request $request)
    {
        $apiUrl = 'https://www.spaceflightnewsapi.net/api/v2/';

        $guzzle = new Client([
            'base_uri' => $apiUrl
        ]);

        try {
            $rawResult = json_decode($guzzle->get('reports')->getBody(),  true);

            $filter = $request->get('filter');

            $result = [];

            for ($x = 0; $x < sizeof($rawResult); $x++) {
                $reportExists = Report::where('external_id', $rawResult[$x]['id'])->count();
                if(!$reportExists) {
                    Report::create([
                        'external_id' => $rawResult[$x]['id'],
                        'title' => $rawResult[$x]['title'],
                        'url' => $rawResult[$x]['url'],
                        'image_url' => $rawResult[$x]['imageUrl'],
                        'news_site' => $rawResult[$x]['newsSite'],
                        'summary' => $rawResult[$x]['summary']
                    ]);
                }               

                $result[] = $rawResult[$x];
            }

            return (new ReportResource($result))
                ->response()
                ->setStatusCode(200);
        } catch (GuzzleException $e) {
            $response = $e->getResponse();
            return $responseBodyAsString = $response->getBody();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function createReport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'url' => 'required',
            'summary' => 'required',
        ]);

        if (!$validator->fails()) {
            $data = $request->only([
                'external_id',
                'title',
                'url',
                'summary',
                'image_url',
                'news_site'
            ]);
            
            $report = Report::create($data);
            $statusCode = 201;
        } else {
            $report['error'] = $validator->errors()->first();
            $statusCode = 400;
        }

        return (new ReportResource($report))
            ->response()
            ->setStatusCode($statusCode);
    }

    public function updateReport($id, Request $request)
    {
        $res = [];
        $report = Report::find($id);
        
        if($report) {
            $validator = Validator::make($request->all(), [
                'external_id' => 'required',
                'title' => 'required',
                'url' => 'required',
                'summary' => 'required',
            ]);
    
            if (!$validator->fails()) {
                $data = $request->only([
                    'external_id',
                    'title',
                    'url',
                    'summary',
                    'image_url',
                    'news_site'
                ]);
                
                $report->external_id = $data['external_id'];
                $report->title = $data['title'];
                $report->url = $data['url'];
                $report->summary = $data['summary'];
                $report->image_url = $data['image_url'];
                $report->news_site = $data['news_site'];
                $report->save();
                $statusCode = 201;
            } else {
                $report['error'] = $validator->errors()->first();
                $statusCode = 400;
            }
    
            return (new ReportResource($report))
                ->response()
                ->setStatusCode($statusCode);
        } else {
            $res['error'] = 'Este report não existe!';
            $statusCode = 400;
        }
        return response()->json($res, $statusCode);
    }

    public function showReport($reportId)
    {
        $result = [];
        $report = Report::find($reportId);
        
        if($report) {
            $result = $report;
            $statusCode = 200;
        } else {
            $result['error'] = 'Este report não existe!';
            $statusCode = 400;
        }
        return (new ReportResource($result))
                ->response()
                ->setStatusCode($statusCode);
    }

    public function deleteReport($reportId)
    {
        $report = Report::find($reportId);
        if ($report) {
            Report::destroy($report->id);
        }
        return (new ReportResource($report))
                ->response()
                ->setStatusCode(200);
    }
}
