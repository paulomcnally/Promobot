<?php
App::uses('Component', 'Controller');
class ExcelComponent extends Component{
	
	/**
	 * Read Excel File Content and parse it into array
	 * @param string $file
	 * @return array
	 */
	public function readFile($file){
		App::import('Vendor','PHPExcel/IOFactory');
		$info = PHPExcel_IOFactory::load($file);
		$sheetData = $info->getActiveSheet()->toArray(null,true,true,true);
		return $sheetData;
	}
	
	/**
	 * Write excel function
	 * @param array $titles
	 * @param array $values
	 */
	public function write($titles, $values, $filename = 'Negocios'){
		App::import('Vendor','PHPExcel');
		App::import('Vendor','PHPExcel/Writer/Excel2007');
		$objPHPExcel = new PHPExcel();
		
		//Set properties
		$objPHPExcel->getProperties()->setCreator("Sheep Head Apps");
		$objPHPExcel->getProperties()->setLastModifiedBy("Sheep Head Apps");
		$objPHPExcel->getProperties()->setTitle("Negocios");
		$objPHPExcel->getProperties()->setSubject("Negocios Infobot");
		$objPHPExcel->getProperties()->setDescription("Documento para la base de datos de infobot.");
		
		//Set active sheet
		$objPHPExcel->setActiveSheetIndex(0);
		
		$colums = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
		
		$index_x = 0;
		$index_y = 1;
		
		//Set titles
		foreach($titles as $title){
			$objPHPExcel->getActiveSheet()->SetCellValue($colums[$index_x].$index_y, $title);
			$index_x++;
		}
		
		$index_x = 0;
		$index_y = 2;
		
		//Set info
		foreach($values as $value){
			foreach($value as $val){
				$objPHPExcel->getActiveSheet()->SetCellValue($colums[$index_x].$index_y, $val);
				$index_x++;
			}
			$index_y++;
			$index_x = 0;
		}
		
		$objPHPExcel->getActiveSheet()->setTitle('Negocios');
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		
		// Redirect output to a clientÕs web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
		header('Cache-Control: max-age=0');
		
		$objWriter->save('php://output');
		exit();
	}
}