<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReportResource;
use App\Report;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

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
        $apiUrl = 'https://spaceflightnewsapi.net/api/v2';

        $guzzle = new Client([
            'base_uri' => $apiUrl
        ]);
        $rawResult = $guzzle->get('reports')->getBody();

        $filter = $request->get('filter');

        $result = [];

        for ($x = 0; $x <= sizeof($rawResult); $x++) {
            Report::create([
                'external_id' => $rawResult[$x]['id'],
                'title' => $rawResult[$x]['title'],
                'url' => $rawResult[$x]['url'],
                'summary' => $rawResult[$x]['summary']
            ]);

            if (strpos($rawResult[$x], $filter) == false) {
                continue;
            }

            $result[] = $rawResult[$x];
        }

        return response()->json(['data' => $result]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function createReport(Request $request)
    {
        $report = Report::create([
            'external_id' => $request->post('external_id'),
            'title' => $request->post('title'),
            'url' => $request->post('url'),
            'summary' => $request->post('summary')
        ]);

        return (new ReportResource($report))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * TODO: Implement it
     *
     * @param $reportId
     */
    public function deleteReport($reportId)
    {
        // Implementar esse endpoint.
    }
}
