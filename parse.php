<?php

// Simple code to parse the MSW file and dump each record

//----------------------------------------------------------------------------------------

$filename = 'msw3-all-utf8.csv';

$headings = array();

$row_count = 0;

$file = @fopen($filename, "r") or die("couldn't open $filename");


$containers = array();

		
$file_handle = fopen($filename, "r");
while (!feof($file_handle)) 
{
	$row = fgetcsv(
		$file_handle, 
		0
		);
		
	$go = is_array($row);
	
	if ($go)
	{
		if ($row_count == 0)
		{
			$headings = $row;		
		}
		else
		{
			$obj = new stdclass;
		
			foreach ($row as $k => $v)
			{
				if ($v != '')
				{
					$obj->{$headings[$k]} = $v;
				}
			}
		
			print_r($obj);	
			
			/*
			if (isset($obj->CitationName) && $obj->CitationName != '')
			{
				$containers[] = $obj->CitationName;
			}
			*/
		}
	}	
	$row_count++;
}

/*
$containers = array_unique($containers);
sort($containers);

print_r($containers);

echo join("\n", $containers);
*/

?>

