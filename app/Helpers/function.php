<?php 


function getSprint($task_id, $project_id){

if ($task_id == NULL) {
	return 'geen sprint';
}else{

	$sql = "SELECT sprints.remarks 
FROM sprints, task 
WHERE sprints.project_id = '$project_id' AND task.sprint_id = sprints.id AND task.id = '$task_id'";
// return $task_id."--".$project_id;

$data = DB::select($sql);


return $data[0]->remarks;

}




}

