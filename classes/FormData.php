<?php
/*
* This is the file which contains classes, trait,
* interface for gets and processing form data.
*/
abstract class SetData{
	protected $inData = array();
	protected $tmpData;

	abstract public function setInData( $key, $val );
	abstract public function setTmpData( $tmpData );

}
interface GetData{
	public function getInData();
	public function getTmpData();
}

trait HtmlChars{
	public function chars( $val ){
		return trim( htmlspecialchars( $val,ENT_QUOTES ) );
	}
}


class FormData extends SetData implements GetData {
	use HtmlChars;

	private $extArr = array();

	public function setInData( $key, $val ) {
		$this->inData[ $key ] = $val;
	}

	public function setTmpData( $tmpData ) {
		// TODO: Implement setTmpData() method.
		$this->tmpData = $tmpData;
	}

	public function getInData() {
		// TODO: Implement getInData() method.
		return $this->inData;
	}

	public function getTmpData() {
		// TODO: Implement getTmpData() method.
		return $this->tmpData;
	}

	public function __construct( $inFormData ){
        foreach ( $inFormData as $key => $val ){

            if( empty( $val ) ) continue;

            if( is_array( $val ) ){
                foreach ( $val as $extKey => $extVal ){
                	if( empty( $extVal ) ) continue;

                	$this->extArr[ $extKey ] =  $extVal;
	                $this->setTmpData( $extVal );
	                $this->setInData( $key, $this->extArr );
                }
           // continue;
            }

	        $this->setTmpData( $val );
            $this->setInData( $key, $this->getTmpData()  );

        }
    }

}