<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class ResultController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $data = Answer::with(['question', 'user'])
                ->orderBy('created_at', 'desc')
                ->get();
    
            $formattedData = [];
    
            foreach ($data as $answer) {
                $userId = $answer->user->id;
                $createdAt = $answer->created_at->toDateString(); // Use created_at date
    
                // Create a unique key for each user and date combination
                $key = $userId . '_' . $createdAt;
    
                if (!isset($formattedData[$key])) {
                    $formattedData[$key] = [
                        'DT_RowIndex' => count($formattedData) + 1,
                        'name' => $answer->user->name,
                        'jenjang' => $answer->user->jenjang,
                        'date_test' => $createdAt,
                        'sets' => [],
                    ];
                }
    
                // Create a unique key for each set of 25 questions
                $setKey = 'set_' . count($formattedData[$key]['sets'] + 1);
    
                if (!isset($formattedData[$key]['sets'][$setKey])) {
                    $formattedData[$key]['sets'][$setKey] = [
                        'questions' => [],
                        'total_score' => 0,
                        'level' => '',
                    ];
                }
    
                $formattedData[$key]['sets'][$setKey]['questions'][] = [
                    'question' => $answer->question->question,
                    'response' => $answer->response,
                ];
    
                // Assuming response is numeric, you may need to adjust based on your actual scoring system
                $formattedData[$key]['sets'][$setKey]['total_score'] += intval($answer->response);
            }
    
            // Define your level logic based on the total score for each set of questions
            foreach ($formattedData as &$userData) {
                foreach ($userData['sets'] as &$setData) {
                    $totalScore = $setData['total_score'];
    
                    // Define your level thresholds as needed
                    if ($totalScore >= 88 && $totalScore <= 125) {
                        $setData['level'] = 'Berat';
                    } elseif ($totalScore >= 63 && $totalScore <= 87) {
                        $setData['level'] = 'Sedang';
                    } elseif ($totalScore >= 25 && $totalScore <= 61) {
                        $setData['level'] = 'Ringan';
                    } else {
                        $setData['level'] = 'Invalid Level'; // Handle the case where the total score is outside the specified ranges
                    }
                }
            }
    
            // Return DataTables response
            return DataTables::of(array_values($formattedData)) // Reset keys to sequential
                ->addIndexColumn()
                ->make(true);
        }
    
        return view('pages.admin.result.index');
    }
    
    





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Answer::findOrFail($id);

        $item->delete();

        return redirect()->route('result-admin.index');
    }
}
