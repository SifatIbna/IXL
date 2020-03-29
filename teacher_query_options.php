<?php include 'server2.php';
	$student_id = $_SESSION['student_id'];
	$tot_solve = "SELECT count(*) as cnt from solve_history group by student_id having student_id = '$student_id'";
	$res = pg_query($db, $tot_solve);
	echo "<center>Total solved : ".pg_result($res, 0, 'cnt')."</center>";
?>


<form action="teacher_query_options.php" method = "POST">
	 <div align = "center" class="input-group">
        <label>Subject : </label>
        <input type="text" name="teacher_query_subject">
    </div>
     <div align = "center" class="input-group">
        <label>Grade : </label>
        <input type="text" name="teacher_query_grade">
    </div>
     <div align = "center" class="input-group">
        <label>Category : </label>
        <input type="text" name="teacher_query_category">
    </div>
     <div align = "center" class="input-group">
        <label>Skill : </label>
        <input type="text" name="teacher_query_skill">
    </div>
    <div align = "center" class = "input-group">
        <button type="submit" class="btn"
        name = "teacher_query_button">SUBMIT</button>
    </div>
</form>