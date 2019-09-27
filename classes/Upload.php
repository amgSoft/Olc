<?php
/*
* This class contains programs for upload file 
*/
trait MaxFileSize{
	public function maxSize(){
		return "30000"; // Max size 30 kb
	}
}

trait FileType{
	private $imgType = array( "image/bmp","image/jpeg","image/png","image/gif" );

	public function checkType( $type ){
		if( in_array( $type, $this->imgType ) )
			return true;
		else
			return false;

	}
}
abstract class FileInfo{
	protected $name;
	protected $tmpName;
	protected $allow;

	abstract public function setName( $name );
	abstract public function setTmpName( $tmpName );
	abstract public function moveFile( $tmpName, $dir );
	abstract public function setAllow( $message );

	public function getName(){
		return $this->name;
	}

	public function getTmpName(){
		return $this->tmpName;
	}

	public function getDir( $name ){
		return "img/{$name}";
	}

	public function showFoto(){
		return $this->getDir( $this->getName() );
	}

	public function getAllow(){
		return $this->allow;
	}

}
class ExFileInfo extends FileInfo {
	use MaxFileSize, FileType;

	public function setName( $name ) {
		$this->name = $name;
	}

	public function setTmpName( $tmpName ) {
		$this->tmpName = $tmpName;
	}
	public function moveFile( $tmpName, $dir ){
		move_uploaded_file( $tmpName, $dir );
	}

	public function setAllow( $message ) {
		// TODO: Implement setAllow() method.
		$this->allow = $message;
	}
}
class Upload extends ExFileInfo {

    function __construct( $file ){

    	$this->setName( basename( $file[ 'foto' ][ 'name' ] ) );
    	$this->setTmpName( $file[ 'foto' ][ 'tmp_name' ] );


    	if( $file[ 'foto' ][ 'size' ] > $this->maxSize() ){
            $this->setAllow( Lang::getLang( 'tooBig' ) );

        }elseif ( !$this->checkType( $file[ 'foto' ][ 'type' ] ) ){
            $this->setAllow( Lang::getLang( 'noAllow' ) );
        }else {
		    $this->moveFile( $this->getTmpName(), $this->getDir( $this->getName() ) );
        }

    }

}