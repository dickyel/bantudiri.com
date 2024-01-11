<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Question::query()->orderByDesc('created_at');

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown" 
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="' . route('question-admin.edit', $item->id) . '">
                                        Edit
                                    </a>
                                    <form action="' . route('question-admin.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.question.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.question.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the main form data
        $request->validate([
            'questions' => 'required|array',
            'questions.*' => 'required|string',
            'pos_negs' => 'required|array',
            'pos_negs.*' => 'required|string',
        ]);

        // Process the main form data
        $questions = $request->input('questions');
        $pos_negs = $request->input('pos_negs');

        foreach ($questions as $key => $questionText) {
            $questionModel = Question::create([
                'question' => $questionText,
                'pos_neg' => $pos_negs[$key],
            ]);
        }

        // Redirect or return a response as needed
        return redirect()->route('question-admin.index'); // Replace 'question-admin.index' with the actual route name
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
        //
        $item = Question::findOrFail($id);
        return view('pages.admin.question.edit',[
            'item' => $item
        ]);
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
        //
        $data = $request->all();

        $item = Question::findOrFail($id);

        $item->update($data);


        return redirect()->route('question-admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the question
        $item = Question::findOrFail($id);

        // Delete associated answers first
        $item->answers()->delete();

        // Now delete the question
        $item->delete();

        return redirect()->route('question-admin.index')->with('success', 'Question deleted successfully');
    }
}
