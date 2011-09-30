<?

class eZVimeoVideo
{
    /*!
     Constructor
    */
    function eZVimeoVideo( $id )
    {
        $this->ID = $id;

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
        return array( 'id','players' );
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
            case "players" :
            {
                return $this->Players;
            }break;
            default:
            {
                eZDebug::writeError( "Attribute '$name' does not exist", 'eZVimeoVideo::attribute' );
                return null;
            }break;
        }
    }

    public $ID;
	public $Players;

}

?>
