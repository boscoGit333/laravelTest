<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Song;
use \App\Models\Singer;
use Illuminate\Validation\Rule;

class SingSongController extends Controller
{
    public function storeNewSinger(Request $request){
        $validated = $request->validate([
            'nome' => ['bail','required','unique:singers','max:255'],
            'nascita' => 'required|date|before:today',
            'sesso' => 'required|string|max:100'
        ],[
            'nome.required'=>'Il nome non può essere vuoto',
            'nome.unique' => 'Esiste già un cantante con questo nome',
            'nascita.required' => 'La data di nascita non può essere vuota',
            'nascita.before' => 'La data di nascita non può essere così recente',
            'sesso.required' => "Il sesso non può essere vuoto",
            'sesso.max' => 'La stringa digitata è troppo lunga (max:100 caratteri)'
        ]);

        $newSinger = new Singer;
        //dd($validated['artisti']);
        $newSinger->nome = $validated['nome'];
        $newSinger->nascita = $validated['nascita'];
        $newSinger->sesso = $validated['sesso'];
        $newSinger->save();
        
        
        return view('formNewSinger',['success'=>'Artista inserito con successo']);
    }

    public function storeNewSong(Request $request){
        $validated = $request->validate([
            'titolo' => ['required','unique:songs','max:255'],
            'pubblicazione' => 'required|date|before:tomorrow',
            'artisti' => 'array|required|min:1',
            'artisti.*' => 'required|string|exists:singers,id'
        ],[
            'titolo.required'=>'Il titolo non può essere vuoto',
            'titolo.unique' => 'Esiste già una canzone con questo titolo',
            'pubblicazione.required' => 'La data di pubblicazione non può essere vuota',
            'pubblicazione.before' => 'La data di pubblicazione non può essere futura',
            'artisti.*.exists' => "L'artista selezionato non esiste",
            'artisti.required' => 'Non è stato selezionato nessun artista'
        ]);

        $newSong = new Song;
        //dd($validated['artisti']);
        $newSong->titolo = $validated['titolo'];
        $newSong->pubblicazione = $validated['pubblicazione'];
        $newSong->save();
        $newSong->singers()->attach($validated['artisti']);
        
        return response('Canzone aggiunta con successo',200);
    }

    public function formNewSong(){
        return view('formNewSong',['singers'=>Singer::all()]);
    }

    
    public function listaCanzoni($singer = 'all'){
        if ($singer == 'all') return view('listaCanzoni',['singers'=>Singer::all(),'songs' => Song::all()]);
        
        if (Singer::where('nome',$singer)->count()==1){
            return view('listaCanzoni',['singer'=>$singer,'singers'=>Singer::all(),'songs' => Singer::where('nome',$singer)->first()->songs()->get()]);    
        }
        return abort(404);
        
    }

    public function postListaCanzoni(Request $request){
        //dd($request);
        //dd(urldecode($request->artista));
        return redirect()->route('listaCanzoni',['singer'=>urldecode($request->artista)]);
    }

    //SingSongController::listaCanzoni($request->artista)

    public function formEditSong(int $songid = -1){
        if($songid == -1){
            abort(404);
        }
        $song = Song::find($songid);
        if($song==null) abort(404);
        return view('formEditSong',['song'=>$song,'singers'=>Singer::all()]);
    }
    public function storeEditSong(request $request , int $songid){
        $song = Song::find($songid);
        if ($song==null) abort(404);
        $validated = $request->validate([
            'titolo' => ['bail','required',Rule::unique('songs','titolo')->ignore($song->id),'max:255'],
            'pubblicazione' => 'required|date',
            'artisti' => 'array|required|min:1',
            'artisti.*' => 'required|string|exists:singers,id'
        ],[
            'titolo.required'=>'Il titolo non può essere vuoto',
            'titolo.unique' => 'Esiste già una canzone con questo titolo',
            'pubblicazione.required' => 'La data di pubblicazione non può essere vuota',
            'artisti.*.exists' => "L'artista selezionato non esiste",
            'artisti.required' => 'Non è stato selezionato nessun artista'
        ]);
        $song->titolo = $validated['titolo'];
        $song->pubblicazione = $validated['pubblicazione'];
        $song->singers()->sync($validated['artisti']);
        $song->save();
        return view('formEditSong',['song'=>$song,'singers'=>Singer::all(),'success'=>'Modifica avvenuta con successo']);
    }

    public function deleteSong(request $request){
        $song = Song::find($request->songid);
        if ($song==null) return response('Errore canzone non trovata',404);
        $song->delete();
        return response('Canzone eliminata con successo',204);
        
    }

}

