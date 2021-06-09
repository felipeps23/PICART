@extends('backend.base')

@section('content')

<style type="text/css">
  .mini{
    border: none!important;
   margin-top:-40px!important;
    background: transparent!important;
    overflow: hidden;
  }
  .normal img{
    display:none;
  }
  #widget tr.logo td a, #widget.widget-completo tr td.copy a.logo{
    display:none!important;
  }
</style>

<h1 class="breadcrumb-header">Welcome to our backend!</h1>
<div class="row">
            
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">

                <div class="card-people mt-auto">
                  <img src="{{url('/assets/backend/people.svg')}}" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>


                      </div>
                      <div class="ml-2">

                        <h4 class="location font-weight-normal" style="background:#dae7ff; position: relative;
    z-index: 1029;">Granada</h4>
                        <h6 class="font-weight-normal"  style="background:#dae7ff;position: relative;
    z-index: 1029;">Spain</h6>
                        <div id="c_f3cbf02066bd221d7eb5a638812273d0" class="mini"></div><script type="text/javascript" src="https://www.eltiempo.es/widget/widget_loader/f3cbf02066bd221d7eb5a638812273d0"></script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total photos updated</p>
                      <p class="fs-30 mb-2">{{ $totalphotos[0]->total  }}</p>
                      <p>Total of the entire web </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total presets updated</p>
                      <p class="fs-30 mb-2">{{ $totalpresets[0]->total  }}</p>
                      <p>Total of the entire web </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Total comments</p>
                      <p class="fs-30 mb-2">{{ $totalcomments[0]->total  }}</p>
                      <p>Total of the entire web </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Total valuations</p>
                      <p class="fs-30 mb-2">{{ $totalvaluations[0]->total  }}</p>
                      <p>Total of the entire web </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Last 7 presets uploadeds</p>
                  <div class="table-responsive">
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th class="pl-0  pb-2 border-bottom">Name</th>
                          <th class="border-bottom pb-2">Price</th>
                          <th class="border-bottom pb-2">Photo</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($last7presets as $last7preset)
                        <tr>
                          <td class="pl-0">{{ $last7preset->name }}</td>
                          <td><p class="mb-0">{{ $last7preset->price }} $</p></td>
                          <td><img src="data:image/png;base64,{{ $last7preset->photo }}" style="width: 35px;height: 30px;border-radius: 100%;object-fit:cover"></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-title">Users with more photos uploaded</p>
                      <div class="charts-data">
                        @foreach( $usersWithMorePhotos as $usersWithMorePhoto )
                        <div class="mt-3">
                          <p class="mb-0">{{$usersWithMorePhoto->nickname}}</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="progress progress-md flex-grow-1 mr-4">
                              <div class="progress-bar bg-inf0" role="progressbar" style="width: {{$usersWithMorePhoto->totalphotos}}0%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">{{$usersWithMorePhoto->totalphotos}}</p>
                          </div>
                        </div>
                        @endforeach
                      </div>  
                    </div>
                  </div>
                </div>
                <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                  <div class="card data-icon-card-primary">
                    <div class="card-body">
                      <p class="card-title text-white">Total presets purchased</p>                      
                      <div class="row">
                        <div class="col-8 text-white">
                          <h3>{{ $totalpurchases[0]->total  }}</h3>
                          <p class="text-white font-weight-500 mb-0">The total number of presets purchased by ours users.</p>
                        </div>
                        <div class="col-4 background-icon">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Last 5 comments</p>
                  <ul class="icon-data-list">
                    @foreach ($last5comments as $last5comment)
                    <li>
                      <div class="d-flex">
                        <img src="data:image/png;base64,{{ $last5comment->photo }}"></img>
                        <div>
                          <p class="text-info mb-1">{{ $last5comment->nickname }}</p>
                          <p class="mb-0">{{ $last5comment->description }}</p>
                          <small>{{ date('d-m-y', strtotime($last5comment->created_at)) }}</small>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
@endsection