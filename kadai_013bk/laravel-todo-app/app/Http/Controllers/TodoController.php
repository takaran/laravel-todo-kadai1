<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Goal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Goal $goal)
    {
        $request->validate([
            'content' => 'required',
            'description' => 'nullable', // 追加: 詳細は必須ではないためnullable
        ]);

        $todo = new Todo();
        $todo->content = $request->input('content');
        $todo->description = $request->input('description'); // 追加: 詳細を保存
        $todo->user_id = Auth::id();
        $todo->goal_id = $goal->id;
        $todo->done = false;
        $todo->save();

        $todo->tags()->sync($request->input('tag_ids'));


        return redirect()->route('goals.index');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goal $goal, Todo $todo)
    {
        $request->validate([
            'content' => 'required',
            'description' => 'nullable', // 追加: 詳細は必須ではないためnullable
        ]);

        $todo->content = $request->input('content');
        $todo->description = $request->input('description'); // 追加: 詳細を更新
        $todo->user_id = Auth::id();
        $todo->goal_id = $goal->id;
        $todo->done = $request->boolean('done', $todo->done);
        $todo->save();


        // 「完了」と「未完了」の切り替え時でないとき（通常の編集時）にのみタグを変更する
        if (!$request->has('done')) {
            $todo->tags()->sync($request->input('tag_ids'));
        }
        ;

        return redirect()->route('goals.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal, Todo $todo)
    {
        $todo->delete();

        return redirect()->route('goals.index');
    }
}
