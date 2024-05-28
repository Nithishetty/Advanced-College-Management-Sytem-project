<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sql = "INSERT INTO discussion(studentid,notesid,discussiontitle,discussionmsg,datetime,status) VALUES ('$_SESSION[studentid]','$_GET[notesid]','$_POST[discussiontitle]','$_POST[discussionmsg]','$dttim','Active')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Discussion record published successfully..');</script>";
	}
}
if(isset($_POST["submitreply"]))
{
	$sql = "INSERT INTO discussion_reply(discussion_id ,studentid,facultyid,discussionreply,datetime,status) VALUES('$_POST[discussion_id]','$_SESSION[studentid]','$_SESSION[facultyid]','$_POST[replymsg]','$dttim','Active')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Discussion reply record inserted successfully..');</script>";
	}
}
?>
	<div class="news-section" id="news">
		<div class="container">
			

			
			<div class="news-grids-w3l">
<?php
	$sql= "SELECT * FROM notes LEFT JOIN subject ON notes.subjectid = subject.subjectid LEFT JOIN course on subject.courseid = course.courseid where notes.status <>'Deleted' AND notes.notesid='$_GET[notesid]'";
	$qsql= mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs=mysqli_fetch_array($qsql))
	{
?>
				<div class="col-xs-12 news-grid" style="border-style: outset;">
					
					<div class="news-text">
						<div class="news-events-agile event-colo1">
							<h5>
								<a href="" onclick="return false;" data-toggle="modal" data-target="#myModal"><?php echo $rs['notestitle']; ?></a>	
							</h5>
							<div class="clearfix"></div>
						</div>
						<p><?php echo $rs['notes']; ?></p>
							<table>
	<tr>
	
		<a href='notesfile/<?php echo $rs['document']; ?>' download ><input type='submit' name='submit' value='Download notes' class='form-control' style='width:200px;'></a> 
		</td>
	</tr>
	</table>
	<br>
					</div>
				</div>
<?php	
	}
	?>			
				<form method="post" action="">
				<div class="col-xs-12 news-grid" style="border-style: outset;">
						
						<div class="news-text">
						
							<div class="gaps">
								<p>Discussion title</p>
								<input type="text" name="discussiontitle" value="<?php echo $rsedit['discussiontitle'];?>" placeholder="Enter discussion title" class="form-control" />
							</div>
							<div class="gaps">
								<p>Discussion message</p>
								<textarea class="form-control" name="discussionmsg" placeholder="Enter discussion content here"  ></textarea>						
							</div>
							
							<div class="gaps">
								<br>
							<input type="submit" name="submit" value="Publish Discussion Forum" class='form-control' style='width:200px;'>
								<br>&nbsp;
							</div>
				
					</form>	
					<hr>
					<form method='post' action=''>
					<?php
					$sql = "SELECT * FROM discussion LEFT JOIN student ON discussion.studentid = student.studentid LEFT JOIN notes ON discussion.notesid = notes.notesid LEFT JOIN subject ON discussion.subjectid =subject.subjectid where discussion.status ='Active' order by discussion.discussionid desc";
					$qsql = mysqli_query($con,$sql);
					while($rs = mysqli_fetch_array($qsql))
					{
						echo "<table  id='example' class='table table-striped table-bordered' cellspacing='0' width='100%'>
						
				<tbody>";
						if(file_exists("imgstudent/$rs[img]"))
						{
							$imgname = "imgstudent/$rs[img]";
						}
						else
						{
							$imgname = "images/noimage.png";
						}
						$publisheddttime = date("d m Y h:i A",strtotime($rs['datetime']));
						echo "
						<tr>
							<td style='width:150px;'>$rs[studentname]<br>(Roll No. $rs[rollno])
							<img src='$imgname' width='35' height='50'>
							</td>
							<td><b>$rs[discussiontitle]</b></br>
							<font size='2'>Published on $publisheddttime</font></br>
							$rs[discussionmsg]</td>
							</tr>
							</tr>
							<td></td>
							<td>Message Reply:
							<input type='hidden' name='discussion_id' value='$rs[0]'> 
							<textarea class='form-control' name='replymsg'></textarea>
							<input type=submit name='submitreply' value='Send Reply' class='form-control' style='width:200px;'>
							</td>
							</tr>
							<tr>
							<td></td>
							<td>";
?>

					
<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<tbody>
					<?php
					$sqlreplymsg = "SELECT * FROM discussion_reply LEFT JOIN discussion ON discussion_reply.discussion_id = discussion.discussionid  LEFT JOIN student ON discussion.studentid = student.studentid LEFT JOIN faculty ON discussion_reply.facultyid = faculty.facultyid where discussion_reply.status <>'Deleted' AND discussion_reply.status ='Active' ORDER BY discussion_reply.discussion_replyid DESC";
					$qsqlreplymsg  = mysqli_query($con,$sqlreplymsg);
					while($rsreplymsg = mysqli_fetch_array($qsqlreplymsg))
					{
						
						if(file_exists("imgstudent/$rsreplymsg[img]"))
						{
							$imgname1 = "imgstudent/$rsreplymsg[img]";
						}
						else
						{
							$imgname1 = "images/noimage.png";
						}
						$publisheddttime = date("d m Y h:i A",strtotime($rsreplymsg['datetime']));
						echo "<tr>							
							<td  style='width:150px;'>$rsreplymsg[studentname]<br>( $rsreplymsg[rollno])<br><img src='$imgname' width='50' height='100'></td>
							<td><font size='2'>Replied on $publisheddttime</font> <br>
							$rsreplymsg[discussionreply]</td>
							</tr>";
							
					}
				?>
				</tbody>
				</table>
<?php				
							echo "</td></tr></tbody></table>";
					   }
						?>					
						</form>
						</div>
					</div>
					</form>
				<div class="clearfix"></div>
			</div>
			</div>
	</div>
	<!-- //news -->

<?php
include("footer.php");
?>
<script>
//Load subject details
function loadsubject(course,semester)
{
	if (semester == "") 
	{
        document.getElementById("divsubject").innerHTML = "<select name='subjectid'><option value=''>Select Subject</option></select>";
        return;
    } 
	else 
	{ 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("divsubject").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxsubject.php?course="+course+"&semester="+semester,true);
        xmlhttp.send();
    }
}
</script>