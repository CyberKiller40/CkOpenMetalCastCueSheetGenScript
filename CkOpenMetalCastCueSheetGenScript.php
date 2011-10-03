#!/usr/bin/php -q

<?php

/*
	CkOpenMetalCastCueSheetGenScript - a script for generating cue sheet files for Open MetalCast
	Copyright (C) 2011 Łukasz "Cyber Killer" Korpalski

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

if($_SERVER["argc"] != 1)
{

$timeRegExp="^(\d+:\d+)\s.+\sby\s.+\sfrom\s.+\s\(.+\)$";
$nameRegExp="^\d+:\d+\s(.+)\sby\s.+\sfrom\s.+\s\(.+\)$";
$artistRegExp="^\d+:\d+\s.+\sby\s(.+)\sfrom\s.+\s\(.+\)$";
//$albumRegExp="^\d+:\d+\s.+\sby\s.+\sfrom\s(.+)\s\(.+\)$";
//$licenseRegExp="^\d+:\d+\s.+\sby\s.+\sfrom\s.+\s\((.+)\)$";


//preg_match('/[\d]+/', $_SERVER["argv"][$num], $albumid);


}
else
{
	print("CkOpenMetalCastCueSheetGenScript - a script for generating cue sheet files for Open MetalCast");
	print("Version 0.1 by Cyber Killer\n");
	print("Get the latest version at http://digital.dharkness.info/CkOpenMetalCastCueSheetGenScript\n\n");
	print("Usage:\n");
	print($_SERVER["argv"][0] . " <txt file with tracklist copied from Open MetalCast website>\n");
}

?>

