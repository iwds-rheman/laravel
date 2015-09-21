<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Projects;
use App\Models\Task;
use App\Models\Taskmessage;
use Auth;
use DB;
use Response;
use DateTime;
use Request;
class projectController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $user = Auth::User();
        $userInfo = DB::select('select a.FName,a.LName,b.AccountType from user_info as a,Account_type as b where a.AccountTypeID=b.UID and a.UID = '.$user->UID.' LIMIT 1');
        $projects = DB::select('select b.UID,b.ProjectName,a.CompanyName from user_info as a,project_info as b where b.UserID = a.UID');
        $projtask = Task::select(DB::raw('TaskName,TaskDesc,Status,PriorityLvl'))->OrderBy('PriorityLvl', 'desc')->get();


        $data = array('user'=>$userInfo,'project'=>$projects,'projectTask'=>$projtask);
        return view('projects')->with('data', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
        return $id;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function taskStore()
    {
        $id= Request::input('projectID');
        $name= Request::input('taskname');
        $desc= Request::input('taskdesc');
        $prio= Request::input('priority');

        $dt = new DateTime;
        $task = new Task;
        $task ->ProjectID=$id;
        $task ->TaskName=$name;
        $task ->TaskDesc=$desc;
        $task ->PriorityLvl=$prio;
        $task ->Status='Pending';
        $task ->ParentID='0';
        $task ->DocumentID='0';
        $task ->TimeStamp=$dt->format('y-m-d H:i:s');
        $task ->save();
        return  $task;
    }
	public function projectStore()
	{
		// Getting all post data
		//$data= ::find(Input::get('projectname'));


        //attach file has been comment for future use.
       /* $attach_raw= Request::input('projectattach');

        $name = str_replace(' ', '_', $name);
        $attach_name= pathinfo($attach_raw,PATHINFO_BASENAME);
        $directory ='';
        $directory_result = File::makeDirectory('_source_ProjectImages/'.$name, 0075, true,true);


        $file= file_get_contents($attach_raw);

        $save_file = file_put_contents('_source_ProjectImages/'.$name,$file);*/
        //$project ->ProjectDesc=$attach_extension;

        $user = Auth::User();

        $name= Request::input('projectname');
        $note= Request::input('projectnote');
        $dt = new DateTime;
        $project = new Projects;
        $project ->UserID=$user->UID;
        $project ->ProjectName=$name;
        $project ->ProjectDesc=$note;
        $project ->StartDate=$dt->format('y-m-d H:i:s');
        $project ->save();
		return $project;
	}
    public function commentStore(){
        $user = Auth::User();
        $taskid= Request::input('taskid');
        $comment= Request::input('comment');
        $dt = new DateTime;
        $task = new Taskmessage;
        $task ->TaskID=$taskid;
        $task ->UserID=$user->UID;
        $task ->Message=$comment;
        $task ->TimeStamp=$dt->format('y-m-d H:i:s');
        $task ->save();
        return $task;
    }

	public function showTask(Request $request)
	{
        $ProjID= $request::input('ProjID');
        $task=Task::select(DB::raw('UID,TaskDesc,TaskName,PriorityLvl,Status'))->where('ProjectID','=',$ProjID)->OrderBy('PriorityLvl', 'desc')->get();
        return Response::json($task);
	}

	public function showTaskInfo(Request $request)
	{
		$taskID= $request::input('taskID');
		$taskInfo=Task::select(DB::raw('UID,TaskDesc,TaskName,PriorityLvl,Status'))->where('ParentID','=',$taskID)->orWhere('UID','=',$taskID)->get();
       return Response::json($taskInfo);
	}
	public function showTodoTaskInfo(Request $request){
		$todotaskID= $request::input('taskID');
		$todotaskInfo= DB::select('select a.Fname,a.Lname,b.Message,b.TimeStamp from user_info as a,task_message as b where b.TaskID='.$todotaskID.' and a.UID=b.UserID order by b.TimeStamp DESC');
		return Response::json($todotaskInfo);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
