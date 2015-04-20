<?php
App::uses('Component', 'Controller');
class FileComponent extends Component{
	
	private $allowedExtensions = array("jpg","jpeg","png","bmp","gif","xls");
	
	/**
	 * Upload File
	 * @param file $file
	 * @param string $path
	 * @param string $type
	 */
	public function uploadFile($file, $path, $type = 'img'){
		$name = $this->setName($file['name']);
		if($this->checkFile($name, $path, $type)){
			return false;
		}
		if ($file['error'] === UPLOAD_ERR_OK) {			
			if (move_uploaded_file($file['tmp_name'], $type.DS.$path.DS.$name)) {
				return $name;
			}
		}
		return false;
	}
	
	private function setName($name){		
		$name = strtolower($name);
		$name = str_replace(" / ", "_", $name);		
		$searchs = array(" ","@","$","%","^","&","*","[","]","(",")",":",";","}","{","-","?",">","<",",","/");		
		$name = str_replace($searchs, "", $name);
		
		$unwanted_array = array('Š'=>'s', 'š'=>'s', 'Ž'=>'z', 'ž'=>'z', 'À'=>'a', 'Á'=>'a', 'Â'=>'a', 'Ã'=>'a', 'Ä'=>'a', 'Å'=>'a', 'Æ'=>'a', 'Ç'=>'c', 'È'=>'e', 'É'=>'e',
				'Ê'=>'e', 'Ë'=>'e', 'Ì'=>'i', 'Í'=>'i', 'Î'=>'i', 'Ï'=>'i', 'Ñ'=>'n', 'Ò'=>'o', 'Ó'=>'o', 'Ô'=>'o', 'Õ'=>'o', 'Ö'=>'o', 'Ø'=>'o', 'Ù'=>'u',
				'Ú'=>'u', 'Û'=>'u', 'Ü'=>'u', 'Ý'=>'y', 'Þ'=>'b', 'ß'=>'s', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
				'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
				'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
		$name = strtr( $name, $unwanted_array );
		return $name;
	}
	
	/**
	 * Replace File
	 * @param file $file
	 * @param string $path
	 * @param string $oldImage
	 * @param string $type
	 * @return Ambigous <string, boolean>|boolean
	 */
	public function replaceFile($file, $path, $oldImage, $type = 'img'){
		$this->deleteFile($oldImage);
		$newFile = $this->uploadFile($file, $path, $type);
		if($newFile){			
			return $newFile;
		}
		return false;
	}
	
	/**
	 * Check File Extension
	 * @param string $filename
	 * @return boolean
	 */
	public function checkExtension($extension){
		return in_array($extension, $this->allowedExtensions);
	}
	
	/**
	 * Return mime type for file
	 * @param string $filename
	 * @return string
	 */
	public function getExtensionMime($filename){
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		return finfo_file($finfo, $filename);
	}
	
	/**
	 * Delete file
	 * @param string $filename
	 * @param string $type
	 * @return boolean
	 */
	public function deleteFile($filename,$type = 'img'){
		if($filename)
			return unlink($type.DS.$filename);
	}
	
	/**
	 * Check if file exists
	 * @param string $file
	 * @param string $path
	 * @param string $type
	 * @return boolean
	 */
	public function checkFile($name, $path, $type = 'img'){		
		if (file_exists($type.DS.$path.DS.$name))
			return true;
		return false;
	}
	
	public function renameFile($name, $path, $new_name, $type = 'img'){
		$new_name = $this->setName($new_name);
		rename($type.DS.$name, $type.DS.$path.DS.$new_name);
		return $path.DS.$new_name;
	}
}