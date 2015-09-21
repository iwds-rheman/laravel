<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="authenticity_token" name="csrf-param">
        <title>Internal Project Management</title>
        @yield('style')
    </head>

    <body>
    <div class="modal inmodal fade" id="AddProject" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"></span><span class="sr-only">Close</span></button>
                </div>
                {!! Form::open(array('url'=>'/project/create','class' => 'create-project-form')) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label>Project Name</label>
                        {!!  Form::text(  'projectname', Input::old('UserName') , array( 'class' => 'form-control','required'=>'yes' ) ) !!}
                    </div>
                    <div class="form-group">
                        <label>Notes</label>
                        {!!  Form::textarea('notes', null, ['class' => 'form-control']) !!}
                    </div>
                   {{-- <div class="form-group">
                        <label>Project Attachments</label>
                        {!! Form::file('attachment', ['class' => 'form-control']) !!}
                    </div>--}}
                    <div id="my-awesome-dropzone" class="dropzone dz-clickable" action="#">
                        <div class="dropzone-previews"></div>
                        <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                    </div>
                <div class="modal-footer">
                    {!!  Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>

                </div>
                {!!  Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                                <img alt="image" class="img-circle" src="/dashboard/img/profile_small.jpg" />
                                 </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{!! $data['user'][0]->FName !!} {!! $data['user'][0]->LName !!}</strong>
                                 </span> <span class="text-muted text-xs block">{!! $data['user'][0]->AccountType !!}<b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Contacts</a></li>
                                <li><a href="#">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IPM
                        </div>
                    </li>
                    <li class="active">
                        <a href="/"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning pull-right">16/24</span></a>
                    </li>
                    <li class="projects">
                        <a href="/projects"><i class="fa fa-sitemap"></i> <span class="nav-label">Projects</span></a> <a href="#" data-toggle="modal" data-target="#AddProject"><span class="pull-right label label-primary">create</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="graph_flot.html">Timesheet</a></li>
                            <li><a href="graph_morris.html">Invoice</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html"><i class="fa fa-calendar"></i> <span class="nav-label">Calendar</span> </a>
                    </li>
                    <li>
                        <a href="widgets.html"><i class="fa fa-wechat"></i> <span class="nav-label">Chat View</span> </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Cloud Files</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="search_results.html">Documents</a></li>
                            <li><a href="invoice.html">Photos</a></li>
                            <li><a href="login.html">Audio</a></li>
                            <li><a href="login_two_columns.html">Video</a></li>
                        </ul>
                    </li>
                    <li class="landing_link hidden">
                        <a target="_blank" href="Landing_page/index.html"><i class="fa fa-question-circle "></i> <span class="nav-label">Knowledgebase</span> <span class="label label-warning pull-right">Beta</span></a>
                    </li>
                </ul>

            </div>
        </nav>
        @yield('content')
    </div>
        @yield('scripts')
    </body>
    <input type="file" multiple="multiple" class="dz-hidden-input" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
</html>
