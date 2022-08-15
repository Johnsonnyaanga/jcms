
@extends('admin.main-layout')
@section('header-links')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
@endsection


@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Agents</h1>


          {{-- @foreach ($agents as $agents )
          {{$agents->username}}<br>
          @endforeach --}}


        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Agents</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')

<div class="container-fluid">
    @if(Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <i class="fas  fa-check-circle"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('success')}}
            </div>
            @endif
            <!-- failure message -->
            @if(Session::has('fails'))
            <div class="alert alert-danger alert-dismissable">
                <i class="fas fa-ban"></i>
                <b>{!! Lang::get('lang.fails') !!}!</b>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('fails')}}
            </div>
            @endif

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Agents</h3>
            <div class="card-tools">
                <a href="{{route('create-agent')}}">
                <button type="button" class="btn btn-primary" >
                    <i class="fas fa-plus"></i>

                    Create Agent

                </button>
                 </a>

            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Role</th>
                <th>Status</th>
                <th>Queue</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
          @if (empty($agents))
            <!-- display no users found -->
          @else
          @foreach ($agents as $agent)
          @isset($agent->queues)
          <tr>
            <td>{{$agent->firstname}} {{$agent->lastname}}</td>
            <td>{{$agent->username}}</td>
            <td>{{$agent->roles->pluck('name')[0]}}</td>
            <td>
                @if ($agent->is_active == 1)
                Active
                @else
                Inactive
                @endif

            </td>
            <td>{{$agent->queues->name}}</td>
            <td>{{$agent->created_at}}</td>
            <td>
                <a href="{{route('edit-agent', $agent->id )}}">
                    <button class="btn btn-primary">
                        Edit
                    </button>
                    </a>
            </td>
          </tr>
          @else
          <tr>
            <td>{{$agent->firstname}} {{$agent->lastname}}</td>
            <td>{{$agent->username}}</td>
            <td>{{$agent->roles->pluck('name')[0]}}</td>
            <td>Active</td>
            <td>None</td>
            <td>03/06/2022 03:52:54</td>
            <td>
                <a href="{{route('edit-agent', $agent->id )}}">
                <button class="btn btn-primary">
                    Edit
                </button>
                </a>
            </td>
          </tr>
          @endisset

          @endforeach

          @endif



              </tbody>
              <tfoot>

              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        {{-- <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>Trident</td>
                <td>Internet
                  Explorer 4.0
                </td>
                <td>Win 95+</td>
                <td> 4</td>
                <td>X</td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>Internet
                  Explorer 5.0
                </td>
                <td>Win 95+</td>
                <td>5</td>
                <td>C</td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>Internet
                  Explorer 5.5
                </td>
                <td>Win 95+</td>
                <td>5.5</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>Internet
                  Explorer 6
                </td>
                <td>Win 98+</td>
                <td>6</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>Internet Explorer 7</td>
                <td>Win XP SP2+</td>
                <td>7</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Trident</td>
                <td>AOL browser (AOL desktop)</td>
                <td>Win XP</td>
                <td>6</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Firefox 1.0</td>
                <td>Win 98+ / OSX.2+</td>
                <td>1.7</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Firefox 1.5</td>
                <td>Win 98+ / OSX.2+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Firefox 2.0</td>
                <td>Win 98+ / OSX.2+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Firefox 3.0</td>
                <td>Win 2k+ / OSX.3+</td>
                <td>1.9</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Camino 1.0</td>
                <td>OSX.2+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Camino 1.5</td>
                <td>OSX.3+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Netscape 7.2</td>
                <td>Win 95+ / Mac OS 8.6-9.2</td>
                <td>1.7</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Netscape Browser 8</td>
                <td>Win 98SE+</td>
                <td>1.7</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Netscape Navigator 9</td>
                <td>Win 98+ / OSX.2+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.0</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.1</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.1</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.2</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.2</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.3</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.3</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.4</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.4</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.5</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.5</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.6</td>
                <td>Win 95+ / OSX.1+</td>
                <td>1.6</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.7</td>
                <td>Win 98+ / OSX.1+</td>
                <td>1.7</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Mozilla 1.8</td>
                <td>Win 98+ / OSX.1+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Seamonkey 1.1</td>
                <td>Win 98+ / OSX.2+</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Gecko</td>
                <td>Epiphany 2.20</td>
                <td>Gnome</td>
                <td>1.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Webkit</td>
                <td>Safari 1.2</td>
                <td>OSX.3</td>
                <td>125.5</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Webkit</td>
                <td>Safari 1.3</td>
                <td>OSX.3</td>
                <td>312.8</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Webkit</td>
                <td>Safari 2.0</td>
                <td>OSX.4+</td>
                <td>419.3</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Webkit</td>
                <td>Safari 3.0</td>
                <td>OSX.4+</td>
                <td>522.1</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Webkit</td>
                <td>OmniWeb 5.5</td>
                <td>OSX.4+</td>
                <td>420</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Webkit</td>
                <td>iPod Touch / iPhone</td>
                <td>iPod</td>
                <td>420.1</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Webkit</td>
                <td>S60</td>
                <td>S60</td>
                <td>413</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera 7.0</td>
                <td>Win 95+ / OSX.1+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera 7.5</td>
                <td>Win 95+ / OSX.2+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera 8.0</td>
                <td>Win 95+ / OSX.2+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera 8.5</td>
                <td>Win 95+ / OSX.2+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera 9.0</td>
                <td>Win 95+ / OSX.3+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera 9.2</td>
                <td>Win 88+ / OSX.3+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera 9.5</td>
                <td>Win 88+ / OSX.3+</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Opera for Wii</td>
                <td>Wii</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Nokia N800</td>
                <td>N800</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Presto</td>
                <td>Nintendo DS browser</td>
                <td>Nintendo DS</td>
                <td>8.5</td>
                <td>C/A<sup>1</sup></td>
              </tr>
              <tr>
                <td>KHTML</td>
                <td>Konqureror 3.1</td>
                <td>KDE 3.1</td>
                <td>3.1</td>
                <td>C</td>
              </tr>
              <tr>
                <td>KHTML</td>
                <td>Konqureror 3.3</td>
                <td>KDE 3.3</td>
                <td>3.3</td>
                <td>A</td>
              </tr>
              <tr>
                <td>KHTML</td>
                <td>Konqureror 3.5</td>
                <td>KDE 3.5</td>
                <td>3.5</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Tasman</td>
                <td>Internet Explorer 4.5</td>
                <td>Mac OS 8-9</td>
                <td>-</td>
                <td>X</td>
              </tr>
              <tr>
                <td>Tasman</td>
                <td>Internet Explorer 5.1</td>
                <td>Mac OS 7.6-9</td>
                <td>1</td>
                <td>C</td>
              </tr>
              <tr>
                <td>Tasman</td>
                <td>Internet Explorer 5.2</td>
                <td>Mac OS 8-X</td>
                <td>1</td>
                <td>C</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>NetFront 3.1</td>
                <td>Embedded devices</td>
                <td>-</td>
                <td>C</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>NetFront 3.4</td>
                <td>Embedded devices</td>
                <td>-</td>
                <td>A</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>Dillo 0.8</td>
                <td>Embedded devices</td>
                <td>-</td>
                <td>X</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>Links</td>
                <td>Text only</td>
                <td>-</td>
                <td>X</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>Lynx</td>
                <td>Text only</td>
                <td>-</td>
                <td>X</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>IE Mobile</td>
                <td>Windows Mobile 6</td>
                <td>-</td>
                <td>C</td>
              </tr>
              <tr>
                <td>Misc</td>
                <td>PSP browser</td>
                <td>PSP</td>
                <td>-</td>
                <td>C</td>
              </tr>
              <tr>
                <td>Other browsers</td>
                <td>All others</td>
                <td>-</td>
                <td>-</td>
                <td>U</td>
              </tr>
              </tbody>
              <tfoot>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div> --}}
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
@endsection




@section('javascript-links')
!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>
<!-- Page specific script -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection

