<?php

namespace App\Http\Controllers;
use App\Models\News;
use OpenAI\Laravel\Facades\OpenAI;

use Illuminate\Http\Request;

class WakeUpController extends Controller
{
    public function post(Request $request)
    {
        // TODO: バリデーション
        $keyword = $request->input('keyword');
        $messages = [['role' => 'user','content' => "「{$keyword}」というキーワードから思わずびっくりしてしまうような、架空のニュースを255字以内で作成してください。非現実的なニュースではなく、実際のニュースと勘違いしてしまうようなニュースが望ましいです。}"]];

        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages,
        ]);

        $news = new News();
        $news->keyword = $keyword;
        $news->content = $result->choices[0]->message->content;
        $news->is_fake = true;
        $news->save();

        return redirect()->route('wakeup.get')->with(['newsId' => $news->id]);
    }

    public function get($id = null)
    {
        $news = is_null($id) ? News::latest()->first() : News::find($id);
        $comments = $news->comments()->latest()->get();

        return view('wakeup')->with(['news' => $news, 'comments' => $comments]);
    }
}
