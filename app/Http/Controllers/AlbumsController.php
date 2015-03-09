<?php namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Format;
use App\Http\Requests;
use App\Http\Controllers\Controller;

Use Validator;
use App\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class AlbumsController extends Controller {


	public function index()
	{
		$artists = Artist::select('name', 'id')->orderBy('name')->get();
		return view('index', compact('artists'));
	}

	public function create()
	{
		$formats = Format::lists('name', 'id');
		$artists = Artist::lists('name', 'id');

		return view('albums.create', compact('formats', 'artists'));
	}

	public function store()
	{
		Validator::extend('alpha_spaces', function($attribute, $value)
		{
			return preg_match('/^[\pL\s\d]+$/u', $value);
		});

		$validator = Validator::make(
			[
				'title' => Input::get('title'),
				'price' => Input::get('price'),
				'purchased_from' => Input::get('purchased_from')
			],
			[
				'title' => 'required|min:1|alpha_spaces',
				'price' => 'required|min:1|numeric',
				'purchased_from' => 'required|min:3|alpha_spaces'
			]
		);

		if($validator->passes()) {
			$albumName = Input::get('title');
			$albumFormat = Input::get('format');
			$exists = Album::where('name', $albumName)->where('format_id', $albumFormat)->first();

			if ($exists) {
				flash()->error('Album already exists');
				return Redirect('albums.create')->withInput();
			} else {
				$purchase = new Purchase;
				$purchase->price = Input::get('price');
				$purchase->purchased_from = Input::get('purchased_from');
				$purchase->save();
				$purchaseId = $purchase->id;

				$album = new Album;
				$album->name = Input::get('title');
				$album->artist_id = Input::get('artist');
				$album->format_id = Input::get('format');
				$album->purchase_id = $purchaseId;
				$album->save();
				flash()->success('Your album has been added');

				return Redirect::to('/');
			}
		} else {
			$messages = $validator->messages();
			flash($messages);
			return Redirect('albums.create')->withInput();
		}
	}

	public function edit($id)
	{
		$formats = Format::lists('name', 'id');
		$artists = Artist::lists('name', 'id');
		$album = Album::findOrFail($id);
		return view('albums.edit', compact('album', 'formats', 'artists'));
	}


	public function update($id)
	{
		Validator::extend('alpha_spaces', function($attribute, $value)
		{
			return preg_match('/^[\pL\s\d]+$/u', $value);
		});

		$validator = Validator::make(
			[
				'title' => Input::get('title'),
				'price' => Input::get('price'),
				'purchased_from' => Input::get('purchased_from')
			],
			[
				'title' => 'required|min:1|alpha_spaces',
				'price' => 'required|min:1|numeric',
				'purchased_from' => 'required|min:3|alpha_spaces'
			]
		);

		if($validator->passes()) {
			$albumName = Input::get('title');
			$albumFormat = Input::get('format');
			$artist = Input::get('artist');
			$exists = Album::where('name', $albumName)->where('format_id', $albumFormat)->where('artist_id', $artist)->first();

			if ($exists) {
				flash()->error('Album already exists');
				return Redirect('AlbumsController@index');
			} else {
				$album = Album::findOrFail($id);
				$album->name = Input::get('title');
				$album->artist_id = Input::get('artist');
				$album->format_id = Input::get('format');
				$album->purchase->price = Input::get('price');
				$album->purchase->purchased_from = Input::get('purchased_from');
				$album->update();
				flash()->success('Your album has been edited');

				return Redirect::to('/');
			}
		} else {
			$messages = $validator->messages();
			flash($messages);
			return Redirect('AlbumsController@index');
		}
	}


	public function delete($id)
	{
		$album = Album::findOrFail($id);
		return view('albums.destroy', compact('album'));
	}

	public function destroy()
	{
		$id = Input::get('id');
		$album = Album::findOrFail($id);
		$album->delete();

		flash()->success('Your album has been deleted');
		return Redirect('/');
	}

}