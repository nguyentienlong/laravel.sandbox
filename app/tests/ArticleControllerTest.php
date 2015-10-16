<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 10/4/15
 * Time: 4:57 PM
 */

use Carbon\Carbon;

class ArticleControllerTest extends TestCase{

    // public function testCreateArticle(){
    //     $title = "test title";
    //     $body = "test body";
    //     $params = ['title'=>$title,'body'=>$body];
    //     $response = $this->call('POST','/article',$params,$file=array(),$server=array(), null);
    //     $this->assertResponseStatus(201);
    // }

    // public function testUpdateArticle(){
    //     $id = '5611090f88233feb6e8b4567';
    //     $title = "test update title" . Carbon::now();
    //     $body = "test update body" .Carbon::now();
    //     $params = ['title'=>$title,'body'=>$body];
    //     $response = $this->call('PUT','/article/'.$id,$params,$file=array(),$server=array(), null);
    //     $this->assertResponseStatus(200);
    // }

    // public function testDeleteArticleWithNotExistedId(){
    //     $id = '1';
    //     $response = $this->call('DELETE','/article/'.$id, $params=array(),$file=array(),$server=array(),null);
    //     $this->assertResponseStatus(404);
    // }

    // public function testDeleteArticleWithExistedId(){
    //     //get ramdom id from artidles
    //     $article = Article::first();

    //     if($article instanceof Article) {
    //         $response = $this->call('DELETE', '/article/' . $id=$article->id, $params = array(), $file = array(), $server = array(), null);
    //         $this->assertResponseStatus(204);
    //     }
    // }

    // public function testIndexReturnAllArticles(){
    //     $allArticlesFromDatabaseCount = Article::all()->count();

    //     $response = $this->call("GET","/article/", $params=array(), $file=array(),$server=array(),null);

    //     $articles = json_decode($response->getContent(), true);

    //     $this->assertResponseStatus(200);

    //     $this->assertEquals($allArticlesFromDatabaseCount, count($articles));

    // }

}