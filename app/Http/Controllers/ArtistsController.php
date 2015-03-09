<?php namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ArtistsController extends Controller {

    public function show($id)
    {
        $artist = Artist::findOrFail($id);
        $albums = Album::where('artist_id', $id)->orderBy('name')->get();

        return view('artists.show', compact('artist', 'albums'));
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store()
    {
        Validator::extend('alpha_spaces', function($attribute, $value)
        {
            return preg_match('/^[\pL\s\d]+$/u', $value);
        });

        $validator = Validator::make(
            [
                'name' => Input::get('name'),
            ],
            [
                'name' => 'required|min:1|alpha_spaces',
            ]
        );

        if($validator->passes()) {
            $artistName = Input::get('name');

            $exists = Artist::where('name', $artistName)->first();

            if(!$exists) {
                $artist = new Artist;
                $artist->name = Input::get('name');
                $artist->save();

                flash()->success('Artist has been added');
                return Redirect::to('/');
            } else {
                flash()->error('Artist already exists');
                return Redirect('artists.create')->withInput();
            }
        } else {
            $messages = $validator->messages();
            flash($messages);
            return Redirect('AlbumsController@index');
        }
    }


    public function edit($id)
    {
        $artist = Artist::findOrFail($id);
        return view('artists.edit', compact('artist'));
    }


    public function update($id)
    {
        Validator::extend('alpha_spaces', function($attribute, $value)
        {
            return preg_match('/^[\pL\s\d]+$/u', $value);
        });

        $validator = Validator::make(
            [
                'name' => Input::get('name'),
            ],
            [
                'name' => 'required|min:1|alpha_spaces',
            ]
        );

        if($validator->passes()) {
            $artistName = Input::get('name');

            $exists = Artist::where('name', $artistName)->first();

            if (!$exists) {
                $artist = Artist::findOrFail($id);
                $artist->name = Input::get('name');
                $artist->update();
                flash()->success('Artist has been edited');
                return redirect('/');
            } else {
                flash()->error('Artist already exists');
                return redirect('/');
            }
        }
    }


    public function delete($id)
    {
        $artist = Artist::findOrFail($id);
        return view('artists.destroy', compact('artist'));
    }

    public function destroy()
    {
        $id = Input::get('id');
        $artist = Artist::findOrfail($id);

        $albums = Album::where('artist_id', $id)->first();
        if($albums) {
            flash()->error('You can\'t delete an artist that has albums');
        } else {
            $artist->delete();
            flash()->success('Artist has been deleted');
        }

        return redirect('/');
    }
}
