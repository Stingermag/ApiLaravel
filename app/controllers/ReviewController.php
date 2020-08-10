<?php
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class ReviewController extends \BaseController {




    /**
   * Показать список всех пользователей приложения.
   *
   * @return Response
   */
	public function show($id)
	{
      $users = DB::table('reviews')->where('id', $id)->get();
      return Response::json(array(
            'error' => false,
            'reviews' => $users
      ),
      200, 
      ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
      JSON_UNESCAPED_UNICODE);
      }

    

    protected function formateArea($area) {

		return [
            'name' => $area->name,
            'raiting' => $area->raiting,
            'discript' => $area->discript,
            'photos' => $area->photos
			
		];
	}



}