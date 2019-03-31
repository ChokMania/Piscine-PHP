<?php
function check_root($value){
	if (file_exists(".private/root"))
	{
		$users = unserialize(file_get_contents(".private/root"));
		if ($users)
			foreach($users as $id)
				if ($id == $value)
					return true;
	}
	return false;
}
?>