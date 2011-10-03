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

if($_SERVER["argc"] == 3)
{
	$timeRegExp="/^(\d+:\d+)\s.+\sby\s.+\sfrom\s.+\s\(.+\)$/";
	$nameRegExp="/^\d+:\d+\s(.+)\sby\s.+\sfrom\s.+\s\(.+\)$/";
	$artistRegExp="/^\d+:\d+\s.+\sby\s(.+)\sfrom\s.+\s\(.+\)$/";
	//$albumRegExp="/^\d+:\d+\s.+\sby\s.+\sfrom\s(.+)\s\(.+\)$/";
	//$licenseRegExp="/^\d+:\d+\s.+\sby\s.+\sfrom\s.+\s\((.+)\)$/";
	
	$podcastFileName=$_SERVER["argv"][2];
	$podcastName=substr($podcastFileName, 0, -4);
	$podcastFormat=substr($podcastFileName, -3, 3);

	$lines = file($_SERVER["argv"][1]);

	$file = fopen("./" . $podcastName . ".cue", 'w');
	fwrite($file, '
		REM GENRE "Metal"
		REM DATE "' . date("Y") . '"
		PERFORMER "VA"
		TITLE "' . $podcastName . '"
		FILE "' . $podcastFileName . '" ' . $podcastFormat . '
		
		TRACK 01 AUDIO
			TITLE "Open MetalCast Intro"
			PERFORMER "Craig Maloney"
			INDEX 01 00:00:00
	');
	
	$trackNum=2;
	
	foreach($lines as $curLine)
	{
		preg_match($timeRegExp, $curLine, $curTime);
		preg_match($nameRegExp, $curLine, $curName);
		preg_match($artistRegExp, $curLine, $curArtist);
		fwrite($file, '
		TRACK ' . $trackNum . ' AUDIO
			TITLE "' . $curName[1] . '"
			PERFORMER "' . $curArtist[1] . '"
			INDEX 01 ' . $curTime[1] . ':00
		');
		$trackNum++;
	}
	fwrite($file, "\n");
	fclose($file);
	
}
else
{
	print("CkOpenMetalCastCueSheetGenScript - a script for generating cue sheet files for Open MetalCast");
	print("Version 1.0 by Cyber Killer\n");
	print("Get the latest version at http://digital.dharkness.info/CkOpenMetalCastCueSheetGenScript\n\n");
	print("Usage:\n");
	print($_SERVER["argv"][0] . " <txt file with tracklist copied from Open MetalCast website> <filename of the podcast file>\n");
}

?>

