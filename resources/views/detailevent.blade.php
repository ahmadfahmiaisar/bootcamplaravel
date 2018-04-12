@extends('layouts.master')
@section('css')
    <style>
        .Judul{
            font-family: roboto;
            padding-top: 6%;
            opacity: 0.6;
            margin-top: 1%;
            width: 100%;
            padding-top: 3%;
            padding-bottom: 3%;
            background: grey;
        }
        .hEvent{
            background-image: url('https://www.newstatesman.com/sites/all/themes/creative-responsive-theme/images/new_statesman_events.jpg');
            height: 400px;
            width: 100%;
            background-repeat: no-repeat;
        }
    </style>
@endsection
@section('header')
    <!-- StartHeader -->

        <div class="hEvent text-center row">
          <div class="Judul col align-self-end">
              <h1 class="subJudul">{{$detail->nama}}</h1>
          </div>
        </div>

    <!-- EndHeader -->
    <br>
@endsection
@section('content')
  <div class="container">
    <!-- StartNavTabs -->
    <ul class="nav nav-tabs " id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="deskripsi-tab" data-toggle="tab" href="#deskripsi" role="tab" aria-controls="deskripsi" aria-selected="true">Deskripsi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="daftar-tab" data-toggle="tab" href="#daftar" role="tab" aria-controls="daftar" aria-selected="false">Pendaftaran</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="deskripsi" role="tabpanel" aria-labelledby="deskripsi-tab">
      <br>
      <h2>Jadwal Pelaksanaan</h2>
      <p>{{date('d M Y', strtotime($detail->mulai))}}<b>s/d</b>{{date('d M Y', strtotime($detail->selesai))}}</p><br>

      <h2>Keterangan</h2>
      <p>
        {{$detail->keterangan}}
      </p><br>

      <h2>Deskripsi</h2>
      <img width="100%" src="../uploads/{{$detail->foto}}" alt=""><br><br>

      Global Azure Bootcamp Bogor - Indonesia

      Let's hit refresh your knowledge and skills by attending this event. You'll learn about the cutting-edge technologies from Microsoft. Infuse your application with a lot of great cloud services from Azure, and get more and more information from our speakers. Get your seat now.

      Agenda:
      <ol>
        <li>Modernize your M2M solution with Azure IoT Edge by Endank Suwarna - BMC</li>
        <li>Intro to Azure ML Workbench by Agus Kurniawan - MVP</li>
        <li>The Age of Bots with Bot Framework by M. Ibnu Fadhil - Gravicode</li>
        <li>Blockchain, The Future is here by Gilang Bhagaskara - Blocksphere</li>
        <li>CI/CD with VSTS by Fuady Rosma Hidayat - Altrovis</li>
        <li>Hands on Lab: Smart Robot with Azure IoT and Cognitive Services by Iwan Muttaqin dan M. Yunus</li>
        <li>Mark your calendar</li>
      </ol>


      Date : 21 April 2018

      Time : 09:00 - 16:00 WIB

      Place : Dilo Bogor, Jl. Raya Pajajaran No.39, Babakan, Bogor Tengah, Kota Bogor, Jawa Barat 16128
      <br><br>
    </div>
    <div class="tab-pane fade" id="daftar" role="tabpanel" aria-labelledby="daftar-tab">
      <br>
      <h2>PESERTA</h2>
      <p><b>Kuota : </b> {{$total = $detail->kuota}}<br>
      <b>Pendaftar : </b>{{$jml = count($peserta)}}<br>
      <b>Sisa Kuota : </b>{{$total - $jml}}</p>
      <h2>KEIKUTSERTAAN</h2>
      @if(count($ket)>0)
      <h3>{{$user->name}}, Sudah Terdaftar</h3>

      @else
      <form action="/users/{{$detail->id}}/daftar" method="post">
        {{csrf_field()}}
        <input type="submit" class="btn btn-lg btn-primary" name="submit" value="Daftar Event">
      </form>
      @endif
      <br><br>
    </div>
    </div>
    <!-- EndNavTabs -->
  </div>

@endsection
@section('js')

@endsection
