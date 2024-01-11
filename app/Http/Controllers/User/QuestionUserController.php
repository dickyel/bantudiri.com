<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use App\Models\Level;


class QuestionUserController extends Controller
{
    //

    public function before()
    {
  
        return view('pages.user.before-test');
    }

    public function question()
    {
        $questions = Question::all();

        return view('pages.user.question', [
            'questions' => $questions,
        ]);
    }

    public function submitResponses(Request $request)
    {
        $request->validate([
            'responses' => 'required|array',
        ]);

        $user = auth()->user();
        $totalScore = 0;

        foreach ($request->input('responses') as $questionId => $responseValue) {
            Answer::create([
                'user_id' => $user->id,
                'question_id' => $questionId,
                'response' => $responseValue,
            ]);

            $totalScore += (int)$responseValue;
        }

        $levelName = $this->getLevelName($totalScore);

        $viewName = 'pages.user.selesai';

        if($levelName == 'Ringan'){
            $viewName .='-ringan';
        } elseif ($levelName == 'Sedang'){
            $viewName .= '-sedang';
        } elseif ($levelName == 'Berat'){
            $viewName .='-berat';
        } else {
            $viewName .='-invalid';
        }
        
        
        // Get the latest answer's updated_at field
        $latestAnswer = $user->answers()->latest('updated_at')->first();
        $dateTest = $latestAnswer ? $latestAnswer->updated_at : now();

        return view($viewName, compact('levelName','dateTest'));
    }

    public function saveResponse(Request $request)
    {
        $request->validate([
            'questionId' => 'required',
            'responseValue' => 'required',
        ]);

        $user = auth()->user();

        // Periksa apakah jawaban untuk pertanyaan dan pengguna tertentu sudah ada
        $existingAnswer = Answer::where([
            'user_id' => $user->id,
            'question_id' => $request->input('questionId'),
        ])->first();

        if ($existingAnswer) {
            // Jika sudah ada, perbarui jawaban yang sudah ada
            $existingAnswer->update([
                'response' => $request->input('responseValue'),
            ]);
        } else {
            // Jika belum ada, buat jawaban baru
            Answer::create([
                'user_id' => $user->id,
                'question_id' => $request->input('questionId'),
                'response' => $request->input('responseValue'),
            ]);
        }

        return response()->json(['status' => 'success']);
    }

    private function getLevelName($score)
    {
        // Customize this logic based on your score ranges
        if ($score >= 76 && $score <= 100) {
            return 'Berat';
        } elseif ($score >= 50 && $score <=75) {
            return 'Sedang';
        } elseif($score >=25 && $score <=49) {
            return 'Ringan';
        } else {
            return 'Invalid Score';
        }
    }

        

}
