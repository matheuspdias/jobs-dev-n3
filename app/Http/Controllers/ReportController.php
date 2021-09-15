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
            $status = 201;
        } else {
            $report['error'] = $validator->errors()->first();
            $status = 400;
        }

        return (new ReportResource($report))
            ->response()
            ->setStatusCode($status);
    }

    public function updateReport($id, Request $request)
    {
        $array = [];
        $report = Report::find($id);

        if ($report) {
            if ($request->external_id) {
                $report->external_id = $request->external_id;
            }
    
            if ($request->title) {
                $report->title = $request->title;
            }
    
            if ($request->url) {
                $report->url = $request->url;
            }
    
            if ($request->image_url) {
                $report->image_url = $request->image_url;
            }
    
            if ($request->summary) {
                $report->summary = $request->summary;
            }
    
            if ($request->news_site) {
                $report->news_site = $request->news_site;
            }    
            $report->save();
            $array = $report;
            $status = 200;
        } else {
            $array['error'] = 'Este report não existe';
            $status = 400;
        }

        return (new ReportResource($array))
                ->response()
                ->setStatusCode($status);
    }

    public function showReport($id, Request $request)
    {
        $array = [];
        $report = Report::find($id);

        if ($report) {
            $array = $report;
            $status = 200;
        } else {
            $array['error'] = 'Este report não existe';
            $status = 400;
        }
        return (new ReportResource($array))
                ->response()
                ->setStatusCode($status);
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
