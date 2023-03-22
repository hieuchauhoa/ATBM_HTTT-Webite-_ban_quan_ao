<?php
class Caesar
{
	protected static function crypt( $string, $key )
	{
		for( $i=0; $i<strlen( $string ); $i++ )
		{
			$char = ord( $string[$i] );
			if( $char > 64 && $char < 91 )
			{
				$char += $key;
				if( $char > 90 )
					$char -= 26;
				else if( $char < 65 )
					$char += 26;
			}
			else if( $char > 96 && $char < 123 )
			{
				$char += $key;
				if ($char > 122)
					$char -= 26;
				else if( $char < 97 )
					$char += 26;
			}
			$string[$i] = chr( $char );
		}
		return $string;
	}

	
	public static function decrypt( $string, $key )
	{
		return self::crypt( $string, -1 * $key );
	}

	
	public static function encrypt( $string, $key )
	{
		return self::crypt( $string, $key );
	}
}
?>