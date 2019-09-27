<?php
/*
* Main controller
*/
require_once "conf/conf.php";

$view = empty( $_GET[ 'view' ] ) ? 'quiz' : $_GET[ 'view' ];

switch( $view ){
    case( 'quiz' ):
        if( isset( $_POST[ 'next' ] ) ){
            $objFormData = new FormData( $_POST );
            $objCheck = new Check();

	        $showInfo = $objFormData->getInData();

            if( !isset( $showInfo[ 'firstname' ] ) )
                $errMessage = Lang::getLang( 'emptyName' );

            elseif ( !isset( $showInfo[ 'lastname' ] ) )
                $errMessage = Lang::getLang( 'emptyLastName' );

            elseif ( empty( $showInfo[ 'bdate' ] ) )
                $errMessage = Lang::getLang( 'emptyDate' );

            elseif ( empty( $showInfo[ 'status' ] ) )
	            $errMessage = Lang::getLang( 'emptyStatus' );

            elseif ( empty( $showInfo[ 'citizenship' ] ) )
                $errMessage = Lang::getLang( 'emptySitizen' );

            elseif ( empty( $showInfo[ 'education' ] ) )
                $errMessage = Lang::getLang( 'emptyEducation' );

            elseif ( empty( $showInfo[ 'tel' ] ) )
                $errMessage = Lang::getLang( 'emptyPhone' );
            elseif ( !$objCheck->goCheck( $showInfo[ 'tel' ] ) )
	            $errMessage = Lang::getLang( 'incorrectPhone' );

            elseif ( empty( $showInfo[ 'email' ] ) )
                $errMessage = Lang::getLang( 'emptyEmail' );

            elseif ( !$objCheck->goCheck( $showInfo[ 'email' ] ) )
	            $errMessage = Lang::getLang( 'incorrectEmail' );

            elseif ( empty( $showInfo[ 'know' ] ) )
                $errMessage = Lang::getLang( 'iKnow' );

            else {
                if( $_FILES[ 'foto' ][ 'name' ] != "" ){
	                $objUpload = new Upload( $_FILES );
                    if( !empty( $objUpload->getAllow() ) )
                        $errMessage = $objUpload->getAllow();

                    else{
                        $fileUploud = true;
                        $result = true;
                    }

                } else
             	    $result = true;
            }
        }
    break;
}
if( !in_array( $view, Lang::getView() ) ) die( Lang::getLang( '404' ) );

include __ROOT__ . "templates/index.php";