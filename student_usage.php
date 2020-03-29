<?php
	include 'server2.php';
	// how many questions, total, subjectwise, gradewise
	$stud_id = $_SESSION['student_id'];
	$total_solved = "SELECT count(*) AS cnt FROM solve_history where verdict = 'AC' GROUP BY student_id HAVING student_id = '$stud_id'";

	$res = pg_query($db, $total_solved);
	$tot = pg_result($res, 0, 'cnt');
	echo "You have solved a total of $tot questions.<br>";

	$total_math_solved = "SELECT count(*) cnt from solve_history s, question q, question_details qd where 
	                      s.student_id = '$stud_id' and s.question_id = q.question_id
						  and q.skill_name = qd.skill_name and qd.subject = 'math'
						group by s.verdict having s.verdict = 'AC'";
	$res = pg_query($db, $total_math_solved);
	$totmath = pg_result($res, 0, 'cnt');
	echo "You have solved a total of $totmath Math questions.<br>";

	$total_science_solved = "SELECT count(*) cnt from solve_history s, question q, question_details qd where 
	                      s.student_id = '$stud_id' and s.question_id = q.question_id
						  and q.skill_name = qd.skill_name and qd.subject = 'science'
						group by s.verdict having s.verdict = 'AC'";
	$res = pg_query($db, $total_science_solved);
	if(pg_num_rows($res))
		$totscience = pg_result($res, 0, 'cnt');
	else $totscience = 0;
	echo "You have solved a total of $totscience Science questions.";




	// how manyb skills
?>