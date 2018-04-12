<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index() {
      $event = \App\Event::get();
      return view('admin.peserta.index')->with('event', $event);
    }
    public function view($id) {
      // $peserta = \App\Peserta::find($id);
      $peserta = \DB::table('pesertas')
                ->join('events', 'pesertas.event_id', '=', 'events.id')
                ->join('users', 'pesertas.user_id', '=', 'users.id')
                ->where('event_id', '=', $id)
                ->select('users.name', 'users.email', 'events.nama', 'pesertas.id')
                ->get();
      return view('admin.peserta.peserta', compact('peserta'));
    }
    public function destroy($id){
      $user = \App\Peserta::find($id);
      $user->delete();

      return redirect()->back();
    }
}
