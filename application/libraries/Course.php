<?php
/**
 * Object Class for CourseObject
 */
class Course{
	
	Public $COURSE_ID;
	Public $COURSE_NAME;
	Public $COURSE_LENGTH;
	Public $PUBLISH_DATE;
	Public $PERCENT_COMPLETE;
	Public $USER_ID;
	Public $ENROLL_DATE;
	Public $USER_COURSE_STATUS_ID;
	Public $USER_COURSE_STATUS_VALUE_ID;
	Public $USER_COURSE_STATUS_VALUE_NAME;
	Public $QUIZ_STATUS_VALUE_NAME;
	Public $COMPLETE_DATE;
	Public $PERCENT_SCORED;
	Public $CERTIFICATE_PATH;
	Public $NO_STATE;
	Public $AVAILABLE;
	Public $COURSE_NUM;
	
	
	public function __set($name, $value)
	{
		log_message('info','inside set block'.$name);

	}

	public function __get($name)
	{
		if (isset($this->$name))
		{
			return $this->$name;
		}
	} 
}
?>