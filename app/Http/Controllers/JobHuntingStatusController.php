<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JobHuntingStatus;
use App\Http\Requests\JobHuntingStatusRequest;
use Illuminate\Support\Facades\Log;

class JobHuntingStatusController extends Controller
{
    public function index(User $user)
    {
        // ユーザーに紐づく全ての就活状況を取得
        $job_hunting_statuses = $user->job_hunting_statuses()->with('corporation')->get();

        $response = $job_hunting_statuses->map(array($this,"model_to_array"));
        // 就活状況をJSON形式で返す
        return response()->json($response, 200);
    }

    public function store(JobHuntingStatusRequest $request)
    {
        $job_hunting_status = JobHuntingStatus::create($request->validated());
        $response = self::model_to_array($job_hunting_status);
        return response()->json($response, 201);
    }

    public function show($id)
    {
        $job_hunting_status = JobHuntingStatus::findOrFail($id);
        $response = self::model_to_array($job_hunting_status);
        return response()->json($response, 201);
    }

    public function update(JobHuntingStatusRequest $request, $id)
    {
        $job_hunting_status = JobHuntingStatus::findOrFail($id);
        $job_hunting_status->update($request->validated());
        $response = self::model_to_array($job_hunting_status);
        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        JobHuntingStatus::destroy($id);
        return response()->json(null, 204);
    }

    function model_to_array(JobHuntingStatus $job_hunting_status)
    {
        $job_search_way = config('job_search_way');
        $status = config('job_hunting_status');
        return [
            'id' => $job_hunting_status->id,
            'priority' => $job_hunting_status->priority,
            'corporation' => $job_hunting_status->corporation()->get(['id','name','address','home_page'])[0],
            'user_id' => $job_hunting_status->user_id,
            'way' =>  $job_search_way[$job_hunting_status->way_id],
            'note' => $job_hunting_status->note,
            'status' => $status[$job_hunting_status->status_id],
            'submit' => $job_hunting_status->submit,
            'interview1' => $job_hunting_status->interview1,
            'interview2' => $job_hunting_status->interview2,
            'interview_last' => $job_hunting_status->interview_last,
        ];
    }
}
