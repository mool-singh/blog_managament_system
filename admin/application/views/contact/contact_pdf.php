<?php

$html = '
		<h3>Contact Request List</h3>
		<table border="1" style="width:100%">
			<thead>
				<tr class="headerrow"> 
					<th>Name</th>
					<th>Email</th>
					<th>Mobile</th> 
					<th>Message</th>

					<th>Date</th>
				</tr>
			</thead>
			<tbody>';

			foreach($all_request as $row):
			$html .= '		
				<tr class="oddrow"> 
					<td>'.$row['contact_request_name'].'</td>
					<td>'.$row['contact_request_email'].'</td>
					<td>'.$row['contact_request_phone'].'</td> 
					<td>'.$row['contact_request_message'].'</td>
					<td>'.$row['contact_request_date'].'</td>
				</tr>';
			endforeach;

			$html .=	'</tbody>
			</table>			
		 ';
				
		$mpdf = new mPDF('c');

		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle("Admin - Contact Requests List");
		$mpdf->SetAuthor("Bms");
		$mpdf->watermark_font = 'Bms';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');		 
		 

		$mpdf->WriteHTML($html);

		$filename = 'Contact_request_list';

		ob_clean();

		$mpdf->Output($filename . '.pdf', 'D');

		exit();

?>