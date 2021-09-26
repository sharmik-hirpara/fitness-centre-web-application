<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="description" content="Description" />
	<meta name="keywords" content="Fitness Club, Gymnastic, Swimming, Yoga, Description" />
	<meta name="author" content="Sharmik" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>About | Stay Fit 24-hour Fitness Club</title>
	<link href="styles/style.css" rel="stylesheet" />
</head>

<body>
	<?php
		include "includes/header.inc";
		include 'includes/menu.inc';
	?>
	
	<h2 id="name">Name: Sharmik Hirpara</h2>
	<section id="personal_details">
		<h4>Basic details: </h4>
		<dl>
		<dt>Hometown: Mumbai, India</dt>
		<dt>Technical skills:</dt>
		<dd><ul>
			<li>Embedded C (8085/8051/dsPIC)</li>
			<li>Pascal, C, C++ (Beginner)</li>
			<li>Java, JavaScript</li>
			<li>HTML, CSS</li>
		</ul></dd>
		<dt>Hobbies:</dt>
		<dd><ul>
			<li>Listening music</li>
			<li>Dancing</li>
			<li>Learning new programming languages</li>
			<li>Watching movies (Animated, Action, Drama, Thriller)</li>
		</ul></dd>
		<dt>Refection:</dt>
			<dd><ol>
				<li><a href="index.html" target="new">Home page of Fitness club</a></li>
				<li><a href="product.html" target="new">All product description</a></li>
				<li><a href="enquire.html" target="new">Enquiry form</a></li>
				<li><a href="enhancement,html" target="new">Enhancement</a></li>
			</ol></dd>
		<dt id="course">Course: Masters in Information Technology (Software developer)</dt><dd></dd>
	</dl></section>
	<p id="student_no">Student number: 101980352</p>
	<figure>
		<img src="images/my_picture.png" class="profile_picture" id="profile_img" alt="Sharmik Hirpara" title="Sharmik Hirpara File size-93.8KB">
		<figcaption class="profile_picture">Profile picture</figcaption>
	</figure>
	<table id="timetable">
		<caption>Time table of 2<sup>nd</sup> Semester</caption>
		<thead>
			<tr>
				<th>Time</th>
				<th class="weekdays">Monday</th>
				<th class="weekdays">Tuesday</th>
				<th class="weekdays">Wednesday</th>
				<th class="weekdays">Thursday</th>
				<th class="weekdays">Friday</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="time">11:30am</td>
				<td></td><td></td><td></td><td></td><td></td>
			</tr>
			<tr>
				<td class="time">12:30pm</td>
				<td></td><td></td>
				<td class="OOP">Object-Oriented Programming - Workshop</td>
				<td class="CWA">Creating Web Applications - Lecture</td><td></td>
			</tr>
			<tr>
				<td class="time">1:30pm</td>
				<td class="DCS">Data Communications and Security - Lecture</td>
				<td></td><td></td><td></td><td></td>
			</tr>
			<tr>
				<td class="time">2:30pm</td>
				<td></td>
				<td class="SPM">Strategic Project Management - Lecture</td>
				<td></td>
				<td class="CWA">Creating Web Applications - Lab</td>
				<td></td>
			</tr>
			<tr>
				<td class="time">3:30pm</td>
				<td class="DCS">Data Communications and Security - Lab</td>
				<td></td>
				<td class="SPM">Strategic Project Management - Workshop</td>
				<td></td><td></td>
			</tr>
			<tr>
				<td class="time">4:30pm</td>
				<td></td><td></td>
				<td class="OOP">Object-Oriented Programming - Lecture</td>
				<td></td><td></td>
			</tr>
			<tr>
				<td class="time">5:30pm</td>
				<td></td><td></td><td></td><td></td><td></td>
			</tr>
			<tr>
				<td class="time">6:30pm</td>
				<td></td><td></td>
				<td class="OOP">Object-Oriented Programming - Lab</td>
				<td></td><td></td>
			</tr>
			<tr>
				<td class="time">7:30pm</td>
				<td></td><td></td><td></td><td></td><td></td>
			</tr>
			<tr>
				<td class="time">8:30pm</td>
				<td></td><td></td><td></td><td></td><td></td>
			</tr>
		</tbody>
	</table>

	<?php 
		include 'includes/footer.inc';
	?>
</body>