<?php 
/*This class will help encrypting by using base64_encode and custom key
*  @author vivek kumar tripathi <vivek@opensum.com>*
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
class  VkBase64Encrypt
{
	
/**
 * (PHP 4, PHP 5)<br/>
 * Encodes data with MIME base64 and custom key
 * @param string $data  The data to encode.<p>
 * @param string $key  key for encryption <p>
 * </p>
 * @return string The encoded data, as a string or <b>FALSE</b> on failure.
 */
public static function encrypt($data, $key) {
  $result = '';
  for($i=0; $i<strlen($data); $i++) {
    $char = substr($data, $i, 1);
    $keychar = substr($key, ($i % strlen($key))-1, 1);
    $char = chr(ord($char)+ord($keychar));
    $result.=$char;
  }
  return base64_encode($result);
}

/**
 * (PHP 4, PHP 5)<br/>
 * Decodes data encoded with MIME base64 and custom key
 * @param string $data  <p>The encoded data .</p>
 * @param string $key <p>Encryption key</p>
 * Returns <b>String</b> if input contains character from outside the base64
 * alphabet. and key is incorrect
 * </p>
 * @return string the original data if key is correct or <b>FALSE</b> on failure. The returned data may be
 * binary.
 */
public static function decrypt($data, $key) {
  $result = '';
  $data = base64_decode($data);
 
  for($i=0; $i<strlen($data); $i++) {
    $char = substr($data, $i, 1);
    $keychar = substr($key, ($i % strlen($key))-1, 1);
    $char = chr(ord($char)-ord($keychar));
    $result.=$char;
  }
 
  return $result;
}

}




//Usage methode 1

/*$data='String to be encrypted'; 
$key='srijan' ;
echo "Encypted string = ".$encrypted_string=VkBase64Encrypt::encrypt($data,$key);
echo "<br/>";
echo "Decrypted String =  ". VkBase64Encrypt::decrypt($encrypted_string,$key);
echo "<br/>______________________________________<br/>";
*/
//Usage methode 2
/*
$vkbe =new VkBase64Encrypt();
$data='String to be encrypted'; 
$key='srijan' ;
echo "Encypted string = ".$encrypted_string=$vkbe->encrypt($data,$key);
echo "<br/>";
echo "Decrypted String =  ". $vkbe->decrypt($encrypted_string,$key);
 */

?>
 

 

 
