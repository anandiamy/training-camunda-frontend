<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReviewReimburseController extends Controller
{
    public function index()
    {
        $tasksUrl = "localhost:8090/engine-rest/task";
        $tasks = Http::get($tasksUrl, [
            'taskDefinitionKey' => 'review_permohonan',
            'processDefinitionId' => 'reimburse-process:4:e440e40c-548a-11eb-b0b6-bedefce5f9bd'
        ])->json();

        $results = [];
        foreach ($tasks as $key => $task) {
            $variablesUrl = "localhost:8090/engine-rest/task/{$task['id']}/variables";

            $results[$key] = Http::get($variablesUrl)->json();
            $results[$key]['id'] = $task['id'];
            $results[$key]['process-instance-id'] = $task['processInstanceId'];
        }

        return view('review.index', compact('results'));
    }

    public function edit($id)
    {
        $url = "http://localhost:8090/engine-rest/task/$id/variables";
        $response = Http::get($url);
        $body = $response->json();

        return view('review.edit', compact('body', 'id'));
    }

    public function update(Request $request, $id)
    {
        $url = "localhost:8090/engine-rest/task/$id/submit-form";

        Http::post($url, [
            'variables' => [
                'isApproved' => [
                    'value' => $request->is_approved,
                    'type' => 'Boolean'
                ]
            ]
        ]);

        return redirect()->route('review-reimburse.index');
    }

    public function destroy($id)
    {
        $url = "http://localhost:8090/engine-rest/process-instance/$id";
        Http::delete($url);

        return redirect()->back();
    }
}
