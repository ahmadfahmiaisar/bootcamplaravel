<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Exports\EventExport;
use PDF;
use Excel;

class LaporanController extends Controller
{
    public function eventpdf(){
      $pdf = PDF::loadView('admin.event.laporan');
      return $pdf->download('event.pdf');
    }
    public function eventexcel(){
      //dd($this->collection());
      return Excel::download(new EventExport, 'namanya.xlsx');
    }
}
