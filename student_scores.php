<?php
	include 'server2.php';

	echo "<center>"."SKILL &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp POINTS"."</center>";
	$student_id = $_SESSION['student_id'];
	$selected_grade = $_SESSION['selected_grade'];
	$selected_category = $_SESSION['selected_category'];
	$q_cat = "SELECT sh.student_id, qd.grade, qd.skill_name, count(*) as cnt from solve_history sh, question q, question_details qd where verdict = 'AC' and sh.question_id = q.question_id
			  and q.skill_name = qd.skill_name and qd.category = '$selected_category' and qd.grade = '$selected_grade'
			  group by sh.student_id, qd.grade, qd.skill_name having student_id = '$student_id'";
			  $res = pg_query($db, $q_cat);
	 while($query_row = pg_fetch_assoc($res)){
              $sid = $query_row['student_id'];
              $skill = $query_row['skill_name'];
              $c = $query_row['cnt'];
              echo "<center>".$skill . "&nbsp&nbsp&nbsp&nbsp&nbsp" . $c . "</center>". '<br>';
          }
?>

