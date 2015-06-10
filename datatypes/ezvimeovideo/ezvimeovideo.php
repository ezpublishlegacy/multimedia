<?php

class eZVimeoVideo
{
    /*!
     Constructor
    */
    function eZVimeoVideo( $id )
    {
        $this->ID = $id;
		$json = file_get_contents("http://vimeo.com/api/v2/video/$id/json");
		$atts = @json_decode($json,1);
		$this->Attributes = is_array($atts) ? $atts[0] : array();
    }

    /*!
     Sets the name of the matrix
    */
    function setID( $id )
    {
        $this->ID = $id;
    }

    function attributes()
    {
        return array( 'id','attributes' );
    }

    function hasAttribute( $name )
    {
        return in_array( $name, $this->attributes() );
    }

    function attribute( $name )
    {
        switch ( $name )
        {
            case "id" :
            {
                return $this->ID;
            }break;
            case "attributes" :
            {
                return $this->Attributes;
            }break;
            default:
            {
                eZDebug::writeError( "Attribute '$name' does not exist", 'eZVimeoVideo::attribute' );
                return null;
            }break;
        }
    }

    public $ID;
	public $Attributes;

}

?>
