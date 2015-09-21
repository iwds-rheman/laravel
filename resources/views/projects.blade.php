@extends('layouts.default')

@section('style')
    <link href="/dashboard/css/bootstrap.min.css" rel="stylesheet">
    {!! Html::style('dashboard/css/bootstrap.min.css') !!}
    <link href="/dashboard/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/dashboard/css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="/dashboard/css/animate.css" rel="stylesheet">
    <link href="/dashboard/css/mention.css" rel="stylesheet">
    <link href="/dashboard/css/style.css" rel="stylesheet">
@stop

@section('content')
    <div id="page-wrapper" class="gray-bg project-page-wrapper">
        <div class="col-md-2 no-padding">
            <div class="ibox col-md-12 project-list">
                <div class="ibox-title">
                    <h5>All projects</h5>
                    <a href="" data-toggle="modal" data-target="#AddProject" class="btn btn-primary btn-xs">Create project</a>
                    <div class="ibox-tools">

                        <a href="#" class="toggle-project"> < </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="project-list">
                        <table class="table table-hover">
                            <tbody>
                            @foreach($data['project'] as $project)
                                <tr>
                                    <td class="project-title">
                                        <a href="#" data="{!! $project -> UID !!}">{!! $project -> ProjectName !!}</a>
                                        <br/>

                                        <small>{!! $project -> CompanyName !!}</small>

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10 project-content-wrapper">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                    <a href="#" class="toggle-project-hide"> > </a>
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to IWDS Internal Project Management System.</span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="/dashboard/img/a7.jpg">
                                        </a>
                                        <div class="media-body">
                                            <small class="pull-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="/dashboard/img/a4.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="/dashboard/img/profile.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="profile.html">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="pull-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="grid_options.html">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="/logout">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>


        <div class="row">
            <div class="col-lg-12 content-wrapper">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="col-md-12 project-task">
                        <div class="ibox">
                            {{--<button type="button" class="btn btn-sm btn-white add-task-trigger" data="" disabled data-toggle="modal" data-target="#AddTask"> <i class="fa fa-pencil"></i> </button>--}}

                            <div id="animation_box" class="task-list animated">
                                <div class="animation-box-header"> <a href="#" class="close-task-box"><i class="fa fa-times"></i></a></div>
                                <div class="animation-text-info">
                                    <h4></h4>
                                    <p></p>
                                    <div class="todo-task">
                                        <table class="table table-hover todo-task-box">
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="comment-box-form">

                                    </div>
                                    <div class="ibox-content forum-post-container comments-content">
                                        <div class="forum-post-info">
                                            <h4><span class="text-navy"><i class="fa fa-comments-o"></i>Discussion</span></h4>
                                        </div>
                                        <div class="comments-content-items-content">
                                            <div class="comments-content-items">

                                            </div>
                                        </div>
                                        {!! Form::open(array('url'=>'/project/add-comment','class' => 'user-comment-commentbox')) !!}
                                        <input type="hidden" class="task_id" />
                                        <div class="form-group">
                                            {!!  Form::textarea('comment', null, ['class' => 'form-control', 'cols'=>"50",'rows'=>"3",'required'=>'yes']) !!}
                                        </div>
                                        <div class="form-group">
                                            <label>Project Attachments</label>
                                            {!! Form::file('attachment', ['class' => 'form-control','multiple'=>'yes']) !!}
                                        </div>
                                        <input class="btn btn-primary" type="submit" value="Comment">
                                        {!!  Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            <div id="animation_box" class="todo-task-info animated bounceOutRight">
                                <div class="animation-box-header"> <a href="#" class="close-task-box"><i class="fa fa-times"></i></a></div>
                                <div class="animation-text-info">
                                    <h4 class="todo-info-name"></h4>
                                    <p class="todo-info-desc"></p>
                                    <div class="todo-task-info-content">
                                        <div class="todo-task-box-info-content">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ibox-content">
                                <div class="task-box">
                                    {!! Form::open(array('url'=>'/projects/add-comment','class' => 'task-box-form')) !!}
                                    <input type="hidden" class="task_id" />
                                    <div class="form-group">
                                        {!!  Form::text(  'taskname', Input::old('taskname') , array( 'class' => 'form-control', 'placeholder' => 'type task name and assign to @someone...','required'=>'yes' ) ) !!}
                                    </div>
                                    <div class="form-group">
                                        {!!  Form::textarea('comment', null, ['class' => 'form-control', 'cols'=>"50",'rows'=>"2",'required'=>'yes','placeholder'=>'type # for todos and ~ for comment']) !!}
                                    </div>
                                    <div class="form-group">
                                         <input class="btn btn-primary" type="submit" value="Send">
                                    </div>
                                    {!!  Form::close() !!}
                                </div>
                                <div class="table-responsive project-task-list">
                                    <table class="table table-hover issue-tracker">
                                        <tbody>
                                        @foreach($data['projectTask'] as $projectTask)
                                            <tr>
                                                <td class="issue-info">
                                                    <div class="state">
                                                        @if($projectTask -> PriorityLvl==1)<div class="Urgent"></div>
                                                             <div class="{!! $projectTask -> Status !!} height-half"></div>
                                                        @else
                                                        <div class="{!! $projectTask -> Status !!}"></div>
                                                        @endif
                                                        </div>
                                                    <div class="task">
                                                        <a href="#" data="'+task.UID+'"class="trigger-taskbox">
                                                            <small>{!! $projectTask -> TaskName !!}</small>
                                                        </a><br/>
                                                        <small>{!! $projectTask -> TaskDesc !!}</small>
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>
        </div>

<div class="modal inmodal fade" id="AddTask" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"></span><span class="sr-only">Close</span></button>
            </div>
            {!! Form::open(array('url'=>'/project/task-title','class' => 'create-project-task-form')) !!}
            <div class="modal-body">
                <div class="form-group">
                    <label>Task Name</label>
                    {!!  Form::text('taskname', Input::old('taskname') , array( 'class' => 'form-control','required'=>'yes' ) ) !!}
                </div>
                <div class="form-group">
                    <label>Desc</label>
                    {!!  Form::textarea('taskdesc', null, ['class' => 'form-control']) !!}
                </div>  <div class="form-group">
                    <label>Priority &nbsp;&nbsp;</label>
                    <div class="icheckbox_square-green" style="position: relative;">
                        <input type="checkbox"name="priority" class="i-checks" style="position: absolute; opacity: 0;">
                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
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
@stop


@section('scripts')
        <!-- Mainly scripts -->
    <script src="/dashboard/js/jquery-2.1.1.js"></script>
    <script src="/dashboard/js/bootstrap.min.js"></script>
    <script src="/dashboard/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/dashboard/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/dashboard/js/plugins/dropzone/dropzone.js"></script>
    <script src="/dashboard/js/jquery.nicescroll.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="/dashboard/js/bootstrap-typeahead.js"></script>
    <script src="/dashboard/js/mention.js"></script>
    <script src="/dashboard/js/main.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="dashboard/js/inspinia.js"></script>
    <script src="dashboard/js/plugins/pace/pace.min.js"></script>


@stop
