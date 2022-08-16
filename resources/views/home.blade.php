@extends('layouts.new_app')

@section('content-main')
    <div class="container">
        <div class="row">
            <div class="col-md-12" >
                <nav >
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist" >
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Open<span class="badge badge-light">2</span></a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Close<span class="badge badge-light">4</span></a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <table class="table" cellspacing="0" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Ticket ID</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Delayed Hearing</td>
                                    <td><a href="#">#AAAA-0000-0017</a></td>
                                    <td>Medium</td>
                                    <td>Open</td>
                                </tr>
                                <tr>
                                    <td>Delayed Hearing</td>
                                    <td><a href="#">#AAAA-0000-0017</a></td>
                                    <td>Medium</td>
                                    <td>Open</td>
                                </tr>
                                <tr>
                                    <td>Delayed Hearing</td>
                                    <td><a href="#">#AAAA-0000-0017</a></td>
                                    <td>Medium</td>
                                    <td>Open</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <table class="table" cellspacing="0" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Ticket ID</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Delayed Hearing</td>
                                    <td><a href="#">#AAAA-0000-0017</a></td>
                                    <td>Medium</td>
                                    <td>Open</td>
                                </tr>
                                <tr>
                                    <td>Delayed Hearing</td>
                                    <td><a href="#">#AAAA-0000-0017</a></td>
                                    <td>Medium</td>
                                    <td>Open</td>
                                </tr>
                                <tr>
                                    <td>Delayed Hearing</td>
                                    <td><a href="#">#AAAA-0000-0017</a></td>
                                    <td>Medium</td>
                                    <td>Open</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
