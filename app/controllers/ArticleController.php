<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

class ArticleController extends \BaseController {

    protected $request;

    protected $articles;

    public function __construct(){

    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        //should move this to model
        //$articles = DB::collection('articles')->get();
        $articles = Article::all();

        return Response::json($articles);
    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        //TODO: should move this to service  ( use ioc)
		$article = new Article();

        $article->title = Input::get('title');
        $article->body = Input::get('body');
        $article->published_at = Carbon::now();
        $article->save();

        return Response::make(['id' => $article->id], 201);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        try {
            $article = Article::findOrFail($id);
            return $article;
        }catch (ModelNotFoundException $e){
            //write to log
            Log::error($e->getTraceAsString());
            //return 404 error code
            return Response::make(['status'=>'error'], 404);
        }
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        try {
            $article = Article::findOrFail($id);
            $article->title = Input::get('title');
            $article->body = Input::get('body');
            $article->update_at = Carbon::now();
            $article->save();
            return Response::make($article,200);
        }catch (ModelNotFoundException $e){
            Log::error($e->getTraceAsString());
            return Response::make(['status'=>'error'],404);
        }

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try {
            $article = Article::findOrFail($id);
            $article->delete();
            return Response::make(['status'=>'deleted'], 204);
        }catch (ModelNotFoundException $e){
            Log::error($e->getTraceAsString());
            return Response::make(['status'=>'error'],404);
        }
	}


}
