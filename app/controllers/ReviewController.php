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
            $reviews = DB::table('reviews')->where('id', $id)->get();
            return Response::json(array(
                  'error' => false,
                  'reviews' => $reviews
            ),
            200, 
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
      }


      public function create()
	{
            
            if (Input::has('name') && Input::has('discript') && Input::has('raiting') && Input::has('photos'))
            {
                  $name = Input::get('name');
                  $discript = Input::get('discript');
                  $raiting = Input::get('raiting');
                  $photos = Input::get('photos');

                  if(strlen($name) <= 50 && strlen($name) != 0)
                  {
                        if(strlen($discript) <= 1000 && strlen($discript) != 0)
                        {
                              if($raiting == 1 || $raiting == 2 || $raiting == 3 || $raiting == 4 || $raiting == 5)
                              {
                                    if(substr_count($photos, ' ') <=2 )
                                    {	
                                          DB::table('reviews')->insert(
                                                ['name' => $name, 'discript' => $discript, 'raiting' => $raiting, 'date' => date("Y-m-d H:i:s"), 'photos' => $photos]
                                          );

                                          return Response::json(array(
                                                'error' => false,
                                                'reviews' => $name
                                                ),
                                                200, 
                                                ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
                                                JSON_UNESCAPED_UNICODE
                                          );
                                    }					
                              }		
                        }
                  }   
            }
            return Response::json(array(
                  'error' => true,
                  'reviews' => "ошибка при создании"
                  ),
                  200, 
                  ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
                  JSON_UNESCAPED_UNICODE
            );         
      }

      public function showall()
	{           
            $reviews = DB::table('reviews')->get();
            $i = 1;
            $j = 0;
            $arrayName;
            foreach ($reviews as $review) 
            {
                  $arrayName['page'.$i][] = array(
				'id' => $review->id,
				'name' => $review->name,
				'raiting' => $review->raiting,
				'mainphoto' => $review->photos
			);
			$j++;
                  if($j == 10)
                  {
				$i++;
				$j = 0;

			}
            }
            return Response::json(array(
                  'error' => false,
                  'reviews' => $arrayName
            ),
            200, 
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
      }
}