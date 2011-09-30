<?

class eZBotrVideo
{
    /*!
     Constructor
    */
    function eZBotrVideo( $id )
    {
        $this->ID = $id;
		$ini = new eZINI();
		$Key = $ini->variable('BOTRSettings', 'Key');
		$Private = $ini->variable('BOTRSettings', 'Private');
		$botr_api = new Botr_API($Key,$Private);
		$player_results = $botr_api->call('/players/list');
		$this->Players = array();
		foreach ($player_results['players'] as $p) {
			$this->Players[$p['key']] = $p;
		}
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
                eZDebug::writeError( "Attribute '$name' does not exist", 'eZBotrVideo::attribute' );
                return null;
            }break;
        }
    }

    public $ID;
	public $Players;

}

?>
