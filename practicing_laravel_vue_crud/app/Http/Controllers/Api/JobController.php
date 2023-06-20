<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function index()
    {
        return response()->json([
            'jobs' => Job::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2|max:20',
            'description' => 'required|min:10',
        ], [
            'title.required' => 'အလုပ်ခေါင်းစဉ် ‌ရေးရန် လိုအပ်ပါသည်။',
            'title.min' => 'စာလုံးအရေအတွက် အနည်းဆုံး(၂)လုံး ရှိရန် လိုအပ်ပါသည်။',
            'title.max' => 'စာလုံးအရေအတွက် (၂၀)ထက် ပို၍မရပါ။',
            'description.required' => 'ဖော်ပြချက် ‌ရေးရန် လိုအပ်ပါသည်။',
            'description.min' => 'စာလုံးအရေအတွက် အနည်းဆုံး(၁၀)လုံး ရှိရန် လိုအပ်ပါသည်။'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        Job::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return response()->json([
            'Job Created'
        ], 201);
    }

    public function show($id)
    {
        return response()->json([
            'job' => Job::find($id)
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2|max:20',
            'description' => 'required|min:10',
        ], [
            'title.required' => 'အလုပ်ခေါင်းစဉ် ‌ရေးရန် လိုအပ်ပါသည်။',
            'title.min' => 'စာလုံးအရေအတွက် အနည်းဆုံး(၂)လုံး ရှိရန် လိုအပ်ပါသည်။',
            'title.max' => 'စာလုံးအရေအတွက် (၂၀)ထက် ပို၍မရပါ။',
            'description.required' => 'ဖော်ပြချက် ‌ရေးရန် လိုအပ်ပါသည်။',
            'description.min' => 'စာလုံးအရေအတွက် အနည်းဆုံး(၁၀)လုံး ရှိရန် လိုအပ်ပါသည်။'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        $job = Job::find($id)->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'Job updated',
        ], 200);
    }

    public function destroy($id)
    {
        Job::find($id)->delete();
        return response()->json([
            'message' => 'Job deleted'
        ], 204);
    }
}
