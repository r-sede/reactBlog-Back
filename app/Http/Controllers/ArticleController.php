<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use DateTime;
use Illuminate\Support\Facades\Auth;
use App\Events\UpdateBlogEvent;


class ArticleController extends Controller
{

    public $blogConfig = [
        'paginateNumber' => 10,

    ];

    public function index() {
    	return response()->json( Article::with('author')->orderby('created_at', 'desc')->limit(10)->get() );
    }

    public function show(Article $article) {
    	// return response()->json(Article::find($id));
    	return $article;
    }

    public function store(Request $request) {
        $article = new Article();
        $article->articleTitle = $request->articleTitle;
        $article->articleBody = $request->articleBody;
        $article->user_id = Auth::id();

        if($article->save()) {
            event(new UpdateBlogEvent($article));
            return redirect(url('/'));
        }

        // return redirect()->back()->back();
    	// return response()->json(Auth::id(), 201 );
    }

    public function update(Request $request, Article $article) {
			$article->update($request->all());
			return response()->json($article, 200);
    }

    public function delete(Request $request,Article $article) {
    	$article->delete();
		return response()->json(null, 204);
    }

    public function create() {
        return view('create');
    }

    public function articlesAfter($date) {
        $m = new DateTime($date);
        $m  = $m->format('m');
        $resp = Article::whereDate('created_at', '>=', $date)->get();
        $response = [];
        foreach ($resp as $article ) {
            $curArtMonth = new DateTime($article['created_at']);
            $curArtMonth->format('m');
            if($m == $curArtMonth) {
                array_push($response, $article);
            }
        }
        return response()->json($resp);
    }

    public function getMonths() {
        // $now = new DateTime();
        // return response()->json($now->format('m'));
        $monthArr = [];
        $all = Article::select('created_at')->get();
        foreach ($all as $article) {
            $artdate = new DateTime($article->created_at);
            $artM  = $artdate->format('M');
            $artY  = $artdate->format('Y');
            if(! in_array( $artM.'-'.$artY, $monthArr)) {
                array_push($monthArr,$artM.'-'.$artY );
            }

        }
        return response()->json($monthArr);

    }
}
