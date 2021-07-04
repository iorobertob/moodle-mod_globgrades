<?php
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Prints an instance of mod_globgrades.
 *
 * @package     mod_globgrades
 * @copyright   2021 Ideas-Block <roberto@idea-block.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" >
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<h1> <?php echo($name) ?> </h1>
<table class="display  dataTable collapsed dtr-inline" id="the_table">
	<thead>
		<th>
			Field
		</th>
		<th>
			Value
		</th>
	</thead>
	
	<tbody>
		<tr>
			<td>
				Student Name
			</td>
			<td>
				<input type="text" id="student_name" name="student_name"><br><br>
			</td>
		</tr>

		<tr>
			<td>
				Course name
			</td>
			<td>
				<input type="text" id="course_name" name="course_name"><br><br>
			</td>
		</tr>

		<tr>
			<td>
				Grade
			</td>
			<td>
				<input type="text" id="grade" name="grade"><br><br>
			</td>
		</tr>

		<tr>
			<td>
				Date of Grade
			</td>
			<td>
				<input 
					type="date" 
					id="date" 
					name="date"
       				value="2018-07-22"
       				min="2018-01-01">
			</td>
		</tr>
		<tr>
			<td>
				Lecturer
			</td>
			<td>
				<input type="text" id="teacher_name" name="teacher_name"><br><br>
			</td>
		</tr>
		<tr>
			<td>
				
			</td>
			<td>
				<button data-playing="false" 
						class="tape-controls-play" 
						role="switch" 
						aria-checked="false"
						onclick="httpGetAsync()">
					<span>Save</span>
				</button>
			</td>
		</tr>
	</tbody>
</table>



<script>
    $(document).ready(function() 
    {
	    $('#the_table').DataTable({
	        fixedHeader: true,
	        scrollY: '1000px',
	        responsive:true,
	        searching:false,
	        paging:false,
    		bLengthChange: false,
    		bSort:false,
	        });
    });
</script>

<script>
   	function httpGetAsync(theUrl="https://education.ideas-block.com/webservice/rest/server.php?wstoken=daae7ac0dd870aff236e2378ab1a2595&wsfunction=mod_globgrades_hello_world&moodlewsrestformat=json&student_name=simon&grade=99", callback)
		{
			var student = document.getElementById("student_name").value;
			var course 	= document.getElementById("course_name").value;
			var grade 	= document.getElementById("grade").value;
			var date 	= document.getElementById("date").value;
			var teacher = document.getElementById("teacher_name").value;
			var theUrl  = "https://education.ideas-block.com/webservice/rest/server.php?wstoken=daae7ac0dd870aff236e2378ab1a2595&wsfunction=mod_globgrades_hello_world&moodlewsrestformat=json";
			
			theUrl = theUrl + "&student_name=" + student + "&course_name=" + course + "&grade=" + grade + "&date=" + date + "&teacher_name=" + teacher;
		    var xmlHttp = new XMLHttpRequest();
		    xmlHttp.onreadystatechange = function() { 
		        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
		            // callback(xmlHttp.responseText);
		        alert("Success: " + xmlHttp.responseText);
		    }
		    xmlHttp.open("GET", theUrl, true); // true for asynchronous 
		    xmlHttp.send(null);
		}
</script>
