<?php  

/**
 * Function Name
 *
 * Function description
 *
 * @access	public
 * @param	type	name
 * @return	type	
 */
 
if (! function_exists('show_month'))
{
	function show_month($month = NULL)
	{
		if ($month == NULL) {
			return FALSE;
		}

		$month_name = array(
						1 => 'Januari',
						2 => 'Februari',
						3 => 'Maret',
						4 => 'April',
						5 => 'Mei',
						6 => 'Juni',
						7 => 'Juli',
						8 => 'Agustus',
						9 => 'September',
						10 => 'Oktober',
						11 => 'November',
						12 => 'Desember'
					);
		return $month_name[$month];
	}
}

?>